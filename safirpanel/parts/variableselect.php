<?php if(!defined('ABSPATH')) exit; ?>
<div class="safirpanelItem">
    <div class="desc">
        <div class="title"><?php echo $value['title']; ?></div>
        <?php if (isset($value['desc'])) echo("<div class=\"info\">" . $value['desc'] . "</div>"); ?>
    </div>
    <div class="formitem">
        <select name="<?php echo SAFIR_THEME_SLUG . '_' . $key ?>">
            <?php 
			global ${$value["variable"]};
			foreach (${$value["variable"]} as $k => $v) : ?>
                <option value="<?php echo $k ?>" <?php if(xoption($key) == $k) echo "selected"; ?>><?php echo $v ?></option>
				<?php 
			endforeach; ?>
        </select>
    </div>
</div>
