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

        <!-- Konten utama -->
        <div class="relative flex flex-col w-full max-w-5xl mb-4 rounded-xl border-2 border-primary bg-white shadow-md lg:p-8 p-4">
            <h4 class="block text-xl font-bold text-slate-800 mb-2">
                Formulir Identitas Calon Usulan
            </h4>

            <?php if ($kategori == 'Penyelamat Lingkungan'): ?>
                <form id="identitasc" action="simpancalonidentitas" method="post" class="mt-4 mb-2 w-full" enctype="multipart/form-data">
                    <div class="grid grid-cols-2 gap-4">

                        <!-- Kolom kiri -->
                        <div class="space-y-4">
                            <p class="font-semibold mb-2 text-md text-primary underline">Data Kelompok/ Komunitas</p>
                            <div>
                                <label class="block mb-2 text-sm text-black">Nama Kelompok</label>
                                <input type="text" name="nama" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label for="tahun_pembentukan" class="block mb-2 text-sm text-black">Tahun Berdiri Kelompok</label>
                                <input type="date" name="tahun_pembentukan" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Jumlah Anggota</label>
                                <input type="number" name="jumlah_anggota" min="1" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Jalan</label>
                                <input type="text" name="jalan" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">RT/RW</label>
                                <input type="text" name="rt_rw" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Desa/Kelurahan</label>
                                <input type="text" name="desa" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Kecamatan</label>
                                <input type="text" name="kecamatan" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Kab/Kota</label>
                                <input type="text" name="kab_kota" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Provinsi</label>
                                <select id="provinsi" name="provinsi"
                                    class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow">
                                    <option value="" disabled selected>Pilih Provinsi</option>
                                    <?php foreach ($provinsi_list as $provinsi) { ?>
                                        <option value="<?php echo $provinsi; ?>"><?php echo $provinsi; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Kode Pos</label>
                                <input type="text" name="kode_pos" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Media Sosial</label>
                                <input type="text" name="media_sosial" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Unggah Surat Legalitas Kelompok <span class="text-primary">(.pdf)</span></label>
                                <input id="suratpengantar" name="legalitas" type="file" accept="application/pdf"
                                    class="w-full border-2 border-slate-200 text-primary text-xs rounded-lg p-2 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none">
                            </div>
                        </div>

                        <!-- Kolom kanan -->
                        <div class="space-y-4">
                            <p class="font-semibold mb-2 text-md text-primary underline">Data Ketua Kelompok/ Komunitas</p>
                            <div>
                                <label class="block mb-2 text-sm text-black">Nama Ketua</label>
                                <input type="text" name="nama_ketua" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">NIK</label>
                                <input type="text" name="nik" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Usia</label>
                                <input type="number" name="usia" min="0" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full">
                                <label class="block mb-2 text-sm text-black">Jenis Kelamin</label>
                                <div class="lg:flex gap-6">
                                    <div class="flex items-center py-2 ">
                                        <input name="jenis_kelamin" type="radio" value="Perempuan" class="peer h-5 w-5 cursor-pointer appearance-none rounded-full border border-primary checked:bg-primary transition-all" id="perempuan">
                                        <label class="ml-2 text-black cursor-pointer text-sm" for="perempuan">Perempuan</label>
                                    </div>
                                    <div class="flex items-center py-2 ">
                                        <input name="jenis_kelamin" type="radio" value="Laki-Laki" class="peer h-5 w-5 cursor-pointer appearance-none rounded-full border border-primary checked:bg-primary transition-all" id="laki-laki">
                                        <label class="ml-2 text-black cursor-pointer text-sm" for="laki-laki">Laki-Laki</label>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Pekerjaan</label>
                                <input type="text" name="pekerjaan" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Nomor Telepon</label>
                                <input type="number" name="telepon" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Email</label>
                                <input type="email" name="email" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Pendidikan Terakhir</label>
                                <input type="text" name="pendidikan" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label for="ktp" class="block mb-2 text-sm text-black">Unggah KTP <span class="text-primary">(.jpg/jpeg)</span></label>
                                <input type="file" name="ktp" id="ktp" accept=".jpg,.jpeg" required class="w-full border-2 border-slate-200 text-primary text-xs rounded-lg p-2 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none">
                                <?php if (isset($validation) && $validation->getError('ktp')): ?>
                                    <div style="color:red;">
                                        <?= $validation->getError('ktp') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div>
                                <label for="skck" class="block mb-2 text-sm text-black">Unggah SKCK <span class="text-primary">(.pdf)</span></label>
                                <input type="file" name="skck" id="skck" accept=".pdf" required class="w-full border-2 border-slate-200 text-primary text-xs rounded-lg p-2 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none">
                                <?php if (isset($validation) && $validation->getError('skck')): ?>
                                    <div style="color:red;">
                                        <?= $validation->getError('skck') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black" for="tanggal_skck">Tanggal SKCK</label>
                                <input type="date" name="tanggal_skck" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button class="mt-4 w-32 rounded-md py-2 px-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="submit">Simpan</button>
                    </div>
                </form>

            <?php else: ?>
                <form id="identitasabd" class="mt-4 mb-2 w-full" action="simpancalonidentitas" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Kolom kiri -->
                        <div class="space-y-4">
                            <div>
                                <label class="block mb-2 text-sm text-black">Nama Lengkap</label>
                                <input type="text" name="nama_individu" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">NIK</label>
                                <input type="text" name="nik_individu" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Usia</label>
                                <input type="number" name="usia" min="0" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div class="w-full">
                                <label class="block mb-2 text-sm text-black">Jenis Kelamin</label>
                                <div class="lg:flex gap-6">
                                    <div class="flex items-center py-2 ">
                                        <input name="jenis_kelamin" type="radio" value="Perempuan" class="peer h-5 w-5 cursor-pointer appearance-none rounded-full border border-primary checked:bg-primary transition-all" id="perempuan">
                                        <label class="ml-2 text-black cursor-pointer text-sm" for="perempuan">Perempuan</label>
                                    </div>
                                    <div class="flex items-center py-2 ">
                                        <input name="jenis_kelamin" type="radio" value="Laki-Laki" class="peer h-5 w-5 cursor-pointer appearance-none rounded-full border border-primary checked:bg-primary transition-all" id="laki-laki">
                                        <label class="ml-2 text-black cursor-pointer text-sm" for="laki-laki">Laki-Laki</label>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Pekerjaan</label>
                                <input type="text" name="pekerjaan" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Nomor Telepon</label>
                                <input type="number" name="telepon" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Email</label>
                                <input type="email" name="email" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Pendidikan Terakhir</label>
                                <input type="text" name="pendidikan" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                        </div>

                        <!-- Kolom kanan -->
                        <div class="space-y-4">
                            <div>
                                <label class="block mb-2 text-sm text-black">Jalan</label>
                                <input type="text" name="jalan" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">RT/RW</label>
                                <input type="text" name="rt_rw" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Desa/Kelurahan</label>
                                <input type="text" name="desa" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Kecamatan</label>
                                <input type="text" name="kecamatan" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Kab/Kota</label>
                                <input type="text" name="kab_kota" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Provinsi</label>
                                <select id="provinsi" name="provinsi"
                                    class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow">
                                    <option value="" disabled selected>Pilih Provinsi</option>
                                    <?php foreach ($provinsi_list as $provinsi) { ?>
                                        <option value="<?php echo $provinsi; ?>"><?php echo $provinsi; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Kode Pos</label>
                                <input type="text" name="kode_pos" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Media Sosial</label>
                                <input type="text" name="media_sosial" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                            <div>
                                <label for="ktp" class="block mb-2 text-sm text-black">Unggah KTP <span class="text-primary">(.jpg/jpeg)</span></label>
                                <input type="file" name="ktp" id="ktp" accept=".jpg,.jpeg" required class="w-full border-2 border-slate-200 text-primary text-xs rounded-lg p-2 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none">
                                <?php if (isset($validation) && $validation->getError('ktp')): ?>
                                    <div style="color:red;">
                                        <?= $validation->getError('ktp') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div>
                                <label for="skck" class="block mb-2 text-sm text-black">Unggah SKCK <span class="text-primary">(.pdf)</span></label>
                                <input type="file" name="skck" id="skck" accept=".pdf" required class="w-full border-2 border-slate-200 text-primary text-xs rounded-lg p-2 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none">
                                <?php if (isset($validation) && $validation->getError('skck')): ?>
                                    <div style="color:red;">
                                        <?= $validation->getError('skck') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black" for="tanggal_skck">Tanggal SKCK</label>
                                <input type="date" name="tanggal_skck" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button class="mt-4 w-32 rounded-md py-2 px-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="submit">Simpan</button>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>

    <?= $this->endSection() ?>
</body>

</html>