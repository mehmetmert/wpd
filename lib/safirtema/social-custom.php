<?php if(!defined('ABSPATH')) exit; ?>
<?php
/**
 * SOCIAL MEDIA LINKS - CUSTOM VERSION
 * Sosyal medya bağlantılarını gösterir
 */

// Sosyal medya listesi
$socials = array('facebook', 'twitter', 'instagram', 'youtube', 'linkedin');

?>
<ul class="safirSocial">
	<?php
	foreach($socials as $social) :
		$url = xoption($social . 'URL');
		if($url) :
			?>
			<li class="<?php echo esc_attr($social) ?>">
				<a rel="external noopener noreferrer"
				   href="<?php echo esc_url($url); ?>"
				   title="<?php printf( __( 'Sitemizi %s üzerinden takip edin', 'pusula' ), ucfirst($social)); ?>"
				   target="_blank">
					<?php themeIcon($social) ?>
				</a>
			</li>
			<?php
		endif;
	endforeach;
	?>
</ul>
