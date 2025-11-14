<?php if(!defined('ABSPATH')) exit; ?>
<?php get_header(); ?>
<?php the_post(); ?>

<?php
// Single Type
$singleType = "normal";
$relatedTitle = __("Benzer Konular", "pusula");
$relatedSlogan = __("İlginizi çekebilecek diğer konular", "pusula");
foreach(get_the_category() as $category) {
	if((xoption('productCategory') && $category->term_id == xoption('productCategory')) || safir_top_category($category->term_id) == xoption('productCategory')) {
		$singleType = 'product';
		$relatedTitle = __("Benzer Ürünler", "pusula");
		$relatedSlogan = __("İlginizi çekebilecek diğer ürünler", "pusula");
	}
}
?>
<div id="main" class="innerContainer">
	<div id="content">
		<div id="single" class="<?php echo $singleType ?>">

			<div class="safirBox">

				<?php get_template_part('lib/safirtema/metabox'); ?>

				<?php
				$singleBlock = xoption('singleBlock');

				$noThumbCats = xoption('noThumbCats');
				if(is_array($noThumbCats)) :
					foreach(get_the_category() as $category) {
						if(in_array($category->cat_ID, $noThumbCats)) {
							$singleBlock = "none";
						}
					}
				endif;

				switch ($singleBlock) {
					case 'type1':
						?>
							<div id="singleBlock" class="type1">
								<div class="thumb">
									<?php safirthumb(); ?>
								</div>
							</div>
						<?php
						break;

					case 'type2':
						?>
							<div id="singleBlock" class="type2">
								<div class="thumb">
									<?php safirthumb(); ?>
								</div>
							</div>
						<?php
						break;
				}
				?>

				<div class="reading">
					<?php the_content(); ?>
				</div>

				<div id="page-links">	
					<?php wp_link_pages(array('link_before'=>'<span>', 'link_after'=>'</span>', 'before'=>'')); ?>
				</div>

				<?php get_template_part('lib/safirtema/tagshare'); ?>

			</div>

			<?php
			// BENZER YAZILAR:
			if(xoption('relatedCount') != 0) : 
				$catIDs = "";
				foreach(get_the_category() as $category) {
					if( $catIDs != "" ) { $catIDs .= ","; }
					$catIDs .= $category->cat_ID;
				}
				$query = new wp_query(array('cat'=>$catIDs, 'posts_per_page'=>xoption('relatedCount'), 'orderby' => 'rand', 'post__not_in' => array($post->ID))); 
				if($query->have_posts()) : ?>
					<div class="safirBox">
					<div id="related" class="safirOwlButtons">
						<div class="mainHeading withslogan">
							<?php safirIcon("rastgele") ?>
							<div class="text">
								<div class="title"><?php echo $relatedTitle; ?></div>
								<div class="slogan"><?php echo $relatedSlogan; ?></div>
							</div>		
						</div>		
						<div class="items">
							<div class="owl-carousel">
								<?php
								while ($query->have_posts()) : $query->the_post();
									get_template_part('posts/post-related');
								endwhile;
								?>
							</div>
						</div>
					</div>
					</div>
					<?php
				endif;
			endif;
			wp_reset_postdata();
			?>

			<?php if(xoption("singleCommentsActive") && comments_open()) comments_template(); ?>
		</div><!--single-->
	</div>
	<?php get_sidebar($singleType); ?>
</div>
<?php get_footer(); ?>
