<?php if(!defined('ABSPATH')) exit; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head><?php wp_head() ?></head>
<body <?php do_action("safir_body_tag") ?>>
<?php wp_body_open(); ?>
<header>
	<?php include("parts/topbar.php") ?>
	<?php include("parts/header.php") ?>
</header>

<div id="mobileMenuContainer">
	<div class="topinfo">
		<?php include(get_template_directory() . "/parts/languages.php"); ?>
	</div>
	<div class="menuContainer"></div>
</div>

<div id="mobileSocialContainer">
	<div class="title"><?php _e("Sosyal Medya Hesaplarımız", "pusula") ?></div>
	<div class="icons"></div>
</div>

<?php if(!wp_is_mobile()) : ?>
<nav id="sidemenu" class="<?php echo xoption("sidemenuPosition") ?>">
	<?php echo safir_nav_menu('sidemenu'); ?>
</nav>
<?php endif; ?>

<?php if(!is_home() && !is_page_template("pages/page-empty.php")) : ?>
	<?php include("parts/picheader.php") ?>
<?php endif; ?>
