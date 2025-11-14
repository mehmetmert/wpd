<?php if(!defined('ABSPATH')) exit; ?>
<?php
// WP Functions

	function safir_register_shortcodes(){
		add_shortcode('safir_mainheading', 'safir_mainheading');
		add_shortcode('safir_descriptionbox', 'safir_descriptionbox');
		add_shortcode('safir_faq', 'safir_faq');
		add_shortcode('safir_list', 'safir_list');
	}
	add_action( 'init', 'safir_register_shortcodes');


// Main Heading

	function safir_mainheading($atts) {
		extract(shortcode_atts(array(
			'title' 	=> 'Başlık',
			'icon' 		=> '',
		), $atts));

		return '

			<div class="mainHeading">'
				. safirIcon($icon, false) . 
				'<div class="title">'.$title.'</div>
			</div>

		';
	}

// Description Box

	function safir_descriptionbox($atts) {
		extract(shortcode_atts(array(
			'header' 	=> 'Başlık',
			'content' 	=> 'İçerik',
			'icon' 		=> '',
			'bg'	 	=> '',
		), $atts));

		return '

			<div class="descriptionbox '.$bg.'">
				<div class="inner">'
					. safirIcon($icon, false) . 
					'<div class="header">'.$header.'</div>
					<div class="content">'.$content.'</div>
				</div>
			</div>

		';
	}

// FAQ

	function safir_faq($atts) {
		extract(shortcode_atts(array(
			'question' 	=> 'Hatalı Giriş',
			'answer' 	=> 'Lütfen çift tırnak gibi özel karakterler kullanmayınız.',
		), $atts));

		return '

			<div class="safir-faq">
				<div class="question">'.safirIcon("soru", false).'<span class="text">'.$question.'</span><div class="openclose plus"></div></div>
				<div class="answer">'.$answer.'</div>
			</div>
			
		';
	}


// List

	function safir_list($atts, $content = null) {
		extract(shortcode_atts(array(
		), $atts));

		return '

			<div class="safir-list">
			'.$content.'
			</div>

		';
	}