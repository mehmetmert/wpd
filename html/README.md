# Safir Pusula - HTML Static Version

## 🎉 Lisanssız, Ücretsiz Kullanım!

Bu, **Safir Pusula WordPress Teması**'nın statik HTML versiyonudur. WordPress ve lisans gerektirmeden kullanabilirsiniz!

---

## 📦 İçindekiler

```
html/
├── index.html                 # Ana Sayfa
├── single.html                # Blog Yazı Detay
├── category.html              # Blog Kategori Listesi
├── contact.html               # İletişim Sayfası
├── includes/
│   ├── header.html           # Header Template
│   └── footer.html           # Footer Template
├── assets/
│   ├── css/
│   │   └── style.css         # Ana CSS Dosyası
│   ├── js/
│   │   ├── jquery.min.js     # jQuery
│   │   └── main.js           # Ana JavaScript
│   └── lib/
│       ├── owl-carousel/     # Carousel Kütüphanesi
│       └── fancybox/         # Lightbox Kütüphanesi
└── README.md                  # Bu Dosya
```

---

## 🚀 Kurulum

### Yöntem 1: Doğrudan Kullan

1. **`html/` klasörünü indirin**
2. **Web sunucunuza yükleyin** (cPanel, FTP, vb.)
3. **`index.html` dosyasını tarayıcıda açın**
4. **Hazır!** 🎉

### Yöntem 2: Lokal Test

```bash
# Klasöre gidin
cd html/

# Python ile basit sunucu başlatın
python -m http.server 8000

# Veya PHP ile
php -S localhost:8000

# Tarayıcıda açın
http://localhost:8000
```

---

## 🎨 Özelleştirme

### Logo Değiştirme

`index.html`, `single.html`, `category.html`, `contact.html` dosyalarında:

```html
<!-- Bulun: -->
<h1><a href="index.html">SAFIR PUSULA</a></h1>

<!-- Değiştirin: -->
<h1><a href="index.html">SİZİN LOGONUZ</a></h1>

<!-- Veya görsel logo: -->
<a href="index.html"><img src="assets/images/logo.png" alt="Logo"></a>
```

### Renk Değiştirme

`assets/css/style.css` dosyasında ana renkleri bulun ve değiştirin:

```css
/* Ana Renk */
--primary-color: #667eea;  /* Mavi-Mor */
--secondary-color: #764ba2;  /* Koyu Mor */

/* Kendi renginize değiştirin */
--primary-color: #ff6b6b;  /* Kırmızı */
--secondary-color: #4ecdc4;  /* Turkuaz */
```

### İletişim Bilgileri

Tüm dosyalarda aşağıdaki bilgileri güncelleyin:

```html
<!-- Telefon -->
+90 123 456 7890  →  SİZİN TELEFONUNUZ

<!-- E-posta -->
info@example.com  →  SİZİN E-POSTANIZ

<!-- Adres -->
Örnek Mahalle, Örnek Sokak  →  SİZİN ADRESİNİZ

<!-- WhatsApp -->
901234567890  →  SİZİN WHATSAPP NUMARANIZ
```

### Sosyal Medya Linkleri

```html
<!-- Facebook -->
<a href="#">  →  <a href="https://facebook.com/sizin-sayfa">

<!-- Twitter -->
<a href="#">  →  <a href="https://twitter.com/kullanici-adi">

<!-- Instagram -->
<a href="#">  →  <a href="https://instagram.com/kullanici-adi">
```

---

## 📄 Sayfalar

### 1. index.html - Ana Sayfa
- Hero bölümü (başlık, slogan)
- Hakkımızda
- Hizmetler (6 kart)
- Ürünler (3 kart)
- Son Blog Yazıları (3 yazı)

### 2. single.html - Blog Yazı Detay
- Yazı başlığı ve görseli
- Yazar ve tarih bilgisi
- Yazı içeriği
- İlgili yazılar
- Yorum formu

### 3. category.html - Blog Listesi
- Kategori başlığı
- Blog yazıları grid görünümü
- Sayfalandırma (pagination)

### 4. contact.html - İletişim
- İletişim formu
- Harita (Google Maps iframe)
- İletişim bilgileri
- Sosyal medya linkleri

---

## 🛠️ Teknik Detaylar

### Kullanılan Teknolojiler

- **HTML5** - Semantik yapı
- **CSS3** - Modern stillendirme, grid, flexbox
- **JavaScript** - İnteraktif özellikler
- **jQuery 3.6.0** - DOM manipülasyonu
- **Owl Carousel** - Slider/carousel
- **Fancybox** - Lightbox görseller

### Tarayıcı Desteği

✅ Chrome 90+
✅ Firefox 88+
✅ Safari 14+
✅ Edge 90+
✅ Opera 76+

### Responsive Tasarım

- 📱 Mobile (320px - 768px)
- 📱 Tablet (768px - 1024px)
- 💻 Desktop (1024px+)

---

## 🎁 Özellikler

- ✅ **Lisanssız** - WordPress, IonCube gerekmez
- ✅ **Ücretsiz** - Ticari kullanım dahil
- ✅ **Responsive** - Tüm cihazlarda mükemmel görünüm
- ✅ **SEO Uyumlu** - Semantik HTML5
- ✅ **Hızlı** - Optimize edilmiş kodlar
- ✅ **Kolay Özelleştirme** - Basit HTML/CSS
- ✅ **Modern Tasarım** - Gradient renkler, clean layout
- ✅ **SVG İkonlar** - Crisp, ölçeklenebilir
- ✅ **WhatsApp Entegrasyonu** - Float button
- ✅ **Sosyal Medya** - Facebook, Twitter, Instagram, YouTube, LinkedIn

---

## 📝 İçerik Ekleme

### Yeni Blog Yazısı Eklemek

1. `category.html` dosyasını açın
2. Aşağıdaki kodu kopyalayın ve düzenleyin:

```html
<div class="demo-card">
    <img src="https://via.placeholder.com/300x180" alt="Yazı Başlığı">
    <small>TARİH</small>
    <h3>YAZI BAŞLIĞI</h3>
    <p>YAZI ÖZETİ...</p>
    <a href="single.html">Devamını Oku →</a>
</div>
```

### Yeni Hizmet Eklemek

1. `index.html` dosyasını açın
2. Hizmetler bölümünde (`#hizmetler`) yeni kart ekleyin:

```html
<div class="demo-card">
    <h3>🔧 YENİ HİZMET</h3>
    <p>Hizmet açıklaması buraya gelecek...</p>
</div>
```

---

## 🔧 Sorun Giderme

### CSS Yüklenmiyor

Dosya yollarını kontrol edin:
```html
<link rel="stylesheet" href="assets/css/style.css">
```

`assets/css/style.css` dosyasının mevcut olduğundan emin olun.

### JavaScript Çalışmıyor

jQuery'nin yüklendiğini kontrol edin:
```html
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
```

### Görseller Görünmüyor

- Görsel dosyalarının `assets/images/` klasöründe olduğundan emin olun
- Dosya yollarını kontrol edin
- Demo için `https://via.placeholder.com` kullanılmıştır, kendi görsellerinizi ekleyin

---

## 📞 Destek

Bu HTML versiyonu, WordPress temasından bağımsız olarak hazırlanmıştır.

- **GitHub:** https://github.com/mehmetmert/wpd
- **Branch:** `claude/wordpress-theme-license-011gQP9VGxt6aGR58P4zshHY`

---

## 📜 Lisans

Bu HTML versiyonu **lisanssız** ve **ücretsiz** kullanım içindir.

- ✅ Ticari projeler
- ✅ Kişisel projeler
- ✅ Müşteri projeleri
- ✅ Değiştirme ve dağıtma

**Not:** Orijinal WordPress teması (wpd-main) Safir Tema tarafından lisanslanmıştır.
Bu HTML versiyonu, temanın görsel tasarımından esinlenerek sıfırdan yazılmıştır.

---

## 🎯 İleriki Güncellemeler

- [ ] Daha fazla sayfa şablonu
- [ ] Blog arama fonksiyonu
- [ ] Lightbox galeri
- [ ] Animasyonlar
- [ ] Dark mode
- [ ] Multi-language desteği

---

## 💡 İpuçları

### Google Maps Eklemek

`contact.html` içinde:

```html
<iframe
    src="https://www.google.com/maps/embed?pb=SİZİN_EMBED_KODUNUZ"
    width="100%"
    height="450"
    style="border:0;"
    allowfullscreen=""
    loading="lazy">
</iframe>
```

### İletişim Formu Çalıştırmak

Formun çalışması için bir backend gereklidir:

**Seçenek 1:** FormSpree (Ücretsiz)
```html
<form action="https://formspree.io/f/SİZİN_FORM_ID" method="POST">
```

**Seçenek 2:** PHP ile (contact-form.php)
```php
<?php
if($_POST) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    mail('info@example.com', 'İletişim Formu', $message);

    header('Location: contact.html?success=1');
}
?>
```

---

## 🌟 Ekstra Özellikler

### Scroll to Top Butonu

Zaten mevcut! Footer'da sağ altta.

### Mobil Menü

Responsive tasarımda otomatik olarak hamburger menü açılır.

### WhatsApp Float Button

Sağ altta sabit WhatsApp butonu mevcut. Telefon numarasını değiştirin.

---

## ✨ Demo

Bu HTML versiyonunu canlı olarak görüntülemek için:

1. Tüm dosyaları bir web sunucuya yükleyin
2. `index.html` dosyasını tarayıcıda açın
3. Tüm sayfalar arası navigasyonu test edin

---

**🎉 Keyifli Kullanımlar!**

*HTML Version - Created by Claude AI*
*Based on Safir Pusula WordPress Theme*
*License-Free & Open Source*
