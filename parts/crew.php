<?php
if(!defined('ABSPATH')) exit;
$attachment = get_post($attachmentID);
?>
<div class="item-container">
	<div class="item">
		<?php 
		$imageData = wp_get_attachment_image_src($attachmentID, 'full');
		$link = $imageData[0];
		?>
		<a data-fancybox="gallery" href="<?php echo $link; ?>" data-src=#ekip<?php echo $attachmentID; ?>>
			<div class="thumb">
				<?php
				safirthumb(array(
					"ID" => $attachmentID,
					"alt" => __('Ekip', 'pusula'),
				));
				?>
			</div>
			<div class="info">
				<div class="title"><?php echo $attachment->post_title ?></div>
				<div class="detail"><?php echo get_post_meta($attachmentID, "position", true) ?></div>
			</div>
		<?php if($link) echo '</a>'; ?>
	</div>
	<div class="crewModal" id="ekip<?php echo $attachmentID ?>">
		<div class="thumb">
			<?php
			safirthumb(array(
				"ID" => $attachmentID,
				"alt" => __('Ekip', 'pusula'),
			));
			?>
		</div>
		<div class="info">
			<div class="topsection">
				<div class="title">
					<?php echo $attachment->post_title ?>
				</div>
				<div class="position">
					<?php echo get_post_meta($attachmentID, "position", true) ?>
				</div>
			</div>
			<ul class="safirSocial social">
				<?php
				$socials = array("facebook", "twitter", "instagram", "linkedin");
				foreach ($socials as $social) {
					if($x = get_post_meta($attachmentID, $social, true)) :
						?>
						<li class="<?php echo $social ?>">
							<a rel="external" href="<?php echo $x ?>">
								<?php themeIcon($social) ?>
							</a>
						</li>
						<?php
					endif;
				}
				?>
			</ul>
			<div class="detail">
				<?php echo $attachment->post_content ?>
			</div>
		</div>
	</div>
</div>
