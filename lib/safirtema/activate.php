<?php if(!defined('ABSPATH')) exit; ?>
<?php
// READING OPTIONS
	if(get_option('posts_per_page') == 10) update_option('posts_per_page', 18);
	update_option("show_on_front", "posts");

// PAGES
$pages = array(
	'contact'	=> __('İletişim', 'pusula'),
);
foreach ($pages as $key => $value) {
	$args = [
		'post_type' => 'page',
		'post_status' => 'publish',
		'title' => $value
	];
	$page = get_posts($args);
	if (empty($page)) {
		$post_id = wp_insert_post(
			array(
				'post_title'    =>  $value,
				'post_status'   =>  'publish',
				'post_type'     =>  'page'
			)
		);
		update_post_meta($post_id, "_wp_page_template", "pages/page-" . $key . ".php");
	}
}

update_post_meta($post_id, "picHeader", get_template_directory_uri() . '/images/picheader/iletisim.jpg');

// MENUS
$menuItems = wp_get_nav_menus();
if(count($menuItems) > 0) {
	// menü var:
} else {
	// menü yok
	$menus = array(
		'mainmenu'		=>	'Ana Menü',
		'footermenu'	=>	'Alt Menü'
	);
	foreach ($menus as $menulocation => $menuname) {
		$menu_exists = wp_get_nav_menu_object( $menuname );
		if( !$menu_exists) {
			$menu_id = wp_create_nav_menu($menuname);
			if( !has_nav_menu( $menulocation ) ) {
				$locations = get_theme_mod('nav_menu_locations');
				$locations[$menulocation] = $menu_id;
				set_theme_mod( 'nav_menu_locations', $locations );
				wp_update_nav_menu_item($menu_id, 0, array(
					'menu-item-title' =>  'Menüye Eleman Ekleyiniz',
					'menu-item-url' => home_url('wp-admin/nav-menus.php?action=edit&menu=' . $menu_id),
					'menu-item-status' => 'publish')
				);
			}
		}
	}
}
