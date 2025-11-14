<?php if(!defined('ABSPATH')) exit; ?>
<?php
// Language
	load_theme_textdomain( 'pusula', get_template_directory() . '/languages' );


// Theme Support
	add_action( 'after_setup_theme', 'safir_theme_functions' );
	function safir_theme_functions() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', [ 'script', 'style' ] );
		if ( ! isset( $content_width ) ) $content_width = 740;
	}

	function safir_embed_defaults($embed_size){
		$embed_size['width'] = 740;
		$embed_size['height'] = 420;
		return $embed_size;
	}
	add_filter('embed_defaults', 'safir_embed_defaults');

	add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
	add_filter( 'use_widgets_block_editor', '__return_false' );
