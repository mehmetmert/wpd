<?php if(!defined('ABSPATH')) exit; ?>
<div id="topbar">
	<div class="innerContainer">
		<div class="leftBlock">
			<?php if($x = xoption('phone')) : ?>
				<div class="item phone">
					<?php themeIcon("phone") ?>
					<?php echo $x; ?>
				</div>
			<?php endif; ?>
			<?php if($x = xoption('email')) : ?>
				<div class="item email">
					<?php themeIcon("email") ?>
					<?php echo $x; ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="rightBlock">
			<div id="topSocial">
				<?php include(get_template_directory() . "/lib/safirtema/social.php") ?>
			</div>
			<?php include(get_template_directory() . "/parts/languages.php"); ?>
			<div id="topSearch">
				<form method="get" id="safir-searchform" action="<?php bloginfo('url'); ?>">
					<?php themeIcon("search") ?>
					<input type="text" name="s" id="s" value="<?php echo get_search_query() ? get_search_query() : _e("Arama yap...", "pusula") ?>" onblur="if(this.value=='') this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue) this.value='';" />
					<button type="submit"><?php _e("ARA", "pusula") ?></button>
				</form>
			</div>
		</div>
	</div>
</div>
