<?php if(!defined('ABSPATH')) exit; ?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Ioncube Hatası</title>
        <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()) ?>/lib/safirtema/assets/front.css" />
    </head>
    <body>
        <div class="safirWrapper">
            <div class="inner">
                <div class="image">
                    <img src="<?php echo get_template_directory_uri() . "/lib/safirtema/assets/images/warning.svg" ?>">
                </div>
                <h1>Ioncube Hatası</h1>
                <p>Sunucunuzda tema için gerekli olan Ioncube bileşeni yüklü değil. Hosting firmanızdan Ioncube yüklemesini isteyiniz.</p>
            </div>
        </div>
    </body>
</html>
