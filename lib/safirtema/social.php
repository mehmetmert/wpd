<?php if(!defined('ABSPATH')) exit; ?>
<?php
$safirOptions = get_option("safir_" . SAFIR_THEME_SLUG . "_safirpanel");
$safirOptions = apply_filters( 'safirGetOptions', $safirOptions );
$socials = $safirOptions["social"]["data"]["socials"]["items"];
?>
<ul class="safirSocial">
	<?php
	foreach($socials as $social) :
		if($x = xoption($social . 'URL')) :
			?><li class="<?php echo $social ?>"><a rel="external" href="<?php echo $x; ?>" title="<?php printf( __( 'Sitemizi %s üzerinden takip edin', 'pusula' ), ucfirst($social)); ?>"><?php themeIcon($social) ?></a></li><?php
		endif;
	endforeach;
	?>
</ul>
