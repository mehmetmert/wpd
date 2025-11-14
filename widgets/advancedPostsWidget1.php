<?php if(!defined('ABSPATH')) exit; ?>
<?php global $widgetPlace; ?>
<div class="safirWidget advancedPostsWidget1 safirOwlButtons <?php echo $lineBg . " " . $grayBg . " " . $widgetPlace; ?>Widget">
	<div class="innerContainer">
		<?php include('widgetheading.php') ?>
		<div class="items">
			<div class="<?php echo $scroll ?>">
				<?php
				$results = new WP_Query($args);
				$counter = 0;
				if( $results->have_posts() ) {
					while( $results->have_posts() )	{
						$results->the_post();
						$counter++;
						?>
						<div class="item-container">
							<div class="item">
								<div class="thumb">
									<a href="<?php the_permalink() ?>"><?php safirthumb(); ?></a>
								</div>
								<div class="title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></div>
								<?php if($postOrder) : ?><div class="post-order"><?php echo str_pad($counter, 2, '0', STR_PAD_LEFT); ?></div><?php endif; ?>
							</div>
						</div>
						<?php
					}
					wp_reset_postdata();
				}
				?>
			</div>
		</div>
	</div>
</div>