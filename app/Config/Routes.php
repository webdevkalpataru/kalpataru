<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/beranda', 'MainController::beranda');
$routes->get('profil', 'MainController::profil');
$routes->get('kontak', 'MainController::kontak');

$routes->get('auth/login', 'AuthController::login');
$routes->post('auth/login', 'AuthController::loginAction');
$routes->get('auth/register', 'AuthController::register');
$routes->post('auth/register', 'AuthController::createRegister');
$routes->get('/auth/logout', 'AuthController::logoutAction');


$routes->get('informasi/pengumuman', 'InformasiController::pengumuman');
$routes->get('informasi/peraturankebijakan', 'InformasiController::peraturankebijakan');
$routes->get('informasi/datastatistik', 'InformasiController::datastatistik');

$routes->get('publikasi/berita', 'PublikasiController::berita');
$routes->get('publikasi/artikel', 'PublikasiController::artikel');
$routes->get('publikasi/video', 'PublikasiController::video');
$routes->get('publikasi/buku', 'PublikasiController::buku');

$routes->group('pengusul', ['filter' => 'auth'], function ($routes) {
    $routes->get('profil', 'PengusulController::index');
    $routes->post('profil', 'PengusulController::updateProfil');

    // Route for "Tambah Calon" step 1 (Category selection)
    $routes->get('tambahcalon', 'PengusulController::tambahcalon');
    $routes->post('tambahcalon', 'PengusulController::inputKategori'); // Handle category selection form submission

    // Route for "Tambah Calon" step 2 (Identitas)
    $routes->get('tambahcalonidentitas', 'PengusulController::tambahcalonidentitas');
    $routes->post('tambahcalonidentitas', 'PengusulController::inputIdentitas'); // Handle the form submission

    // Route for "Tambah Calon" step 3 (Kegiatan)
    $routes->get('tambahcalonkegiatan', 'PengusulController::tambahcalonkegiatan');
    $routes->post('tambahcalonkegiatan', 'PengusulController::tambahcalonkegiatan');

    // Route for "Tambah Calon" step 4 (PMIK)
    $routes->get('tambahcalonpmik', 'PengusulController::tambahcalonpmik');
    $routes->post('tambahcalonpmik', 'PengusulController::tambahcalonpmik');

    // Route for "Tambah Calon" step 5 (Dampak)
    $routes->get('tambahcalondampak', 'PengusulController::tambahcalondampak');
    $routes->post('tambahcalondampak', 'PengusulController::tambahcalondampak');

    // Route for "Tambah Calon" step 6 (Keswadayaan)
    $routes->get('tambahcalonkeswadayaan', 'PengusulController::tambahcalonkeswadayaan');
    $routes->post('tambahcalonkeswadayaan', 'PengusulController::tambahcalonkeswadayaan');

    // Route for "Tambah Calon" step 7 (Keistimewaan)
    $routes->get('tambahcalonkeistimewaan', 'PengusulController::tambahcalonkeistimewaan');
    $routes->post('tambahcalonkeistimewaan', 'PengusulController::tambahcalonkeistimewaan');

    // Other routes related to Pengusul
    $routes->get('usulansaya', 'PengusulController::usulansaya');
    $routes->get('usulandlhk', 'PengusulController::usulandlhk');
    $routes->get('detailusulansaya', 'PengusulController::detailusulansaya');
    $routes->get('detailusulandlhk', 'PengusulController::detailusulandlhk');
    $routes->get('tambahartikel', 'PengusulController::tambahartikel');
    $routes->post('tambahartikel', 'PengusulController::tambahArtikelAction');
    $routes->get('artikelsaya', 'PengusulController::artikelsaya');
    $routes->get('detailartikelsaya', 'PengusulController::detailartikelsaya');

    $routes->get('pemberitahuan', 'PengusulController::pemberitahuan');
    $routes->get('alurpendaftaran', 'PengusulController::alurpendaftaran');
    $routes->get('videopanduan', 'PengusulController::videopanduan');
    $routes->get('panduanpendaftaran', 'PengusulController::panduanpendaftaran');
    $routes->get('downloadSuratPengantar/(:any)', 'AuthController::downloadSuratPengantar/$1');
});

$routes->group('penerima', ['filter' => 'auth'], function ($routes) {
    $routes->get('profil', 'PenerimaController::profil');
    $routes->get('tambahartikel', 'PenerimaController::tambahartikel');
    $routes->get('artikelsaya', 'PenerimaController::artikelsaya');
    $routes->get('detailartikelsaya', 'PenerimaController::detailartikelsaya');
});
