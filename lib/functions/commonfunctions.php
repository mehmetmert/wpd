<?php if(!defined('ABSPATH')) exit; ?>
<?php
// Remove generator meta tag
	remove_action('wp_head', 'wp_generator');

// safirthumb

	function safirthumb($data = array("type" => "post", "ID" => 0, "alt" => "", "class" => '')) {
		extract($data);

		// Post Defaults
		if(isset($type) && $type == "post") {
			if($ID == 0) $ID = get_post_thumbnail_id();
			if($alt == "") $alt = get_the_title();
		} else {
			if(!isset($type)) $type = "";
			if(!isset($ID)) $ID = 0;
			if(!isset($alt)) $alt = get_bloginfo("name");
			if(!isset($class)) $class = "";
		}

		if($type == "cat") {
			$image = $ID;
			$width = 270;
			$height = 200;
		} else {
			$size = "large";
			if(xoption("highQualityImages")) $size = "full";
			$imageData = wp_get_attachment_image_src($ID, $size);
			if(is_array($imageData)) {
				$image = $imageData[0];
				$width = $imageData[1];
				$height = $imageData[2];
			} else {
				$image = xoption("noimageforpost");
				$width = 160;
				$height = 90;
			}
		}
		?>
		<div class="safirthumb <?php echo $class ?>">
			<div class="thumbnail">
				<div class="center">
					<img <?php safirLazyThumb($image) ?> alt="<?php echo $alt ?>" width="<?php echo $width ?>" height="<?php echo $height ?>" />
				</div>
			</div>
		</div>
		<?php
	}

	function safirLazyThumb($image) {
		if(xoption("lazyload")) {
			echo 'src="' . xoption("noimageforpost") . '" data-src="' . $image . '" class="lazy" loading="lazy"';
		} else {
			echo 'src="' . $image . '"';
		}
	}



// My Custom Functions

function safirText($wordsCount, $echo = true, $excerpt = true) {
	global $post;
	if($excerpt && $x = get_the_excerpt()) :
		$string = safirBracket(strip_tags($x));
	else :
		$string = safirBracket(strip_tags(get_the_content()));
	endif;
	$array = explode(" ", $string);
	if (count($array)>$wordsCount) :
		array_splice($array, $wordsCount);
		$string = implode(" ", $array)."...";
	endif;
	if($echo) :
		echo $string;
	else :
		return $string;
	endif;
}

function safirText2($content, $wordsCount) {
	$string = safirBracket(strip_tags($content));
	$array = explode(" ", $string);
	if (count($array)>$wordsCount) :
		array_splice($array, $wordsCount);
		$string = implode(" ", $array)."...";
	endif;
	echo $string;
}

// Bracket Remover

function safirBracket($x) {
	$active = false;
	$result = "";
	$len = strlen($x);
	if($len>1) {
		for ($i=0; $i<=$len-1; $i++) {
			if(substr($x, $i, 1) == '[') {
				$active = true;
			}
			elseif (substr($x, $i, 1) == "]") {
				$active = false;
			}
			if($active == false && substr($x, $i, 1) != "]") {
				$result .= substr($x, $i, 1);
			}
		}
		return $result;
	}
}

// Safir Top Category
function safir_top_category($catID) {
	$curr_cat = get_category_parents($catID, false, '/' ,true);
	$curr_cat = explode('/',$curr_cat);
	$idObj = get_category_by_slug($curr_cat[0]);
	return $idObj->term_id;
}

// Default Gallery Styles

add_filter( 'use_default_gallery_style', '__return_false' );

// All posts count of a category

function safirPostCountofCategory( $cat_id ) {
	$q = new WP_Query( array(
		'nopaging' => true,
		'tax_query' => array(
			array(
				'taxonomy' => 'category',
				'field' => 'id',
				'terms' => $cat_id,
				'include_children' => true,
			),
		),
		'fields' => 'ids',
	) );
	return $q->post_count;
}

// Safir Gallery IDs

function safir_get_gallery_ids($pageID) {
	$attachmentIDs = "";

	if (function_exists("has_block")) {
		$galleryPost = get_post($pageID);
		$galleryContent = $galleryPost->post_content;
		$galleryDump = parse_blocks($galleryContent);
		foreach ($galleryDump as $block) {
			if($block['blockName'] == "core/gallery") {
				$text = $block['innerHTML'];
				preg_match_all('@data-id="(.*?)"@si', $text, $content);
				if(is_array($content[1])) $attachmentIDs = $content[1];
				if(isset($block["attrs"]["ids"])) $attachmentIDs = $block["attrs"]["ids"];
			}
		}
		if(is_array($attachmentIDs)) {
			if(!is_numeric($attachmentIDs[0])) {
				$attachmentIDs = [];
				foreach ($galleryDump as $block) {
					if($block['blockName'] == "core/gallery") {
						foreach ($block["innerBlocks"] as $innerBlock) {
							if(is_numeric($innerBlock["attrs"]["id"])) $attachmentIDs[] = $innerBlock["attrs"]["id"];
						}
					}
				}	
			}
		}
	}

	if(!is_array($attachmentIDs)) {
		$gallery = get_post_gallery( $pageID, false );
		if($gallery) {
			$attachmentIDs = explode(',', $gallery['ids']);
		}
	}

	return $attachmentIDs;

}

// Register Scripts and Styles

	function safir_enqueue_style($name, $file) {
		wp_enqueue_style($name, get_template_directory_uri() . '/' . $file, [], filemtime(get_template_directory() . "/" . $file));
	}
	
	function safir_enqueue_script($name, $file) {
		wp_enqueue_script($name, get_template_directory_uri() . '/' . $file, ['jquery'], filemtime(get_template_directory() . '/' . $file), true );
	}
	
	function safir_register_script($name, $file) {	
		wp_register_script($name, get_template_directory_uri() . '/' . $file, ['jquery'], filemtime(get_template_directory() . '/' . $file), true );
	}

// Update Hit
	function safirUpdateHit() {
		if(!is_admin() && (is_single() || is_attachment() || is_page())) {
			$id = get_the_ID();
			$postHit = get_post_meta($id, 'hit',true);
			if(is_numeric($postHit)) {
				$postHit++;
			} else {
				$postHit = 1;
			}
			update_post_meta($id, 'hit', $postHit);
		}
	}
	add_action('template_redirect', 'safirUpdateHit');

// Safir Logo

	function safirLogo() {
		?>
		<a class="safir-logo" href="<?php bloginfo('url'); ?>">
			<?php if($x = xoption("logo")) : ?>
				<img src="<?php echo $x; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" width="<?php echo xoption('logoWidth'); ?>" height="<?php echo xoption('logoHeight'); ?>" />
			<?php else: ?>
				<?php bloginfo('name'); ?>
			<?php endif; ?>
		</a>
		<?php
	}


// Custom Galleries
	function safir_custom_gallery_render($block_content, $block) {
		if (!is_page_template("pages/page-crew.php")) {
				return $block_content;
		}
		if ($block['blockName'] !== "core/gallery") {
				return $block_content;
		}
		$attachmentIDs = array();
		if (array_key_exists('innerBlocks', $block) && is_array($block['innerBlocks'])) {
				foreach($block['innerBlocks'] as $innerBlock) {
						if (isset($innerBlock['blockName']) && $innerBlock['blockName'] === 'core/image') {
								$attachmentIDs[] = $innerBlock['attrs']['id'];
						}
				}
		}
		if (array_key_exists('attrs', $block) && is_array($block['attrs'])
				&& array_key_exists('ids', $block['attrs']) && is_array($block['attrs']['ids'])) {
				$attachmentIDs = $block['attrs']['ids'];
		}
		if (empty($attachmentIDs)) {
				return $block_content;
		}
		ob_start();
		if (is_page_template("pages/page-crew.php")) {
			include(get_template_directory() . "/parts/crewpagegallery.php");
		}
		return ob_get_clean();
	}
	add_filter('render_block', 'safir_custom_gallery_render', 11, 2);

// Bileşen Linki

add_action('admin_bar_menu', 'safirWidgetsMenu', 400);
function safirWidgetsMenu() {
	global $wp_admin_bar;
	if (!is_super_admin() || !is_admin_bar_showing() || !is_home()) return;
	$wp_admin_bar->add_menu(
		[
			'id' => 'safirwidgetsmenu',
			'title' => '<span class="ab-icon dashicons dashicons-admin-home" style="margin-top: 2px"></span> Anasayfayı Düzenle',
			'href' => admin_url('widgets.php'),
		]
	);
}
