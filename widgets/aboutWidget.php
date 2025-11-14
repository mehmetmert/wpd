<?php if(!defined('ABSPATH')) exit; ?>
<?php global $widgetPlace; ?>
<div class="safirWidget aboutWidget <?php echo $lineBg . " " . $grayBg . " " . $nonClickable . " " . $widgetPlace; ?>Widget">
	<div class="innerContainer">
		<div class="float">
			<div class="infoBlock">
				<div class="description">
					<?php echo apply_filters('the_content', $description); ?>
				</div>
			</div>
			<div class="menuBlock">
				<?php 
					$walker = new aboutWalker;
					wp_nav_menu(array(
						'menu'=>$selectedMenu, 
						'container'=>'ul', 
						'walker'=>$walker
					));
				?> 
			</div>
		</div>
	</div>
</div>