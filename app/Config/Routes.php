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
$routes->get('informasi/peraturan-kebijakan', 'InformasiController::peraturan');
$routes->get('informasi/datastatistik', 'InformasiController::datastatistik');
$routes->get('pengumuman/(:any)', 'InformasiController::detailpengumuman/$1');


/* Publikasi */
$routes->get('publikasi/berita', 'PublikasiController::berita');
$routes->get('berita/(:any)', 'PublikasiController::detailberita/$1');
$routes->get('publikasi/artikel', 'PublikasiController::artikel');
$routes->get('artikel/(:any)', 'PublikasiController::detailartikel/$1');
$routes->get('publikasi/video', 'PublikasiController::video');
$routes->get('publikasi/buku', 'PublikasiController::buku');



/* Auth Pengusul */
$routes->get('auth/login', 'AuthController::login');
$routes->post('auth/login', 'AuthController::loginAction');
$routes->get('auth/register', 'AuthController::register');
$routes->post('auth/register', 'AuthController::createRegister');
$routes->get('auth/logout', 'AuthController::logoutAction');
$routes->get('logout', 'AuthController::logoutAction');

/* Auth Internal */
$routes->get('auth/logininternal', 'AuthController::logininternal');
$routes->post('auth/logininternal', 'AuthController::logininternalAction');
$routes->get('auth/registerinternal', 'AuthController::registerinternal');
$routes->post('auth/registerinternal', 'AuthController::createRegisterinternal');
$routes->get('auth/loginadmin', 'AuthController::loginadmin');
$routes->get('auth/logintimteknis', 'AuthController::logintimteknis');
$routes->get('auth/logindppk', 'AuthController::logindppk');


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
    $routes->get('detailusulansayaedit/(:num)', 'PengusulController::detailUsulanSayaEdit/$1');

    // --------------------------

    // Routes usulan saya
    $routes->get('usulansaya', 'PengusulController::usulansaya');
    $routes->get('usulandlhk', 'PengusulController::usulandlhk');
    $routes->get('detailusulansaya/(:num)', 'PengusulController::detailusulansaya/$1');
    $routes->get('detailusulandlhk', 'PengusulController::detailusulandlhk');

    // Routes update status
    $routes->post('usulansaya', 'PengusulController::updateStatus');

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

    //pengusul
    $routes->get('akunpengusul', 'AdminController::akunpengusul');

    //dlhk
    $routes->get('akundlhk', 'AdminController::akundlhk');
    $routes->get('daftarakundlhk', 'AdminController::daftarakundlhk');
    $routes->get('daftarakundlhk', 'AuthController::registerDLHK');
    $routes->post('daftarakundlhk', 'AuthController::createRegisterDLHK');

    //timteknis
    $routes->get('akuntimteknis', 'AdminController::akuntimteknis');
    $routes->get('daftartimteknis', 'AuthController::registerTimTeknis');
    $routes->post('daftartimteknis', 'AuthController::createRegisterTimTeknis');

    //dppk
    $routes->get('akundppk', 'AdminController::akundppk');
    $routes->get('daftardppk', 'AdminController::daftardppk');
    $routes->get('daftardppk', 'AuthController::registerDPPK');
    $routes->post('daftardppk', 'AuthController::createRegisterDPPK');

    //pengguna
    $routes->get('akunpengguna', 'AdminController::akunpengguna');
    $routes->get('daftarakunpengguna', 'AdminController::daftarakunpengguna');
    $routes->get('daftarakunpengguna', 'AuthController::registerPenerima');
    $routes->post('daftarakunpengguna', 'AuthController::createRegisterPenerima');

    //Pengumuman
    $routes->get('pengumumanadmin', 'AdminController::pengumumanadmin');
    $routes->get('tambahpengumumanadmin', 'AdminController::tambahpengumumanadmin');
    
    // Manajemen Buku
    $routes->get('buku', 'AdminController::buku');
    $routes->get('tambahbuku', 'AdminController::tambahbuku');

    // Manajemen Kebijakan
    $routes->get('kebijakan', 'AdminController::kebijakan');

    // Manajemen Akun Pengusul
    $routes->get('pengusul', 'AdminController::akunpengusul');
    $routes->post('pengusul/hapus/(:num)', 'AdminController::hapusPengusul/$1');
    $routes->post('updatepengusul', 'AdminController::updatePengusul');
    $routes->get('pengusul/detail/(:any)', 'AdminController::detailPengusul/$1');
    $routes->get('download/suratpengantar/(:segment)', 'AdminController::downloadSuratPengantar/$1');

    // Manajemen Akun Pengusul
    $routes->get('pengusul', 'AdminController::akunpengusul');
    $routes->post('pengusul/hapus/(:num)', 'AdminController::hapusPengusul/$1');
    $routes->post('updatepengusul', 'AdminController::updatePengusul');
    $routes->get('pengusul/detail/(:any)', 'AdminController::detailPengusul/$1');
    $routes->get('download/suratpengantar/(:segment)', 'AdminController::downloadSuratPengantar/$1');

    // Manajemen Artikel
    $routes->get('artikel', 'AdminController::artikeladmin');
    $routes->get('tambah-artikel', 'AdminController::tambahartikeladmin');
    $routes->post('tambah-artikel', 'AdminController::tambahArtikelAction');
    $routes->get('artikel/edit/(:any)', 'AdminController::editArtikel/$1');
    $routes->post('artikel/edit/(:any)', 'AdminController::updateArtikelAction/$1');
    $routes->get('artikel/(:any)', 'AdminController::detailartikel/$1');
    $routes->post('artikel/hapus/(:num)', 'AdminController::hapusArtikel/$1');
    $routes->post('updatestatus', 'AdminController::updateStatus');

    // Manajemen Berita
    $routes->get('berita', 'AdminController::beritaAdmin');
    $routes->get('tambah-berita', 'AdminController::tambahberitaadmin');
    $routes->post('tambah-berita', 'AdminController::tambahBeritaAction');
    $routes->get('berita/edit/(:any)', 'AdminController::editBerita/$1');
    $routes->post('berita/edit/(:any)', 'AdminController::updateBeritaAction/$1');
    $routes->get('berita/(:any)', 'AdminController::detailberita/$1');
    $routes->post('berita/hapus/(:num)', 'AdminController::hapusBerita/$1');
    $routes->post('updatestatusberita', 'AdminController::updateStatusBerita');

    // Manajemen Pengumuman
    $routes->get('pengumuman', 'AdminController::pengumumanadmin');
    $routes->get('tambah-pengumuman', 'AdminController::tambahpengumuman');
    $routes->post('tambah-pengumuman', 'AdminController::tambahPengumumanAction');
    $routes->get('pengumuman/edit/(:any)', 'AdminController::editPengumuman/$1');
    $routes->post('pengumuman/edit/(:any)', 'AdminController::updatePengumumanAction/$1');
    $routes->get('pengumuman/(:any)', 'AdminController::detailpengumuman/$1');
    $routes->post('pengumuman/hapus/(:num)', 'AdminController::hapusPengumuman/$1');
    $routes->post('updatestatuspengumuman', 'AdminController::updateStatusPengumuman');

    // Manajemen Video
    $routes->get('video', 'AdminController::videoAdmin');
    $routes->get('tambah-video', 'AdminController::tambahvideo');
    $routes->post('tambah-video', 'AdminController::tambahVideoAction');
    $routes->get('video/edit/(:any)', 'AdminController::editVideo/$1');
    $routes->post('video/edit/(:any)', 'AdminController::updateVideoAction/$1');
    $routes->get('video/(:any)', 'AdminController::detailvideo/$1');
    $routes->post('video/hapus/(:num)', 'AdminController::hapusVideo/$1');
    $routes->post('updatestatusvideo', 'AdminController::updateStatusVideo');

    // Manajemen Buku Kalpataru
    $routes->get('buku-kalpataru', 'AdminController::bukuAdmin');
    $routes->get('tambah-buku', 'AdminController::tambahbuku');
    $routes->post('tambah-buku', 'AdminController::tambahBukuAction');
    $routes->get('buku-kalpataru/edit/(:any)', 'AdminController::editBuku/$1');
    $routes->post('buku-kalpataru/edit/(:any)', 'AdminController::updateBukuAction/$1');
    $routes->get('buku-kalpataru/(:any)', 'AdminController::detailBuku/$1');
    $routes->post('buku-kalpataru/hapus/(:num)', 'AdminController::hapusBuku/$1');
    $routes->post('updatestatusbuku', 'AdminController::updateStatusBuku');

    // Manajemen Peraturan dan Kebijakan
    $routes->get('peraturan-kebijakan', 'AdminController::peraturanadmin');
    $routes->get('peraturan-kebijakan/tambah', 'AdminController::tambahperaturan');
    $routes->post('peraturan-kebijakan/tambah', 'AdminController::tambahPeraturanAction');
    $routes->get('peraturan-kebijakan/edit/(:any)', 'AdminController::editPeraturan/$1');
    $routes->post('peraturan-kebijakan/edit/(:any)', 'AdminController::updatePeraturanAction/$1');
    $routes->get('peraturan-kebijakan/(:any)', 'AdminController::detailperaturan/$1');
    $routes->post('peraturan-kebijakan/hapus/(:num)', 'AdminController::hapusPeraturan/$1');
    $routes->post('updatestatusperaturan', 'AdminController::updateStatusPeraturan');
});

/* Tim Teknis */
$routes->group('timteknis', ['filter' => 'auth'], function ($routes) {
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
});

/* DPPK */
$routes->group('dppk', ['filter' => 'auth'], function ($routes) {
    $routes->get('datacalonusulan', 'DppkController::datacalonusulan');
    $routes->get('detaildatacalonusulan', 'DppkController::detaildatacalonusulan');

    $routes->get('bahansidang1', 'DppkController::bahansidang1');
    $routes->get('bahansidang2', 'DppkController::bahansidang2');
});
