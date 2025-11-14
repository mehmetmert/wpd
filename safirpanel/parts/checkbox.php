<?php if(!defined('ABSPATH')) exit; ?>
<div class="safirpanelItem checkbox">
    <div class="formitem full">
        <div class="checkbox">
            <label class="switch">
                <input type="hidden" name="<?php echo SAFIR_THEME_SLUG . "_" . $key; ?>" value="0">
                <input value="1" type="checkbox" name="<?php echo SAFIR_THEME_SLUG . "_" . $key; ?>" <?php if(xoption($key)) echo 'checked'; ?> />
                <?php echo $value['title'] ?>
                <span class="slider"></span>
            </label>

        </div>
    </div>
</div>
