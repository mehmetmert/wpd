<?php
if(!defined('ABSPATH')) exit;
if(
	xoption("whatsappActive") == "both" ||
	(wp_is_mobile() && xoption("whatsappActive") == "mobile") ||
	(!wp_is_mobile() && xoption("whatsappActive") == "desktop")
) : ?>
	<div id="whatsappBlock" class="<?php echo xoption("whatsappPosition") ?>">
		<div class="chat">
			<div class="header">
				<div class="thumb">
					<img width="40" height="40" alt="Whatsapp" <?php safirLazyThumb(xoption("whatsappProfile")) ?>>
				</div>
				<div class="name">
					<?php echo xoption("whatsappPerson") ?>
				</div>
				<span class="close"><?php themeIcon("close") ?></span>
			</div>
			<div class="message">
				<div class="bubble">
					<div class="name">
						<?php echo xoption("whatsappPerson") ?>
					</div>
					<div class="text">
						<?php echo nl2br(xoption("whatsappMessage")) ?>
					</div>
				</div>
			</div>
			<div class="reply">
				<a rel="external" href="https://wa.me/<?php echo xoption("whatsappNumber") ?>"><?php _e("Cevap Yaz", "pusula"); ?></a>
			</div>
		</div>
	</div>
	<div class="whatsappButton <?php echo xoption("whatsappPosition") ?>">
		<?php themeIcon("whatsapp") ?>
		<div class="count">1</div>
	</div> 
<?php endif; ?>
