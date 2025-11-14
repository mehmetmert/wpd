<?php if(!defined('ABSPATH')) exit; ?>
<?php
ob_start("compress");
function compress($buffer) {
	$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
	$buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
	$buffer = str_replace(' {', '{', $buffer);
	$buffer = str_replace(', ', ',', $buffer);
	$buffer = str_replace(': ', ':', $buffer);
	$buffer = str_replace('; ', ';', $buffer);
	return $buffer;
}

do_action("safir_before_style.php");
global $c1;
if(!isset($c1)) $c1 = xoption("siteColor1");
global $c2;
if(!isset($c2)) $c2 = xoption("siteColor2");

$thumbRatio = xoption("thumbRatio");
if(!is_numeric($thumbRatio)) $thumbRatio = 0.5625;
$thumbRatio *= 100;

$catThumbRatio = xoption("catThumbRatio");
if(!is_numeric($catThumbRatio)) $catThumbRatio = 0.6;
$catThumbRatio *= 100;

$headerHeight = xoption("headerHeight");
if (!is_numeric($headerHeight)) $headerHeight = 40;
?>

<style>
	:root {
		--c1: <?php echo $c1 ?>;
		--c2: <?php echo $c2 ?>;
		--noImageForPost: url(<?php echo xoption("noimageforpost") ?>);
		--headerHeight: <?php echo $headerHeight ?>px;
		--thumbRatio: <?php echo $thumbRatio ?>%;
		--catThumbRatio: <?php echo $catThumbRatio ?>%;
		--mainFont: <?php echo xoption("mainFont") ?>, sans-serif;
		--menuFont: <?php echo xoption("menuFont"); ?>, sans-serif;
		--headFont: <?php echo xoption("headFont"); ?>, sans-serif;
		--contentFont: <?php echo xoption("contentFont"); ?>, sans-serif;
		--headColor: <?php echo xoption("headColor") ?>;
		--linkColor: <?php echo xoption("linkColor") ?>;
	}
</style>
<?php ob_end_flush(); ?>