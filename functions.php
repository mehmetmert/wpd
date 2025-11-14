<?php if(!defined('ABSPATH')) exit; ?>
<?php
// Ioncube Check
	$safirPHPVersion = phpversion();
	if(strlen($safirPHPVersion) >=3) $safirPHPVersion = substr($safirPHPVersion, 0, 3);

	if($safirPHPVersion == "8.0") {
		include(get_template_directory() . "/lib/safirtema/ioncube.8.0.php");
		die();
	}

	if(wp_get_environment_type() == 'development') {
		include("functions/php.7.2-8.3.php");
	} else {
		if(!extension_loaded("IonCube Loader")) {
			add_action( 'admin_notices', 'safir_admin_ioncube_error' );
			if(!is_admin()) {
				include(get_template_directory() . "/lib/safirtema/ioncube.php");
				die();
			}
		} else {
			include("functions/php.7.2-8.3.php");
		}
	}

	function safir_admin_ioncube_error() {
	    printf( '<div class="notice notice-error"><p><strong>Sunucunuzda tema için gerekli olan Ioncube bileşeni yüklü değil. Hosting firmanızdan son sürüm Ioncube yüklemesini isteyiniz.</strong></p></div>');
	}
