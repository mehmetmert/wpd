<?php if(!defined('ABSPATH')) exit; ?>
<?php if( is_array(xoption('meta')) ) : ?>
<div class="metaBox">
	<?php
	foreach(xoption('meta') as $meta) {
		switch ($meta) {
			case 'category':
			?>
				<div class="meta category"><?php themeIcon("folder") ?><?php the_category(', '); ?></div>
			<?php
			break;
			case 'date':
			?>
				<div class="meta date"><?php themeIcon("date") ?><?php the_time('d F'); ?><span class="hide"> <?php the_time('Y'); ?></span></div>
			<?php
			break;
			case 'hit':
			?>
				<div class="meta hit"><?php themeIcon("hit") ?>
					<?php
					if(function_exists('the_views')) {
						$postHit = get_post_meta($post->ID, 'views', true);
					} else {
						$postHit = get_post_meta($post->ID, 'hit', true);
					}
					if ($postHit == NULL) { $postHit = 1; }
					echo number_format($postHit, 0, '', '.') . " ";
					_e("kez görüntülendi", "pusula"); 
					?>
				</div>
			<?php
			break;
			case 'comment':
			?>
				<div class="meta comment">
					<?php themeIcon("comment") ?>
					<a href="<?php the_permalink(); ?>#comments" rel="nofollow">
					<?php comments_number(__('Yorum yok',"pusula"), __('1 yorum',"pusula"), __('% yorum', "pusula")); ?></a>
				</div>
			<?php
			break;
		}
	}
	?>
</div>
<?php endif; ?>
