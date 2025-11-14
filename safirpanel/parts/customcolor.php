<?php if (!defined('ABSPATH')) exit; ?>
<?php
for ($i = 1; $i <= 5; $i++) : ?>
	<div class="safirpanelItem aligntop color">
		<div class="desc">
			<div class="title"><?php echo $i; ?>. Renk</div>
		</div>
		<div class="formitem">
			<?php
			if ($x = xoption("customColor" . $i)) {
				$currentColor = $x;
			} else {
				$currentColor = "";
			} 
			?>			
			<input type="text" name="<?php echo SAFIR_THEME_SLUG ?>_customColor<?php echo $i ?>" class="color-picker" value="<?php echo $currentColor ?>" />
		</div>
	</div>
<?php endfor;
