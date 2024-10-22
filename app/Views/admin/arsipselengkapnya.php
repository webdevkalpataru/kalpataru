<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/app.css">
    <title>Tambah Arsip Penerima</title>
</head>

<body class="lg:flex">

    <!-- Sidebar -->
    <?= $this->include('template/sidebaradmin') ?>

    <!-- Main Content -->
    <div class="lg:flex-1 p-6">
        <div class="min-h-screen flex flex-col">

            <!-- Header -->
            <header class="bg-white shadow">
                <div class="container mx-auto flex items-center justify-between p-4 md:p-6">
                    <h1 class="text-xl md:text-2xl font-semibold text-gray-700">Arsip Selengkapnya</h1>
                    <div class="flex items-center">
                        <p class="text-gray-500 mr-2 md:mr-4">Hello, Admin</p>
                        <button class="bg-rejected text-white px-3 py-2 md:px-4 md:py-2 rounded-lg">Keluar</button>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <div class="relative flex flex-col w-full lg:max-w-5xl mb-4 rounded-xl border-2 border-primary mt-4 bg-white shadow-md lg:p-8 p-4">

                <form action="/admin/daftardppk" class="mt-4 mb-2 w-full" method="post" id="profil-form">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <!-- Kolom kiri -->
                        <div class="space-y-4">
                            <div>
                                <label class="block mb-2 text-sm text-black">Penerima</label>
                                <input type="text" name="penerima" id="penerima" value="John Doe" class="w-full placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" required />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Kategori</label>
                                <select name="kategori" id="kategori" class="w-full placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" required>
                                    <option value="" disabled>Pilih Kategori</option>
                                    <option value="kategori1" selected>Perintis Lingkungan</option>
                                    <option value="kategori2">Pengabdi Lingkungan</option>
                                    <option value="kategori3">Kategori 3</option>
                                    <option value="kategori4">Kategori 4</option>
                                </select>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Tema</label>
                                <select name="tema" id="tema" class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" required>
                                    <option value="" disabled>Pilih Tema</option>
                                    <option value="keanekaragaman_hayati" selected>Keanekaragaman Hayati</option>
                                    <option value="perubahan_iklim">Perubahan Iklim</option>
                                    <option value="pencemaran_kerusakan_lingkungan">Pencemaran dan Kerusakan Lingkungan</option>
                                    <option value="hukum_budaya">Hukum dan Budaya</option>
                                </select>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Sub Tema</label>
                                <select name="subtema" id="subtema" class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" required>
                                    <option value="" disabled>Pilih Subtema</option>
                                    <option value="flora_dan_fauna" selected>Flora dan Fauna</option>
                                    <option value="ekosistem">Ekosistem</option>
                                    <option value="konservasi">Konservasi</option>
                                </select>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Tahun</label>
                                <input type="number" name="tahun" id="tahun" value="2023" class="w-full placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" required />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Usia</label>
                                <input type="number" name="usia" id="usia" value="35" class="w-full placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" required />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Provinsi</label>
                                <input type="text" name="provinsi" id="provinsi" value="Jawa Barat" class="w-full placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" required />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Kab/Kota (saat menerima)</label>
                                <input type="text" name="kabkota" id="kabkota" value="Bandung" class="w-full placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" required />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Kecamatan (saat menerima)</label>
                                <input type="text" name="kecamatan" id="kecamatan" value="Cibeunying" class="w-full placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" required />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Desa (saat menerima)</label>
                                <input type="text" name="desa" id="desa" value="Cikutra" class="w-full placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" required />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Status</label>
                                <input type="text" name="status" id="status" value="Aktif" class="w-full placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" required />
                            </div>
                        </div>

                        <!-- Kolom kanan -->
                        <div class="space-y-4">
                            <div>
                                <label class="block mb-2 text-sm text-black">Kelompok ISU</label>
                                <input type="text" name="kelompok_isu" id="kelompok_isu" value="Lingkungan Hidup" class="w-full placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" required />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Kegiatan</label>
                                <input type="text" name="kegiatan" id="kegiatan" value="Penanaman Pohon" class="w-full placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" required />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Foto/Video (link drive)</label>
                                <input type="text" name="fotovideo" id="fotovideo" value="https://drive.google.com/example" class="w-full placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" required />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Artikel/Media (link drive)</label>
                                <input type="text" name="artikelmedia" id="artikelmedia" value="https://drive.google.com/article" class="w-full placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" required />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Dokumen Pendukung (link drive)</label>
                                <input type="text" name="dokumenpendukung" id="dokumenpendukung" value="https://drive.google.com/supportdocs" class="w-full placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" required />
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="w-full bg-primary text-white px-6 py-3 rounded-md hover:bg-opacity-90 transition duration-300 ease">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</body>

</html>
