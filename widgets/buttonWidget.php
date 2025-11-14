<?php if(!defined('ABSPATH')) exit; ?>
<?php global $widgetPlace; ?>
<div class="safirWidget buttonWidget <?php echo $widgetPlace; ?>Widget">
	<a href="<?php echo $link; ?>">
		<?php if($icon) safirIcon($icon) ?>
		<div class="header"><?php echo $header ?></div>
		<div class="description"><?php echo $description ?></div>
	</a>
</div>