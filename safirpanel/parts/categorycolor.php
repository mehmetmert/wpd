<?php if (!defined('ABSPATH')) exit; ?>
<?php
$categories = get_categories([
	'orderby' 		=> 'name',
	'order'   		=> 'ASC',
	'hide_empty'   	=> 0,
]);
foreach ($categories as $category) : ?>
	<div class="safirpanelItem aligntop color">
		<div class="desc">
			<div class="title"><?php echo $category->name; ?></div>
		</div>
		<div class="formitem">
			<?php
			if ($x = xoption("catColor" . $category->term_id)) {
				$currentColor = $x;
			} else {
				$currentColor = xoption("siteColor");
			} 
			?>			
			<input type="text" name="<?php echo SAFIR_THEME_SLUG ?>_catColor<?php echo $category->term_id ?>" class="color-picker" value="<?php echo $currentColor ?>" />
		</div>
	</div>
<?php endforeach;
