<?php if(!defined('ABSPATH')) exit; ?>
<?php
if(SAFIR_CACHE_ENABLED) {
	add_action('save_post','safir_delete_cache');
	add_action('deleted_post', 'safir_delete_cache');
	add_action('edited_terms','safir_delete_cache');
	add_action('wp_update_nav_menu', 'safir_delete_cache');
	add_action('update_option_permalink_structure', 'safir_delete_cache');
}


function safir_delete_cache() {
	global $wpdb;
	$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_sfr%' OR option_name LIKE '_transient_timeout_sfr%'");
}

function safir_set_transient( $id, $code, $time) {
	if(substr(home_url(), 0, 5) != "https") {
		$code = str_replace(str_replace("http://", "https://", home_url()), home_url(), $code);
	}
	set_transient( $id, $code, $time );
}
