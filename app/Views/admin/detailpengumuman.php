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
                <h1 class="text-xl md:text-2xl font-semibold text-gray-700">Detail Pengumuman</h1>
                <div class="flex items-center">
                    <p class="text-gray-500 mr-2 md:mr-4">Hello, <?= session()->get('nama'); ?></p>
                    <a href="/auth/logout" class="bg-rejected text-white px-3 py-2 md:px-4 md:py-2 rounded-lg inline-block">Keluar</a>
                </div>
            </div>
        </header>


        <div class="mt-4 relative flex flex-col w-full  mx-auto mb-4 border-2 border-primary bg-white shadow-md lg:p-8">
            <div class="relative flex items-center justify-center h-full overflow-hidden text-white rounded-md">
                <img src="/public/<?= $pengumuman['foto']; ?>" class="object-contain w-full h-full">
            </div>

            <div>
                <div class="my-4">
                    <h1 class="text-slate-800 text-md font-semibold text-xl">
                        <?= esc($pengumuman['judul']); ?>
                    </h1>
                    <h3 class="text-sm">
                        Tanggal Pengumuman: <?= esc($pengumuman['tanggal']); ?>
                    </h3>
                </div>
                <p class="text-slate-600 leading-normal font-light text-justify mt-4">
                    <?= nl2br(esc($pengumuman['konten'])); ?><br><br>
                    <strong> Penulis: <?= esc($pengumuman['penulis']); ?> </strong>
                </p>
            </div>
            <div class="flex space-x-4">
                <a href="/admin/pengumuman/edit/<?= esc($pengumuman['id_pengumuman']); ?>">
                    <div class="mt-4">
                        <button id="editpengumuman" class="w-48 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                            <i class="fas fa-edit"></i> Edit Pengumuman
                        </button>
                    </div>
                </a>
            </div>
        </div>
</body>

</html>