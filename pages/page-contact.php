<?php if(!defined('ABSPATH')) exit; ?>
<?php
/*
	Template Name: İletişim
*/
?>
<?php get_header(); ?>
<div id="main" class="innerContainer">
	<div id="content" class="full">
		<div class="safirBox">
			<div id="contactPage">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div class="infoBlock">

					<div class="table">
						<?php
						$items = array(
							'unvan'			=> __('FİRMA ÜNVANI', 'pusula'),
							'contactmail'	=> __('MAİL ADRESİ', 'pusula'),
							'contactphone'	=> __('TELEFON NUMARASI', 'pusula'),
							'fax'			=> __('FAKS NUMARASI', 'pusula')
						);
						foreach ($items as $item => $value) {
							if($x = xoption($item)) {
								$icon = $item;
								if($item == "unvan") $icon = "user";
								if($item == "contactmail") $icon = "email2";
								if($item == "contactphone") $icon = "phone2";
								?>
								<div class="item <?php echo $item ?>">
									<?php themeIcon($icon) ?>
									<div class="data">
										<span><?php echo $value ?></span>
										<?php echo nl2br($x) ?>
									</div>
								</div>
								<?php
							}
						}
						?>
					</div>

					<div class="addressBlock">
						<div class="address">
							<?php themeIcon("address") ?>
							<div class="data">
								<span><?php _e("ADRES", "pusula"); ?></span>
								<?php echo xoption("address"); ?>
							</div>
						</div>
						<?php include(get_template_directory() . "/lib/safirtema/social.php") ?>
					</div>

				</div>

				<div class="reading">
					<?php the_content(); ?>
				</div>

				<div id="formmap">

					<div class="form">
						<div class="mainHeading">
							<?php safirIcon("iletisim") ?>
							<h2 class="title"><?php _e("İLETİŞİM FORMU", "pusula"); ?></h2>
						</div>
						<?php echo do_shortcode(xoption('contactformshortcode'));?>
					</div>

					<div class="map">
						<div class="mainHeading">
							<?php safirIcon("harita") ?>
							<h2 class="title"><?php _e("HARİTA ÜZERİNDE YERİMİZ", "pusula"); ?></h2>
						</div>
						<div id="googleMap">
							<?php echo xoption("mapIframe"); ?>
						</div>
					</div>

				</div>

				<?php endwhile; ?>
			</div>
		</div>
		<?php if(xoption("pageCommentsActive") && comments_open()) comments_template(); ?>
	</div><!--content-->
</div><!--main-->

<?php get_footer(); ?>
