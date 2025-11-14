<?php if(!defined('ABSPATH')) exit; ?>
<?php get_header(); ?>
<div id="main" class="innerContainer">
	<div id="content">
		<div class="safirBox">
			<?php get_template_part('list'); ?>
			<?php safirnavi(); ?>
		</div>		
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
