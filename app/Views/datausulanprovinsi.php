<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?= $this->extend('template/navbarfooter') ?>
    <?= $this->section('content'); ?>

    <section id="kategori" class="py-8 lg:mx-14 mx-0">
        <div class="text-center mb-4 px-4">
            <h1 class="text-lg sm:text-xl md:text-2xl lg:text-4xl font-medium text-black">Arsip Penerima - <?php echo $provinsi; ?></h1>
            <hr class="border-2 border-primary w-48 mx-auto mt-2">
            <p class="text-sm mt-12 lg:mx-32 mx-0">Berikut adalah daftar penerima Penghagaan Kalpataru di <?php echo $provinsi; ?></p>
        </div>
    </section>

    <div class="flex flex-col lg:flex-row items-start lg:justify-between lg:items-center my-4 px-4 lg:px-24">
        <div class=" items-center mb-4 lg:mb-0">
            <form id="filterForm" action="" method="get" class="flex items-center my-4 ms-4">
                <label for="kategori" class="text-sm font-bold text-primary">Filter Kategori:</label>
                <select name="kategori" id="kategori" class="ml-2 border-2 border-primary text-primary rounded-md shadow-sm" onchange="document.getElementById('filterForm').submit();">
                    <option value="">Semua Kategori</option>
                    <option value="Perintis Lingkungan" <?= ($kategori == 'Perintis Lingkungan') ? 'selected' : '' ?>>Perintis Lingkungan</option>
                    <option value="Pengabdi Lingkungan" <?= ($kategori == 'Pengabdi Lingkungan') ? 'selected' : '' ?>>Pengabdi Lingkungan</option>
                    <option value="Penyelamat Lingkungan" <?= ($kategori == 'Penyelamat Lingkungan') ? 'selected' : '' ?>>Penyelamat Lingkungan</option>
                    <option value="Pembina Lingkungan" <?= ($kategori == 'Pembina Lingkungan') ? 'selected' : '' ?>>Pembina Lingkungan</option>
                </select>
            </form>
        </div>

        <div class="relative mr-4 lg:mr-0">
            <form method="get" class="flex items-center justify-end my-4">
                <div class="relative lg:w-56 w-80 transition-all focus-within:w-64 lg:mt-0 mt-4">
                    <input
                        placeholder="Masukan kata kunci"
                        class="input shadow-lg focus:border-2 border-2 text-primary border-primary px-5 py-1 pr-10 rounded-md w-full outline-none"
                        name="search"
                        value="<?= esc($keyword) ?>" />
                    <svg
                        class="w-6 h-6 absolute top-1/2 right-3 transform -translate-y-1/2 text-primary"
                        stroke="currentColor"
                        stroke-width="1.5"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                            stroke-linejoin="round"
                            stroke-linecap="round"></path>
                    </svg>
                </div>
            </form>
        </div>
    </div>

    <!-- Menambahkan pengecekan data kosong -->
    <?php if (empty($arsipPenerima)): ?>
        <div class="text-center my-8">
            <p class="text-lg font-medium text-gray-500">Tidak ada arsip penerima untuk provinsi ini.</p>
        </div>
    <?php else: ?>
        <?php foreach ($arsipPenerima as $arsip): ?>
            <div class="flex flex-col lg:flex-row items-center lg:items-start px-4 lg:px-24 my-12">
                <img src="<?= base_url('images/penerima/' . $arsip['foto_profil']) ?>" alt="<?php echo $arsip['nama']; ?>" class="w-40 lg:w-56 h-auto rounded-lg mb-4 lg:mb-0 lg:mr-6 mx-auto lg:mx-0" style="width: 250px; height: 250px;">
                <div class="text-center lg:text-left">
                    <h3 class="text-xl font-medium mb-2"><?php echo $arsip['nama']; ?></h3>
                    <hr class="border-2 border-primary w-40 mt-1 mb-4 mx-auto lg:mx-0">
                    <p class="mb-1">Kategori: <b><?php echo $arsip['kategori']; ?></b></p>
                    <p class="mb-4">Tahun: <b><?php echo $arsip['tahun_penerimaan']; ?></b></p>
                    <p class="text-sm leading-relaxed text-justify mb-4">
                        <?= word_limiter(esc($arsip['profil']), 60); ?>
                    </p>
                    <button class="bg-primary text-white px-4 py-2 mb-6 lg:mb-0 rounded-md hover:bg-primaryhover">Selengkapnya</button>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <div class="row flex justify-end mr-4 mb-8">
        <div class="pagination">
            <?= $pager->links('arsip', 'template_pagination') ?>
        </div>
    </div>

    <?= $this->endSection() ?>
</body>

</html>