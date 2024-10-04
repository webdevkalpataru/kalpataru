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
});
// $routes->get('pengusul/profil', 'PengusulController::index');
$routes->get('pengusul/tambahcalon', 'PengusulController::tambahcalon');
$routes->get('pengusul/tambahcalonidentitas', 'PengusulController::tambahcalonidentitas');
$routes->get('pengusul/tambahcalonkegiatan', 'PengusulController::tambahcalonkegiatan');
$routes->get('pengusul/tambahcalonpmik', 'PengusulController::tambahcalonpmik');
$routes->get('pengusul/tambahcalondampak', 'PengusulController::tambahcalondampak');
$routes->get('pengusul/tambahcalonkeswadayaan', 'PengusulController::tambahcalonkeswadayaan');
$routes->get('pengusul/tambahcalonkeistimewaan', 'PengusulController::tambahcalonkeistimewaan');
