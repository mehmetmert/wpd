<?php if(!defined('ABSPATH')) exit; ?>
<div class="safirpanelItem file aligntop">
    <div class="desc">
        <div class="title"><?php echo $value['title']; ?></div>
        <?php if (isset($value['desc'])) echo("<div class=\"info\">" . $value['desc'] . "</div>"); ?>
    </div>
    <div class="formitem imageButtonContainer">
        <input name="<?php echo SAFIR_THEME_SLUG . "_" . $key; ?>" type="text"
        value="<?php echo htmlentities(xoption($key)); ?>" />
        <a href="#" class="button mediaButton select URL">Resim Seç</a>
        <img class="uploadImage" src="<?php echo xoption($key) ?>" />
    </div>
</div>
