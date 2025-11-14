<?php if(!defined('ABSPATH')) exit; ?>
<?php if(xoption('showTags') && xoption('showShareButtons')) : ?>
	<div class="tagShareBlock">
		<?php if(has_tag() && xoption('showTags')) : ?>
		<div class="tags">
			<div class="title"><span><?php _e("ETİKETLER", "pusula"); ?></span></div>
			<?php the_tags('',', ',''); ?>
		</div>
		<?php endif; ?>
		<?php if(xoption('showShareButtons')) : ?>
			<ul class="share safirSocial">
				<li class="facebook">
					<a rel="external" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" title="<?php _e("Konuyu Facebook'ta Paylaş", "pusula"); ?>"><?php themeIcon("facebook") ?></a>
				</li>
				<li class="twitter">
					<a rel="external" href="https://www.twitter.com/intent/tweet?text=<?php the_title();?> <?php the_permalink(); ?>" title="<?php _e("Konuyu Twitter'ta Paylaş", "pusula"); ?>"><?php themeIcon("twitter") ?></a>
				</li>
				<li class="whatsapp">
					<a rel="external" href="whatsapp://send?text=<?php the_title() ?> - <?php the_permalink() ?>" title="<?php _e("Konuyu Whatsapp'ta Paylaş", "pusula"); ?>"><?php themeIcon("whatsapp") ?></a>
				</li>
			</ul>
		<?php endif; ?>
	</div>
<?php endif; ?>
