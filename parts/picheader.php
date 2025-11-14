<?php if(!defined('ABSPATH')) exit; ?>
<?php
if(is_attachment()) {
	$parentID = $post->post_parent;
	$title = get_the_title($parentID);

	$image = get_post_meta($parentID, 'picHeader', true);
	if(!$image) {
		if( xoption("picHeaderFeatured") ) {
			if( has_post_thumbnail($parentID) ) {
				$image = wp_get_attachment_image_src( get_post_thumbnail_id($parentID), 'full');
				$image = $image[0];
			}
		}
	}
	if(!$image) {
		foreach(get_the_category($parentID) as $category) {
			$image = get_option("category_" . $category->cat_ID . "_image2");
		}
	}

} elseif(is_page() || is_single()) {
	$title = get_the_title();
	$image = get_post_meta(get_the_ID(), 'picHeader', true);
	if(!$image) {
		if( xoption("picHeaderFeatured") ) {
			if( has_post_thumbnail() ) {
				$image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full');
				$image = $image[0];
			}
		}
	}
	if(!$image) {
		foreach(get_the_category() as $category) {
			$image = get_option("category_" . $category->cat_ID . "_image2");
		}
	}
} elseif(is_category()) {
	$title = single_cat_title("", false);
	$ID = get_query_var('cat');
	$image = get_option("category_".$ID."_image2");
} elseif(is_404()) {
	$title = __('Sayfa Bulunamadı', 'pusula');
} elseif(is_search()) {
	$title = __('Arama Sonuçları', 'pusula');
} elseif(is_tag()) {
	$title = sprintf( __( '%s ile Etiketlenen Konular', 'pusula' ), single_tag_title("", false));
}

if(!$image) $image = xoption('picHeaderImage');
?>

<div class="picHeader" style="background-image: url(<?php echo $image ?>)">
	<div class="inner">
		<div class="innerContainer">
			<div class="titleGroup">
				<h1 class="title"><?php echo $title; ?></h1>
				<?php if(xoption('breadcrumb') == "evet") : ?>
				<div id="safircrumb">
					<?php safir_breadcrumb(); ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

