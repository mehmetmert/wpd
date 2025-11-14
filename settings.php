<?php if(!defined('ABSPATH')) exit; ?>
<?php
$parts = [
	"upgrade",
	"theme",
	"constant",
	"icons",
	"fonts",
	"menus",
	"sidebars",
	"commonfunctions",
	"cache",
	"safirnavi",
	"breadcrumbs",
	"metabox",
	"gutenberg",
	"enqueue",
	"adminenqueue",
	"bodyhead",
];
foreach($parts as $part) {
	include(get_template_directory() . "/lib/functions/$part.php");
}