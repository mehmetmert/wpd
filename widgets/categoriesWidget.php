<?php if(!defined('ABSPATH')) exit; ?>
<?php global $widgetPlace; ?>
<div class="safirWidget categoriesWidget safirOwlButtons <?php echo $lineBg . " " . $grayBg . " " . $widgetPlace; ?>Widget">
	<div class="innerContainer">
		<?php include('widgetheading.php') ?>
		<div class="items">
			<div class="<?php echo $scroll ?>">
				<?php
					$args = array(
						'type'                     => 'post',
						'hide_empty'               => 0,
						'hierarchical'             => 0,
						'exclude'                  => $exclude,
						'include'                  => $include,
						'taxonomy'                 => 'category',
					); 
					$categories = get_categories( $args );
					foreach ($categories as $category) {
						$ID = $category->term_id;
						?>
						<div class="item-container">
							<div class="item">
								<a href="<?php echo get_category_link($ID) ?>">
									<div class="thumb">
									<?php safirthumb(array(
										"ID" => get_option("category_".$ID."_image1"),
										"class" => "cat",
										"type" => "cat",
										"alt" => $category->name
									)); ?>
									</div>
									<div class="titleContainer">
										<div class="inner">
											<div class="title">
												<?php echo $category->name ?>
											</div>
											<?php if($count) : ?><div class="count"><?php echo str_replace('%', safirPostCountofCategory($category->term_id), $count); ?></div><?php endif; ?>
										</div>
									</div>
									<div class="more"><?php themeIcon("rightarrow") ?></div>
								</a>
							</div>
						</div>
						<?php
					}
				?>
			</div>
		</div>
	</div>
</div>