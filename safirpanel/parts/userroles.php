<?php if(!defined('ABSPATH')) exit; ?>
<div class="safirpanelItem checkboxlist aligntop">
    <div class="desc">
        <div class="title"><?php echo $value['title']; ?></div>
        <?php if (isset($value['desc'])) echo("<div class=\"info\">" . $value['desc'] . "</div>"); ?>
        <div class="selectButtons"><span class="selectAll">Tümünü Seç</span> - <span class="selectNone">Seçimi Kaldır</span></div>
    </div>
    <div class="formitem">
		<?php
		global $wp_roles;
		$roles = $wp_roles->roles;
		?>
		<div class="items">
            <input type="hidden" name="<?php echo SAFIR_THEME_SLUG . "_" . $key; ?>" value="0">
            <ul>
				<?php foreach($roles as $role) : ?>
				<li>
					<label class="selectit">
						<input value="<?php echo strtolower($role["name"]) ?>" type="checkbox" name="<?php echo SAFIR_THEME_SLUG . '_' . $key ?>[]" <?php if(is_array(xoption($key)) && in_array(strtolower($role["name"]), xoption($key))) echo "checked" ?>><?php _e($role["name"]) ?>
					</label>
				</li>
				<?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
