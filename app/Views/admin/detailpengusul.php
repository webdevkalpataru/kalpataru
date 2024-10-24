<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/app.css">
    <title><?= $title; ?></title>
</head>

<body class="lg:flex">



    <!-- Sidebar -->
    <?= $this->include('template/sidebaradmin') ?>

    <div class="lg:flex-1 p-6">
        <div class="min-h-screen flex flex-col">

            <header class="bg-white shadow">
                <div class="container mx-auto flex items-center justify-between p-4 md:p-6">
                    <h1 class="text-xl md:text-2xl font-semibold text-gray-700">Detail Akun Pengusul</h1>
                    <div class="flex items-center">
                        <p class="text-gray-500 mr-2 md:mr-4">Hello, <?= session()->get('nama'); ?></p>
                        <a href="/auth/logoutinternal" class="bg-rejected text-white px-3 py-2 md:px-4 md:py-2 rounded-lg inline-block">Keluar</a>
                    </div>
                </div>
            </header>

            <div class="relative flex flex-col w-full h-full bg-white shadow-md rounded-lg bg-clip-border my-6">
                <div class="mt-4 mb-2 w-full">
                    <div class="grid grid-cols-2 gap-4">

                        <!-- Kolom kiri -->
                        <div class="space-y-4">
                            <div>
                                <label class="block mb-2 text-sm text-black">Jenis Akun</label>
                                <p class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2">
                                    <?= esc($pengusul['jenis_instansi']); ?>
                                </p>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Nama Lengkap</label>
                                <p class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2">
                                    <?= esc($pengusul['nama_instansi_pribadi']); ?>
                                </p>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Provinsi</label>
                                <p class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2">
                                    <?= esc($pengusul['provinsi']); ?>
                                </p>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Nomor Telepon</label>
                                <p class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2">
                                    <?= esc($pengusul['telepon']); ?>
                                </p>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Email</label>
                                <p class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2">
                                    <?= esc($pengusul['email']); ?>
                                </p>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Instansi Pengusul</label>
                                <p class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2">
                                    <?= esc($pengusul['instansi']); ?>
                                </p>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Jabatan/Pekerjaan</label>
                                <p class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2">
                                    <?= esc($pengusul['jabatan_pekerjaan']); ?>
                                </p>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Jenis Kelamin</label>
                                <p class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2">
                                    <?= esc($pengusul['jenis_kelamin']); ?>
                                </p>
                            </div>
                        </div>

                        <!-- Kolom kanan -->
                        <div class="space-y-4">
                            <div>
                                <label class="block mb-2 text-sm text-black">Alamat</label>
                                <p class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2">
                                    <?= esc($pengusul['jalan']); ?>
                                </p>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">RT/RW</label>
                                <p class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2">
                                    <?= esc($pengusul['rt_rw']); ?>
                                </p>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Desa/Kelurahan</label>
                                <p class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2">
                                    <?= esc($pengusul['desa']); ?>
                                </p>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Kecamatan</label>
                                <p class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2">
                                    <?= esc($pengusul['kecamatan']); ?>
                                </p>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Kabpaten/Kota</label>
                                <p class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2">
                                    <?= esc($pengusul['kab_kota']); ?>
                                </p>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Kode Pos</label>
                                <p class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2">
                                    <?= esc($pengusul['kode_pos']); ?>
                                </p>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Surat Pengantar</label>
                                <a href="<?= base_url('/admin/download/' . esc($pengusul['surat_pengantar'])) ?>"
                                    class="text-blue-500 underline" download>
                                    Unduh Surat Pengantar
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>