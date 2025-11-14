<?php if(!defined('ABSPATH')) exit; ?>
<div id="header">
	<div class="innerContainer">
		<div id="logo">
			<?php if(is_home()) : $tag = "h1"; else : $tag = "span"; endif;?>
			<?php echo "<$tag>"; safirLogo(); echo "</$tag>"; ?>
		</div>
		<div id="menuGroup">
			<div id="menu">
				<?php 
				if(wp_is_mobile() && safir_nav_menu('mobilemenu')) {
					echo safir_nav_menu('mobilemenu');
				} else {
					echo safir_nav_menu('mainmenu');
				}
				?>
			</div>
		</div>
		<div id="mobileHeaderBlock">
			<?php if( (wp_is_mobile() && xoption('hideMobilePhone')) == false ) : ?>
				<?php if($x = xoption('phone')) : ?>
					<a href="tel:<?php echo str_replace(" ", "", $x) ?>" class="button phone"><?php themeIcon("phone") ?></a>
				<?php endif; ?>
			<?php endif; ?>
			<?php if( (wp_is_mobile() && xoption('hideMobileEmail')) == false ) : ?>
				<?php if($x = xoption('email')) : ?>
					<a href="mailto:<?php echo $x ?>" class="button email"><?php themeIcon("email") ?></a>
				<?php endif; ?>
			<?php endif; ?>
			<?php if( (wp_is_mobile() && xoption('hideMobileSocial')) == false ) : ?>
				<span class="button social withClose"><?php themeIcon("share") ?><?php themeIcon("close") ?></span>
			<?php endif; ?>
			<span class="button toggleMenu close withClose"><?php themeIcon("list") ?><?php themeIcon("close") ?></span>
		</div>
	</div>

</div>
