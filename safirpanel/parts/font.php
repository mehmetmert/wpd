<?php if(!defined('ABSPATH')) exit; ?>
<div class="safirpanelItem font aligntop">
    <div class="desc">
        <div class="title"><?php echo $value['title']; ?></div>
        <?php if (isset($value['desc'])) echo("<div class=\"info\">" . $value['desc'] . "</div>"); ?>
    </div>
    <div class="formitem">
        <div class="arrowSelector">
        </div>
        <input type="text" name="<?php echo SAFIR_THEME_SLUG . '_' . $key ?>" value="<?php echo xoption($key) == "" ? $value["default"] : htmlentities(xoption($key)); ?>">
        <div class="safirFontSelector" style="display:none;">
            <?php
            global $safirFonts;
            $mergedFonts = array_merge($safirFonts["system-fonts"], array_keys($safirFonts["custom-fonts"]));
            foreach($mergedFonts as $font) : ?>
                <div class="item <?php if($font == xoption($key)) { echo 'active'; } ?>" data-value="<?php echo $font; ?>" style="font-family:<?php echo $font; ?>">
                    <?php echo ucwords(str_replace("-", " ", $font)); ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
