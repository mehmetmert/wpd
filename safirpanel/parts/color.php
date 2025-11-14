<?php if(!defined('ABSPATH')) exit; ?>
<div class="safirpanelItem aligntop color">
	<div class="desc">
		<div class="title"><?php echo $value['title']; ?></div>
		<?php if (isset($value['desc'])) echo("<div class=\"info\">" . $value['desc'] . "</div>"); ?>
	</div>
	<div class="formitem">
		<input type="text" name="<?php echo(SAFIR_THEME_SLUG . '_' . $key) ?>" value="<?php echo xoption($key) ?>" class="color-picker" />
	</div>
</div>
