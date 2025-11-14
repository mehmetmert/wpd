<?php if(!defined('ABSPATH')) exit; ?>
<div class="safirpanelItem aligntop codeeditor">
    <div class="desc">
        <div class="title"><?php echo $value['title']; ?></div>
        <?php if (isset($value['desc'])) echo("<div class=\"info\">" . $value['desc'] . "</div>"); ?>
    </div>
    <div class="formitem">
        <textarea class="safircode" name="<?php echo SAFIR_THEME_SLUG . "_" . $key; ?>"><?php echo htmlentities(xoption($key)); ?></textarea>
    </div>
</div>
