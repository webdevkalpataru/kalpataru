<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
/* Public */
$routes->get('/', 'Home::index');
$routes->get('/beranda', 'MainController::beranda');
$routes->get('profil', 'MainController::profil');
$routes->get('kontak', 'MainController::kontak');
$routes->post('kontak/sendEmail', 'KontakController::sendEmail');

/* Informasi */
$routes->get('informasi/pengumuman', 'InformasiController::pengumuman');
$routes->get('informasi/peraturankebijakan', 'InformasiController::peraturankebijakan');
$routes->get('informasi/datastatistik', 'InformasiController::datastatistik');

/* Publikasi */
$routes->get('publikasi/berita', 'PublikasiController::berita');
$routes->get('publikasi/artikel', 'PublikasiController::artikel');
$routes->get('publikasi/video', 'PublikasiController::video');
$routes->get('publikasi/buku', 'PublikasiController::buku');
$routes->get('artikel/(:any)', 'PublikasiController::detailartikel/$1');
$routes->get('berita/(:any)', 'PublikasiController::detailberita/$1');

$routes->get('berita/(:any)', 'PublikasiController::detailberita/$1');



/* Auth Pengusul */
$routes->get('auth/login', 'AuthController::login');
$routes->post('auth/login', 'AuthController::loginAction');
$routes->get('auth/register', 'AuthController::register');
$routes->post('auth/register', 'AuthController::createRegister');
$routes->get('auth/logout', 'AuthController::logoutAction');

/* Auth Internal */
$routes->get('auth/logininternal', 'AuthController::logininternal');
$routes->post('auth/logininternal', 'AuthController::logininternalAction');
$routes->get('auth/registerinternal', 'AuthController::registerinternal');
$routes->post('auth/registerinternal', 'AuthController::createRegisterinternal');
$routes->get('auth/loginadmin', 'AuthController::loginadmin');
$routes->get('auth/logintimteknis', 'AuthController::logintimteknis');
$routes->get('auth/loginddpk', 'AuthController::loginddpk');


/* Pengusul */
$routes->group('pengusul', ['filter' => 'auth'], function ($routes) {
    $routes->get('profil', 'PengusulController::index');
    $routes->post('profil', 'PengusulController::updateProfil');

    // Route for "Tambah Calon" step 1 (Category selection)
    $routes->get('tambahcalon', 'PengusulController::tambahcalon');
    $routes->post('tambahcalon', 'PengusulController::inputKategori'); // Handle category selection form submission

    // Route for "Tambah Calon" step 2 (Identitas)
    $routes->get('tambahcalonidentitas', 'PengusulController::tambahCalonIdentitas');
    $routes->post('simpancalonidentitas', 'PengusulController::simpanCalonIdentitas'); // Handle the form submission

    $routes->post('simpanForm/(:any)', 'PengusulController::simpanForm/$1');
    $routes->get('detailusulansaya/(:num)', 'PengusulController::detailusulansaya/$1');
    $routes->get('detailusulansayaedit/(:num)', 'PengusulController::detailUsulanSayaEdit/$1');


    // Routes usulan saya
    $routes->get('usulansaya', 'PengusulController::usulansaya');
    $routes->get('usulandlhk', 'PengusulController::usulandlhk');
    $routes->get('detailusulandlhk', 'PengusulController::detailusulandlhk');

    // Routes artikel
    $routes->get('artikel-saya', 'PengusulController::artikelsaya');
    $routes->get('tambah-artikel', 'PengusulController::tambahartikel');
    $routes->post('tambah-artikel', 'PengusulController::tambahArtikelAction');
    $routes->get('artikel/(:any)', 'PengusulController::detailartikel/$1');

    $routes->get('pemberitahuan', 'PengusulController::pemberitahuan');
    $routes->get('alurpendaftaran', 'PengusulController::alurpendaftaran');
    $routes->get('videopanduan', 'PengusulController::videopanduan');
    $routes->get('panduanpendaftaran', 'PengusulController::panduanpendaftaran');
    $routes->get('downloadSuratPengantar/(:any)', 'AuthController::downloadSuratPengantar/$1');

    $routes->get('pdf/(:any)', 'PengusulController::generatePDF/$1');
});

$routes->post('pengusul/usulansaya', 'PengusulController::updateStatus');

/* Penerima */
$routes->group('penerima', ['filter' => 'auth'], function ($routes) {
    $routes->get('profil', 'PenerimaController::profil');
    $routes->get('tambahartikel', 'PenerimaController::tambahartikel');
    $routes->get('artikelsaya', 'PenerimaController::artikelsaya');
    $routes->get('detailartikelsaya', 'PenerimaController::detailartikelsaya');
});

/* Admin */
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'AdminController::dashboard');
    $routes->get('akunpengusul', 'AdminController::akunpengusul');
    $routes->get('akundlhk', 'AdminController::akundlhk');
    $routes->get('akuntimteknis', 'AdminController::akuntimteknis');
    $routes->get('daftartimteknis', 'AdminController::daftartimteknis');
    $routes->get('akundppk', 'AdminController::akundppk');
    $routes->get('daftardppk', 'AdminController::daftardppk');
    $routes->get('pengumumanadmin', 'AdminController::pengumumanadmin');
    $routes->get('tambahpengumumanadmin', 'AdminController::tambahpengumumanadmin');
    $routes->get('akunpengguna', 'AdminController::akunpengguna');
    $routes->get('daftarakunpengguna', 'AdminController::daftarakunpengguna');
    $routes->get('daftarakundlhk', 'AdminController::daftarakundlhk');
    $routes->get('video', 'AdminController::video');
    $routes->get('tambahvideo', 'AdminController::tambahvideo');
    $routes->get('buku', 'AdminController::buku');
    $routes->get('tambahbuku', 'AdminController::tambahbuku');
    $routes->get('kebijakan', 'AdminController::kebijakan');

    // Manajemen Artikel
    $routes->get('artikel', 'AdminController::artikeladmin');
    $routes->get('artikelpengguna', 'AdminController::artikelpengguna');
    $routes->get('tambah-artikel', 'AdminController::tambahartikeladmin');
    $routes->post('tambah-artikel', 'AdminController::tambahArtikelAction');
    $routes->get('artikel/edit/(:any)', 'AdminController::editArtikel/$1');
    $routes->post('artikel/edit/(:any)', 'AdminController::updateArtikelAction/$1');
    $routes->get('artikel/(:any)', 'AdminController::detailartikel/$1');
    $routes->post('artikel/hapus/(:num)', 'AdminController::hapusArtikel/$1');
    $routes->post('updatestatus', 'AdminController::updateStatus');

    // Manajemen Berita
    $routes->get('berita', 'AdminController::beritAadmin');
    $routes->get('tambah-berita', 'AdminController::tambahberitaadmin');
    $routes->post('tambah-berita', 'AdminController::tambahBeritaAction');
    $routes->get('berita/edit/(:any)', 'AdminController::editBerita/$1');
    $routes->post('berita/edit/(:any)', 'AdminController::updateBeritaAction/$1');
    $routes->get('berita/(:any)', 'AdminController::detailberita/$1');
    $routes->post('berita/hapus/(:num)', 'AdminController::hapusBerita/$1');
    $routes->post('updatestatusberita', 'AdminController::updateStatusBerita');
});

/* Tim Teknis */
$routes->group('timteknis', function ($routes) {
    $routes->get('datacalonusulan', 'TimteknisController::datacalonusulan');
    $routes->get('detaildatacalonusulan', 'TimteknisController::detaildatacalonusulan');

    $routes->get('verifadminkategoria', 'TimteknisController::verifadminkategoria');
    $routes->get('verifadminkategorib', 'TimteknisController::verifadminkategorib');
    $routes->get('verifadminkategoric', 'TimteknisController::verifadminkategoric');
    $routes->get('verifadminkategorid', 'TimteknisController::verifadminkategorid');
    $routes->post('updatestatus', 'TimteknisController::updateStatus');
    $routes->post('updatecatatan', 'TimteknisController::updateCatatan');


    $routes->get('bahansidang1/kategoria', 'TimteknisController::bahansidang1kategoria');
    $routes->get('bahansidang1/kategorib', 'TimteknisController::bahansidang1kategorib');
    $routes->get('bahansidang1/kategoric', 'TimteknisController::bahansidang1kategoric');
    $routes->get('bahansidang1/kategorid', 'TimteknisController::bahansidang1kategorid');

    $routes->get('bahansidang2/kategoria', 'TimteknisController::bahansidang2kategoria');
    $routes->get('bahansidang2/kategorib', 'TimteknisController::bahansidang2kategorib');
    $routes->get('bahansidang2/kategoric', 'TimteknisController::bahansidang2kategoric');
    $routes->get('bahansidang2/kategorid', 'TimteknisController::bahansidang2kategorid');

    $routes->get('pdf/(:any)', 'PengusulController::generatePDF/$1');
});

/* DPPK */
$routes->group('dppk', function ($routes) {
    $routes->get('datacalonusulan', 'DppkController::datacalonusulan');
    $routes->get('detaildatacalonusulan', 'DppkController::detaildatacalonusulan');

    $routes->get('bahansidang1', 'DppkController::bahansidang1');
    $routes->get('bahansidang2', 'DppkController::bahansidang2');
});