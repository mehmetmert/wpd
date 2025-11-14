<?php if(!defined('ABSPATH')) exit; ?>
<?php if( (wp_is_mobile() && xoption('hideMobileSidebar')) == false ) : ?>
<?php global $widgetPlace; $widgetPlace = "sidebar"; ?>
<aside id="aside">
	<?php 
	if(is_active_sidebar('sidebar-product')) : 
		dynamic_sidebar('sidebar-product');
	else:
		dynamic_sidebar('sidebar-general');
	endif; ?>
</aside>
<?php endif; ?>