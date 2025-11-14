<?php if(!defined('ABSPATH')) exit; ?>
<div class="safirpanelItem">
	<div class="desc">
		<div class="title"><?php echo $value['title']; ?></div>
		<?php if (isset($value['desc'])) echo("<div class=\"info\">" . $value['desc'] . "</div>"); ?>
	</div>
	<div class="formitem">
		<?php
		wp_dropdown_pages([
			"name" => SAFIR_THEME_SLUG . "_" . $key,
			'child_of' => 0,
			"selected" => xoption($key),
			'sort_order' => 'ASC',
			'sort_column' => 'post_title',
			'hierarchical' => 1,
			'post_type' => 'page',
			"show_option_none" => $value["none"],
		]);		
		?>
	</div>
</div>
