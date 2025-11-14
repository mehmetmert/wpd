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
            <?php
            $catList = wp_terms_checklist(0, [
                'echo' => false,
                'checked_ontop' => false,
                'selected_cats' => xoption($key),
            ]);
            echo str_replace('name="post_category', 'name="'.SAFIR_THEME_SLUG.'_'.$key, $catList);
            ?>
        </div>
    </div>
</div>
