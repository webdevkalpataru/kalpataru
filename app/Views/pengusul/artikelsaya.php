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
        <?= $this->include('template/sidebarpengusul') ?>

        <div class="relative flex flex-col w-full max-w-5xl mb-4 rounded-xl border-2 border-primary bg-white shadow-md lg:p-8 p-4">
            <h4 class="block text-xl font-bold text-slate-800 mb-2">
                Artikel Saya
            </h4>
            <div class="lg:flex justify-between items-center my-2">
                <a href="/pengusul/tambah-artikel">
                    <button id="tambahartikel" class="w-48 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button"> <span>&#10010</span> Tambah Artikel Baru</button>
                </a>

                <form method="get">
                    <div class="relative w-56 transition-all focus-within:w-64 lg:mt-0 mt-4">
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
            <div class="relative flex flex-col w-full h-full overflow-hidden text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
                <div class="overflow-x-auto">
                    <table class="w-full text-left table-auto min-w-max">
                        <thead>
                            <tr>
                                <th class="p-4 border-b border-accent2 bg-accent1 text-center">
                                    <p class="block text-xs md:text-sm font-bold leading-none text-accent2">
                                        No </p>
                                </th>
                                <th class="p-4 border-b border-accent2 bg-accent1 text-center">
                                    <p class="block text-xs md:text-sm font-bold leading-none text-accent2">
                                        Judul Artikel
                                    </p>
                                </th>
                                <th class="p-4 border-b border-accent2 bg-accent1 text-center">
                                    <p class="block text-xs md:text-sm font-bold leading-none text-accent2">
                                        Status
                                    </p>
                                </th>
                                <th class="p-4 border-b border-accent2 bg-accent1 text-center">
                                    <p class="block text-xs md:text-sm font-bold leading-none text-accent2">
                                        Aksi
                                    </p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($artikels)): // Ganti $artikel dengan $artikels agar sesuai dengan array yang digunakan 
                            ?>
                                <tr>
                                    <td colspan="4" class="p-4 border-b border-slate-200 text-center">
                                        <p class="block text-xs text-slate-800">
                                            Belum ada data artikel
                                        </p>
                                    </td>
                                </tr>
                            <?php else:
                            ?>
                                <?php
                                $no = 0;
                                foreach ($artikels as $index => $artikel):
                                    $no++;
                                ?>
                                    <tr class="hover:bg-slate-50">
                                        <td class="p-4 border-b border-slate-200 text-xs text-slate-800 text-center"><?= $no ?></td>
                                        <td class="p-4 border-b border-slate-200 text-xs text-slate-800 text-center"><?= esc($artikel['judul']) ?></td>
                                        <td class="p-4 border-b border-slate-200 text-xs text-slate-800 text-center"><?= esc($artikel['status']) ?></td>
                                        <td class="p-4 border-b border-slate-200 text-xs text-slate-800 text-center">
                                            <button
                                                class="lihatButton w-20 rounded-md py-2 px-2 text-center font-semibold text-xs text-primary bg-secondary"
                                                type="button"
                                                onclick="window.location.href='/pengusul/artikel/<?= esc($artikel['slug']); ?>'">
                                                Lihat
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="6" class="p-4 text-center text-slate-800">Tidak ada artikel yang ditemukan.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="row flex lg:justify-end justify-center my-6 lg:me-2 me-0">
                    <div class="pagination">
                        <?= $pager->links('artikel', 'template_pagination') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->endSection() ?>
</body>