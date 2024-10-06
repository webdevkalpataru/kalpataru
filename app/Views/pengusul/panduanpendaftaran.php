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

    <div class="flex flex-col lg:flex-row justify-end gap-16 m-4">
        <?= $this->include('template/sidebar') ?>

        <!-- Konten utama -->
        <div class="relative flex flex-col w-full max-w-2xl mx-auto mb-4 rounded-xl border-2 border-primary bg-white shadow-md lg:p-8 p-4">
            <h4 class="block text-xl font-bold text-slate-800 mb-2">
                Panduan Pendaftaran
            </h4>
            <div>
    <iframe class="w-full mt-4 h-[350px]" src="<?= base_url('./sample.pdf') ?>" frameborder="0"></iframe>
</div>

        </div>
    </div>

    <?= $this->endSection() ?>
</body>

</html>
