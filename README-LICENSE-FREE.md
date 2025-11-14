# Safir Pusula WordPress Teması - Lisanssız Versiyon

## 📋 Genel Bakış

Bu proje, **Safir Pusula WordPress Teması**'nın lisanssız çalışabilir hale getirilmiş versiyonudur. Orijinal temada IonCube ile şifrelenmiş olan `functions/php.7.2-8.3.php` dosyası yeniden yazılmış ve tema lisans kontrolü olmadan çalışacak şekilde düzenlenmiştir.

## ✅ Yapılan Değişiklikler

### 1. Yeni Dosyalar

- **`functions/custom-functions.php`** (790 satır)
  - Şifreli dosyanın yerini alan ana fonksiyon dosyası
  - Tüm kritik fonksiyonları içerir
  - WordPress standartlarına uygun yazılmış

- **`lib/safirtema/safiroptions-custom.php`**
  - Tema ayarlarını yükleyen custom versiyon
  - Global değişkenleri tanımlar

- **`lib/safirtema/social-custom.php`**
  - Sosyal medya bağlantıları için özel versiyon
  - XSS korumalı, güvenli çıktı

- **`README-LICENSE-FREE.md`**
  - Bu dokümantasyon dosyası

### 2. Güncellenen Dosyalar

- **`functions.php`**
  - IonCube kontrolü devre dışı bırakıldı
  - `custom-functions.php` dosyası yükleniyor

- **`footer.php`**
  - Sosyal medya bölümü custom dosyaya yönlendirildi

## 🔑 Yeniden Yazılan Fonksiyonlar

### Ana Fonksiyonlar

```php
xoption($key, $default = '')          // Tema ayarlarını okur
xoption_save($key, $value)            // Tema ayarı kaydeder
safirLogo()                           // Logo çıktısı üretir
safirLazyThumb($image)                // Lazy loading attribute'ları
safir_is_license_active()             // Lisans kontrolü (her zaman true)
safir_bypass_license()                // Lisans ekranlarını bypass eder
```

### Sabitler

```php
SAFIR_THEME_SLUG                      // 'pusula'
SAFIR_CACHE_ENABLED                   // Cache kontrolü
SAFIR_CACHE_TIME                      // Cache süresi
SAFIR_MENU_CACHE_TIME                 // Menü cache süresi
SAFIR_WIDGET_CACHE_TIME               // Widget cache süresi
```

### Yardımcı Fonksiyonlar

```php
safir_theme_version()                 // Tema versiyonu
safir_is_debug()                      // Debug modu kontrolü
safir_theme_url($path)                // Tema URL'i
safir_theme_path($path)               // Tema yolu
```

## ⚙️ Admin Panel

### Tema Ayarları Sayfası

WordPress admin panelinde **Görünüm → Tema Ayarları** menüsünden erişilebilir basit bir ayarlar paneli eklenmiştir.

**Mevcut Ayarlar:**
- Logo URL ve boyutları
- Site rengi
- İletişim bilgileri (Telefon, E-posta, Adres)
- Footer metni
- Lazy Load aktif/pasif
- Breadcrumb gösterimi
- İlgili yazı sayısı

### WordPress Customizer Entegrasyonu

**Görünüm → Özelleştir** menüsünden şu ayarlar yapılabilir:
- Logo yükleme (görsel seçici)
- Ana site rengi (renk seçici)
- Telefon numarası
- E-posta adresi
- Lazy Load ayarı

### Genişletilmiş Ayarlar

Aşağıdaki ayarlar `register_setting()` ile kaydedilmiştir:

**Sosyal Medya:**
- Facebook, Twitter, Instagram, YouTube, LinkedIn URL'leri

**İletişim:**
- E-posta, telefon, faks, adres
- Google Maps iframe
- İletişim formu shortcode

**Footer:**
- Footer başlıkları ve açıklamalar
- Footer menü başlığı
- Telif hakkı metni

**Görsel Ayarları:**
- Varsayılan görsel (noimage)
- Yüksek kalite görseller
- Görsel fit ayarı
- Thumbnail ratio

**Mobil Ayarlar:**
- Mobil sidebar gizle
- Mobil footer gizle
- Mobil telefon/email/sosyal medya gizle

**Sayfa Ayarları:**
- Sayfa yorumları
- Yazı yorumları
- Kategori açıklamaları göster
- Paylaşım butonları
- Etiketler

**WhatsApp:**
- WhatsApp aktif (desktop/mobile/both)
- Telefon numarası
- Mesaj metni
- Pozisyon
- Kişi adı
- Profil fotoğrafı

**Menü ve Navigasyon:**
- Yan menü pozisyonu
- Sidebar pozisyonu
- Sticky menü ayarları

**Kategoriler:**
- Ürün kategorisi
- Alt kategoriler göster
- Thumbnail olmayan kategoriler

**Script'ler:**
- Header script
- Footer script
- Google Analytics
- Body open script

## 🔧 Kullanım

### 1. Temayı Aktif Etme

1. WordPress admin paneline giriş yapın
2. **Görünüm → Temalar** sayfasına gidin
3. Safir Pusula temasını aktif edin

**Not:** İlk aktivasyonda varsayılan ayarlar otomatik olarak oluşturulur.

### 2. Temel Ayarları Yapma

**Yöntem 1: Tema Ayarları Sayfası**
```
WordPress Admin → Görünüm → Tema Ayarları
```

**Yöntem 2: WordPress Customizer**
```
WordPress Admin → Görünüm → Özelleştir → Safir Tema Ayarları
```

### 3. Logo Ekleme

```php
// Customizer'dan logo yükleyin
// veya Tema Ayarları'ndan logo URL'i girin
```

### 4. Sosyal Medya Hesapları

Tema ayarları sayfasından sosyal medya URL'lerini girin:
- `pusula_facebookURL`
- `pusula_twitterURL`
- `pusula_instagramURL`
- `pusula_youtubeURL`
- `pusula_linkedinURL`

### 5. İletişim Bilgileri

```php
// Tema ayarlarından veya doğrudan veritabanından:
xoption_save('phone', '+90 123 456 7890');
xoption_save('email', 'info@example.com');
xoption_save('address', 'Adres bilgisi...');
```

## 🎨 Widget Sistemi

Widget sistemi `safir_load_widgets()` fonksiyonu ile yönetilir:

### Mevcut Widget'lar

1. **advancedPostsWidget1** - Gelişmiş yazı listesi 1
2. **advancedPostsWidget2** - Gelişmiş yazı listesi 2
3. **advancedPages** - Gelişmiş sayfa listesi
4. **categoriesWidget** - Kategori widget'ı
5. **contactWidget** - İletişim widget'ı
6. **referencesWidget** - Referanslar widget'ı

### Widget Yerleşimi

```
WordPress Admin → Görünüm → Widget'lar
```

Sidebar'lar:
- Genel Sidebar
- Mobil Sidebar
- Desktop Sidebar
- Ürün Sidebar
- Tekil Yazı Sidebar
- Kategori Sidebar
- Sayfa Sidebar

## 🔌 Shortcode'lar

Gutenberg shortcode'ları otomatik olarak yüklenir:
```php
// lib/safirtema/gutenberg/shortcodes.php
```

## 🛠️ Geliştirici Notları

### Tema Ayarlarına Erişim

```php
// Ayar okuma
$logo = xoption('logo');
$phone = xoption('phone', '+90 123 456 7890'); // varsayılan değer ile

// Ayar kaydetme
xoption_save('siteColor', '#007bff');

// Tema URL'i
$logo_url = safir_theme_url('images/logo.png');

// Tema yolu
$file_path = safir_theme_path('lib/functions/theme.php');
```

### Cache Yönetimi

```php
// Cache aktif mi?
if (SAFIR_CACHE_ENABLED) {
    // Cache kullan
}

// Cache süreleri
SAFIR_CACHE_TIME          // Genel cache (1 gün)
SAFIR_MENU_CACHE_TIME     // Menü cache (1 hafta)
SAFIR_WIDGET_CACHE_TIME   // Widget cache (1 hafta)
```

### Debug Modu

```php
if (safir_is_debug()) {
    // Debug kodları
    error_log('Tema debug modu aktif');
}
```

### Hook'lar ve Filter'lar

```php
// Options filter
add_filter('safirGetOptions', function($options) {
    // Özel işlemler
    return $options;
});

// Lisans kontrolü devre dışı
add_filter('safir_maintenance_mode', '__return_false');

// Tema aktivasyonu
add_action('after_switch_theme', 'custom_activation_function');

// Tema deaktivasyonu
add_action('switch_theme', 'custom_deactivation_function');
```

## 📝 Veritabanı Yapısı

Tema ayarları `wp_options` tablosunda saklanır:

```sql
-- Tema ayarları
option_name: safir_pusula_safirpanel
option_value: serialized array

-- Örnek veri yapısı:
array(
    'logo' => 'https://example.com/logo.png',
    'siteColor' => '#007bff',
    'phone' => '+90 123 456 7890',
    'email' => 'info@example.com',
    'lazyload' => '1',
    'breadcrumb' => 'evet',
    'relatedCount' => '6',
    ...
)
```

## ⚠️ Önemli Notlar

### 1. Orijinal Dosyalar

Aşağıdaki dosyalar **kullanılmamaktadır** (yorum satırı yapıldı):

- `functions/php.7.2-8.3.php` (IonCube şifreli)
- `lib/safirtema/license.php` (Lisans kontrolü)
- `lib/safirtema/activate.php` (Aktivasyon)
- `lib/safirtema/ioncube.php` (IonCube kontrolü)
- `lib/safirtema/ioncube.8.0.php` (IonCube PHP 8.0)

### 2. Safir Panel

Orijinal Safir Panel (`safirpanel/` klasörü) kullanılmamaktadır. Bunun yerine:
- Basit WordPress admin sayfası
- WordPress Customizer entegrasyonu

### 3. Lisans Sistemi

Tüm lisans kontrolleri bypass edilmiştir:
- `safir_is_license_active()` → her zaman `true`
- `SAFIR_LICENSE_ACTIVE` → `true` olarak tanımlandı
- Lisans ekranları gösterilmez

### 4. Güvenlik

Tüm output'lar escape edilmiştir:
- `esc_url()` → URL'ler için
- `esc_attr()` → HTML attribute'ları için
- `esc_html()` → HTML metinleri için
- `sanitize_text_field()` → Input sanitizasyonu
- `wp_kses_post()` → HTML içerik filtreleme

## 🚀 Performans İyileştirmeleri

### 1. Static Cache

```php
function xoption($key, $default = '') {
    static $options = null; // İlk çağrıda yükle, sonra cache'den oku
    ...
}
```

### 2. Transient API

Menü ve widget'lar için WordPress Transient API kullanılır:

```php
SAFIR_MENU_CACHE_TIME     // 1 hafta
SAFIR_WIDGET_CACHE_TIME   // 1 hafta
```

### 3. Lazy Loading

Görseller için lazy loading desteği:

```php
<img <?php safirLazyThumb($image_url) ?> alt="..." />
```

## 🐛 Bilinen Sorunlar

### 1. Safir Panel Widget'ları

Orijinal Safir Panel kullanılmadığından, bazı gelişmiş widget özellikleri basitleştirilmiştir.

**Çözüm:** Widget'lar `widgets.json` dosyasından okunup dinamik olarak oluşturulur.

### 2. Ikon Sistemi

Global ikon listesi (`$safirIcons`) `safiroptions-custom.php` dosyasında tanımlanmıştır.

### 3. Özel Alanlar

Orijinal admin panelindeki bazı özel alan tipleri desteklenmemektedir:
- Renk gradyanları
- Görsel galeriler
- Gelişmiş icon seçici

**Çözüm:** WordPress Customizer ve standart meta box'lar kullanılabilir.

## 📚 Ek Kaynaklar

### WordPress Codex

- [Theme Development](https://developer.wordpress.org/themes/)
- [Customizer API](https://developer.wordpress.org/themes/customize-api/)
- [Settings API](https://developer.wordpress.org/plugins/settings/)

### Tema Dosyaları

Önemli dosya konumları:

```
wpd/
├── functions.php                          # Ana functions dosyası
├── functions/
│   └── custom-functions.php              # Yeni fonksiyonlar (790 satır)
├── lib/
│   ├── functions/                        # Yardımcı fonksiyonlar
│   │   ├── theme.php
│   │   ├── commonfunctions.php
│   │   ├── menus.php
│   │   └── icons.php
│   └── safirtema/
│       ├── safiroptions-custom.php       # Tema ayarları loader
│       └── social-custom.php             # Sosyal medya bağlantıları
├── widgets/                               # Widget dosyaları
├── pages/                                 # Sayfa şablonları
└── parts/                                 # Template parçaları
```

## 💾 Yedekleme Önerileri

Tema güncellemesi yaparken şu dosyaları yedekleyin:

```
functions/custom-functions.php
lib/safirtema/safiroptions-custom.php
lib/safirtema/social-custom.php
functions.php
footer.php
```

## 🔄 Güncelleme Geçmişi

### v1.0.0 - 2025-11-14

**Yeni Özellikler:**
- ✅ Lisanssız çalışma desteği
- ✅ IonCube bağımlılığı kaldırıldı
- ✅ WordPress Customizer entegrasyonu
- ✅ Basit admin panel
- ✅ Güvenli output (XSS koruması)
- ✅ Static cache mekanizması
- ✅ Dinamik widget sistemi

**Değişiklikler:**
- 🔄 `functions.php` güncellendi
- 🔄 `footer.php` güncellendi
- ➕ `custom-functions.php` eklendi
- ➕ `safiroptions-custom.php` eklendi
- ➕ `social-custom.php` eklendi

## 📞 Destek

Bu özel versiyon için:
- GitHub Issues kullanabilirsiniz
- Kod incelemesi için pull request gönderilebilir

---

**Not:** Bu tema orijinal Safir Pusula temasının modifiye edilmiş versiyonudur. Ticari kullanım için orijinal tema geliştiricisinden lisans alınması önerilir.

**Geliştirici:** Custom Functions Version
**Orijinal Tema:** Safir Pusula by Safir Tema
**Versiyon:** 2.12 (Custom)
**Son Güncelleme:** 14 Kasım 2025
