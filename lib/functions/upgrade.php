<?php if(!defined('ABSPATH')) exit; ?>
<?php
$safirpanelVersion = "2.12";

$options = get_option("safir_". SAFIR_THEME_SLUG ."_options");
if(strlen($options) < 100) {
	return;
} else {
	$options = json_decode(get_option("safir_". SAFIR_THEME_SLUG ."_options"));
}

if (!get_option("safir_pusula_v2_arrangements")) {
	update_option("safir_pusula_v2_arrangements", true);
	// Cat images
	$terms = get_terms( 'category', array(
		'hide_empty' => false,
	));
	foreach ($terms as $term) {
		$ID = $term->term_id;
		$cat_image = get_option( "category_".$ID ."_image" );
		if($cat_image == "") {
			$cat_image = get_option("category_$ID");
			$cat_image = $cat_image['img1'];
			if($cat_image != "") {
				update_option( "category_".$ID ."_image1", $cat_image );
			}
		}

		$cat_image = get_option( "category_".$ID ."_image2" );
		if($cat_image == "") {
			$cat_image = get_option("category_$ID");
			$cat_image = $cat_image['img2'];
			if($cat_image != "") {
				update_option( "category_".$ID ."_image2", $cat_image );
			}
		}

	}
}

// Update Default Panel Options
$panelOptions = get_option("safir_". SAFIR_THEME_SLUG ."_safirpanel");
foreach($panelOptions as $panelOption) {
	foreach($panelOption["data"] as $slug => $data) {
		if(!isset($options->$slug) && isset($data["default"])) {
			$value = str_replace(["{templateurl}", "{siteurl}"], [get_template_directory_uri(), home_url()], $data["default"]);
			xoption($slug, $value);
		}
	}
}