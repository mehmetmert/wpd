<?php if(!defined('ABSPATH')) exit; ?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Özelleştir</title>
        <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()) ?>/lib/safirtema/assets/front.css" />
    </head>
    <body>
        <div class="safirWrapper">
            <div class="inner">
                <div class="image">
                    <img src="<?php echo get_template_directory_uri() . "/lib/safirtema/assets/images/warning.svg" ?>">
                </div>
                <h1>Özelleştirme Hatası</h1>
                <p>Özelleştiriciyi kullanabilmek için öncelikle temayı aktif edip lisanslama işlemini yapmalısınız. Temalar sayfasına gitmek için <a href="<?php echo admin_url("/themes.php") ?>">buraya</a> tıklayabilirsiniz.</p>
            </div>
    </body>
</html>
