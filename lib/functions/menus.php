<?php if(!defined('ABSPATH')) exit; ?>
<?php

add_action('init', 'register_my_menus');
function register_my_menus() {
	register_nav_menus(array('mainmenu'=>'Ana Menü'));
	register_nav_menus(array('mobilemenu'=>'Mobil Menü'));
	register_nav_menus(array('sidemenu'=>'Yan Menü'));
	register_nav_menus(array('footermenu'=>'Footer Menü'));
}

function safir_nav_menu($theme_location) {
	$menu = wp_nav_menu( array(
		'theme_location'	=> $theme_location,
		'container'			=> 'ul',
		'fallback_cb'		=> false,
		'walker'			=> new sfrIconMenuWalker(),
		'echo'				=> 0
	) );
	return $menu;
}

// Walkers

class sfrIconMenuWalker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = Array(), $id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
		$output .= $indent . '<li ' . $value . $class_names .'>';
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$sfr_menu_icon = "";
		$sfr_menu_icon = get_post_meta( $item->ID, '_menu_item_sfr_menu_icon', true );
		global $safirIcons;
		if(in_array($sfr_menu_icon, $safirIcons)) {
			$sfr_menu_icon = safirIcon($sfr_menu_icon, false);
		} elseif(count($classes) > 0) {
			if($classes[0] != "menu-item" && in_array($classes[0], $safirIcons)) {
				$sfr_menu_icon = safirIcon($classes[0], false);
			} else {
				$sfr_menu_icon = "";
			}
		}

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>'.$sfr_menu_icon.'<div class="text">';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</div>';
		if($args->walker->has_children) {
			$item_output .= themeIcon("arrow", false);
		}
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

class aboutWalker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = Array(), $id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$sfr_menu_icon = "";
		$sfr_menu_icon = get_post_meta( $item->ID, '_menu_item_sfr_menu_icon', true );
		global $safirIcons;
		if(in_array($sfr_menu_icon, $safirIcons)) {
			$sfr_menu_icon = safirIcon($sfr_menu_icon, false);
		} elseif(count($classes) > 0) {
			if($classes[0] != "menu-item" && in_array($classes[0], $safirIcons)) {
				$sfr_menu_icon = safirIcon($classes[0], false);
			} else {
				$sfr_menu_icon = "";
			}
		}
		
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'><div class="iconContainer">' . $sfr_menu_icon . '</div><div class="inner"><div class="title">';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</div><div class="description">' . $item->description . '</div></div>';
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}