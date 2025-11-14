<?php if(!defined('ABSPATH')) exit; ?>
<?php get_header(); ?>
<div id="main" class="innerContainer">
	<div id="content">
		<div class="safirBox">
			<?php if(xoption("showTermDesc") && $x = term_description()) : ?>
				<div class="categoryDesc"><?php echo $x ?></div>
			<?php endif; ?>
			<?php 
			if(xoption('subCategories')) :
				$categories = get_categories(array(
					'parent'		=>	get_query_var('cat'),
					'hierarchical'	=>	0,
					'hide_empty'	=>	0
				));
				if($categories) :
					?>
					<div class="listing standard">
						<?php
						foreach ($categories as $category) {
							$ID = $category->term_id;
							?>
							<div class="itemContainer">
								<div class="item">
									<div class="thumb">
										<a href="<?php echo get_category_link($ID) ?>">
											<?php 
											safirthumb(array(
												"ID" => get_option("category_".$ID."_image1"),
												"ratio" => xoption("catThumbRatio"),
												"type" => "cat",
												"class" => "cat",
												"alt" => $category->name
											)); ?>
										</a>
									</div>
									<div class="titleContainer"><div class="title"><a href="<?php echo get_category_link($ID) ?>"><?php echo $category->name ?></a></div></div>
									<?php if($x = $category->description) : ?><div class="detail"><?php echo $x ?></div><?php endif; ?>
								</div>
							</div>
							<?php
						}
						?>
					</div>
				<?php
				else : 
					get_template_part('list');
					safirnavi(); 
				endif;
			else : 
				get_template_part('list');
				safirnavi(); 
			endif;
			?>
		</div>		
	</div>
	<?php
	if( (xoption('productCategory') && is_category(xoption('productCategory'))) || safir_top_category(get_query_var('cat')) == xoption('productCategory')):
		get_sidebar('product');
	else: 
		get_sidebar('category');
	endif;
	?>
</div>
<?php get_footer(); ?>