<?php if(!defined('ABSPATH')) exit; ?>
<div class="safirpanelItem checkboxlist aligntop">
    <div class="desc">
        <div class="title"><?php echo $value['title']; ?></div>
        <?php if (isset($value['desc'])) echo("<div class=\"info\">" . $value['desc'] . "</div>"); ?>
        <div class="selectButtons"><span class="selectAll">Tümünü Seç</span> - <span class="selectNone">Seçimi Kaldır</span></div>
    </div>
    <div class="formitem">
        <div class="items">
            <input type="hidden" name="<?php echo SAFIR_THEME_SLUG . "_" . $key; ?>" value="0">
            <ul>
                <?php foreach ($value["options"] as $k=> $v) : ?>
                    <li>
                        <label class="selectit">
                            <input value="<?php echo $k ?>" type="checkbox" name="<?php echo SAFIR_THEME_SLUG . '_' . $key ?>[]" <?php if(is_array(xoption($key)) && in_array($k, xoption($key))) echo "checked" ?>><?php echo $v ?>
                        </label>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
