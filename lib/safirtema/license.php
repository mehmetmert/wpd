<?php if(!defined('ABSPATH')) exit; ?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title><?php wp_title() ?></title>
        <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()) ?>/lib/safirtema/assets/front.css" />
    </head>
    <body>
        <div class="safirWrapper">
            <div class="inner">
                <div class="image">
                    <img src="<?php echo get_template_directory_uri() . "/lib/safirtema/assets/images/license.svg" ?>">
                </div>
                <h1>Lisans Kodunuzu Giriniz</h1>
                <div class="info"><?php echo ucfirst(SAFIR_THEME_SLUG) ?> teması için lisans kodunuzu safirtema.com <a href="https://safirtema.com/hesabim/temalarim/" target="_blank">müşteri panelinizde</a> bulabilirsiniz.</div>
                <form action="<?php home_url(); ?>" method="post" onsubmit="return verify()">
    				<input id="code" type="text" name="code" value="<?php if(isset($_REQUEST['code'])) echo $_REQUEST['code']; ?>" />
                    <button id="button">
                        <svg enable-background="new 0 0 512 512" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m506.13 241.84c-6e-3 -6e-3 -0.011-0.013-0.018-0.019l-104.5-104c-7.829-7.791-20.492-7.762-28.285 0.068-7.792 7.829-7.762 20.492 0.067 28.284l70.164 69.824h-423.56c-11.046 0-20 8.954-20 20s8.954 20 20 20h423.56l-70.162 69.824c-7.829 7.792-7.859 20.455-0.067 28.284 7.793 7.831 20.457 7.858 28.285 0.068l104.5-104c6e-3 -6e-3 0.011-0.013 0.018-0.019 7.833-7.818 7.808-20.522-1e-3 -28.314z"/></svg>
                    </button>
    			</form>
                <div id="warning">
                    <?php
                    global $licenseError;
                    if($licenseError != "") :
                        echo $licenseError;
                    endif;
                    ?>
                </div>
            </div>
    </body>
    <script>
        let input = document.getElementById("code");
        input.focus();
        input.select();
        function verify() {
            if( input.value.length != 49 ) {
                var warningDiv = document.getElementById("warning");
                warningDiv.innerHTML = "Lisans kodunuz geçersiz.";
                var newone = warningDiv.cloneNode(true);
                warningDiv.parentNode.replaceChild(newone, warningDiv);
                return false;
            }
        }
    </script>
</html>
<?php
add_filter('wp_title', 'safir_license_title');
function safir_license_title($title) {
    return "Lisans Ekranı";
}
