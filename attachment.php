<?php if(!defined('ABSPATH')) exit; ?>
<?php get_header(); ?>
<div id="main" class="innerContainer">
	<div id="content">
		<div id="single" class="attachment">
			<div class="safirBox">
				<div class="mainHeading">
					<?php safirIcon("foto") ?>
					<h1 class="title"><?php the_title(); ?></h1>
				</div>		

				<?php
				global $post;
				$attachments = get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order_ID' ) );

				$attachmentIDs = array();
				foreach ( $attachments as $attachment ) {
					if(get_post_thumbnail_id($post->post_parent) != $attachment->ID) {
						$attachmentIDs[] = $attachment->ID;
					}
				}
				$totalAttachmentNumber = count( $attachmentIDs );
				$currentAttachmentNumber = array_search($post->ID, $attachmentIDs) + 1;

				if ($currentAttachmentNumber == $totalAttachmentNumber) {
					$category = get_the_category($post->post_parent);
					$nextAttachmentURL = get_category_link($category[0]->term_id);
					$prevAttachmentURL = get_attachment_link($attachmentIDs[$totalAttachmentNumber - 2]);
				} elseif($currentAttachmentNumber == 1) {
					$nextAttachmentURL = get_attachment_link($attachmentIDs[1]);
				} else {
					$nextAttachmentURL = get_attachment_link($attachmentIDs[$currentAttachmentNumber]);
					$prevAttachmentURL = get_attachment_link($attachmentIDs[$currentAttachmentNumber - 2]);
				}
				?>

				<div id="gallery-links">
					<div class="prev button"><?php if($currentAttachmentNumber != 1) : ?><a href="<?php echo $prevAttachmentURL; ?>"><?php themeIcon("left") ?><span class="text"><?php _e("Önceki", "pusula"); ?></span></a><?php endif; ?></div>
					<div class="number"><?php _e("Fotoğraf", "pusula") ?>: <?php echo $currentAttachmentNumber . ' / ' . $totalAttachmentNumber; ?></div>
					<div class="next button"><?php if($currentAttachmentNumber != $totalAttachmentNumber) : ?><a href="<?php echo $nextAttachmentURL; ?>"><span class="text"><?php _e("Sonraki", "pusula"); ?></span><?php themeIcon("right") ?></a><?php endif; ?></div>
				</div>

				<div id="galleryContent">
					<div class="reading">
						<?php the_content();?>
					</div>

					<div id="image" style="margin-bottom:5px;">
						<a href="<?php echo $nextAttachmentURL; ?>" title="<?php the_title(); ?>" rel="attachment" >
							<?php echo wp_get_attachment_image( $post->ID, 'full'); ?>
						</a>
					</div>	
				</div>

				<div class="gallery-nav">
					<?php
					$counter = 0;
					foreach ($attachmentIDs as $ID) : $counter++; ?>
						<a href="<?php echo get_attachment_link($ID);?>" class="<?php if($currentAttachmentNumber == $counter) echo 'active'?>"><?php echo $counter; ?></a>
					<?php endforeach; ?>
				</div>

				<?php if(!wp_is_mobile()) : ?>
				<div style="text-align:center;color:#999;line-height:25px;">
					<p><?php _e("Klavye yön tuşlarını kullanarak resimler arasında geçiş yapabilirsiniz","pusula") ?>.</p>
					<p><?php _e("Konuya Geri Dön","pusula") ?>: <a href="<?php echo get_permalink($post->post_parent); ?>"><b><?php echo get_the_title($post->post_parent); ?></b></a></p>

				</div>
				<?php endif; ?>
			</div>

			<?php if(xoption("singleCommentsActive") && comments_open()) comments_template(); ?>

		</div><!--single-->
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>


