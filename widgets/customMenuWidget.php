<?php if(!defined('ABSPATH')) exit; ?>
<?php global $widgetPlace;?>
<div class="safirCustomMenu <?php echo $widgetPlace; ?>Widget <?php echo $toggle ?>">
	<div class="safirBox">
		<?php include('widgetheading.php') ?>
		<?php 
			wp_nav_menu(array(
				'menu'=>$selectedMenu, 
				'container'=>'ul', 
				'link_before'=>'<div class="icon arrow"></div><span class="title">', 
				'link_after'=>'</span>', 
			));
		?> 
	</div>
</div>
