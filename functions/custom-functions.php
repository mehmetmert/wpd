<?php if(!defined('ABSPATH')) exit; ?>
<?php
/**
 * CUSTOM FUNCTIONS - IONCUBE REPLACEMENT
 * Bu dosya şifreli functions/php.7.2-8.3.php dosyasının yerine geçer
 * Tema lisanssız çalışabilir hale getirilmiştir
 */

// ============================================================
// THEME CONSTANTS
// ============================================================

define('SAFIR_THEME_SLUG', 'pusula');
define('SAFIR_CACHE_ENABLED', TRUE);
define('SAFIR_CACHE_TIME', DAY_IN_SECONDS);
define('SAFIR_MENU_CACHE_TIME', WEEK_IN_SECONDS);
define('SAFIR_WIDGET_CACHE_TIME', WEEK_IN_SECONDS);

// ============================================================
// LOAD LIB FUNCTIONS
// ============================================================

/**
 * Tema yardımcı fonksiyonlarını yükle
 */

// Sabitler
include(get_template_directory() . "/lib/functions/constant.php");

// Temel tema fonksiyonları
include(get_template_directory() . "/lib/functions/theme.php");

// Ortak fonksiyonlar (safirthumb, safirText, vb.)
include(get_template_directory() . "/lib/functions/commonfunctions.php");

// İkonlar (safirIcon, themeIcon)
include(get_template_directory() . "/lib/functions/icons.php");

// Menüler (safir_nav_menu)
include(get_template_directory() . "/lib/functions/menus.php");

// Sidebar'lar
include(get_template_directory() . "/lib/functions/sidebars.php");

// Enqueue (CSS/JS yükleme)
include(get_template_directory() . "/lib/functions/enqueue.php");

// Admin enqueue
include(get_template_directory() . "/lib/functions/adminenqueue.php");

// Body ve head fonksiyonları
include(get_template_directory() . "/lib/functions/bodyhead.php");

// Breadcrumbs
include(get_template_directory() . "/lib/functions/breadcrumbs.php");

// Cache fonksiyonları
include(get_template_directory() . "/lib/functions/cache.php");

// Fontlar
include(get_template_directory() . "/lib/functions/fonts.php");

// Gutenberg
include(get_template_directory() . "/lib/functions/gutenberg.php");

// Metabox
include(get_template_directory() . "/lib/functions/metabox.php");

// Navigasyon
include(get_template_directory() . "/lib/functions/safirnavi.php");

// Upgrade
include(get_template_directory() . "/lib/functions/upgrade.php");

// ============================================================
// CORE FUNCTIONS
// ============================================================

/**
 * Tema ayarlarını veritabanından okur
 * @param string $key Ayar anahtarı
 * @param mixed $default Varsayılan değer
 * @return mixed Ayar değeri
 */
function xoption($key, $default = '') {
    static $options = null;

    // İlk çağrıda tüm ayarları yükle (performans için)
    if ($options === null) {
        $options = get_option("safir_" . SAFIR_THEME_SLUG . "_safirpanel", array());
        if (!is_array($options)) {
            $options = array();
        }
    }

    // Ayarı getir
    if (isset($options[$key])) {
        return $options[$key];
    }

    return $default;
}

/**
 * Tema ayarı kaydet
 * @param string $key Ayar anahtarı
 * @param mixed $value Değer
 */
function xoption_save($key, $value) {
    $options = get_option("safir_" . SAFIR_THEME_SLUG . "_safirpanel", array());
    if (!is_array($options)) {
        $options = array();
    }
    $options[$key] = $value;
    update_option("safir_" . SAFIR_THEME_SLUG . "_safirpanel", $options);
}

/**
 * Logo çıktısı
 */
function safirLogo() {
    $logo = xoption('logo');
    $logo_width = xoption('logoWidth', 'auto');
    $logo_height = xoption('logoHeight', 'auto');

    $site_name = get_bloginfo('name');
    $home_url = home_url('/');

    if ($logo) {
        $style = '';
        if ($logo_width != 'auto') {
            $style .= 'width:' . esc_attr($logo_width) . 'px;';
        }
        if ($logo_height != 'auto') {
            $style .= 'height:' . esc_attr($logo_height) . 'px;';
        }

        echo '<a href="' . esc_url($home_url) . '">';
        echo '<img src="' . esc_url($logo) . '" alt="' . esc_attr($site_name) . '"';
        if ($style) {
            echo ' style="' . $style . '"';
        }
        echo '>';
        echo '</a>';
    } else {
        echo '<a href="' . esc_url($home_url) . '">' . esc_html($site_name) . '</a>';
    }
}

/**
 * REMOVED: safirLazyThumb() artık lib/functions/commonfunctions.php dosyasında
 */

// ============================================================
// LISANS SİSTEMİ (BYPASS)
// ============================================================

/**
 * Lisans kontrolünü devre dışı bırak
 */
add_filter('template_redirect', 'safir_bypass_license', 1);
function safir_bypass_license() {
    // Lisans ekranlarını devre dışı bırak
    remove_action('template_redirect', 'safir_check_license');

    // Development mode simülasyonu
    if (!defined('SAFIR_LICENSE_ACTIVE')) {
        define('SAFIR_LICENSE_ACTIVE', true);
    }
}

/**
 * Lisans aktif mi kontrolü
 */
function safir_is_license_active() {
    return true; // Her zaman aktif
}

// ============================================================
// ADMIN PANEL
// ============================================================

/**
 * Admin menüsüne tema ayarları ekle
 */
add_action('admin_menu', 'safir_admin_menu');
function safir_admin_menu() {
    add_theme_page(
        'Tema Ayarları',
        'Tema Ayarları',
        'manage_options',
        'safir-theme-settings',
        'safir_settings_page'
    );
}

/**
 * Ayarlar sayfası
 */
function safir_settings_page() {
    if (!current_user_can('manage_options')) {
        return;
    }

    // Ayarları kaydet
    if (isset($_POST['safir_settings_submit'])) {
        check_admin_referer('safir_settings_save');

        $options = array();
        foreach ($_POST as $key => $value) {
            if (strpos($key, SAFIR_THEME_SLUG . '_') === 0) {
                $clean_key = str_replace(SAFIR_THEME_SLUG . '_', '', $key);
                $options[$clean_key] = sanitize_text_field($value);
            }
        }

        update_option("safir_" . SAFIR_THEME_SLUG . "_safirpanel", $options);
        echo '<div class="notice notice-success"><p>Ayarlar kaydedildi!</p></div>';
    }

    ?>
    <div class="wrap">
        <h1>Safir Tema Ayarları</h1>
        <p><strong>Not:</strong> Bu basitleştirilmiş ayarlar paneli şifreli dosyanın yerini alır.
        Gelişmiş ayarlar için WordPress Customizer'ı kullanabilirsiniz.</p>

        <form method="post" action="">
            <?php wp_nonce_field('safir_settings_save'); ?>

            <table class="form-table">
                <tr>
                    <th scope="row"><label>Logo URL</label></th>
                    <td>
                        <input type="text" name="<?php echo SAFIR_THEME_SLUG ?>_logo"
                               value="<?php echo esc_attr(xoption('logo')); ?>"
                               class="regular-text" />
                        <p class="description">Logo görselinin URL'ini girin</p>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label>Logo Genişlik</label></th>
                    <td>
                        <input type="text" name="<?php echo SAFIR_THEME_SLUG ?>_logoWidth"
                               value="<?php echo esc_attr(xoption('logoWidth', 'auto')); ?>"
                               class="small-text" />
                        <p class="description">Logo genişliği (px) veya "auto"</p>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label>Logo Yükseklik</label></th>
                    <td>
                        <input type="text" name="<?php echo SAFIR_THEME_SLUG ?>_logoHeight"
                               value="<?php echo esc_attr(xoption('logoHeight', 'auto')); ?>"
                               class="small-text" />
                        <p class="description">Logo yüksekliği (px) veya "auto"</p>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label>Site Rengi</label></th>
                    <td>
                        <input type="text" name="<?php echo SAFIR_THEME_SLUG ?>_siteColor"
                               value="<?php echo esc_attr(xoption('siteColor', '#007bff')); ?>"
                               class="regular-text" />
                        <p class="description">Ana site rengi (hex kodu)</p>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label>Telefon</label></th>
                    <td>
                        <input type="text" name="<?php echo SAFIR_THEME_SLUG ?>_phone"
                               value="<?php echo esc_attr(xoption('phone')); ?>"
                               class="regular-text" />
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label>E-posta</label></th>
                    <td>
                        <input type="email" name="<?php echo SAFIR_THEME_SLUG ?>_email"
                               value="<?php echo esc_attr(xoption('email')); ?>"
                               class="regular-text" />
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label>Adres</label></th>
                    <td>
                        <textarea name="<?php echo SAFIR_THEME_SLUG ?>_address"
                                  class="large-text" rows="3"><?php echo esc_textarea(xoption('address')); ?></textarea>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label>Footer Metni</label></th>
                    <td>
                        <textarea name="<?php echo SAFIR_THEME_SLUG ?>_footerYazi"
                                  class="large-text" rows="3"><?php echo esc_textarea(xoption('footerYazi')); ?></textarea>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label>Lazy Load</label></th>
                    <td>
                        <input type="checkbox" name="<?php echo SAFIR_THEME_SLUG ?>_lazyload"
                               value="1" <?php checked(xoption('lazyload'), '1'); ?> />
                        <span>Görselleri lazy loading ile yükle</span>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label>Breadcrumb</label></th>
                    <td>
                        <select name="<?php echo SAFIR_THEME_SLUG ?>_breadcrumb">
                            <option value="evet" <?php selected(xoption('breadcrumb'), 'evet'); ?>>Evet</option>
                            <option value="hayir" <?php selected(xoption('breadcrumb'), 'hayir'); ?>>Hayır</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label>İlgili Yazı Sayısı</label></th>
                    <td>
                        <input type="number" name="<?php echo SAFIR_THEME_SLUG ?>_relatedCount"
                               value="<?php echo esc_attr(xoption('relatedCount', '6')); ?>"
                               class="small-text" min="0" />
                        <p class="description">İlgili yazılar bölümünde gösterilecek yazı sayısı (0 = gösterme)</p>
                    </td>
                </tr>
            </table>

            <p class="submit">
                <input type="submit" name="safir_settings_submit"
                       class="button button-primary" value="Kaydet" />
            </p>
        </form>

        <hr>

        <h2>Gelişmiş Ayarlar İçin</h2>
        <p>
            <a href="<?php echo admin_url('customize.php'); ?>" class="button">
                WordPress Customizer'a Git
            </a>
        </p>
        <p class="description">
            Daha fazla ayar için WordPress Customizer'ı kullanabilirsiniz.
            Orada logo, renkler, menüler ve diğer tema özelliklerini düzenleyebilirsiniz.
        </p>
    </div>
    <?php
}

// ============================================================
// WORDPRESS CUSTOMIZER INTEGRATION
// ============================================================

add_action('customize_register', 'safir_customizer_settings');
function safir_customizer_settings($wp_customize) {

    // Tema Genel Ayarları Section
    $wp_customize->add_section('safir_general', array(
        'title' => 'Safir Tema Ayarları',
        'priority' => 30,
    ));

    // Logo
    $wp_customize->add_setting(SAFIR_THEME_SLUG . '_logo', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, SAFIR_THEME_SLUG . '_logo', array(
        'label' => 'Logo',
        'section' => 'safir_general',
        'settings' => SAFIR_THEME_SLUG . '_logo',
    )));

    // Site Rengi
    $wp_customize->add_setting(SAFIR_THEME_SLUG . '_siteColor', array(
        'default' => '#007bff',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, SAFIR_THEME_SLUG . '_siteColor', array(
        'label' => 'Ana Site Rengi',
        'section' => 'safir_general',
        'settings' => SAFIR_THEME_SLUG . '_siteColor',
    )));

    // Telefon
    $wp_customize->add_setting(SAFIR_THEME_SLUG . '_phone', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(SAFIR_THEME_SLUG . '_phone', array(
        'label' => 'Telefon',
        'section' => 'safir_general',
        'type' => 'text',
    ));

    // E-posta
    $wp_customize->add_setting(SAFIR_THEME_SLUG . '_email', array(
        'default' => '',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(SAFIR_THEME_SLUG . '_email', array(
        'label' => 'E-posta',
        'section' => 'safir_general',
        'type' => 'email',
    ));

    // Lazy Load
    $wp_customize->add_setting(SAFIR_THEME_SLUG . '_lazyload', array(
        'default' => false,
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(SAFIR_THEME_SLUG . '_lazyload', array(
        'label' => 'Lazy Load Aktif',
        'section' => 'safir_general',
        'type' => 'checkbox',
    ));
}

// Customizer ayarlarını xoption ile senkronize et
add_action('customize_save_after', 'safir_sync_customizer_to_xoption');
function safir_sync_customizer_to_xoption() {
    $options = get_option("safir_" . SAFIR_THEME_SLUG . "_safirpanel", array());

    // Customizer'dan ayarları al
    $customizer_settings = array('logo', 'siteColor', 'phone', 'email', 'lazyload');

    foreach ($customizer_settings as $setting) {
        $value = get_theme_mod(SAFIR_THEME_SLUG . '_' . $setting);
        if ($value !== false) {
            $options[$setting] = $value;
        }
    }

    update_option("safir_" . SAFIR_THEME_SLUG . "_safirpanel", $options);
}

// ============================================================
// WIDGETS
// ============================================================

/**
 * Widget sistemini başlat
 */
add_action('widgets_init', 'safir_load_widgets');
function safir_load_widgets() {
    // Widget class'larını kaydet
    safir_register_widget_classes();
}

/**
 * Widget class'larını kaydet
 */
function safir_register_widget_classes() {

    // Base Safir Widget Class
    if (!class_exists('Safir_Widget_Base')) {
        class Safir_Widget_Base extends WP_Widget {
            protected $template_file = '';

            public function widget($args, $instance) {
                global $widgetPlace;

                // Varsayılan değerler ayarla
                $title = isset($instance['title']) ? $instance['title'] : '';
                $slogan = isset($instance['slogan']) ? $instance['slogan'] : '';
                $icon = isset($instance['icon']) ? $instance['icon'] : '';
                $color = isset($instance['color']) ? $instance['color'] : '';
                $lineBg = isset($instance['lineBg']) ? $instance['lineBg'] : '';
                $grayBg = isset($instance['grayBg']) ? $instance['grayBg'] : '';
                $scroll = isset($instance['scroll']) ? $instance['scroll'] : 'list';
                $count = isset($instance['count']) ? $instance['count'] : '';
                $exclude = isset($instance['exclude']) ? $instance['exclude'] : '';
                $include = isset($instance['include']) ? $instance['include'] : '';

                // Widget template'ini yükle (değişkenler scope'da olacak)
                if ($this->template_file && file_exists(get_template_directory() . '/widgets/' . $this->template_file)) {
                    include(get_template_directory() . '/widgets/' . $this->template_file);
                }
            }

            public function form($instance) {
                $title = !empty($instance['title']) ? $instance['title'] : '';
                ?>
                <p>
                    <label for="<?php echo $this->get_field_id('title'); ?>">Başlık:</label>
                    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                           name="<?php echo $this->get_field_name('title'); ?>" type="text"
                           value="<?php echo esc_attr($title); ?>">
                </p>
                <?php
            }

            public function update($new_instance, $old_instance) {
                $instance = array();
                foreach ($new_instance as $key => $value) {
                    $instance[$key] = strip_tags($value);
                }
                return $instance;
            }
        }
    }

    // Categories Widget
    if (!class_exists('SfrCategoriesWidget')) {
        class SfrCategoriesWidget extends Safir_Widget_Base {
            protected $template_file = 'categoriesWidget.php';

            public function __construct() {
                parent::__construct('sfrcategorieswidget', 'Safir Kategoriler',
                    array('description' => 'Kategorileri gösterir'));
            }

            // widget() metodu parent class'tan kullanılacak
        }
        register_widget('SfrCategoriesWidget');
    }

    // Advanced Posts Widget 1
    if (!class_exists('SfrAdvancedPostsWidget1')) {
        class SfrAdvancedPostsWidget1 extends Safir_Widget_Base {
            protected $template_file = 'advancedPostsWidget1.php';

            public function __construct() {
                parent::__construct('sfradvancedpostswidget1', 'Safir Gelişmiş Yazılar 1',
                    array('description' => 'Gelişmiş yazı listesi'));
            }

            public function widget($args_widget, $instance) {
                global $widgetPlace;

                // Varsayılan değerler
                $title = isset($instance['title']) ? $instance['title'] : '';
                $slogan = isset($instance['slogan']) ? $instance['slogan'] : '';
                $icon = isset($instance['icon']) ? $instance['icon'] : '';
                $color = isset($instance['color']) ? $instance['color'] : '';
                $lineBg = isset($instance['lineBg']) ? $instance['lineBg'] : '';
                $grayBg = isset($instance['grayBg']) ? $instance['grayBg'] : '';
                $scroll = isset($instance['scroll']) ? $instance['scroll'] : 'list';
                $count = isset($instance['count']) ? $instance['count'] : '';
                $exclude = isset($instance['exclude']) ? $instance['exclude'] : '';
                $include = isset($instance['include']) ? $instance['include'] : '';
                $number = isset($instance['number']) ? $instance['number'] : 5;
                $offset = isset($instance['offset']) ? $instance['offset'] : 0;
                $postOrder = isset($instance['postOrder']) ? $instance['postOrder'] : '';

                // WP_Query args
                $args = array(
                    'posts_per_page' => $number,
                    'offset' => $offset,
                    'post_status' => 'publish'
                );

                // Template'i yükle
                if (file_exists(get_template_directory() . '/widgets/' . $this->template_file)) {
                    include(get_template_directory() . '/widgets/' . $this->template_file);
                }
            }
        }
        register_widget('SfrAdvancedPostsWidget1');
    }

    // Advanced Posts Widget 2
    if (!class_exists('SfrAdvancedPostsWidget2')) {
        class SfrAdvancedPostsWidget2 extends Safir_Widget_Base {
            protected $template_file = 'advancedPostsWidget2.php';

            public function __construct() {
                parent::__construct('sfradvancedpostswidget2', 'Safir Gelişmiş Yazılar 2',
                    array('description' => 'Gelişmiş yazı listesi 2'));
            }

            public function widget($args_widget, $instance) {
                global $widgetPlace;

                // Varsayılan değerler
                $title = isset($instance['title']) ? $instance['title'] : '';
                $slogan = isset($instance['slogan']) ? $instance['slogan'] : '';
                $icon = isset($instance['icon']) ? $instance['icon'] : '';
                $color = isset($instance['color']) ? $instance['color'] : '';
                $lineBg = isset($instance['lineBg']) ? $instance['lineBg'] : '';
                $grayBg = isset($instance['grayBg']) ? $instance['grayBg'] : '';
                $scroll = isset($instance['scroll']) ? $instance['scroll'] : 'list';
                $count = isset($instance['count']) ? $instance['count'] : '';
                $exclude = isset($instance['exclude']) ? $instance['exclude'] : '';
                $include = isset($instance['include']) ? $instance['include'] : '';
                $number = isset($instance['number']) ? $instance['number'] : 5;
                $offset = isset($instance['offset']) ? $instance['offset'] : 0;

                // WP_Query args
                $args = array(
                    'posts_per_page' => $number,
                    'offset' => $offset,
                    'post_status' => 'publish'
                );

                // Template'i yükle
                if (file_exists(get_template_directory() . '/widgets/' . $this->template_file)) {
                    include(get_template_directory() . '/widgets/' . $this->template_file);
                }
            }
        }
        register_widget('SfrAdvancedPostsWidget2');
    }

    // Contact Widget
    if (!class_exists('SfrContactWidget')) {
        class SfrContactWidget extends Safir_Widget_Base {
            protected $template_file = 'contactWidget.php';

            public function __construct() {
                parent::__construct('sfrcontactwidget', 'Safir İletişim',
                    array('description' => 'İletişim bilgileri'));
            }
        }
        register_widget('SfrContactWidget');
    }

    // References Widget
    if (!class_exists('SfrReferencesWidget')) {
        class SfrReferencesWidget extends Safir_Widget_Base {
            protected $template_file = 'referencesWidget.php';

            public function __construct() {
                parent::__construct('sfrreferenceswidget', 'Safir Referanslar',
                    array('description' => 'Referanslar'));
            }
        }
        register_widget('SfrReferencesWidget');
    }

    // Advanced Pages Widget
    if (!class_exists('SfrAdvancedPages')) {
        class SfrAdvancedPages extends Safir_Widget_Base {
            protected $template_file = 'advancedPages.php';

            public function __construct() {
                parent::__construct('sfradvancedpages', 'Safir Gelişmiş Sayfalar',
                    array('description' => 'Gelişmiş sayfa listesi'));
            }

            public function widget($args_widget, $instance) {
                global $widgetPlace;

                // Varsayılan değerler
                $title = isset($instance['title']) ? $instance['title'] : '';
                $slogan = isset($instance['slogan']) ? $instance['slogan'] : '';
                $icon = isset($instance['icon']) ? $instance['icon'] : '';
                $color = isset($instance['color']) ? $instance['color'] : '';
                $lineBg = isset($instance['lineBg']) ? $instance['lineBg'] : '';
                $grayBg = isset($instance['grayBg']) ? $instance['grayBg'] : '';
                $scroll = isset($instance['scroll']) ? $instance['scroll'] : 'list';
                $count = isset($instance['count']) ? $instance['count'] : '';
                $exclude = isset($instance['exclude']) ? $instance['exclude'] : '';
                $include = isset($instance['include']) ? $instance['include'] : '';

                // WP_Query args
                $args = array(
                    'post_type' => 'page',
                    'posts_per_page' => -1,
                    'post_status' => 'publish'
                );

                // Template'i yükle
                if (file_exists(get_template_directory() . '/widgets/' . $this->template_file)) {
                    include(get_template_directory() . '/widgets/' . $this->template_file);
                }
            }
        }
        register_widget('SfrAdvancedPages');
    }
}

// ============================================================
// SHORTCODES
// ============================================================

/**
 * Safir shortcode'larını yükle
 */
add_action('init', 'safir_register_shortcodes');
function safir_register_shortcodes() {
    // Gutenberg shortcodes
    $shortcode_file = get_template_directory() . '/lib/safirtema/gutenberg/shortcodes.php';
    if (file_exists($shortcode_file)) {
        include_once($shortcode_file);
    }
}

// ============================================================
// MAINTENANCE MODE BYPASS
// ============================================================

/**
 * Bakım modunu devre dışı bırak
 */
add_filter('safir_maintenance_mode', '__return_false');

// ============================================================
// HELPER FUNCTIONS
// ============================================================

/**
 * Tema versiyonu
 */
function safir_theme_version() {
    $theme = wp_get_theme();
    return $theme->get('Version');
}

/**
 * Debug modu kontrolü
 */
function safir_is_debug() {
    return defined('WP_DEBUG') && WP_DEBUG;
}

/**
 * Tema URL'i
 */
function safir_theme_url($path = '') {
    return get_template_directory_uri() . ($path ? '/' . ltrim($path, '/') : '');
}

/**
 * Tema yolu
 */
function safir_theme_path($path = '') {
    return get_template_directory() . ($path ? '/' . ltrim($path, '/') : '');
}

// ============================================================
// ACTIVATION & DEACTIVATION
// ============================================================

/**
 * Tema aktif edildiğinde
 */
add_action('after_switch_theme', 'safir_theme_activation');
function safir_theme_activation() {
    // Varsayılan ayarları oluştur
    $default_options = array(
        'logo' => '',
        'siteColor' => '#007bff',
        'phone' => '',
        'email' => '',
        'address' => '',
        'footerYazi' => '© ' . date('Y') . ' ' . get_bloginfo('name'),
        'lazyload' => '1',
        'breadcrumb' => 'evet',
        'relatedCount' => '6',
        'hideMobileSidebar' => false,
        'hideMobileFooter' => false,
        'hideMobileFooterBottom' => false,
    );

    $existing_options = get_option("safir_" . SAFIR_THEME_SLUG . "_safirpanel");

    if (!$existing_options) {
        update_option("safir_" . SAFIR_THEME_SLUG . "_safirpanel", $default_options);
    }

    // Flush rewrite rules
    flush_rewrite_rules();
}

/**
 * Tema deaktif edildiğinde
 */
add_action('switch_theme', 'safir_theme_deactivation');
function safir_theme_deactivation() {
    // Temizlik işlemleri
    flush_rewrite_rules();
}

// ============================================================
// LISANSSIZ ÇALIŞMA UYARISI
// ============================================================

add_action('admin_notices', 'safir_custom_functions_notice');
function safir_custom_functions_notice() {
    if (!current_user_can('manage_options')) {
        return;
    }

    ?>
    <div class="notice notice-info">
        <p>
            <strong>Safir Pusula Teması - Özel Fonksiyonlar Aktif</strong><br>
            Tema şifreli dosya yerine özel fonksiyonlarla çalışıyor.
            Tüm temel özellikler çalışmaktadır. Gelişmiş ayarlar için
            <a href="<?php echo admin_url('themes.php?page=safir-theme-settings'); ?>">Tema Ayarları</a>
            sayfasını ziyaret edin.
        </p>
    </div>
    <?php
}

// ============================================================
// ADDITIONAL SETTINGS FOR ADMIN PANEL
// ============================================================

/**
 * Genişletilmiş admin panel ayarları
 */
add_action('admin_init', 'safir_register_additional_settings');
function safir_register_additional_settings() {
    // Sosyal medya ayarları
    $socials = array('facebook', 'twitter', 'instagram', 'youtube', 'linkedin');
    foreach ($socials as $social) {
        register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_' . $social . 'URL');
    }

    // Ek iletişim bilgileri
    $contact_fields = array('contactmail', 'contactphone', 'fax', 'mapIframe', 'contactformshortcode');
    foreach ($contact_fields as $field) {
        register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_' . $field);
    }

    // Footer ayarları
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_footerAboutTitle');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_footerAboutDescription');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_footerMenuTitle');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_footerContactTitle');

    // Görsel ayarları
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_noimageforpost');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_highQualityImages');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_fitImage');

    // Mobil ayarları
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_hideMobileSidebar');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_hideMobileFooter');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_hideMobileFooterBottom');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_hideMobilePhone');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_hideMobileEmail');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_hideMobileSocial');

    // Sayfa ayarları
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_pageCommentsActive');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_singleCommentsActive');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_showTermDesc');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_showShareButtons');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_showTags');

    // WhatsApp ayarları
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_whatsappActive');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_whatsappNumber');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_whatsappMessage');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_whatsappPosition');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_whatsappPerson');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_whatsappProfile');

    // Menü ve navigasyon
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_sidemenuPosition');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_sidebarPosition');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_stickyMenu');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_desktopStickyMenu');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_mobileStickyMenu');

    // Kategoriler ve içerik
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_productCategory');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_subCategories');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_noThumbCats');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_singleBlock');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_listButtonDefault');

    // Script ayarları
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_headerScript');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_footerScript');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_gaScript');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_bodyOpenScript');

    // Stil ve tasarım
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_siteColor1');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_siteColor2');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_linkColor');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_headColor');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_mainFont');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_headFont');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_menuFont');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_contentFont');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_headerHeight');

    // PicHeader ayarları
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_picHeaderImage');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_picHeaderFeatured');

    // Ratio ayarları
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_thumbRatio');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_catThumbRatio');

    // Meta ve SEO
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_meta');
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_favicon');

    // Dil ayarları
    register_setting('safir_theme_settings', SAFIR_THEME_SLUG . '_languages');
}

/**
 * Admin ayarlarını form'dan kaydet
 */
add_action('admin_post_safir_save_settings', 'safir_handle_settings_save');
function safir_handle_settings_save() {
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized');
    }

    check_admin_referer('safir_settings_save');

    $options = get_option("safir_" . SAFIR_THEME_SLUG . "_safirpanel", array());

    // POST verilerini işle
    foreach ($_POST as $key => $value) {
        if (strpos($key, SAFIR_THEME_SLUG . '_') === 0) {
            $clean_key = str_replace(SAFIR_THEME_SLUG . '_', '', $key);

            // Checkbox değerleri
            if (in_array($clean_key, array('lazyload', 'highQualityImages', 'fitImage', 'hideMobileSidebar',
                'hideMobileFooter', 'hideMobileFooterBottom', 'hideMobilePhone', 'hideMobileEmail',
                'hideMobileSocial', 'pageCommentsActive', 'singleCommentsActive', 'showTermDesc',
                'showShareButtons', 'showTags', 'subCategories', 'stickyMenu', 'desktopStickyMenu',
                'mobileStickyMenu', 'picHeaderFeatured'))) {
                $options[$clean_key] = isset($_POST[$key]) ? '1' : '0';
            }
            // URL'ler
            elseif (strpos($clean_key, 'URL') !== false || $clean_key == 'logo' || $clean_key == 'noimageforpost'
                || $clean_key == 'picHeaderImage' || $clean_key == 'favicon') {
                $options[$clean_key] = esc_url_raw($value);
            }
            // Email
            elseif (strpos($clean_key, 'mail') !== false || strpos($clean_key, 'email') !== false) {
                $options[$clean_key] = sanitize_email($value);
            }
            // Textarea (HTML izin ver)
            elseif (in_array($clean_key, array('footerAboutDescription', 'address', 'footerYazi',
                'mapIframe', 'headerScript', 'footerScript', 'gaScript', 'bodyOpenScript'))) {
                $options[$clean_key] = wp_kses_post($value);
            }
            // Sayılar
            elseif (in_array($clean_key, array('logoWidth', 'logoHeight', 'relatedCount', 'headerHeight',
                'productCategory', 'thumbRatio', 'catThumbRatio'))) {
                $options[$clean_key] = intval($value);
            }
            // Renkler
            elseif (strpos($clean_key, 'Color') !== false || strpos($clean_key, 'color') !== false) {
                $options[$clean_key] = sanitize_hex_color($value);
            }
            // Array'ler
            elseif (is_array($value)) {
                $options[$clean_key] = array_map('sanitize_text_field', $value);
            }
            // Diğer text alanlar
            else {
                $options[$clean_key] = sanitize_text_field($value);
            }
        }
    }

    update_option("safir_" . SAFIR_THEME_SLUG . "_safirpanel", $options);

    // Geri yönlendir
    wp_redirect(add_query_arg('settings-updated', 'true', wp_get_referer()));
    exit;
}

// ============================================================
// END OF FILE
// ============================================================
