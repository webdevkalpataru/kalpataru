<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
</head>

<body>

    <?= $this->extend('template/navbarfooter') ?>

    <?= $this->section('content') ?>

    <div class="flex flex-col lg:flex-row justify-center m-4">
        <?php if (session()->get('id_pengusul')): ?>
            <?= $this->include('template/sidebarpengusul') ?>
        <?php endif; ?>
        <div class="relative flex flex-col w-full max-w-5xl mb-4 rounded-xl border-2 border-primary bg-white shadow-md lg:p-8 p-4">
            <h4 class="block text-xl font-bold text-slate-800 mb-2">
                Detail Artikel Saya
            </h4>

            <div class="relative flex items-center justify-center h-full overflow-hidden text-white rounded-md">
                <img src="/public/images/<?= $artikel['foto']; ?>" class="object-contain w-full h-full">
            </div>

            <div>
                <div class="my-4">
                    <h2 class="text-slate-800 text-md font-semibold text-xl">
                        <?= $artikel['judul']; ?>
                    </h2>
                    <h3 class="text-sm">
                        Tanggal Artikel: <?= $artikel['tanggal']; ?>
                    </h3>
                </div>
                <p class="text-slate-600 leading-normal font-light text-justify mt-4">
                    <?= $artikel['konten']; ?><br><br>
                    Lokasi: Desa Salenrang, Kabupaten Maros, Sulawesi Selatan
                </p>
            </div>
        </div>

    </div>

    <?= $this->endSection() ?>
</body>

</html>