<?php if(!defined('ABSPATH')) exit; ?>
<div class="safirpanelItem">
    <div class="desc">
        <div class="title"><?php echo $value['title']; ?></div>
        <?php if (isset($value['desc'])) echo("<div class=\"info\">" . $value['desc'] . "</div>"); ?>
    </div>
    <div class="formitem">
        <select name="<?php echo SAFIR_THEME_SLUG . "_" . $key; ?>">
            <?php
            $range_step = 1;
            if(isset($value["step"])) $range_step = $value["step"];
            $range_format = "{i}";
            if(isset($value["format"])) $range_format = $value["format"];
            for ($i=$value["range"][0]; $i <= $value["range"][1]; $i+=$range_step) {
                ?>
                <option value="<?php echo $i; ?>" <?php if ( xoption($key) == $i) { echo 'selected'; } ?>><?php echo str_replace("{i}", $i, $range_format); ?><?php if(isset($value['append'])) echo " " . $value['append']; ?></option>
                <?php
            }
            ?>
        </select>
    </div>
</div>
