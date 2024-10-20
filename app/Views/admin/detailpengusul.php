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
                        <a href="/auth/logout" class="bg-rejected text-white px-3 py-2 md:px-4 md:py-2 rounded-lg inline-block">Keluar</a>
                    </div>
                </div>
            </header>

            <!-- <div class="relative flex flex-col w-full h-full bg-white shadow-md rounded-lg bg-clip-border my-6"> -->
            <div class="mt-4 relative flex flex-col w-full  mx-auto mb-4 border-2 border-primary bg-white shadow-md lg:p-8">
                <div class="mt-4 mb-2 w-full">
                    <div class="grid grid-cols-2 gap-4">

                        <!-- Kolom kiri -->
                        <div class="space-y-4">
                            <div>
                                <label class="block mb-2 text-sm text-black">Jenis Instansi</label>
                                <p class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2">
                                    <?= esc($pengusul['jenis_instansi']); ?>
                                </p>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Nama Instansi / Pribadi</label>
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
                            
                            <button onclick="window.history.back()"
                                class="text-sm font-bold text-gray-600 no-underline focus:outline-none text-start mt-6">
                                <span class="font-bold text-lg items-center">←</span> Kembali
                            </button>
                        </div>

                        <!-- Kolom kanan -->
                        <div class="space-y-4">
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
                                <label class="block mb-2 text-sm text-black">Surat Pengantar</label>
                                <button onclick="window.location.href='<?= base_url('/admin/download/' . esc($pengusul['surat_pengantar'])) ?>'"
                                    class="w-full rounded-md py-2 px-2 text-center font-semibold text-xs text-primary bg-secondary hover:shadow-md flex items-center justify-center gap-4" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                    </svg>
                                    Unduh Surat Pengantar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>