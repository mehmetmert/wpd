<?php if(!defined('ABSPATH')) exit; ?>
<div class="safirpanelItem">
    <div class="desc">
        <div class="title"><?php echo $value['title']; ?></div>
        <?php if (isset($value['desc'])) echo("<div class=\"info\">" . $value['desc'] . "</div>"); ?>
    </div>
    <div class="formitem">
        <?php
        $args = [
            "name" => SAFIR_THEME_SLUG . "_" . $key,
            "order" => "name",
            "hierarchical" => true,
            "selected" => xoption($key),
            "hide_empty" => false,
        ];
        if(isset($value["none"])) {
            $args["show_option_none"] = $value["none"];
            $args["option_none_value"] = "0";
        }
        wp_dropdown_categories($args);
        ?>
    </div>
</div>
