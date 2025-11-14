<?php if(!defined('ABSPATH')) exit; ?>
<?php
function sfr_admin_enqueue() {
	wp_enqueue_media();
	
	safir_register_script( 'safiradmin', 'lib/safirtema/assets/admin.js');
	safir_register_script( 'meta-box-image', 'safirpanel/scripts/image.js');
	wp_localize_script( 'meta-box-image', 'meta_image',
		array(
			'title' => 'Bir Resim Seçin veya Bilgisayarınızdan Yükleyin',
			'button' => 'Bu Resmi Kullan',
		)
	);
	wp_enqueue_script( 'meta-box-image' );
	wp_enqueue_script( 'wp-color-picker' );
	wp_enqueue_script( 'safiradmin' );
}
add_action( 'admin_enqueue_scripts', 'sfr_admin_enqueue' );

function safir_admin_styles() {
	safir_enqueue_style("safiradmin", "lib/safirtema/assets/admin.css");
	wp_enqueue_style("wp-color-picker");
}

add_action('admin_print_styles', 'safir_admin_styles');
if(current_user_can("administrator") && is_admin_bar_showing()) {
	add_action('wp_enqueue_scripts', 'safir_admin_styles');
}

function safir_admin_fonts() {
	global $safirFonts;
	$customFonts = $safirFonts["custom-fonts"];
	foreach ($customFonts as $font => $typekit) {
		wp_enqueue_style('safir-'.$font.'-font', 'https://use.typekit.net/'.$typekit.'.css');
	}
}
add_action('admin_print_styles', 'safir_admin_fonts');
