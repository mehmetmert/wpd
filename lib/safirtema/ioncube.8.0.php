<?php if(!defined('ABSPATH')) exit; ?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Ioncube PHP Versiyon Hatası</title>
        <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()) ?>/lib/safirtema/assets/front.css" />
    </head>
    <body>
        <div class="safirWrapper">
            <div class="inner">
                <div class="image">
                    <img src="<?php echo get_template_directory_uri() . "/lib/safirtema/assets/images/warning.svg" ?>">
                </div>
                <h1>Ioncube PHP Versiyon Hatası</h1>
                <p>Sunucunuzda PHP 8.0 versiyonu aktif. Ioncube'ün PHP 8.0 desteği bulunmadığı için host paneliniz üzerinden PHP versiyonunuzu 7.3 -> 8.3 arasında bir versiyon yapmalısınız.</p>
            </div>
        </div>
    </body>
</html>
