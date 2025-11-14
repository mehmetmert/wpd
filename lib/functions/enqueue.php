<?php if(!defined('ABSPATH')) exit; ?>
<?php
function safir_scripts_and_styles() {

	safir_enqueue_style('safirstyle', 'dist/style.css');
	if(file_exists(get_template_directory() . '/edits/style.css')) {
		safir_enqueue_style('safircustomstyle', 'edits/style.css');
	}

	wp_enqueue_script( 'jquery' );
	safir_enqueue_script('owl', 'lib/owl-carousel/owl.carousel.min.js');
	safir_enqueue_script('safirscripts', 'scripts/scripts.js');
	if(file_exists(get_template_directory() . '/edits/scripts.js')) {
		safir_enqueue_script('safircustomscript', 'edits/scripts.js');
	}

	global $safirSelectedFonts;
	foreach ($safirSelectedFonts as $font => $typekit) {
		wp_enqueue_style('safir'.$font.'font', 'https://use.typekit.net/'.$typekit.'.css');
	}

	safir_enqueue_script('fancybox', 'lib/fancybox/jquery.fancybox.min.js');
	safir_enqueue_style('fancybox', 'lib/fancybox/jquery.fancybox.min.css');
}

add_action( 'wp_enqueue_scripts', 'safir_scripts_and_styles' );
