<?php if(!defined('ABSPATH')) exit; ?>
<footer id="footer">
	<?php if( (wp_is_mobile() && xoption('hideMobileFooter')) == false ) : ?>
	<div class="innerContainer">
		<div class="footerCols">
			<div class="about col">
				<div class="title"><?php themeIcon("id") ?><?php echo xoption("footerAboutTitle") ?></div>
				<div class="desc"><?php echo xoption("footerAboutDescription"); ?></div>
			</div>
			<div class="menu col">
				<div class="title"><?php themeIcon("list") ?><?php echo xoption("footerMenuTitle") ?></div>
				<nav>
					<?php echo safir_nav_menu('footermenu'); ?>
				</nav>
			</div>
			<div class="contact col">
				<div class="title"><?php themeIcon("phone2") ?><?php echo xoption("footerContactTitle") ?></div>
				<div class="infoBlock">
					<?php
					$items = array('address', 'contactmail', 'contactphone', 'fax');
					foreach ($items as $item) {
						if($x = xoption($item)) {
							$icon = $item;
							if($item == "contactmail") $icon = "email2";
							if($item == "contactphone") $icon = "phone2";
							?>
							<div class="item <?php echo $item ?>">
								<?php themeIcon($icon) ?>
								<div class="table">
									<div class="row"><div class="data"><?php echo nl2br($x) ?></div></div>
								</div>
							</div>
							<?php
						}
					}
					?>
				</div>
				<div id="footerSocial">
					<?php include(get_template_directory() . "/lib/safirtema/social.php") ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if( (wp_is_mobile() && xoption('hideMobileFooterBottom')) == false ) : ?>
	<div class="footerBottom">
		<div class="innerContainer">
			<div class="copyright"><?php echo nl2br(xoption('footerYazi')); ?></div>
			<div class="safirTop"><?php themeIcon("top") ?></div>
		</div>
	</div>
	<?php endif; ?>
</footer>
<?php include("parts/whatsapp.php"); ?>

<?php wp_footer(); ?>
<?php echo xoption('footerScript'); ?>

</body>
</html>
