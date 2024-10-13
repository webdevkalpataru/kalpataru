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

/* Informasi */
$routes->get('informasi/pengumuman', 'InformasiController::pengumuman');
$routes->get('informasi/peraturankebijakan', 'InformasiController::peraturankebijakan');
$routes->get('informasi/datastatistik', 'InformasiController::datastatistik');

/* Publikasi */
$routes->get('publikasi/berita', 'PublikasiController::berita');
$routes->get('publikasi/artikel', 'PublikasiController::artikel');
$routes->get('publikasi/video', 'PublikasiController::video');
$routes->get('publikasi/buku', 'PublikasiController::buku');
$routes->get('artikel/(:any)', 'PengusulController::detailartikel/$1');


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

    // Route for "Tambah Calon" step 3 (Kegiatan)
    $routes->get('tambahcalonkegiatan', 'PengusulController::tambahCalonKegiatan');
    $routes->post('simpancalonkegiatan', 'PengusulController::simpanCalonKegiatan');

    // Route for "Tambah Calon" step 4 (Dampak)
    $routes->get('tambahcalondampak', 'PengusulController::tambahCalonDampak');
    $routes->post('simpancalondampak', 'PengusulController::simpanCalonDampak');

    // Route for "Tambah Calon" step 5 (PMIK)
    $routes->get('tambahcalonpmik', 'PengusulController::tambahcalonpmik');
    $routes->post('simpancalonpmik', 'PengusulController::simpanCalonPmik');

    // Route for "Tambah Calon" step 6 (Keswadayaan)
    $routes->get('tambahcalonkeswadayaan', 'PengusulController::tambahcalonkeswadayaan');
    $routes->post('simpancalonkeswadayaan', 'PengusulController::simpanCalonKeswadayaan');

    // Route for "Tambah Calon" step 7 (Keistimewaan)
    $routes->get('tambahcalonkeistimewaan', 'PengusulController::tambahcalonkeistimewaan');
    $routes->post('simpancalonkeistimewaan', 'PengusulController::simpanCalonKeistimewaan');

    // Routes usulan saya
    $routes->get('usulansaya', 'PengusulController::usulansaya');
    $routes->get('usulandlhk', 'PengusulController::usulandlhk');
    $routes->get('detailusulansaya/(:num)', 'PengusulController::detailusulansaya/$1');
    $routes->get('detailusulansayaedit/(:num)', 'PengusulController::editUsulan/$1');
    $routes->get('detailusulandlhk', 'PengusulController::detailusulandlhk');

    // Routes artikel
    $routes->get('artikelsaya', 'PengusulController::artikelsaya');
    $routes->get('tambahartikel', 'PengusulController::tambahartikel');
    $routes->post('tambahartikel', 'PengusulController::tambahArtikelAction');
    // $routes->get('artikel/(:any)', 'PengusulController::detailartikel/$1');

    $routes->get('pemberitahuan', 'PengusulController::pemberitahuan');
    $routes->get('alurpendaftaran', 'PengusulController::alurpendaftaran');
    $routes->get('videopanduan', 'PengusulController::videopanduan');
    $routes->get('panduanpendaftaran', 'PengusulController::panduanpendaftaran');
    $routes->get('downloadSuratPengantar/(:any)', 'AuthController::downloadSuratPengantar/$1');

    $routes->get('pdf/(:any)', 'PengusulController::generatePDF/$1');
});

/* Penerima */
$routes->group('penerima', ['filter' => 'auth'], function ($routes) {
    $routes->get('profil', 'PenerimaController::profil');
    $routes->get('tambahartikel', 'PenerimaController::tambahartikel');
    $routes->get('artikelsaya', 'PenerimaController::artikelsaya');
    $routes->get('detailartikelsaya', 'PenerimaController::detailartikelsaya');
});

/* Admin */
$routes->group('admin', function ($routes) {
    $routes->get('dashboard', 'AdminController::dashboard');
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


    $routes->get('bahansidang1', 'TimteknisController::bahansidang1');
    $routes->get('bahansidang2', 'TimteknisController::bahansidang2');
});

/* DPPK */
$routes->group('dppk', function ($routes) {
    $routes->get('datacalonusulan', 'DppkController::datacalonusulan');
    $routes->get('detaildatacalonusulan', 'DppkController::detaildatacalonusulan');

    $routes->get('bahansidang1', 'DppkController::bahansidang1');
    $routes->get('bahansidang2', 'DppkController::bahansidang2');
});
