<?php if(!defined('ABSPATH')) exit; ?>
<?php
global $safirIcons;
?>
<div class="safirpanelItem aligntop icon">
    <div class="desc">
        <div class="title"><?php echo $value['title']; ?></div>
        <?php if (isset($value['desc'])) echo("<div class=\"info\">" . $value['desc'] . "</div>"); ?>
    </div>
    <div class="formitem safirAdminIconSelector">
        <div class="iconSelected">
            <?php safirIcon(xoption($key)); ?>
        </div>
        <input class="iconInput" autocomplete="off" name="<?php echo SAFIR_THEME_SLUG . "_" . $key; ?>" id="<?php echo SAFIR_THEME_SLUG ."_" . $key; ?>" type="text"
        value="<?php if ($x = xoption($key)) echo($x); ?>" />
        <div class="iconList" style="display:none;">
            <div class="close">X</div>
            <?php
            foreach($safirIcons as $k) { ?>
                <div class="item <?php if($k == xoption($key)) { echo 'active'; } ?>" data-icon="<?php echo $k; ?>">
                    <div class="inner">
                        <?php safirIcon($k); ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
