<?php if(!defined('ABSPATH')) exit; ?>
<?php global $widgetPlace; ?>
<div class="contactWidget safirWidget <?php echo $widgetPlace; ?>Widget">
	<div id="googleMap">
		<?php echo xoption("mapIframe"); ?>
	</div>
	<div class="infoBlock">
		<div class="logo">
			<?php safirLogo() ?>
		</div>
		<div class="safirContactInfo">
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
	</div>
</div>
