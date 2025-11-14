<?php
if(!defined('ABSPATH')) exit;

/**
 * SAFIR OPTIONS - CUSTOM VERSION
 * Şifreli safiroptions.php yerine geçer
 */

// Global değişkeni tanımla
global $safirOptions;

// Safir panel ayarlarını yükle
$safirOptions = get_option("safir_" . SAFIR_THEME_SLUG . "_safirpanel");

// Array değilse boş array yap
if (!is_array($safirOptions)) {
    $safirOptions = array();
}

// Filter uygula (eklentiler için)
$safirOptions = apply_filters('safirGetOptions', $safirOptions);

/**
 * Safir Global Icons
 */
global $safirIcons;
$safirIcons = array(
    'arti', 'arrow', 'close', 'email', 'email2', 'facebook', 'instagram',
    'twitter', 'youtube', 'linkedin', 'whatsapp', 'phone', 'phone2',
    'location', 'address', 'map', 'search', 'menu', 'list', 'user',
    'star', 'yildiz', 'heart', 'calendar', 'clock', 'home', 'share',
    'like', 'comment', 'view', 'download', 'upload', 'print',
    'edit', 'delete', 'add', 'minus', 'check', 'times', 'info',
    'warning', 'error', 'success', 'question', 'help', 'settings',
    'id', 'kurumsal', 'urun', 'hizmet', 'referans', 'iletisim',
    'hakkimizda', 'blog', 'duyuru', 'kampanya', 'indirim', 'yeni',
    'populer', 'hit', 'trend', 'favori', 'sepet', 'odeme', 'kargo',
    'iade', 'destek', 'sss', 'kvkk', 'sozlesme', 'gizlilik',
    'cerez', 'kullanim', 'mesafeli', 'iptal', 'cayma', 'fatura',
    'foto', 'video', 'galeri', 'anlasma', 'partner', 'marka',
    'certificate', 'award', 'medal', 'top', 'liste', 'mouse'
);
