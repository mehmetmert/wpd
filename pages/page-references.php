<?php if(!defined('ABSPATH')) exit; ?>
<?php
/*
	Template Name: Referanslar
*/
?>
<?php get_header(); ?>
<div id="main" class="innerContainer">
	<div id="content">
		<div class="safirBox">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<div id="referencesPage">
				<div class="reading">
					<?php the_content(); ?>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
		<?php if(xoption("pageCommentsActive") && comments_open()) comments_template(); ?>
	</div>
	<?php get_sidebar('page'); ?>
</div>
<?php get_footer(); ?>
