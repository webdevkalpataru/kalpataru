<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/app.css">
    <title><?= $title; ?></title>
</head>

<body>

    <?= $this->extend('template/navbarfooter') ?>

    <?= $this->section('content') ?>

    <div class="flex flex-col lg:flex-row justify-center">
        <?= $this->include('template/sidebar') ?>

        <!-- Konten utama -->
        <div class="relative flex flex-col w-full max-w-2xl mx-auto mb-4 rounded-xl border-2 border-primary bg-white shadow-md p-4">
            <h4 class="block text-xl font-bold text-slate-800 mb-2">
                Tambah Calon Usulan
            </h4>
            <div class="flex bg-yellow-400 items-center justify-center rounded-md">
                <svg class="lg:ml-0 ml-2 w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                </svg>
                <h3 class="block text-sm font-semibold p-2 text-black">
                    Silahkan pilih kategori penghargaan sesuai dengan calon yang Anda Usulkan
                </h3>
            </div>

            <!-- Menambahkan grid untuk kontrol layout responsif -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 my-12">
                <img src="/images/kategoria.jpg" alt="kategoria" class="w-full h-auto rounded-2xl">
                <img src="/images/kategorib.jpg" alt="kategorib" class="w-full h-auto rounded-2xl">
                <img src="/images/kategoric.jpg" alt="kategoric" class="w-full h-auto rounded-2xl">
                <img src="/images/kategorid.jpg" alt="kategorid" class="w-full h-auto rounded-2xl">
            </div>
        </div>


    </div>

    <?= $this->endSection() ?>
</body>

</html>