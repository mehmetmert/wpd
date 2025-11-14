<?php if(!defined('ABSPATH')) exit; ?>
<?php 
if( $title != '' ) {
	global $widgetPlace;
	?>
	<div class="mainHeading <?php echo $color; ?><?php if($slogan && $widgetPlace == 'home') : ?> withslogan<?php endif; ?>">
		<?php if($icon) safirIcon($icon); ?>
		<div class="text">
			<div class="title"><?php echo $title; ?></div>
			<?php if((isset($slogan) && $slogan != "") && $widgetPlace != 'sidebar') : ?><div class="slogan"><?php echo $slogan ?></div><?php endif; ?>
		</div>
	</div>
	<?php
}
?>
