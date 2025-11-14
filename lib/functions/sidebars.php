<?php if(!defined('ABSPATH')) exit; ?>
<?php
if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name'=>'Sidebar - Genel',
		'id'=>'sidebar-general',
		'before_widget'=>'<div class="sidebarWidget nativeWidget"><div class="safirBox">',
		'after_widget'=>'</div></div>',
		'before_title'=>'<div class="mainHeading class="title"><div class="text"><div class="title">',
		'after_title'=>'</div></div></div>',
		'description'=>'Genel Sidebar'
	));
	register_sidebar(array(
		'name'=>'Anasayfa (Mobil)',
		'id'=>'sidebar-mobile',
		'before_widget'=>'<div class="homeWidget nativeWidget">',
		'after_widget'=>'</div>',
		'before_title'=>'<div class="mainHeading class="title"><div class="text"><div class="title">',
		'after_title'=>'</div></div></div>',
		'description'=>'Mobil anasayfanız için bileşenleri buraya ekleyiniz. Bu sidebar boş bırakılırsa mobilde masaüstü sidebarı gösterilecektir.'
	));
	register_sidebar(array(
		'name'=>'Anasayfa (Masaüstü)',
		'id'=>'sidebar-desktop',
		'before_widget'=>'<div class="homeWidget nativeWidget">',
		'after_widget'=>'</div>',
		'before_title'=>'<div class="mainHeading class="title"><div class="text"><div class="title">',
		'after_title'=>'</div></div></div>',
		'description'=>'Anasayfa bileşenlerini buraya ekleyiniz.'
	));
	register_sidebar(array(
		'name'=>'Sidebar - Ürünler',
		'id'=>'sidebar-product',
		'before_widget'=>'<div class="sidebarWidget nativeWidget"><div class="safirBox">',
		'after_widget'=>'</div></div>',
		'before_title'=>'<div class="mainHeading class="title"><div class="text"><div class="title">',
		'after_title'=>'</div></div></div>',
		'description'=>'Ürün konu ve kategorilerinde çıkacak sidebar'
	));
	register_sidebar(array(
		'name'=>'Sidebar - Tekil Sayfa',
		'id'=>'sidebar-single',
		'before_widget'=>'<div class="sidebarWidget nativeWidget"><div class="safirBox">',
		'after_widget'=>'</div></div>',
		'before_title'=>'<div class="mainHeading class="title"><div class="text"><div class="title">',
		'after_title'=>'</div></div></div>',
		'description'=>'Ürün Konuları dışındaki tekil sayfalarda görünecek olan sidebar'
	));
	register_sidebar(array(
		'name'=>'Sidebar - Kategori',
		'id'=>'sidebar-category',
		'before_widget'=>'<div class="sidebarWidget nativeWidget"><div class="safirBox">',
		'after_widget'=>'</div></div>',
		'before_title'=>'<div class="mainHeading class="title"><div class="text"><div class="title">',
		'after_title'=>'</div></div></div>',
		'description'=>'Ürün kategorileri dışındaki kategorilerde görünecek olan sidebar'
	));
	register_sidebar(array(
		'name'=>'Sidebar - Sayfa',
		'id'=>'sidebar-page',
		'before_widget'=>'<div class="sidebarWidget nativeWidget"><div class="safirBox">',
		'after_widget'=>'</div></div>',
		'before_title'=>'<div class="mainHeading class="title"><div class="text"><div class="title">',
		'after_title'=>'</div></div></div>',
		'description'=>'Sayfalarda görünecek olan sidebar'
	));
}
