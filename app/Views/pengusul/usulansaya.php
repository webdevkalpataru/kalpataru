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
                Usulan Saya
            </h4>
            <div class="flex bg-yellow-400 items-center justify-center rounded-md px-2">
                <svg class="lg:ml-0 ml-2 w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                </svg>
                <h3 class="block text-sm font-semibold p-2 text-black">
                    Setelah anda melakukan <span class="font-bold text-rejected">Kirim Data</span>, Anda tidak dapat melakukan perubahan atau pengeditan pada Data Usulan!
                </h3>
            </div>
            <div class="flex justify-start mt-6">
                <a href="./tambahcalon">
                    <button id="tambahCalon" class="mb-4 w-48 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button"> <span>&#10010</span> Tambah Calon Usulan</button>
                </a>
            </div>
            <div class="relative flex flex-col w-full h-full mt-2 overflow-hidden text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
                <div class="overflow-x-auto">
                    <table class="w-full text-left table-auto min-w-max">
                        <thead>
                            <tr>
                                <th class="p-4 border-b border-accent2 bg-accent1 text-center">
                                    <p class="block text-xs md:text-sm font-bold leading-none text-accent2">No</p>
                                </th>
                                <th class="p-4 border-b border-accent2 bg-accent1 text-center">
                                    <p class="block text-xs md:text-sm font-bold leading-none text-accent2">Nama</p>
                                </th>
                                <th class="p-4 border-b border-accent2 bg-accent1 text-center">
                                    <p class="block text-xs md:text-sm font-bold leading-none text-accent2">Kategori</p>
                                </th>
                                <th class="p-4 border-b border-accent2 bg-accent1 text-center">
                                    <p class="block text-xs md:text-sm font-bold leading-none text-accent2">Provinsi</p>
                                </th>
                                <th class="p-4 border-b border-accent2 bg-accent1 text-center">
                                    <p class="block text-xs md:text-sm font-bold leading-none text-accent2">Status</p>
                                </th>
                                <th class="p-4 border-b border-accent2 bg-accent1 text-center">
                                    <p class="block text-xs md:text-sm font-bold leading-none text-accent2">Catatan</p>
                                </th>
                                <th class="p-4 border-b border-accent2 bg-accent1 text-center" colspan="3">
                                    <p class="block text-xs md:text-sm font-bold leading-none text-accent2">Tindakan</p>
                                </th>
                                <th class="p-4 border-b border-accent2 bg-accent1 text-center">
                                    <p class="block text-xs md:text-sm font-bold leading-none text-accent2">Kirim Data</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($usulan)) : ?>
                                <?php
                                $no = 0;
                                foreach ($usulan as $index => $u) :
                                    $no++;
                                ?>
                                    <tr class="hover:bg-slate-100">
                                        <td class="p-4 border-b border-slate-200 text-center">
                                            <p class="block text-xs text-slate-800"><?= $no ?></p>
                                        </td>
                                        <td class="p-4 border-b border-slate-200 text-center">
                                            <p class="block text-xs text-slate-800"><?= $u['nama']; ?></p>
                                        </td>
                                        <td class="p-4 border-b border-slate-200 text-center">
                                            <p class="block text-xs text-slate-800"><?= $u['kategori']; ?></p>
                                        </td>
                                        <td class="p-4 border-b border-slate-200 text-center">
                                            <p class="block text-xs text-slate-800"><?= $u['provinsi']; ?></p>
                                        </td>
                                        <td class="p-4 border-b border-slate-200 text-center">
                                            <p id="<?= $u['status_pendaftaran']; ?>" class="block text-xs font-bold text-accepted w-24"><?= $u['status_pendaftaran']; ?></p>
                                        </td>
                                        <td class="p-4 border-b border-slate-200 text-center">
                                            <button class="w-20 rounded-md py-2 px-2 text-center font-semibold text-xs text-primary bg-secondary" type="button">Lihat</button>
                                        </td>
                                        <td class="px-4 pt-1 border-b border-slate-200 text-center">
                                            <a href="./detailusulansaya/<?= $u['id_pendaftaran']; ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                                </svg>
                                            </a>
                                        </td>
                                        <td class="px-4 border-b border-slate-200 text-center editCell">
                                            <?php if (in_array($u['status_pendaftaran'], ['Draft', 'Perlu Perbaikan'])): ?>
                                                <a href="./detailusulansayaedit/<?= $u['id_pendaftaran']; ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg>
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-4 border-b border-slate-200 text-center hidden downloadCell">
                                            <?php if (!in_array($u['status_pendaftaran'], ['Draft', 'Perlu Perbaikan'])): ?>
                                                <a href="./unduhdetailusulan">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                                    </svg>
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-4 border-b border-slate-200 text-center deleteCell">
                                            <?php if ($u['status_pendaftaran'] === 'Perlu Perbaikan'): ?>
                                                <a href="./detailusulansayadelete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                        <td class="p-4 border-b border-slate-200 text-center">
                                            <button class="kirimDataButton w-20 rounded-md py-2 px-2 text-center text-xs text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none" type="button">Kirim Data</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="6">Belum ada usulan yang diajukan.</td>
                                </tr>
                            <?php endif; ?>
                            <!-- <tr class="hover:bg-slate-50">
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <p class="block text-xs text-slate-800">2</p>
                                </td>
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <p class="block text-xs text-slate-800">Joko Susilo</p>
                                </td>
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <p class="block text-xs text-slate-800">Pengabdi Lingkungan</p>
                                </td>
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <p class="block text-xs text-slate-800">Jawa Barat</p>
                                </td>
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <p id="status1" class="block text-xs font-bold text-rejected w-24">Tidak Lolos Administrasi</p>
                                </td>
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <button class="w-20 rounded-md py-2 px-2 text-center font-semibold text-xs text-primary bg-secondary" type="button">Lihat</button>
                                </td>
                                <td class="px-4 pt-1 border-b border-slate-200 text-center">
                                    <a href="./detailusulansaya">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-4 border-b border-slate-200 text-center editCell">
                                    <a href="./detailusulansayaedit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-4 border-b border-slate-200 text-center hidden downloadCell">
                                    <a href="./unduhdetailusulan">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-4 border-b border-slate-200 text-center deleteCell">
                                    <a href="./detailusulansayadelete">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <button class="kirimDataButton w-20 rounded-md py-2 px-2 text-center text-xs text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none" type="button">Kirim Data</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50">
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <p class="block text-xs text-slate-800">3</p>
                                </td>
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <p class="block text-xs text-slate-800">Joko Susilo</p>
                                </td>
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <p class="block text-xs text-slate-800">Pengabdi Lingkungan</p>
                                </td>
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <p class="block text-xs text-slate-800">Jawa Barat</p>
                                </td>
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <p id="status1" class="block text-xs font-bold text-accepted w-24">Lolos Administrasi</p>
                                </td>
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <button class="w-20 rounded-md py-2 px-2 text-center font-semibold text-xs text-primary bg-secondary" type="button">Lihat</button>
                                </td>
                                <td class="px-4 pt-1 border-b border-slate-200 text-center">
                                    <a href="./detailusulansaya">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-4 border-b border-slate-200 text-center editCell">
                                    <a href="./detailusulansayaedit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-4 border-b border-slate-200 text-center hidden downloadCell">
                                    <a href="./unduhdetailusulan">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-4 border-b border-slate-200 text-center deleteCell">
                                    <a href="./detailusulansayadelete">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <button class="kirimDataButton w-20 rounded-md py-2 px-2 text-center text-xs text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none" type="button">Kirim Data</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50">
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <p class="block text-xs text-slate-800">4</p>
                                </td>
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <p class="block text-xs text-slate-800">Joko Susilo</p>
                                </td>
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <p class="block text-xs text-slate-800">Pengabdi Lingkungan</p>
                                </td>
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <p class="block text-xs text-slate-800">Jawa Barat</p>
                                </td>
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <p id="status1" class="block text-xs font-bold text-accepted w-24">Lolos Administrasi</p>
                                </td>
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <button class="w-20 rounded-md py-2 px-2 text-center font-semibold text-xs text-primary bg-secondary" type="button">Lihat</button>
                                </td>
                                <td class="px-4 pt-1 border-b border-slate-200 text-center">
                                    <a href="./detailusulansaya">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-4 border-b border-slate-200 text-center editCell">
                                    <a href="./detailusulansayaedit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-4 border-b border-slate-200 text-center hidden downloadCell">
                                    <a href="./unduhdetailusulan">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-4 border-b border-slate-200 text-center deleteCell">
                                    <a href="./detailusulansayadelete">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <button class="kirimDataButton w-20 rounded-md py-2 px-2 text-center text-xs text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none" type="button">Kirim Data</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50">
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <p class="block text-xs text-slate-800">5</p>
                                </td>
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <p class="block text-xs text-slate-800">Joko Susilo</p>
                                </td>
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <p class="block text-xs text-slate-800">Pengabdi Lingkungan</p>
                                </td>
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <p class="block text-xs text-slate-800">Jawa Barat</p>
                                </td>
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <p id="status1" class="block text-xs font-bold text-rejected w-24">Tidak Lolos Administrasi</p>
                                </td>
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <button class="w-20 rounded-md py-2 px-2 text-center font-semibold text-xs text-primary bg-secondary" type="button">Lihat</button>
                                </td>
                                <td class="px-4 pt-1 border-b border-slate-200 text-center">
                                    <a href="./detailusulansaya">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-4 border-b border-slate-200 text-center editCell">
                                    <a href="./detailusulansayaedit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-4 border-b border-slate-200 text-center hidden downloadCell">
                                    <a href="./unduhdetailusulan">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-4 border-b border-slate-200 text-center deleteCell">
                                    <a href="./detailusulansayadelete">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <button class="kirimDataButton w-20 rounded-md py-2 px-2 text-center text-xs text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none" type="button">Kirim Data</button>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>

                <!-- Modal -->
                <div id="modalPopup" class="fixed inset-0 z-50 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
                    <div class="bg-white rounded-lg p-8 flex flex-col items-center max-w-md">
                        <img src="/images/question.png" alt="Question Icon" class="w-16 h-16 mb-4">
                        <p class="text-center text-lg font-bold text-gray-700 mb-4">Apakah anda yakin ingin mengirimkan seluruh data pada admin?</p>
                        <p class="text-center text-sm text-slate-600 mb-4">Data yang dikirimkan adalah Seluruh Data pada Identitas Calon, Kegiatan Calon, Dampak, PMIK, Keswadayaan dan Kebudayaan, dan Keistimewaan. <span class="font-bold"> Data yang telah dikirimkan tidak dapat diubah kembali, mohon perhatikan dengan seksama!</span></p>
                        <div class="flex justify-end space-x-4">
                            <button id="cancelButton" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-700 hover:text-white rounded-md">Periksa Kembali</button>
                            <button id="confirmButton" class="px-4 py-2 bg-primary hover:bg-primaryhover text-white rounded-md">Ya, Kirim Data</button>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="row flex lg:justify-end justify-center my-6 lg:me-2 me-0">
                    <button class="rounded-md rounded-r-none border border-r-0 border-slate-300 py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-primary hover:border-primary focus:text-white focus:bg-primary focus:border-primary active:border-primary active:text-white active:bg-primary disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd" d="M11.03 3.97a.75.75 0 0 1 0 1.06l-6.22 6.22H21a.75.75 0 0 1 0 1.5H4.81l6.22 6.22a.75.75 0 1 1-1.06 1.06l-7.5-7.5a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <button class="rounded-md rounded-r-none rounded-l-none border border-r-0 border-slate-300 py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-primary hover:border-primary focus:text-white focus:bg-primary focus:border-primary active:border-primary active:text-white active:bg-primary disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                        1
                    </button>
                    <button class="rounded-md rounded-r-none rounded-l-none border border-r-0 border-slate-300 py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-primary hover:border-primary focus:text-white focus:bg-primary focus:border-primary active:border-primary active:text-white active:bg-primary disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                        2
                    </button>
                    <button class="rounded-md rounded-r-none rounded-l-none border border-r-0 border-slate-300 py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-primary hover:border-primary focus:text-white focus:bg-primary focus:border-primary active:border-primary active:text-white active:bg-primary disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                        3
                    </button>
                    <button class="rounded-md rounded-r-none rounded-l-none border border-r-0 border-slate-300 py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-primary hover:border-primary focus:text-white focus:bg-primary focus:border-primary active:border-primary active:text-white active:bg-primary disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                        4
                    </button>
                    <button class="rounded-md rounded-r-none rounded-l-none border border-r-0 border-slate-300 py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-primary hover:border-primary focus:text-white focus:bg-primary focus:border-primary active:border-primary active:text-white active:bg-primary disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                        5
                    </button>
                    <button class="rounded-md rounded-l-none border border-slate-300 py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-primary hover:border-primary focus:text-white focus:bg-primary focus:border-primary active:border-primary active:text-white active:bg-primary disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd" d="M12.97 3.97a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 1 1-1.06-1.06l6.22-6.22H3a.75.75 0 0 1 0-1.5h16.19l-6.22-6.22a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>

        </div>
    </div>

    <script>
        // Ambil semua tombol 'kirimData'
        const kirimDataButtons = document.querySelectorAll('.kirimDataButton');

        // Loop melalui setiap tombol dan tambahkan event listener
        kirimDataButtons.forEach((button, index) => {
            button.addEventListener('click', function() {
                // Tampilkan modal popup
                document.getElementById('modalPopup').classList.remove('hidden');

                // Menyimpan tombol yang sedang diklik
                const currentButton = button;

                // Saat tombol 'Confirm' di modal popup diklik
                document.getElementById('confirmButton').onclick = function() {
                    // Sembunyikan modal popup
                    document.getElementById('modalPopup').classList.add('hidden');

                    // Ubah teks tombol 'kirimData' menjadi 'Data telah terkirim'
                    currentButton.textContent = 'Data telah terkirim';
                    currentButton.disabled = true;
                    currentButton.classList.add('disabled', 'opacity-50');

                    // Sembunyikan tombol 'Edit' dan tampilkan tombol 'Download'
                    const editCell = document.querySelectorAll('.editCell')[index];
                    const downloadCell = document.querySelectorAll('.downloadCell')[index];

                    editCell.classList.add('hidden');
                    downloadCell.classList.remove('hidden');
                };

                // Saat tombol 'Periksa Kembali' di modal popup diklik
                document.getElementById('cancelButton').onclick = function() {
                    // Sembunyikan modal popup
                    document.getElementById('modalPopup').classList.add('hidden');
                };
            });
        });
    </script>

    <?= $this->endSection() ?>
</body>