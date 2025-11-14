<?php if(!defined('ABSPATH')) exit; ?>
<?php global $widgetPlace ?>
<div class="safirWidget referencesWidget safirOwlButtons <?php echo $lineBg . " " . $grayBg . " " . $type . " " . $widgetPlace; ?>Widget<?php if($type == "references") echo " fitImage"; ?>">
	<div class="innerContainer">
		<?php include('widgetheading.php');
		$attachmentIDs = safir_get_gallery_ids($pageID);

		if(is_array($attachmentIDs)) {
			?>
			<div class="itemsContainer">
				<div class="owl-carousel">
					<?php
					foreach ($attachmentIDs as $attachmentID) {
						$attachment = get_post($attachmentID);
						?>
						<div class="itemContainer">
							<a href="<?php echo get_permalink($pageID) ?>">
							<?php
							$url = wp_get_attachment_url($attachmentID);
							safirthumb(array(
								"ID" => $attachmentID,
								"alt" => __('Galeri', 'pusula'),
							));
							?>
							<?php if($type == "crew") : ?>
								<div class="title"><?php echo $attachment->post_title ?></div>
								<div class="detail">
									<?php 
									$position = get_post_meta($attachmentID, "position", true);
									echo $position;?>
								</div>
							<?php endif; ?>
							</a>
						</div>
						<?php
					}
					?>
				</div>
			</div>
			<?php
		} else {
			edit_post_link( 'Bu bileşeni kullanabilmek için seçtiğiniz sayfaya bir galeri eklemelisiniz. Lütfen buraya tıklayarak sayfaya galeri ekleyiniz.', '<p class="nogallery">', '</p>', $pageID );
		}
		?>
	</div>
</div>
