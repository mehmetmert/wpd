<?php if(!defined('ABSPATH')) exit; ?>
<?php if( (wp_is_mobile() && xoption('hideMobileSidebar')) == false ) : ?>
<aside id="aside">
<?php global $widgetPlace; $widgetPlace = "sidebar"; ?>
<div id="panels">
	<?php if (!dynamic_sidebar('sidebar-general') && current_user_can('edit_theme_options')) : ?>
	<div class="panel">
		<div class="content">
			<p><?php _e("Bu tema bileşen (widget) desteklidir", "pusula"); ?>.</p>
			<p><a href="<?php bloginfo('url'); ?>/wp-admin/widgets.php"><?php _e("Buraya tıklayarak bileşen ekleyebilirsiniz", "pusula"); ?>.</a></p>
		</div>
	</div>
	<?php endif; ?>
</div>
</aside>
<?php endif; ?>