<?php if(!defined('ABSPATH')) exit; ?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title><?php echo xoption("maintenanceText") ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()) ?>/lib/safirtema/assets/front.css" />
    </head>
    <body>
        <div class="safirWrapper">
            <div class="inner">
                <div class="image">
                    <img src="<?php echo xoption("maintenanceLogo") ?>" style="max-height:60px" />
                </div>
                <h1><?php echo xoption("maintenanceText") ?></h1>
                <p><?php echo xoption("maintenanceDesc") ?></p>
            </div>
    </body>
</html>
