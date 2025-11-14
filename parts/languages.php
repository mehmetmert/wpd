<?php if(!defined('ABSPATH')) exit; ?>
<?php
if(shortcode_exists("gtranslate")) :
	?>
	<div class="languageSelector gTranslate">
		<?php echo do_shortcode('[gtranslate]'); ?>
	</div>
	<?php
elseif( $x = nl2br(xoption("languages")) ) :?>
	<div class="languageSelector">
		<?php
		$x = explode("<br />", $x);
		$counter = 0;
		if(is_array($x)) :
			foreach($x as $item) {
				$item = preg_replace( "/\r|\n/", "", $item);
				$item = explode("=>", $item);
				$counter++;
				?><a href="<?php echo $item[1] ?>"><img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/flags/<?php echo $item[0] ?>.svg" width="24" height="24" alt="<?php echo $item[0] ?>"></a><?php
			}
		endif;
		?>
	</div>
<?php endif;