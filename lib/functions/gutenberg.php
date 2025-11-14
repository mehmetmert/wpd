<?php if(!defined('ABSPATH')) exit; ?>
<?php
// Gutenberg
include(get_template_directory() . '/lib/safirtema/gutenberg/shortcodes.php');

function safir_gutenberg_blocks() {
	global $safirIcons;
	wp_register_script( 'safirGutenberg', get_template_directory_uri() . "/lib/safirtema/gutenberg/gutenberg.js", array( 'wp-blocks', 'wp-editor', 'wp-element' ), filemtime(get_template_directory() . "/lib/safirtema/gutenberg/gutenberg.js"), true );

	wp_localize_script( 'safirGutenberg', 'safirIcons', $safirIcons );

	safir_enqueue_style('safirgutenberg', 'lib/safirtema/gutenberg/gutenberg.css');

	register_block_type( 'safirtema/sorucevap', array(
        'editor_script' => 'safirGutenberg',
    ) );
    register_block_type( 'safirtema/mainheading', array(
        'editor_script' => 'safirGutenberg',
    ) );
    register_block_type( 'safirtema/bgtext', array(
        'editor_script' => 'safirGutenberg',
    ) );
    register_block_type( 'safirtema/safirbutton', array(
        'editor_script' => 'safirGutenberg',
    ) );
}
if(function_exists("register_block_type")) add_action( 'init', 'safir_gutenberg_blocks' );

add_action('admin_head', 'safir_admin_gutenberg_styles');
function safir_admin_gutenberg_styles() {
	global $safirIcons;
	?>
	<style>
	body .editor-styles-wrapper {
		font-family: <?php echo xoption("contentFont") ?> !important;
	}

	.safirButton, .safir-faq .icon {
		background: <?php echo xoption("siteColor1") ?>
	}

	.safirButton:hover {
		background: <?php echo xoption("siteColor2") ?>
	}

	.safirButton.alt {
		background: <?php echo xoption("siteColor2") ?>
	}

	.safirButton.alt:hover {
		background: <?php echo xoption("siteColor1") ?>
	}

	.block-editor__typewriter h1, .block-editor__typewriter h2, .block-editor__typewriter h3, .block-editor__typewriter h4, .block-editor__typewriter h5, .block-editor__typewriter h6, .mainHeading {
		color: <?php echo xoption("headColor") ?> !important;
		font-family: <?php echo xoption("headFont") ?> !important;
	}

	.mainHeading:after {
		background: -moz-linear-gradient(left, <?php echo xoption("siteColor1") ?> 0%, <?php echo xoption("siteColor1") ?> 80px, #f2f2f2 80px, #f2f2f2 100%);
		background: -webkit-linear-gradient(left, <?php echo xoption("siteColor1") ?> 0%,<?php echo xoption("siteColor1") ?> 80px,#f2f2f2 80px,#f2f2f2 100%);
		background: linear-gradient(to right, <?php echo xoption("siteColor1") ?> 0%,<?php echo xoption("siteColor1") ?> 80px,#f2f2f2 80px,#f2f2f2 100%);
	}
	
	.mainHeading .icon {
		color: <?php echo xoption("siteColor1") ?>;
	}

	.safir-list li:before {
		border-color: transparent transparent transparent <?php echo xoption("siteColor1") ?>;
	}


	</style>
	<?php
}

