<?php if(!defined('ABSPATH')) exit; ?>
<?php
$safirFonts = [
	"system-fonts" => [
		"system-ui",
		"arial",
	],
	"custom-fonts" => [
		"nunito" => "mal8yca",
		"exo-soft" => "ezm3ovt",
		"opensans" => "ggn0gec",
		"proxima-nova" => "yrz3czf",
		"fira-sans" => "zap8ogm",
		"noto-sans" => "sps2wbt",
		"montserrat" => "pzz3vrz",
		"roboto" => "wra8zcc",
		"poppins" => "qgf2lrz",
		"playfair-display" => "aix7ywl",
	],
];
$safirFonts = apply_filters( 'safirGetFonts', $safirFonts );

$safirSelectedFonts = [];
$fontOptions = ["main", "head", "menu", "content"];
foreach ($fontOptions as $option) {
	$font = xoption($option . "Font");
	if(isset($safirFonts["custom-fonts"][$font]) && !in_array($safirFonts["custom-fonts"][$font], $safirSelectedFonts)) {
		$safirSelectedFonts[$option] = $safirFonts["custom-fonts"][$font];
	}
}
