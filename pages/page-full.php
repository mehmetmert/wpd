<?php if(!defined('ABSPATH')) exit; ?>
<?php
/*
	Template Name: Tam Sayfa
*/
?>
<?php get_header(); ?>
<div id="main" class="innerContainer">
	<div id="content" class="full">
		<div class="safirBox fullPage">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<div class="reading">
				<?php the_content(); ?>
			</div>
			<?php endwhile; ?>
		</div><!--fullpage-->
		<?php if(xoption("pageCommentsActive") && comments_open()) comments_template(); ?>
	</div><!--content-->
</div><!--main-->
<?php get_footer(); ?>
