<?php if(!defined('ABSPATH')) exit; ?>
<?php get_header(); ?>
<div id="main" class="innerContainer">
	<div id="content">
		<div class="safirBox">
			<?php if(xoption("showTermDesc") && $x = term_description()) : ?>
				<div class="categoryDesc"><?php echo $x ?></div>
			<?php endif; ?>
			<?php get_template_part('list'); ?>
			<?php safirnavi(); ?>
		</div>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>