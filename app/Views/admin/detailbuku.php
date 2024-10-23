<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title><?= $title; ?></title>
</head>

<body class="lg:flex">

    <!-- Sidebar -->
    <?= $this->include('template/sidebaradmin') ?>
    <div class="lg:flex-1 p-6">

        <!-- Header -->
        <header class="bg-white shadow">
            <div class="container mx-auto flex items-center justify-between p-4 md:p-6">
                <h1 class="text-xl md:text-2xl font-semibold text-gray-700">Detail Buku Kalpataru</h1>
                <div class="flex items-center">
                    <p class="text-gray-500 mr-2 md:mr-4">Hello, <?= session()->get('nama'); ?></p>
                    <a href="/auth/logoutinternal" class="bg-rejected text-white px-3 py-2 md:px-4 md:py-2 rounded-lg inline-block">Keluar</a>
                </div>
            </div>
        </header>

        <!-- Konten Detail Buku dengan Layout Dua Kolom -->
        <div class="mt-4 relative flex flex-col lg:flex-row w-full mx-auto mb-4 border-2 border-primary bg-white shadow-md lg:p-8">

            <!-- Kolom Kiri: Gambar Buku -->
            <div class="lg:w-1/2 flex justify-center items-center p-4">
                <img src="/public/<?= $buku['cover']; ?>" class="object-contain w-full h-auto rounded-md">
            </div>

            <!-- Kolom Kanan: Detail Buku -->
            <div class="lg:w-1/2 p-4 lg:p-8">
                <!-- Judul Buku -->
                <div class="my-4">
                    <h1 class="text-slate-800 text-md font-semibold text-xl">
                        <?= esc($buku['judul']); ?>
                    </h1>
                </div>

                <!-- Dokumen Buku -->
                <div class="my-4">
                    <a href="<?= base_url($buku['file']); ?>" download>
                        <button id="editbuku" class="w-full lg:w-48 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-blue-500 hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                            <i class="fas fa-edit"></i> Unduh Buku
                        </button>
                    </a>
                </div>

                <!-- Tombol Edit Buku -->
                <div class="mt-4">
                    <a href="/admin/buku-kalpataru/edit/<?= esc($buku['id_buku']); ?>">
                        <button id="editbuku" class="w-full lg:w-48 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                            <i class="fas fa-edit"></i> Edit Buku
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>