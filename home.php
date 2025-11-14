<?php if(!defined('ABSPATH')) exit; ?>
<?php get_header(); ?>

<?php global $widgetPlace; $widgetPlace = "home"; ?>

<div id="home">

	<?php if(wp_is_mobile()) : ?>
		<?php
		if(is_active_sidebar('sidebar-mobile')) :
			dynamic_sidebar('sidebar-mobile');
		else:
			dynamic_sidebar('sidebar-desktop');
		endif;
		?>
	<?php else: ?>
		<?php if (!dynamic_sidebar('sidebar-desktop') && current_user_can('edit_theme_options')) : ?>
			<div style="text-align:center; line-height: 2; font-size: 26px; font-weight: bold; padding: 100px;">
				<a href="<?php bloginfo('url'); ?>/wp-admin/widgets.php">
					Anasayfayı oluşturabilmek için buraya tıklayarak bileşen ekleyin.
				</a>
				<p>ya da</p>
				<a href="<?php echo esc_url(admin_url("admin.php?page=safirdemoimport")); ?>">
					Sitenizdeki içerikleri silerek demo içerik kurun.
				</a>
			</div>

		<?php endif; ?>
	<?php endif; ?>


</div>

<?php get_footer(); ?>
