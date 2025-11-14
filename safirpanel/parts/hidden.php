<?php if(!defined('ABSPATH')) exit; ?>
<input type="hidden" name="<?php echo SAFIR_THEME_SLUG . '_' . $key; ?>"
value="<?php echo( htmlentities(xoption($key)) ) ?>" />
