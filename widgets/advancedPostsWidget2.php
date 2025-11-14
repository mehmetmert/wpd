<?php if(!defined('ABSPATH')) exit; ?>
<?php global $widgetPlace; ?>
<div class="safirWidget advancedPostsWidget2 <?php echo $lineBg . " " . $grayBg . " " . $widgetPlace; ?>Widget">
	<div class="innerContainer">
		<?php include('widgetheading.php') ?>
		<div class="items">
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
							<div class="detail">
								<div class="title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></div>
								<div class="metas">
									<div class="meta category">
										<?php themeIcon("folder") ?><?php the_category(', '); ?></div>
									<div class="meta date">
										<?php themeIcon("date") ?><?php the_time('d.m.Y'); ?></div>
								</div>
							</div>
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