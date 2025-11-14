<?php
if(!defined('ABSPATH')) exit;

$iconsDir = get_template_directory() . "/icons";
$timeTransient = "safirIconsFolder_" . SAFIR_THEME_SLUG;
$iconTransient = "safirIcons_" . SAFIR_THEME_SLUG;
$safirIcons = get_transient($iconTransient);
if($safirIcons === false || get_transient($timeTransient) != filemtime($iconsDir)) {
	$safirIcons = [];
	global $wp_filesystem;
	$filecontent = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" style="display:none">';
	$filelist = $wp_filesystem->dirlist( get_template_directory() ."/icons" );
	asort($filelist);
	foreach ($filelist as $file => $value) {
		if(substr($file, -4) == ".svg") {
			$nicename = sanitize_title(substr($file, 0, -4));
			$safirIcons[] = $nicename;
			$svgfile = $wp_filesystem->get_contents(get_template_directory() . "/icons/$file");
			preg_match('@viewBox="(.*?)"@si', $svgfile, $viewBox);
			$viewBox = isset($viewBox[1]) ? $viewBox[1] : "0 0 512 512";
			$filecontent .= '<symbol id="safiricon-'.$nicename.'" viewBox="'.$viewBox.'">';
			$svgfile = preg_replace('/<\?xml(.|\s)*?\?>/', '', $svgfile);
			$svgfile = preg_replace('/<svg(.|\s)*?>/', '', $svgfile);
			$svgfile = preg_replace('/<!--(.|\s)*?-->/', '', $svgfile);
			$svgfile = preg_replace('/<!(.|\s)*?>/', '', $svgfile);
			$svgfile = preg_replace('/id="(.|\s)*?"/', '', $svgfile);
			$svgfile = preg_replace('/<!--.*-->/', '', $svgfile);
			$svgfile = preg_replace('/<\s*title[^>]*>(.*?)<\s*\/\s*title>/', '', $svgfile);
			$svgfile = preg_replace('/<g>[\n\r\s]*<\/g>/', '', $svgfile);
			$svgfile = preg_replace('/\n/', ' ', $svgfile);
			$svgfile = preg_replace('/\t/', ' ', $svgfile);
			$svgfile = preg_replace('/\s\s+/', ' ', $svgfile);
			$svgfile = str_replace('> <', '><', $svgfile);
			$svgfile = str_replace(';"', '"', $svgfile);
			$svgfile = str_replace('</svg>', '', $svgfile);
			$filecontent .= $svgfile;
			$filecontent .= "</symbol>";
		}
	}

	$filecontent .= "</svg>";
	$wp_filesystem->put_contents( get_template_directory() . "/images/icons.svg", $filecontent, FS_CHMOD_FILE);
	set_transient( $timeTransient, filemtime($iconsDir), YEAR_IN_SECONDS );
	set_transient( $iconTransient, $safirIcons, YEAR_IN_SECONDS );
}

// SAFIR ICONS

function safirIcon($icon = "icon1", $echo = true) {
	if($echo) {
		echo '<span class="safiricon icon"><svg class="safiricon-'.$icon.'"><use href="#safiricon-'.$icon.'"></use></svg></span>';
	} else {
		return '<span class="safiricon icon"><svg class="safiricon-'.$icon.'"><use href="#safiricon-'.$icon.'"></use></svg></span>';
	}
}

function themeIcon($icon = "arti", $echo = true) {
	if($echo) {
		echo '<span class="themeicon icon"><svg class="themeicon-'.$icon.'"><use href="#themeicon-'.$icon.'"></use></svg></span>';
	} else {
		return '<span class="themeicon icon"><svg class="themeicon-'.$icon.'"><use href="#themeicon-'.$icon.'"></use></svg></span>';
	}
}