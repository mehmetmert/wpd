<?php if(!defined('ABSPATH')) exit; ?>
<?php foreach($value["items"] as $item) : ?>
    <div class="safirpanelItem">
        <div class="desc">
            <div class="title"><?php echo ucfirst($item) ?> Adresiniz</div>
        </div>
        <div class="formitem">
            <input type="text" name="<?php echo SAFIR_THEME_SLUG . '_' . $item; ?>URL" value="<?php echo htmlentities( xoption($item . "URL") ); ?>"
            />
        </div>
    </div>
    <?php if( array_search($item, $value["items"]) != count( $value["items"] ) - 1 ) include("seperator.php"); ?>
<?php endforeach; ?>
