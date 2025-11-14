<?php if(!defined('ABSPATH')) exit; ?>
<?php
add_filter( 'body_class','safir_body_classes' );
function safir_body_classes( $classes ) {
	if(wp_is_mobile()) {
		$classes[] = 'mobile';
		if(xoption("mobileStickyMenu")) $classes[] = 'stickyMenu';
	} else {
		$classes[] = 'desktop';
		if(xoption("desktopStickyMenu")) $classes[] = 'stickyMenu';
	}
	if(xoption("stickyMenu")) $classes[] = "stickyMenu";
	if(xoption("fitImage")) $classes[] = "fitImage";
	$classes[] = xoption('sidebarPosition');
	return $classes;
}

add_action( 'safir_body_tag', 'safir_body_tag_mobile_column' );
function safir_body_tag_mobile_column() {
	body_class();
}

// HEAD AND BODY TAGS

add_action("wp_body_open", "safir_openbody_tag");
add_action("admin_head", "safir_admin_head");
add_action("customize_controls_print_scripts", "safir_admin_head");
function safir_openbody_tag() {
	echo xoption("bodyOpenScript");
	include(get_template_directory() . "/images/sprite.svg");
	include(get_template_directory() . "/images/icons.svg");
}
function safir_admin_head() {
	include(get_template_directory() . "/images/icons.svg");
}

add_action("wp_head", "safir_head_tag");
function safir_head_tag() {
	?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta charset="<?php bloginfo('charset'); ?>" />
	<link rel="shortcut icon" href="<?php echo xoption('favicon') ?>">
	<?php if(is_single()) wp_enqueue_script('comment-reply'); ?>
	<!--[if lt IE 9]><script src="<?php echo esc_url(get_template_directory_uri()) ?>/scripts/html5shiv.js"></script><![endif]-->
	<?php
	if(is_singular() && has_block("safirtema/sorucevap")) {
		include(get_template_directory() . "/lib/safirtema/faqsnippet.php");
	}
	echo xoption('headerScript');
	echo xoption('gaScript');
	include(get_template_directory() . "/lib/safirtema/style.php");
}


