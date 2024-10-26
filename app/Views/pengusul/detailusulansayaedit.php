<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <?= $this->extend('template/navbarfooter') ?>

    <?= $this->section('content') ?>

    <div class="flex flex-col lg:flex-row justify-center m-4">
        <?= $this->include('template/sidebarpengusul') ?>

        <div class="relative flex flex-col w-full max-w-5xl mb-4 rounded-xl border-2 border-primary bg-white shadow-md lg:p-8 p-4">
            <h4 class="block text-xl font-bold text-slate-800 mb-2">
                Detail Usulan Saya
            </h4>
            <h2 class="text-md font-bold text-primary mb-4"><?= $pendaftaran['nama']; ?></h2>

            <div class="flex flex-col md:flex-row items-start space-x-0 md:space-x-4 space-y-4 md:space-y-0">
                <!-- Left side: Buttons -->
                <div class="flex flex-col w-full md:w-auto">
                    <button id="identitasButton" class="w-full btn-section md:w-40 rounded-md py-2 px-4 text-center text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none text-sm" type="button"
                        data-target="identitas-calon">Identitas Calon</button>
                    <button id="kegiatanButton" class="mt-2 w-full btn-section md:w-40 rounded-md py-2 px-4 text-center text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none text-sm" type="button"
                        data-target="kegiatan">Kegiatan Calon</button>
                    <button id="dampakButton" class="mt-2 w-full btn-section md:w-40 rounded-md py-2 px-4 text-center text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none text-sm" type="button"
                        data-target="dampak">Dampak</button>
                    <button id="pmikButton" class="mt-2 w-full btn-section md:w-40 rounded-md py-2 px-4 text-center text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none text-sm" type="button"
                        data-target="pmik">PMIK</button>
                    <button id="keswadayaanButton" class="mt-2 w-full btn-section md:w-40 rounded-md py-2 px-4 text-center text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none text-sm" type="button"
                        data-target="keswadayaan">Keswadayaan dan Kebudayaan</button>
                    <button id="keistimewaanButton" class="mt-2 w-full btn-section md:w-40 rounded-md py-2 px-4 text-center text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none text-sm" type="button" data-target="keistimewaan">Keistimewaan</button>

                    <!-- Button Kembali ke Usulan Saya -->
                    <button onclick="window.location.href='/pengusul/usulansaya'"
                        class="text-sm font-bold text-gray-600 no-underline focus:outline-none text-start mt-6">
                        <span class="font-bold text-lg items-center">←</span> Kembali
                    </button>
                </div>

                <!-- Right side: Form inside a card -->
                <?php if ($pendaftaran['kategori'] === 'Penyelamat Lingkungan'): ?>
                    <div id="identitas-calon" class="form-section flex flex-col w-full md:w-3/4 rounded-lg border-2 border-gray-300 bg-white shadow-lg p-6">
                        <form id="identitasc" action="<?= base_url('pengusul/simpanForm/identitasc'); ?>" class="mb-2 w-full" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="id_pendaftaran" value="<?= $pendaftaran['id_pendaftaran'] ?>">
                            <p class="font-semibold mb-2 text-md text-primary underline">Data Kelompok/ Komunitas</p>

                            <div class="w-full mb-2">
                                <label class="block mb-2 text-sm text-black">Nama Kelompok</label>
                                <input type="text" name="nama_kelompok" value="<?= isset($identitasc['nama_kelompok']) ? $identitasc['nama_kelompok'] : ''; ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full mb-2">
                                <label class="block mb-2 text-sm text-black">Tahun Berdiri Kelompok</label>
                                <input type="date" name="tahun_pembentukan" value="<?= isset($identitasc['tahun_pembentukan']) ? $identitasc['tahun_pembentukan'] : ''; ?>" min="0" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full mb-2">
                                <label class="block mb-2 text-sm text-black">Jumlah Anggota</label>
                                <input type="number" name="jumlah_anggota" value="<?= isset($identitasc['jumlah_anggota']) ? $identitasc['jumlah_anggota'] : ''; ?>" min="1" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full mb-2">
                                <label class="block mb-2 text-sm text-black">Jalan</label>
                                <input type="text" name="jalan" value="<?= isset($identitasc['jalan']) ? $identitasc['jalan'] : ''; ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full mb-2">
                                <label class="block mb-2 text-sm text-black">RT/RW</label>
                                <input type="text" name="rt_rw" value="<?= isset($identitasc['rt_rw']) ? $identitasc['rt_rw'] : ''; ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full mb-2">
                                <label class="block mb-2 text-sm text-black">Desa/Kelurahan</label>
                                <input type="text" name="desa" value="<?= isset($identitasc['desa']) ? $identitasc['desa'] : ''; ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full mb-2">
                                <label class="block mb-2 text-sm text-black">Kecamatan</label>
                                <input type="text" name="kecamatan" value="<?= isset($identitasc['kecamatan']) ? $identitasc['kecamatan'] : ''; ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full mb-2">
                                <label class="block mb-2 text-sm text-black">Kab/Kota</label>
                                <input type="text" name="kab_kota" value="<?= isset($identitasc['kab_kota']) ? $identitasc['kab_kota'] : ''; ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full mb-2">
                                <label class="block mb-2 text-sm text-black">Provinsi</label>
                                <input type="text" name="provinsi" value="<?= isset($identitasc['provinsi']) ? $identitasc['provinsi'] : ''; ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full mb-2">
                                <label class="block mb-2 text-sm text-black">Kode Pos</label>
                                <input type="text" name="kode_pos" value="<?= isset($identitasc['kode_pos']) ? $identitasc['kode_pos'] : ''; ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full mb-4">
                                <label class="block mb-2 text-sm text-black">Media Sosial</label>
                                <input name="sosial_media" value="<?= isset($identitasc['sosial_media']) ? $identitasc['sosial_media'] : ''; ?>" type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full mb-2">
                                <label class="block mb-2 text-sm text-black">Surat Legalitas : <?php if (!empty($pendaftaran['legalitas'])): ?>
                                        <?= esc($pendaftaran['legalitas']) ?>
                                    <?php endif; ?><span class="text-primary">(.pdf)</span></label>
                                <div class="relative">
                                    <input name="legalitas" value="<?= isset($pendaftaran['legalitas']) ? $pendaftaran['legalitas'] : ''; ?>"
                                        id="legalitas" type="file" accept=".pdf"
                                        class="w-full border-2 border-slate-200 text-primary text-xs rounded-lg p-2 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-primary file:text-white">
                                </div>
                            </div>
                            <p class="mt-8 font-semibold mb-2 text-md text-primary underline">Data Ketua Kelompok/ Komunitas</p>
                            <div class="w-full mb-2">
                                <label class="block mb-2 text-sm text-black">Nama Ketua</label>
                                <input type="text" name="nama_ketua" value="<?= isset($identitasc['nama']) ? $identitasc['nama'] : ''; ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full mb-2">
                                <label class="block mb-2 text-sm text-black">NIK</label>
                                <input type="text" name="nik" value="<?= isset($identitasc['nik']) ? $identitasc['nik'] : ''; ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                                <?php if (session('errors.nik')): ?>
                                    <p class="text-red-500 text-sm mt-2"><?= session('errors.nik') ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="w-full mb-2">
                                <label class="block mb-2 text-sm text-black">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" value="<?= isset($identitasc['tempat_lahir']) ? $identitasc['tempat_lahir'] : ''; ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full mb-2">
                                <label class="block mb-2 text-sm text-black">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" value="<?= isset($identitasc['tanggal_lahir']) ? $identitasc['tanggal_lahir'] : ''; ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full mb-2">
                                <label class="block mb-2 text-sm text-black">Usia</label>
                                <input type="number" name="usia" value="<?= isset($identitasc['usia']) ? $identitasc['usia'] : ''; ?>" min="0" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full mb-4">
                                <label class="block mb-2 text-sm text-black">Jenis Kelamin</label>
                                <div class="lg:flex gap-6">
                                    <div class="flex items-center py-2 ">
                                        <input name="jenis_kelamin" type="radio" class="peer h-5 w-5 cursor-pointer appearance-none rounded-full border border-primary checked:bg-primary transition-all"
                                            id="perempuan" value="Perempuan" <?= $identitasabd['jenis_kelamin'] == 'Perempuan' ? 'checked' : '' ?>>
                                        <label class="ml-2 text-black cursor-pointer text-sm" for="perempuan">Perempuan</label>
                                    </div>
                                    <div class="flex items-center py-2 ">
                                        <input name="jenis_kelamin" type="radio" class="peer h-5 w-5 cursor-pointer appearance-none rounded-full border border-primary checked:bg-primary transition-all"
                                            id="laki-laki" value="Laki-Laki" <?= $identitasabd['jenis_kelamin'] == 'Laki-Laki' ? 'checked' : '' ?>>
                                        <label class="ml-2 text-black cursor-pointer text-sm" for="laki-laki">Laki-Laki</label>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mb-2">
                                <label class="block mb-2 text-sm text-black">Pekerjaan</label>
                                <input type="text" name="pekerjaan" value="<?= isset($identitasc['pekerjaan']) ? $identitasc['pekerjaan'] : ''; ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full mb-2">
                                <label class="block mb-2 text-sm text-black">Nomor Telepon</label>
                                <input type="text" name="telepon" value="<?= isset($identitasc['telepon']) ? $identitasc['telepon'] : ''; ?>" name="telepon" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full mb-2">
                                <label class="block mb-2 text-sm text-black">Email</label>
                                <input type="email" name="email" value="<?= isset($identitasc['email']) ? $identitasc['email'] : ''; ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                                <?php if (session('errors.email')): ?>
                                    <p class="text-red-500 text-sm mt-2"><?= session('errors.email') ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="w-full mb-2">
                                <label class="block mb-2 text-sm text-black">Pendidikan Terakhir</label>
                                <input type="text" name="pendidikan" value="<?= isset($identitasc['pendidikan']) ? $identitasc['pendidikan'] : ''; ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full mb-4">
                                <label class="block mb-2 text-sm text-black">KTP : <?php if (!empty($pendaftaran['ktp'])): ?>
                                        <?= esc($pendaftaran['ktp']) ?>
                                    <?php endif; ?><span class="text-primary">(.jpg/jpeg)</span>
                                </label>
                                <div class="relative">
                                    <input name="ktp" value="<?= isset($pendaftaran['ktp']) ? $pendaftaran['ktp'] : ''; ?>"
                                        id="ktp" type="file" accept="image/jpeg,image/jpg"
                                        class="w-full border-2 border-slate-200 text-primary text-xs rounded-lg p-2 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-primary file:text-white">

                                </div>
                            </div>
                            <div class="w-full mb-2">
                                <label class="block mb-2 text-sm text-black">SKCK : <?php if (!empty($pendaftaran['skck'])): ?>
                                        <?= esc($pendaftaran['skck']) ?>
                                    <?php endif; ?><span class="text-primary">(.pdf)</span></label>
                                <div class="relative">
                                    <input name="skck" value="<?= isset($pendaftaran['skck']) ? $pendaftaran['skck'] : ''; ?>"
                                        id="skck" type="file" accept=".pdf"
                                        class="w-full border-2 border-slate-200 text-primary text-xs rounded-lg p-2 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-primary file:text-white">
                                </div>
                            </div>
                            <div class="w-full mb-2">
                                <label class="block mb-2 text-sm text-black">Tanggal SKCK</label>
                                <input name="tanggal_skck" value="<?= isset($identitasabd['tanggal_skck']) ? $identitasabd['tanggal_skck'] : ''; ?>" type="date" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>

                            <div class="flex justify-end mt-4">
                                <!-- <button class="w-40 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none" type="submit">Simpan</button> -->
                                <button id="saveButton" class="w-40 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none" type="button">Simpan</button>
                            </div>
                        </form>
                    </div>

                <?php else: ?>
                    <div id="identitas-calon" class="form-section flex flex-col w-full md:w-3/4 rounded-lg border-2 border-gray-300 bg-white shadow-lg p-6">
                        <form id="identitasabd" action="<?= base_url('pengusul/simpanForm/identitasabd'); ?>" class="mb-2 w-full" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="id_pendaftaran" value="<?= $pendaftaran['id_pendaftaran'] ?>">
                            <div class="w-full mb-4">
                                <label class="mb-2 text-sm text-slate-600">Nama Lengkap</label>
                                <input name="nama_individu" value="<?= isset($identitasabd['nama']) ? $identitasabd['nama'] : ''; ?>" type="text" class="w-full bg-transparent text-primary placeholder:text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary shadow-sm focus:shadow" />
                            </div>
                            <div class="w-full mb-4">
                                <label class="mb-2 text-sm text-slate-600">NIK</label>
                                <input name="nik" value="<?= isset($identitasabd['nik']) ? $identitasabd['nik'] : ''; ?>" type="text" class="w-full bg-transparent text-primary placeholder:text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary shadow-sm focus:shadow" />
                                <?php if (session('errors.nik')): ?>
                                    <p class="text-red-500 text-sm mt-2"><?= session('errors.nik') ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="w-full mb-4">
                                <label class="mb-2 text-sm text-slate-600">Tempat Lahir</label>
                                <input name="tempat_lahir" value="<?= isset($identitasabd['tempat_lahir']) ? $identitasabd['tempat_lahir'] : ''; ?>" type="text" class="w-full bg-transparent text-primary placeholder:text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary shadow-sm focus:shadow" />
                            </div>
                            <div class="w-full mb-4">
                                <label class="mb-2 text-sm text-slate-600">Tanggal Lahir</label>
                                <input name="tanggal_lahir" value="<?= isset($identitasabd['tanggal_lahir']) ? $identitasabd['tanggal_lahir'] : ''; ?>" type="date" class="w-full bg-transparent text-primary placeholder:text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary shadow-sm focus:shadow" />
                            </div>
                            <div class="w-full mb-4">
                                <label class="mb-2 text-sm text-slate-600">Usia</label>
                                <input name="usia" value="<?= isset($identitasabd['usia']) ? $identitasabd['usia'] : ''; ?>" type="number" class="w-full bg-transparent text-primary placeholder:text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary shadow-sm focus:shadow" />
                            </div>
                            <div class="w-full mb-4">
                                <label class="block mb-2 text-sm text-black">Jenis Kelamin</label>
                                <div class="lg:flex gap-6">
                                    <div class="flex items-center py-2 ">
                                        <input name="jenis_kelamin" type="radio" class="peer h-5 w-5 cursor-pointer appearance-none rounded-full border border-primary checked:bg-primary transition-all"
                                            id="perempuan" value="Perempuan" <?= $identitasabd['jenis_kelamin'] == 'Perempuan' ? 'checked' : '' ?>>
                                        <label class="ml-2 text-black cursor-pointer text-sm" for="perempuan">Perempuan</label>
                                    </div>
                                    <div class="flex items-center py-2 ">
                                        <input name="jenis_kelamin" type="radio" class="peer h-5 w-5 cursor-pointer appearance-none rounded-full border border-primary checked:bg-primary transition-all"
                                            id="laki-laki" value="Laki-Laki" <?= $identitasabd['jenis_kelamin'] == 'Laki-Laki' ? 'checked' : '' ?>>
                                        <label class="ml-2 text-black cursor-pointer text-sm" for="laki-laki">Laki-Laki</label>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mb-4">
                                <label class="block mb-2 text-sm text-black">Pekerjaan</label>
                                <input name="pekerjaan" value="<?= isset($identitasabd['pekerjaan']) ? $identitasabd['pekerjaan'] : ''; ?>" type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full mb-4">
                                <label class="block mb-2 text-sm text-black">Nomor Telepon</label>
                                <input name="telepon" value="<?= isset($identitasabd['telepon']) ? $identitasabd['telepon'] : ''; ?>" type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full mb-4">
                                <label class="block mb-2 text-sm text-black">Email</label>
                                <input name="email" value="<?= isset($identitasabd['email']) ? $identitasabd['email'] : ''; ?>" type="email" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                                <?php if (session('errors.email')): ?>
                                    <p class="text-red-500 text-sm mt-2"><?= session('errors.email') ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="w-full mb-4">
                                <label class="block mb-2 text-sm text-black">Pendidikan Terakhir</label>
                                <input name="pendidikan" value="<?= isset($identitasabd['pendidikan']) ? $identitasabd['pendidikan'] : ''; ?>" type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full mb-4">
                                <label class="block mb-2 text-sm text-black">Jalan</label>
                                <input name="jalan" value="<?= isset($identitasabd['jalan']) ? $identitasabd['jalan'] : ''; ?>" type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full mb-4">
                                <label class="block mb-2 text-sm text-black">RT/RW</label>
                                <input name="rt_rw" value="<?= isset($identitasabd['rt_rw']) ? $identitasabd['rt_rw'] : ''; ?>" type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full mb-4">
                                <label class="block mb-2 text-sm text-black">Desa/Kelurahan</label>
                                <input name="desa" value="<?= isset($identitasabd['desa']) ? $identitasabd['desa'] : ''; ?>" type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full mb-4">
                                <label class="block mb-2 text-sm text-black">Kecamatan</label>
                                <input name="kecamatan" value="<?= isset($identitasabd['kecamatan']) ? $identitasabd['kecamatan'] : ''; ?>" type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full mb-4">
                                <label class="block mb-2 text-sm text-black">Kab/Kota</label>
                                <input name="kab_kota" value="<?= isset($identitasabd['kab_kota']) ? $identitasabd['kab_kota'] : ''; ?>" type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full mb-4">
                                <label class="block mb-2 text-sm text-black">Provinsi</label>
                                <input name="provinsi" value="<?= isset($identitasabd['provinsi']) ? $identitasabd['provinsi'] : ''; ?>" type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full mb-4">
                                <label class="block mb-2 text-sm text-black">Kode Pos</label>
                                <input name="kode_pos" value="<?= isset($identitasabd['kode_pos']) ? $identitasabd['kode_pos'] : ''; ?>" type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full mb-4">
                                <label class="block mb-2 text-sm text-black">Media Sosial</label>
                                <input name="sosial_media" value="<?= isset($identitasabd['sosial_media']) ? $identitasabd['sosial_media'] : ''; ?>" type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full mb-4">
                                <label class="block mb-2 text-sm text-black">KTP : <?php if (!empty($pendaftaran['ktp'])): ?>
                                        <?= esc($pendaftaran['ktp']) ?>
                                    <?php endif; ?><span class="text-primary">(.jpg/jpeg)</span>
                                </label>
                                <div class="relative">
                                    <input name="ktp" value="<?= isset($pendaftaran['ktp']) ? $pendaftaran['ktp'] : ''; ?>"
                                        id="ktp" type="file" accept="image/jpeg,image/jpg"
                                        class="w-full border-2 border-slate-200 text-primary text-xs rounded-lg p-2 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-primary file:text-white">
                                </div>
                            </div>
                            <div class="w-full mb-2">
                                <label class="block mb-2 text-sm text-black">SKCK : <?php if (!empty($pendaftaran['skck'])): ?>
                                        <?= esc($pendaftaran['skck']) ?>
                                    <?php endif; ?><span class="text-primary">(.pdf)</span></label>
                                <div class="relative">
                                    <input name="skck" value="<?= isset($pendaftaran['skck']) ? $pendaftaran['skck'] : ''; ?>"
                                        id="skck" type="file" accept=".pdf"
                                        class="w-full border-2 border-slate-200 text-primary text-xs rounded-lg p-2 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-primary file:text-white">
                                </div>
                            </div>
                            <div class="w-full mb-2">
                                <label class="block mb-2 text-sm text-black">Tanggal SKCK</label>
                                <input name="tanggal_skck" value="<?= isset($identitasabd['tanggal_skck']) ? $identitasabd['tanggal_skck'] : ''; ?>" type="date" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>

                            <div class="flex justify-end mt-4">
                                <!-- <button class="w-40 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none" type="submit">Simpan</button> -->
                                <button id="saveButton" class="w-40 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none" type="button">Simpan</button>
                            </div>
                        </form>
                    </div>
                <?php endif; ?>

                <!-- Right side: Form inside a card -->
                <div id="kegiatan" class="form-section hidden flex flex-col w-full md:w-3/4 rounded-lg border-2 border-gray-300 bg-white shadow-lg p-6">
                    <form id="kegiatanForm" action="<?= base_url('pengusul/simpanForm/kegiatan'); ?>" class="mb-2 w-full" method="post" enctype="multipart/form-data">
                        <div class="grid grid-cols-1 gap-4" id="formContainer">
                            <!-- Kolom kiri -->
                            <div class="space-y-4">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="id_pendaftaran" value="<?= $pendaftaran['id_pendaftaran'] ?>">
                                <input type="hidden" name="id_kegiatan" value="<?= isset($kegiatanUtama['id_kegiatan']) ? $kegiatanUtama['id_kegiatan'] : ''; ?>">
                                <p class="font-semibold mb-2 text-md text-primary underline">Kegiatan Utama</p>
                                <div>
                                    <label class="block mb-2 text-sm text-black" for="tema">Tema Kegiatan</label>
                                    <select name="tema" id="tema-kegiatan" class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease">
                                        <option value="" disabled <?= !isset($kegiatanUtama['tema']) ? 'selected' : ''; ?>>Pilih Tema Kegiatan</option>
                                        <option value="keanekaragaman-hayati" <?= isset($kegiatanUtama['tema']) && $kegiatanUtama['tema'] == 'keanekaragaman-hayati' ? 'selected' : ''; ?>>Keanekaragaman Hayati</option>
                                        <option value="perubahan-iklim" <?= isset($kegiatanUtama['tema']) && $kegiatanUtama['tema'] == 'perubahan-iklim' ? 'selected' : ''; ?>>Perubahan Iklim</option>
                                        <option value="pencemaran-dan-kerusakan-lingkungan" <?= isset($kegiatanUtama['tema']) && $kegiatanUtama['tema'] == 'pencemaran-dan-kerusakan-lingkungan' ? 'selected' : ''; ?>>Pencemaran dan Kerusakan Lingkungan</option>
                                        <option value="hukum-dan-budaya" <?= isset($kegiatanUtama['tema']) && $kegiatanUtama['tema'] == 'hukum-dan-budaya' ? 'selected' : ''; ?>>Hukum dan Budaya</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm text-black" for="sub_tema">Sub Tema Kegiatan</label>
                                    <select name="sub_tema" id="sub-tema-kegiatan" class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" <?= isset($kegiatan['sub_tema']) ? '' : 'disabled'; ?>>
                                        <option value="" disabled <?= !isset($kegiatanUtama['sub_tema']) ? 'selected' : ''; ?>>Pilih Sub Tema Kegiatan</option>

                                    </select>
                                </div>


                                <div>
                                    <label class="block mb-2 text-sm text-black">Bentuk Kegiatan</label>
                                    <input name="bentuk_kegiatan" type="text" value="<?= isset($kegiatanUtama['bentuk_kegiatan']) ? $kegiatanUtama['bentuk_kegiatan'] : ''; ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" />
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm text-black">Tahun Mulai Kegiatan</label>
                                    <input type="date" id="tahun_mulai" name="tahun_mulai" value="<?= isset($kegiatanUtama['tahun_mulai']) ? $kegiatanUtama['tahun_mulai'] : ''; ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm text-black">Penjelasan Kegiatan</label>
                                    <textarea id="penjelasan" name="deskripsi_kegiatan" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" rows="4"
                                        oninput="updateWordCount(this, 'penjelasanCount', 1000)"><?= isset($kegiatanUtama['deskripsi_kegiatan']) ? $kegiatanUtama['deskripsi_kegiatan'] : ''; ?></textarea>
                                    <p id="penjelasanCount" class="text-xs text-slate-400 flex justify-end">
                                        <?= (isset($kegiatanUtama['deskripsi_kegiatan']) && strlen(trim($kegiatanUtama['deskripsi_kegiatan'])) > 0) ? str_word_count($kegiatanUtama['deskripsi_kegiatan']) : 0 ?>/1000 Kata
                                    </p>
                                </div>
                            </div>

                            <!-- Kolom kanan -->
                            <div class="space-y-4">
                                <div>
                                    <label class="block mb-2 text-sm text-black">Lokasi Kegiatan</label>
                                    <input type="text" name="lokasi_kegiatan" value="<?= isset($kegiatanUtama['lokasi_kegiatan']) ? $kegiatanUtama['lokasi_kegiatan'] : ''; ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm text-black">Koordinat Lokasi Kegiatan</label>
                                    <input type="text" name="koordinat" value="<?= isset($kegiatanUtama['koordinat']) ? $kegiatanUtama['koordinat'] : ''; ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm text-black">Para Pihak dan Perannya</label>
                                    <textarea name="pihak_dan_peran" id="pihakPeran" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" rows="4"
                                        oninput="updateWordCount(this, 'pihakPeranCount', 1000)"><?= isset($kegiatanUtama['pihak_dan_peran']) ? $kegiatanUtama['pihak_dan_peran'] : ''; ?></textarea>
                                    <p id="pihakPeranCount" class="text-xs text-slate-400 flex justify-end ">
                                        <?= (isset($kegiatanUtama['pihak_dan_peran']) && strlen(trim($kegiatanUtama['pihak_dan_peran'])) > 0) ? str_word_count($kegiatanUtama['pihak_dan_peran']) : 0 ?>/1000 Kata
                                    </p>
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm text-black">Keberhasilan yang Dicapai</label>
                                    <textarea name="keberhasilan" id="keberhasilan" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" rows="4"
                                        oninput="updateWordCount(this, 'keberhasilanCount', 1000)"><?= isset($kegiatanUtama['keberhasilan']) ? $kegiatanUtama['keberhasilan'] : ''; ?></textarea>
                                    <p id="keberhasilanCount" class="text-xs text-slate-400 flex justify-end ">
                                        <?= (isset($kegiatanUtama['keberhasilan']) && strlen(trim($kegiatanUtama['keberhasilan'])) > 0) ? str_word_count($kegiatanUtama['keberhasilan']) : 0 ?>/1000 Kata
                                    </p>
                                </div>
                            </div>
                            <?php if (isset($kegiatanLainnya) && is_array($kegiatanLainnya)): ?>
                                <?php foreach ($kegiatanLainnya as $index => $kegiatan): ?>
                                    <div class="grid grid-cols-1 gap-4 mt-4">
                                        <div class="space-y-4">
                                            <p class="mt-8 font-semibold mb-2 text-md text-primary underline">Kegiatan Lain ( <?= $index + 1 ?> )</p>
                                            <div>
                                                <input type="hidden" name="kegiatan_lainnya[<?= $index ?>][id_kegiatan]" value="<?= isset($kegiatan['id_kegiatan']) ? $kegiatan['id_kegiatan'] : ''; ?>">
                                                <label class="block mb-2 text-sm text-black" for="tema">Tema Kegiatan</label>
                                                <select name="kegiatan_lainnya[<?= $index ?>][tema]" id="tema-lainnya-<?= $index ?>" class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease">
                                                    <option value="" disabled <?= !isset($kegiatan['tema']) ? 'selected' : ''; ?>>Pilih Tema Kegiatan</option>
                                                    <option value="keanekaragaman-hayati" <?= isset($kegiatan['tema']) && $kegiatan['tema'] == 'keanekaragaman-hayati' ? 'selected' : ''; ?>>Keanekaragaman Hayati</option>
                                                    <option value="perubahan-iklim" <?= isset($kegiatan['tema']) && $kegiatan['tema'] == 'perubahan-iklim' ? 'selected' : ''; ?>>Perubahan Iklim</option>
                                                    <option value="pencemaran-dan-kerusakan-lingkungan" <?= isset($kegiatan['tema']) && $kegiatan['tema'] == 'pencemaran-dan-kerusakan-lingkungan' ? 'selected' : ''; ?>>Pencemaran dan Kerusakan Lingkungan</option>
                                                    <option value="hukum-dan-budaya" <?= isset($kegiatan['tema']) && $kegiatan['tema'] == 'hukum-dan-budaya' ? 'selected' : ''; ?>>Hukum dan Budaya</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="block mb-2 text-sm text-black" for="sub_tema">Sub Tema Kegiatan</label>
                                                <select name="kegiatan_lainnya[<?= $index ?>][sub_tema]" id="sub-tema-lainnya-<?= $index ?>" class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" <?= isset($kegiatan['sub_tema']) ? '' : 'disabled'; ?>>
                                                    <option value="" disabled <?= !isset($kegiatan['sub_tema']) ? 'selected' : ''; ?>>Pilih Sub Tema Kegiatan</option>

                                                </select>
                                            </div>
                                            <div>
                                                <label class="block mb-2 text-sm text-black">Bentuk Kegiatan</label>
                                                <input name="kegiatan_lainnya[<?= $index ?>][bentuk_kegiatan]" type="text" value="<?= isset($kegiatan['bentuk_kegiatan']) ? $kegiatan['bentuk_kegiatan'] : ''; ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" />
                                            </div>
                                            <div>
                                                <label class="block mb-2 text-sm text-black">Tahun Mulai Kegiatan</label>
                                                <input type="date" id="tahun_mulai" name="kegiatan_lainnya[<?= $index ?>][tahun_mulai]" value="<?= isset($kegiatan['tahun_mulai']) ? $kegiatan['tahun_mulai'] : ''; ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                                            </div>
                                            <div>
                                                <label class="block mb-2 text-sm text-black">Penjelasan Kegiatan</label>
                                                <textarea id="penjelasan" name="kegiatan_lainnya[<?= $index ?>][deskripsi_kegiatan]" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" rows="4"
                                                    oninput="updateWordCount(this, 'penjelasanCount', 1000)"><?= isset($kegiatan['deskripsi_kegiatan']) ? $kegiatan['deskripsi_kegiatan'] : ''; ?></textarea>
                                                <p id="penjelasanCount" class="text-xs text-slate-400 flex justify-end">
                                                    <?= (isset($kegiatan['deskripsi_kegiatan']) && strlen(trim($kegiatan['deskripsi_kegiatan'])) > 0) ? str_word_count($kegiatan['deskripsi_kegiatan']) : 0 ?>/1000 Kata
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Kolom kanan -->
                                        <div class="space-y-4">
                                            <div>
                                                <label class="block mb-2 text-sm text-black">Lokasi Kegiatan</label>
                                                <input type="text" name="kegiatan_lainnya[<?= $index ?>][lokasi_kegiatan]" value="<?= isset($kegiatan['lokasi_kegiatan']) ? $kegiatan['lokasi_kegiatan'] : ''; ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                                            </div>
                                            <div>
                                                <label class="block mb-2 text-sm text-black">Koordinat Lokasi Kegiatan</label>
                                                <input type="text" name="kegiatan_lainnya[<?= $index ?>][koordinat]" value="<?= isset($kegiatan['koordinat']) ? $kegiatan['koordinat'] : ''; ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                                            </div>
                                            <div>
                                                <label class="block mb-2 text-sm text-black">Para Pihak dan Perannya</label>
                                                <textarea name="kegiatan_lainnya[<?= $index ?>][pihak_dan_peran]" id="pihakPeran" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" rows="4"
                                                    oninput="updateWordCount(this, 'pihakPeranCount', 1000)"><?= isset($kegiatan['pihak_dan_peran']) ? $kegiatan['pihak_dan_peran'] : ''; ?></textarea>
                                                <p id="pihakPeranCount" class="text-xs text-slate-400 flex justify-end ">
                                                    <?= (isset($kegiatan['pihak_dan_peran']) && strlen(trim($kegiatan['pihak_dan_peran'])) > 0) ? str_word_count($kegiatan['pihak_dan_peran']) : 0 ?>/1000 Kata
                                                </p>
                                            </div>
                                            <div>
                                                <label class="block mb-2 text-sm text-black">Keberhasilan yang Dicapai</label>
                                                <textarea name="kegiatan_lainnya[<?= $index ?>][keberhasilan]" id="keberhasilan" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" rows="4"
                                                    oninput="updateWordCount(this, 'keberhasilanCount', 1000)"><?= isset($kegiatan['keberhasilan']) ? $kegiatan['keberhasilan'] : ''; ?></textarea>
                                                <p id="keberhasilanCount" class="text-xs text-slate-400 flex justify-end ">
                                                    <?= (isset($kegiatan['keberhasilan']) && strlen(trim($kegiatan['keberhasilan'])) > 0) ? str_word_count($kegiatan['keberhasilan']) : 0 ?>/1000 Kata
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>


                        <div class="flex justify-between mt-4">
                            <button id="tambahKegiatanBtn" class="w-64 rounded-md py-2 text-center text-sm text-primary transition-all shadow-md hover:shadow-lg bg-secondary active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button" onclick="tambahKegiatan()"> <span>&#10010</span> Tambah Kegiatan Lainnya</button>
                        </div>

                        <div class="flex justify-end mt-4">
                            <!-- <button class="w-40 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none" type="submit" data-target="kegiatan">Simpan</button> -->
                            <button id="saveButton" class="w-40 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none" type="button">Simpan</button>
                        </div>
                    </form>

                </div>

                <!-- Right side: Form inside a card -->
                <div id="dampak" class="form-section hidden flex flex-col w-full md:w-3/4 rounded-lg border-2 border-gray-300 bg-white shadow-lg p-6">
                    <form id="dampakForm" action="<?= base_url('pengusul/simpanForm/dampak'); ?>" method="post" enctype="multipart/form-data">
                        <div class="grid grid-cols-1 gap-4">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="id_pendaftaran" value="<?= $pendaftaran['id_pendaftaran'] ?>">

                            <div>
                                <label class="block mb-2 text-sm text-black">Dampak kegiatan terhadap lingkungan</label>
                                <textarea name="dampak_lingkungan" id="dampakLingkungan" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2" rows="4"><?= isset($dampak['dampak_lingkungan']) ? htmlspecialchars($dampak['dampak_lingkungan']) : '' ?></textarea>
                                <p id="dampakLingkunganCount" class="text-xs text-slate-400 flex justify-end">
                                    <?= (isset($dampak['dampak_lingkungan']) && strlen(trim($dampak['dampak_lingkungan'])) > 0) ? str_word_count($dampak['dampak_lingkungan']) : 0 ?>/1000 Kata
                                </p>
                            </div>

                            <div>
                                <label class="block mb-2 text-sm text-black">Dampak Ekonomi</label>
                                <textarea name="dampak_ekonomi" id="dampakEkonomi" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2" rows="4"><?= isset($dampak['dampak_ekonomi']) ? htmlspecialchars($dampak['dampak_ekonomi']) : '' ?></textarea>
                                <p id="dampakEkonomiCount" class="text-xs text-slate-400 flex justify-end">
                                    <?= (isset($dampak['dampak_ekonomi']) && strlen(trim($dampak['dampak_ekonomi'])) > 0) ? str_word_count($dampak['dampak_ekonomi']) : 0 ?>/1000 Kata
                                </p>
                            </div>

                            <div>
                                <label class="block mb-2 text-sm text-black">Dampak Sosial dan Budaya</label>
                                <textarea name="dampak_sosial_budaya" id="dampakSosial" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2" rows="4"><?= isset($dampak['dampak_sosial_budaya']) ? htmlspecialchars($dampak['dampak_sosial_budaya']) : '' ?></textarea>
                                <p id="dampakSosialCount" class="text-xs text-slate-400 flex justify-end">
                                    <?= (isset($dampak['dampak_sosial_budaya']) && strlen(trim($dampak['dampak_sosial_budaya'])) > 0) ? str_word_count($dampak['dampak_sosial_budaya']) : 0 ?>/1000 Kata
                                </p>
                            </div>
                        </div>

                        <div class="flex justify-end mt-4">
                            <!-- <button class="w-40 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none" type="submit">Simpan</button> -->
                            <button id="saveButton" class="w-40 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none" type="button">Simpan</button>
                        </div>
                    </form>
                </div>



                <!-- Right side: Form inside a card -->
                <div id="pmik" class="form-section hidden flex flex-col w-full md:w-3/4 rounded-lg border-2 border-gray-300 bg-white shadow-lg p-6">
                    <form id="pmikForm" action="<?= base_url('pengusul/simpanForm/pmik'); ?>" class="mb-2 w-full" method="post" enctype="multipart/form-data">
                        <div class="grid grid-cols-1 gap-4">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="id_pendaftaran" value="<?= $pendaftaran['id_pendaftaran'] ?>">
                            <div>
                                <label class="block mb-2 text-sm text-black">Prakarsa</label>
                                <textarea name="prakarsa" id="prakarsa" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" rows="4"
                                    oninput="updateWordCount(this, 'prakarsaCount', 1000)"><?= isset($pmik['prakarsa']) ? htmlspecialchars($pmik['prakarsa']) : '' ?></textarea>
                                <p id="prakarsaCount" class="text-xs text-slate-400 flex justify-end">
                                    <?= (isset($pmik['prakarsa']) && strlen(trim($pmik['prakarsa'])) > 0) ? str_word_count($pmik['prakarsa']) : 0 ?>/1000 Kata
                                </p>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Motivasi</label>
                                <textarea name="motivasi" id="motivasi" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" rows="4"
                                    oninput="updateWordCount(this, 'motivasiCount', 1000)"><?= isset($pmik['motivasi']) ? htmlspecialchars($pmik['motivasi']) : '' ?></textarea>
                                <p id="motivasiCount" class="text-xs text-slate-400 flex justify-end">
                                    <?= (isset($pmik['motivasi']) && strlen(trim($pmik['motivasi'])) > 0) ? str_word_count($pmik['motivasi']) : 0 ?>/1000 Kata
                                </p>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Inovasi</label>
                                <textarea name="inovasi" id="inovasi" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" rows="4"
                                    oninput="updateWordCount(this, 'inovasiCount', 1000)"><?= isset($pmik['inovasi']) ? htmlspecialchars($pmik['inovasi']) : '' ?></textarea>
                                <p id="inovasiCount" class="text-xs text-slate-400 flex justify-end">
                                    <?= (isset($pmik['inovasi']) && strlen(trim($pmik['inovasi'])) > 0) ? str_word_count($pmik['inovasi']) : 0 ?>/1000 Kata
                                </p>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Kreativitas</label>
                                <textarea name="kreativitas" id="kreativitas" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" rows="4"
                                    oninput="updateWordCount(this, 'kreativitasCount', 1000)"><?= isset($pmik['kreativitas']) ? htmlspecialchars($pmik['kreativitas']) : '' ?></textarea>
                                <p id="kreativitasCount" class="text-xs text-slate-400 flex justify-end">
                                    <?= (isset($pmik['kreativitas']) && strlen(trim($pmik['kreativitas'])) > 0) ? str_word_count($pmik['kreativitas']) : 0 ?>/1000 Kata
                                </p>
                            </div>
                        </div>

                        <div class="flex justify-end mt-4">
                            <!-- <button class="w-40 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none" type="submit">Simpan</button> -->
                            <button id="saveButton" class="w-40 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none" type="button">Simpan</button>
                        </div>
                    </form>
                </div>

                <!-- Right side: Form inside a card -->
                <div id="keswadayaan" class="form-section hidden flex flex-col w-full md:w-3/4 rounded-lg border-2 border-gray-300 bg-white shadow-lg p-6">
                    <form id="keswadayaanForm" action="<?= base_url('pengusul/simpanForm/keswadayaan'); ?>" class="mb-2 w-full" method="post" enctype="multipart/form-data">
                        <div class="grid grid-cols-1 gap-4">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="id_pendaftaran" value="<?= $pendaftaran['id_pendaftaran'] ?>">
                            <div>
                                <label class="block mb-2 text-sm text-black">Sumber Pembiayaan Kegiatan</label>
                                <textarea name="sumber_biaya" id="sumber" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" rows="4"
                                    oninput="updateWordCount(this, 'sumberCount', 1000)"><?= isset($keswadayaan['sumber_biaya']) ? htmlspecialchars($keswadayaan['sumber_biaya']) : '' ?></textarea>
                                <p id="sumberCount" class="text-xs text-slate-400 flex justify-end">
                                    <?= (isset($keswadayaan['sumber_biaya']) && strlen(trim($keswadayaan['sumber_biaya'])) > 0) ? str_word_count($keswadayaan['sumber_biaya']) : 0 ?>/1000 Kata
                                </p>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Teknologi/Alat/Fasilitas yang digunakan</label>
                                <textarea name="teknologi_kegiatan" id="teknologi" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" rows="4"
                                    oninput="updateWordCount(this, 'teknologiCount', 1000)"><?= isset($keswadayaan['teknologi_kegiatan']) ? htmlspecialchars($keswadayaan['teknologi_kegiatan']) : '' ?></textarea>
                                <p id="teknologiCount" class="text-xs text-slate-400 flex justify-end">
                                    <?= (isset($keswadayaan['teknologi_kegiatan']) && strlen(trim($keswadayaan['teknologi_kegiatan'])) > 0) ? str_word_count($keswadayaan['teknologi_kegiatan']) : 0 ?>/1000 Kata
                                </p>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Status Lahan/Areal Kegiatan</label>
                                <textarea name="status_lahan_kegiatan" id="statusLahan" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" rows="4"
                                    oninput="updateWordCount(this, 'statusLahanCount', 1000)"><?= isset($keswadayaan['status_lahan_kegiatan']) ? htmlspecialchars($keswadayaan['status_lahan_kegiatan']) : '' ?></textarea>
                                <p id="statusLahanCount" class="text-xs text-slate-400 flex justify-end">
                                    <?= (isset($keswadayaan['status_lahan_kegiatan']) && strlen(trim($keswadayaan['status_lahan_kegiatan'])) > 0) ? str_word_count($keswadayaan['status_lahan_kegiatan']) : 0 ?>/1000 Kata
                                </p>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Kelompok/Perorangan yang meniru</label>
                                <input type="number" name="jumlah_kelompok_serupa" id="kelompokPeroranganMeniru" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" value="<?= $keswadayaan['jumlah_kelompok_serupa'] ?? '' ?>" />
                            </div>
                        </div>

                        <div class="flex justify-end mt-4">
                            <!-- <button class="w-40 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none" type="submit">Simpan</button> -->
                            <button id="saveButton" class="w-40 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none" type="button">Simpan</button>
                        </div>
                    </form>
                </div>

                <!-- Right side: Form inside a card -->
                <div id="keistimewaan" class="form-section hidden flex flex-col w-full md:w-3/4 rounded-lg border-2 border-gray-300 bg-white shadow-lg p-6">
                    <form id="keistimewaanForm" action="<?= base_url('pengusul/simpanForm/keistimewaan'); ?>" class="mb-2 w-full" method="post" enctype="multipart/form-data">
                        <div class="grid grid-cols-1 gap-4">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="id_pendaftaran" value="<?= $pendaftaran['id_pendaftaran'] ?>">
                            <div>
                                <label class="block mb-2 text-sm text-black">Keistimewaan Calon</label>
                                <textarea name="keistimewaan" id="keistimewaanCalon" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" rows="4"
                                    oninput="updateWordCount(this, 'keistimewaanCalonCount', 1000)"><?= isset($keistimewaan['keistimewaan']) ? htmlspecialchars($keistimewaan['keistimewaan']) : '' ?></textarea>
                                <p id="keistimewaanCalonCount" class="text-xs text-slate-400 flex justify-end">
                                    <?= (isset($keistimewaan['keistimewaan']) && strlen(trim($keistimewaan['keistimewaan'])) > 0) ? str_word_count($keistimewaan['keistimewaan']) : 0 ?>/1000 Kata
                                </p>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Penghargaan relevan yang pernah diterima</label>
                                <textarea name="penghargaan" id="penghargaanRelevan" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" rows="4"
                                    oninput="updateWordCount(this, 'penghargaanRelevanCount', 1000)"><?= isset($keistimewaan['penghargaan']) ? htmlspecialchars($keistimewaan['penghargaan']) : '' ?></textarea>
                                <p id="penghargaanRelevanCount" class="text-xs text-slate-400 flex justify-end">
                                    <?= (isset($keistimewaan['penghargaan']) && strlen(trim($keistimewaan['penghargaan'])) > 0) ? str_word_count($keistimewaan['penghargaan']) : 0 ?>/1000 Kata
                                </p>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Tautan Dokumen Pendukung (Google Drive)</label>
                                <input name="tautan_dokumen_pendukung" type="text" value="<?= isset($keistimewaan['tautan_dokumen_pendukung']) ? $keistimewaan['tautan_dokumen_pendukung'] : ''; ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Tautan Video</label>
                                <input name="tautan_video" type="text" value="<?= isset($keistimewaan['tautan_video']) ? $keistimewaan['tautan_video'] : ''; ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow mb-3" placeholder="Tautan Video" />
                            </div>

                            <div id="fotoContainer">
                                <div id="fotoInputs">
                                    <?php
                                    $fotoCount = 0;
                                    for ($i = 1; $i <= 5; $i++):
                                        if (isset($keistimewaan["foto_kegiatan$i"])):
                                            $fotoCount++;
                                    ?>
                                            <div class="mb-4">
                                                <?php if (!empty($keistimewaan["foto_kegiatan$i"])): ?>
                                                    <label class="block mb-2 text-sm text-black">Foto Kegiatan <?= $i ?> : <?php if (!empty($keistimewaan["foto_kegiatan$i"])): ?>
                                                            <?= esc($keistimewaan["foto_kegiatan$i"]) ?>
                                                        <?php endif; ?><span class="text-primary">(.JPG/JPEG, , max 1MB)</span></label>
                                                <?php endif; ?>
                                                <input name="foto_kegiatan<?= $i ?>" type="file" accept=".jpg, .jpeg" class="mb-2 w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                                                <?php if (session('errors.foto_kegiatan' . $i)): ?>
                                                    <p class="text-red-500 text-sm mt-2"><?= session('errors.foto_kegiatan' . $i) ?></p>
                                                <?php endif; ?>
                                                <label class="block mb-2 text-sm text-black">Deskripsi Foto <?= $i ?> : </label>
                                                <input name="deskripsi_foto_kegiatan<?= $i ?>" type="text" placeholder="Keterangan Foto" value="<?= isset($keistimewaan["deskripsi_foto_kegiatan$i"]) ? $keistimewaan["deskripsi_foto_kegiatan$i"] : ''; ?>" class="mb-4 w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                                            </div>
                                    <?php endif;
                                    endfor; ?>

                                    <?php if ($fotoCount === 0): ?>
                                        <div class="mb-4">
                                            <label class="block mb-2 text-sm text-black">Foto Kegiatan <span class="text-primary"> (.JPG/JPEG, , max 1MB)</span></label>
                                            <input name="foto_kegiatan1" type="file" accept=".jpg, .jpeg" class="mb-2 w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />

                                            <label class="block mb-2 text-sm text-black">Deskripsi Foto </label>
                                            <input name="deskripsi_foto_kegiatan1" type="text" placeholder="Keterangan Foto" class="w-full mb-4 bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <button type="button" id="tambahFotoButton" class="mt-4 w-full flex items-center justify-center rounded-md py-2 text-center text-sm text-primary transition-all shadow-md hover:shadow-lg bg-secondary active:shadow-none" <?= $fotoCount === 5 ? 'style="display:none;"' : '' ?>>
                                    <span class="mr-2">&#10010</span> Tambah Foto Kegiatan
                                </button>
                            </div>

                        </div>

                        <div class="flex justify-end mt-4">
                            <!-- <button class="w-40 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none" type="submit">Simpan</button> -->
                            <button id="saveButton" class="w-40 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none" type="button">Simpan</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="modalPopup" class="fixed inset-0 z-50 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-8 flex flex-col items-center max-w-md">
            <img src="/images/question.png" alt="Question Icon" class="w-16 h-16 mb-4">
            <p class="text-center text-lg font-bold text-gray-700 mb-4">Apakah anda yakin ingin menyimpan data?</p>
            <div class="flex justify-end space-x-4">
                <button id="cancelButton" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-700 hover:text-white rounded-md">Periksa Kembali</button>
                <button id="confirmButton" class="px-4 py-2 bg-primary hover:bg-primaryhover text-white rounded-md">Ya, Simpan</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const saveButton = document.getElementById('saveButton');
            const modalPopup = document.getElementById('modalPopup');
            const cancelButton = document.getElementById('cancelButton');
            const confirmButton = document.getElementById('confirmButton');
            const formc = document.getElementById('identitasc');
            const formabd = document.getElementById('identitasabd');
            const formkegiatan = document.getElementById('kegiatanForm');
            const formpmik = document.getElementById('pmikForm');
            const formdampak = document.getElementById('dampakForm');
            const formkeswadayaan = document.getElementById('keswadayaanForm');
            const formkeistimewaan = document.getElementById('keistimewaanForm');

            saveButton.addEventListener('click', () => {
                modalPopup.classList.remove('hidden');
            });

            cancelButton.addEventListener('click', () => {
                modalPopup.classList.add('hidden');
            });

            confirmButton.addEventListener('click', () => {
                modalPopup.classList.add('hidden');
                formc.submit();
            });

            confirmButton.addEventListener('click', () => {
                modalPopup.classList.add('hidden');
                formabd.submit();
            });

            confirmButton.addEventListener('click', () => {
                modalPopup.classList.add('hidden');
                formkegiatan.submit();
            });

            confirmButton.addEventListener('click', () => {
                modalPopup.classList.add('hidden');
                formpmik.submit();
            });

            confirmButton.addEventListener('click', () => {
                modalPopup.classList.add('hidden');
                formdampak.submit();
            });

            confirmButton.addEventListener('click', () => {
                modalPopup.classList.add('hidden');
                formkeswadayaan.submit();
            });

            confirmButton.addEventListener('click', () => {
                modalPopup.classList.add('hidden');
                formkeistimewaan.submit();
            });
        });

        const buttons = document.querySelectorAll('.btn-section');
        const sections = document.querySelectorAll('.form-section');
        const forms = document.querySelectorAll('form');

        let isFormDirty = false;

        forms.forEach(form => {
            form.addEventListener('input', () => {
                isFormDirty = true;
            });
        });

        buttons.forEach(button => {
            button.addEventListener('click', (event) => {
                if (isFormDirty) {
                    event.preventDefault();

                    Swal.fire({
                        title: 'Anda Belum melakukan Simpan',
                        text: "Mohon untuk melakukan Simpan Data Sebelum berpindah Form!",
                        icon: 'warning',
                        confirmButtonColor: '#2C7865',
                        confirmButtonText: 'OK'
                    }).then(() => {

                    });
                } else {
                    // Jika form belum diubah, langsung pindah form
                    const target = button.getAttribute('data-target');
                    sections.forEach(section => {
                        section.classList.add('hidden');
                    });
                    document.getElementById(target).classList.remove('hidden');
                }
            });
        });

        // Fungsi untuk mendapatkan parameter query dari URL
        function getQueryParam(param) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param);
        };

        document.addEventListener('DOMContentLoaded', function() {
            const section = getQueryParam('section');

            if (section) {
                sections.forEach(section => {
                    section.classList.add('hidden');
                });
                document.getElementById(section).classList.remove('hidden');
            }
        });

        // Fungsi untuk membatasi tanggal lima tahun ke belakang dari hari ini
        function setDateRestrictions(inputDateElement) {
            const today = new Date();
            const fiveYearsAgo = new Date(today.getFullYear() - 5, today.getMonth(), today.getDate());
            const maxDate = fiveYearsAgo.toISOString().split('T')[0];

            inputDateElement.setAttribute('max', maxDate);
        }

        const mainInputDate = document.getElementById('tahun_mulai');

        if (mainInputDate) {
            setDateRestrictions(mainInputDate);
        }

        document.querySelectorAll('input[name^="kegiatan_lainnya"]').forEach(function(inputDateElement) {
            setDateRestrictions(inputDateElement);
        });

        function addNewKegiatanInput() {
            const newKegiatanInput = document.createElement('input');
            newKegiatanInput.setAttribute('type', 'date');
            newKegiatanInput.setAttribute('name', `kegiatan_lainnya[${kegiatanCount}][tahun_mulai]`);
            newKegiatanInput.classList.add('w-full', 'bg-transparent', 'placeholder:text-slate-400', 'text-primary', 'text-sm', 'border-2', 'border-slate-200', 'rounded-md', 'px-3', 'py-2', 'transition', 'duration-300', 'ease', 'focus:outline-none', 'focus:border-primary', 'hover:border-primary', 'focus:shadow');

            setDateRestrictions(newKegiatanInput);

            document.getElementById('kegiatan-lainnya-container').appendChild(newKegiatanInput);

            kegiatanCount++;
        }

        const subTemaOptions = {
            "keanekaragaman-hayati": [{
                    value: "pelestarian-keanekaragaman-hayati-kawasan-dilindungi-yang-meliputi-pelestarian-sumber-daya-genetik-jenis-dan-ekosistem",
                    text: "Pelestarian keanekaragaman hayati dan kawasan dilindungi yang meliputi pelestarian sumber daya genetik, jenis, dan ekosistem"
                },
                {
                    value: "pemanfaatan-keanekaragaman-hayati-berkelanjutan",
                    text: "Pemanfaatan keanekaragaman hayati secara berkelanjutan"
                },
                {
                    value: "jasa-lingkungan",
                    text: "Jasa lingkungan"
                }
            ],
            "perubahan-iklim": [{
                    value: "adaptasi-perubahan-iklim",
                    text: "Adaptasi perubahan iklim"
                },
                {
                    value: "mitigasi-perubahan-iklim",
                    text: "Mitigasi perubahan iklim"
                },
                {
                    value: "penerapan-ekonomi-hijau-biru",
                    text: "Penerapan ekonomi hijau dan ekonomi biru"
                }
            ],
            "pencemaran-dan-kerusakan-lingkungan": [{
                    value: "penanganan-pencemaran-air-tanah-udara-yang-meliputi-industri-pertanian-domestik-terutama-plastik",
                    text: "Penanganan pencemaran air, tanah, udara dari industri, pertanian, domestik terutama plastik"
                },
                {
                    value: "pencegahan-dan-penanggulangan-kerusakan-lingkungan",
                    text: "Pencegahan dan penanggulangan kerusakan lingkungan"
                },
                {
                    value: "ekonomi-sirkular",
                    text: "Ekonomi sirkular"
                }
            ],
            "hukum-dan-budaya": [{
                    value: "keadilan-pemanfaatan-sumber-daya-alam-dan-lingkungan",
                    text: "Keadilan terhadap pemanfaatan sumber daya alam dan lingkungan"
                },
                {
                    value: "kearifan-tradisional-dalam-pengelolaan-sumber-daya-alam",
                    text: "Kearifan tradisional dalam pengelolaan sumber daya alam"
                },
                {
                    value: "komunikasi-pendidikan-lingkungan-hidup",
                    text: "Komunikasi dan pendidikan lingkungan hidup"
                }
            ]
        };

        // Fungsi untuk mengisi sub-tema
        function populateSubTema(temaSelect, subTemaSelect, selectedSubTema) {
            const selectedTema = temaSelect.value;
            subTemaSelect.innerHTML = '<option value="" disabled selected>Pilih Sub Tema Kegiatan</option>'; // Reset pilihan

            if (subTemaOptions[selectedTema]) {
                subTemaSelect.disabled = false;
                subTemaOptions[selectedTema].forEach(subTema => {
                    const option = document.createElement('option');
                    option.value = subTema.value;
                    option.text = subTema.text;

                    if (subTema.value === selectedSubTema) {
                        option.selected = true;
                    }
                    subTemaSelect.appendChild(option);
                });
            } else {
                subTemaSelect.disabled = true;
            }
        }

        const temaKegiatanSelect = document.getElementById('tema-kegiatan');
        const subTemaKegiatanSelect = document.getElementById('sub-tema-kegiatan');

        temaKegiatanSelect.addEventListener('change', function() {
            populateSubTema(this, subTemaKegiatanSelect, '');
        });

        // Mengisi sub-tema saat halaman dimuat
        window.onload = function() {
            const selectedTema = '<?= isset($kegiatanUtama) ? $kegiatanUtama['tema'] : ''; ?>';
            const selectedSubTema = '<?= isset($kegiatanUtama) ? $kegiatanUtama['sub_tema'] : ''; ?>';

            if (selectedTema) {
                temaKegiatanSelect.value = selectedTema;
                populateSubTema(temaKegiatanSelect, subTemaKegiatanSelect, selectedSubTema);
            }

            // Mengisi sub-tema untuk kegiatan lainnya
            const kegiatanLainnya = <?= isset($kegiatanLainnya) ? json_encode($kegiatanLainnya) : '[]' ?>;
            kegiatanLainnya.forEach((kegiatan, index) => {
                const temaLainnyaSelect = document.getElementById(`tema-lainnya-${index}`);
                const subTemaLainnyaSelect = document.getElementById(`sub-tema-lainnya-${index}`);

                temaLainnyaSelect.addEventListener('change', function() {
                    populateSubTema(this, subTemaLainnyaSelect, '');
                });

                if (kegiatan.tema) {
                    temaLainnyaSelect.value = kegiatan.tema;
                    populateSubTema(temaLainnyaSelect, subTemaLainnyaSelect, kegiatan.sub_tema);
                }
            });
        }

        // Batasan Kata
        function updateWordCount(textarea, countId, maxWords) {
            const countElement = document.getElementById(countId);

            // Tambahkan event listener untuk mendeteksi perubahan input
            textarea.addEventListener('input', function() {
                let words = textarea.value.trim().split(/\s+/).filter(word => word.length > 0); // Pisahkan kata berdasarkan spasi
                let currentLength = words.length;

                // Jika kata lebih dari 1000, potong ke 1000 kata
                if (currentLength > maxWords) {
                    words = words.slice(0, maxWords);
                    textarea.value = words.join(" ");
                    currentLength = maxWords; // Set currentLength ke batas maksimal
                }

                // Update jumlah kata di elemen counter
                countElement.textContent = `${currentLength}/${maxWords} kata`;
            });

            // Event keydown untuk mencegah input baru jika kata sudah mencapai 1000
            textarea.addEventListener('keydown', function(event) {
                let words = textarea.value.trim().split(/\s+/).filter(word => word.length > 0);
                let currentLength = words.length;

                const isControlKey = event.key === "Backspace" || event.key === "Delete" || event.key.startsWith("Arrow");

                // Jika sudah 1000 kata, cegah input baru kecuali tombol penghapusan atau navigasi
                if (currentLength >= maxWords && !isControlKey) {
                    event.preventDefault(); // Cegah penambahan input baru jika mencapai batas maksimal kata
                }
            });
        }

        // Jalankan fungsi ketika halaman di-load
        updateWordCount(document.getElementById('pihakPeran'), 'pihakPeranCount', 1000);
        updateWordCount(document.getElementById('penjelasan'), 'penjelasanCount', 1000);
        updateWordCount(document.getElementById('keberhasilan'), 'keberhasilanCount', 1000);

        updateWordCount(document.getElementById('dampakLingkungan'), 'dampakLingkunganCount', 1000);
        updateWordCount(document.getElementById('dampakEkonomi'), 'dampakEkonomiCount', 1000);
        updateWordCount(document.getElementById('dampakSosial'), 'dampakSosialCount', 1000);

        updateWordCount(document.getElementById('prakarsa'), 'prakarsaCount', 1000);
        updateWordCount(document.getElementById('motivasi'), 'motivasiCount', 1000);
        updateWordCount(document.getElementById('inovasi'), 'inovasiCount', 1000);
        updateWordCount(document.getElementById('kreativitas'), 'kreativitasCount', 1000);

        updateWordCount(document.getElementById('sumber'), 'sumberCount', 1000);
        updateWordCount(document.getElementById('teknologi'), 'teknologiCount', 1000);
        updateWordCount(document.getElementById('statusLahan'), 'statusLahanCount', 1000);

        updateWordCount(document.getElementById('keistimewaanCalon'), 'keistimewaanCalonCount', 1000);
        updateWordCount(document.getElementById('penghargaanRelevan'), 'penghargaanRelevanCount', 1000);

        let kegiatanCount = <?= isset($kegiatanLainnya) ? count($kegiatanLainnya) : 0; ?>;
        const maxKegiatan = 3;

        document.addEventListener('DOMContentLoaded', function() {
            const formContainer = document.getElementById('formContainer');

            formContainer.addEventListener('change', function(event) {
                if (event.target && event.target.matches('select[id^="jenisKegiatan"]')) {
                    const jenisLainnya = event.target.closest('.grid').querySelector('#jenisLainnya');
                    if (event.target.value === 'jenis-kegiatan-lainnya') {
                        jenisLainnya.classList.remove('hidden');
                    } else {
                        jenisLainnya.classList.add('hidden');
                    }
                }
            });

            // Cek jumlah kegiatan saat halaman dimuat
            if (kegiatanCount >= maxKegiatan) {
                document.getElementById('tambahKegiatanBtn').style.display = 'none';
            }

            const existingInputDates = formContainer.querySelectorAll('input[name^="kegiatan_lainnya"]');
            existingInputDates.forEach(setDateRestrictions);
        });

        function tambahKegiatan() {
            if (kegiatanCount < maxKegiatan) {
                kegiatanCount++;
                const formContainer = document.getElementById('formContainer');

                // Salin form yang ada
                const newForm = `
            <div class="grid grid-cols-1 gap-4 mt-4">
                <!-- Kolom kiri -->
                <div class="space-y-4">
                <?= csrf_field(); ?>
                                <input type="hidden" name="kegiatan_lainnya[${kegiatanCount}][id_pendaftaran]" value="<?= $pendaftaran['id_pendaftaran'] ?>">
                                <p class="mt-8 font-semibold mb-2 text-md text-primary underline">Kegiatan Lain ( ${kegiatanCount} )</p>
                        <div>
                            <label class="block mb-2 text-sm text-black">Tema Kegiatan</label>
                            <select name="kegiatan_lainnya[${kegiatanCount}][tema]" id="tema-kegiatan-${kegiatanCount}" class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease">
                                <option value="" disabled selected>Pilih Tema Kegiatan</option>
                                <option value="keanekaragaman-hayati">Keanekaragaman Hayati</option>
                                <option value="perubahan-iklim">Perubahan Iklim</option>
                                <option value="pencemaran-dan-kerusakan-lingkungan">Pencemaran dan Kerusakan Lingkungan</option>
                                <option value="hukum-dan-budaya">Hukum dan Budaya</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm text-black">Sub Tema Kegiatan</label>
                            <select name="kegiatan_lainnya[${kegiatanCount}][sub_tema]"  id="sub-tema-kegiatan-${kegiatanCount}" disabled class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease">
                                <option value="" disabled selected>Pilih Sub Tema Kegiatan</option>
                                
                            </select>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm text-black">Bentuk Kegiatan</label>
                            <input name="kegiatan_lainnya[${kegiatanCount}][bentuk_kegiatan]" type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" />
                        </div>
                        <div>
                            <label class="block mb-2 text-sm text-black">Tahun Mulai Kegiatan</label>
                            <input name="kegiatan_lainnya[${kegiatanCount}][tahun_mulai]" type="date" id="tahun_mulai" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                        </div>
                        <div>
                    <label class="block mb-2 text-sm text-black">Penjelasan Kegiatan</label>
                    <textarea name="kegiatan_lainnya[${kegiatanCount}][deskripsi_kegiatan]" id="penjelasan${kegiatanCount}" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" rows="4"
                        oninput="updateWordCount(this, 'penjelasanCount${kegiatanCount}', 1000)"></textarea>
                    <p id="penjelasanCount${kegiatanCount}" class="text-xs text-slate-400 flex justify-end ">0/1000 Kata</p>
                </div>
                    </div>

                <!-- Kolom kanan -->
                <div class="space-y-4">
                        <div>
                            <label class="block mb-2 text-sm text-black">Lokasi Kegiatan</label>
                            <input name="kegiatan_lainnya[${kegiatanCount}][lokasi_kegiatan]" type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                        </div>
                        <div>
                            <label class="block mb-2 text-sm text-black">Koordinat Lokasi Kegiatan</label>
                            <input name="kegiatan_lainnya[${kegiatanCount}][koordinat]" type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                        </div>
                        <div>
                    <label class="block mb-2 text-sm text-black">Para Pihak dan Perannya</label>
                    <textarea name="kegiatan_lainnya[${kegiatanCount}][pihak_dan_peran]" id="pihakPeran${kegiatanCount}" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" rows="4"
                        oninput="updateWordCount(this, 'pihakPeranCount${kegiatanCount}', 1000)"></textarea>
                    <p id="pihakPeranCount${kegiatanCount}" class="text-xs text-slate-400 flex justify-end ">0/1000 Kata</p>
                </div>
                        <div>
                    <label class="block mb-2 text-sm text-black">Keberhasilan yang Dicapai</label>
                    <textarea name="kegiatan_lainnya[${kegiatanCount}][keberhasilan]" id="keberhasilan${kegiatanCount}" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" rows="4"
                        oninput="updateWordCount(this, 'keberhasilanCount${kegiatanCount}', 1000)"></textarea>
                    <p id="keberhasilanCount${kegiatanCount}" class="text-xs text-slate-400 flex justify-end ">0/1000 Kata</p>
                </div>

                    </div>
                </div>
            </div>`;

                formContainer.insertAdjacentHTML('beforeend', newForm);

                const newInputDate = formContainer.querySelector(`input[name="kegiatan_lainnya[${kegiatanCount}][tahun_mulai]"]`);
                setDateRestrictions(newInputDate);

                // Ambil elemen select tema dan sub-tema untuk form yang baru ditambahkan
                const temaSelect = document.getElementById(`tema-kegiatan-${kegiatanCount}`);
                const subTemaSelect = document.getElementById(`sub-tema-kegiatan-${kegiatanCount}`);

                // Event listener untuk mengisi sub-tema berdasarkan tema yang dipilih
                temaSelect.addEventListener('change', function() {
                    populateSubTema(temaSelect, subTemaSelect, '');
                });


                // Panggil fungsi updateWordCount untuk tiap textarea yang baru ditambahkan
                updateWordCount(document.getElementById(`penjelasan${kegiatanCount}`), `penjelasanCount${kegiatanCount}`, 1000);
                updateWordCount(document.getElementById(`pihakPeran${kegiatanCount}`), `pihakPeranCount${kegiatanCount}`, 1000);
                updateWordCount(document.getElementById(`keberhasilan${kegiatanCount}`), `keberhasilanCount${kegiatanCount}`, 1000);

                // Jika sudah mencapai batas, sembunyikan tombol tambah
                if (kegiatanCount >= maxKegiatan) {
                    document.getElementById('tambahKegiatanBtn').style.display = 'none';
                }
            }
        }

        function kirimDataKegiatan() {
            const formData = new FormData();

            // Ambil semua elemen dengan name yang sama untuk setiap form
            const idPendaftaranElements = document.querySelectorAll('input[name^="kegiatan_lainnya["][name$="[id_pendaftaran]"]');
            const temaKegiatan = document.querySelectorAll('select[name^="kegiatan_lainnya["][name$="[tema]"]'); // Ambil select tema
            const subTemaKegiatan = document.querySelectorAll('select[name^="kegiatan_lainnya["][name$="[sub_tema]"]'); // Ambil select sub-tema
            const bentukKegiatan = document.querySelectorAll('input[name="bentuk_kegiatan[]"]');
            const tahunMulaiKegiatan = document.querySelectorAll('input[name="tahun_mulai[]"]');
            const deskripsiKegiatan = document.querySelectorAll('textarea[name="deskripsi_kegiatan[]"]'); // Ubah menjadi textarea
            const lokasiKegiatan = document.querySelectorAll('input[name="lokasi_kegiatan[]"]');
            const koordinatKegiatan = document.querySelectorAll('input[name="koordinat[]"]');
            const pihakDanPeranKegiatan = document.querySelectorAll('textarea[name="pihak_dan_peran[]"]'); // Ubah menjadi textarea
            const keberhasilanKegiatan = document.querySelectorAll('textarea[name="keberhasilan[]"]'); // Ubah menjadi textarea

            temaKegiatan.forEach((tema, index) => {
                // Menggunakan id pendaftaran dari elemen pertama
                formData.append(`kegiatan_lainnya[${index}][id_pendaftaran]`, idPendaftaranElements[0].value);
                formData.append(`kegiatan_lainnya[${index}][tema]`, tema.value);
                formData.append(`kegiatan_lainnya[${index}][sub_tema]`, subTemaKegiatan[index].value || ''); // Pastikan ini ada
                formData.append(`kegiatan_lainnya[${index}][bentuk_kegiatan]`, bentukKegiatan[index].value);
                formData.append(`kegiatan_lainnya[${index}][tahun_mulai]`, tahunMulaiKegiatan[index].value);
                formData.append(`kegiatan_lainnya[${index}][deskripsi_kegiatan]`, deskripsiKegiatan[index].value);
                formData.append(`kegiatan_lainnya[${index}][lokasi_kegiatan]`, lokasiKegiatan[index].value);
                formData.append(`kegiatan_lainnya[${index}][koordinat]`, koordinatKegiatan[index].value);
                formData.append(`kegiatan_lainnya[${index}][pihak_dan_peran]`, pihakDanPeranKegiatan[index].value);
                formData.append(`kegiatan_lainnya[${index}][keberhasilan]`, keberhasilanKegiatan[index].value);
            });

            // Mengirim data ke controller menggunakan fetch
            fetch('pengusul/simpanForm/kegiatan', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    // Menangani respons dari server
                    console.log('Success:', data);
                    // Tambahkan logika sukses, seperti menampilkan pesan atau mengalihkan halaman
                })
                .catch((error) => {
                    console.error('Error:', error);
                    // Tambahkan logika error
                });
        }


        // Tambah Foto Kegiatan dan Tambah Tautan Video
        const maxFotoInput = 5;
        const fotoContainer = document.getElementById('fotoContainer');
        const tambahFotoButton = document.getElementById('tambahFotoButton');
        let fotoInputCount = document.querySelectorAll('#fotoInputs > div').length || 1;

        function showErrorMessage(inputElement, message) {
            const errorMessage = document.createElement('p');
            errorMessage.classList.add('text-red-500', 'text-sm', 'mt-2');
            errorMessage.innerText = message;
            inputElement.parentElement.appendChild(errorMessage);
        }

        function validateFile(fileInput) {
            const file = fileInput.files[0];
            if (file) {
                const allowedTypes = ['image/jpeg', 'image/jpg'];
                const maxSize = 1024 * 1024; // 1MB

                const previousError = fileInput.parentElement.querySelector('.text-red-500');
                if (previousError) {
                    previousError.remove();
                }

                if (!allowedTypes.includes(file.type)) {
                    showErrorMessage(fileInput, 'Tipe file tidak valid. Hanya JPG/JPEG yang diizinkan.');
                    return false;
                }

                if (file.size > maxSize) {
                    showErrorMessage(fileInput, 'Ukuran file melebihi batas 1MB.');
                    return false;
                }
            }
            return true;
        }

        tambahFotoButton.addEventListener('click', function() {
            if (fotoInputCount < maxFotoInput) {
                const newFotoDiv = document.createElement('div');
                newFotoDiv.classList.add('mb-4');
                newFotoDiv.innerHTML = `
                    <label class="block mb-2 text-sm text-black">Foto Kegiatan <span class="text-primary">(.JPG/JPEG, max 1MB)</span></label>
                    <input name="foto_kegiatan${fotoInputCount + 1}" type="file" accept=".jpg, .jpeg" class="mb-2 w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                    <label class="block mb-2 text-sm text-black">Deskripsi Foto </label>
                    <input name="deskripsi_foto_kegiatan${fotoInputCount + 1}" type="text" placeholder="Keterangan Foto" class="mb-4 w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                `;
                fotoContainer.insertBefore(newFotoDiv, tambahFotoButton);
                fotoInputCount++;

                const newFileInput = newFotoDiv.querySelector('input[type="file"]');
                newFileInput.addEventListener('change', function() {
                    validateFile(newFileInput);
                });

                if (fotoInputCount === maxFotoInput) {
                    tambahFotoButton.style.display = 'none';
                }
            }
        });

        document.querySelectorAll('input[type="file"]').forEach(fileInput => {
            fileInput.addEventListener('change', function() {
                validateFile(fileInput);
            });
        });
    </script>
    <?= $this->endSection() ?>

</body>

</html>