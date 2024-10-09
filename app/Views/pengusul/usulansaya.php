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

    <div class="flex flex-col lg:flex-row justify-end m-4">
        <?= $this->include('template/sidebarpengusul') ?>

        <div class="relative flex flex-col w-full max-w-2xl mx-auto mb-4 rounded-xl border-2 border-primary bg-white shadow-md lg:p-8 p-4">
            <h4 class="block text-xl font-bold text-slate-800 mb-2">
                Usulan Saya
            </h4>
            <div class="flex bg-yellow-400 items-center justify-center rounded-md px-2">
                <svg class="lg:ml-0 ml-2 w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                </svg>
                <h3 class="block text-sm font-semibold p-2 text-black">
                    Setelah data calon penerima telah diserahkan, Anda tidak dapat melakukan perubahan atau pengeditan data tersebut!
                </h3>
            </div>
            <div class="relative flex flex-col w-full h-full mt-8 overflow-hidden text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
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
                                <th class="p-4 border-b border-accent2 bg-accent1 text-center" colspan="2">
                                    <p class="block text-xs md:text-sm font-bold leading-none text-accent2">Tindakan</p>
                                </th>
                                <th class="p-4 border-b border-accent2 bg-accent1 text-center">
                                    <p class="block text-xs md:text-sm font-bold leading-none text-accent2">Serahkan Data</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-slate-50">
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <p class="block text-xs text-slate-800">1</p>
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
                                <td class="px-4 pt-1 border-b border-slate-200 text-center">
                                    <a href="./detailusulansaya">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-4 border-b border-slate-200 text-center" id="edit1">
                                    <a href="./detailusulansayaedit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-4 border-b border-slate-200 text-center hidden" id="download1">
                                    <a href="./unduhdetailusulan">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <button id="serahkanButton1" class="w-20 rounded-md py-2 px-2 text-center text-xs text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none" type="button">Serahkan</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50">
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
                                <td class="px-4 pt-1 border-b border-slate-200 text-center">
                                    <a href="./detailusulansaya">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-4 border-b border-slate-200 text-center" id="edit1">
                                    <a href="./detailusulansayaedit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-4 border-b border-slate-200 text-center hidden" id="download1">
                                    <a href="./unduhdetailusulan">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <button id="serahkanButton1" class="w-20 rounded-md py-2 px-2 text-center text-xs text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none" type="button">Serahkan</button>
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
                                <td class="px-4 pt-1 border-b border-slate-200 text-center">
                                    <a href="./detailusulansaya">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-4 border-b border-slate-200 text-center" id="edit1">
                                    <a href="./detailusulansayaedit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-4 border-b border-slate-200 text-center hidden" id="download1">
                                    <a href="./unduhdetailusulan">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <button id="serahkanButton1" class="w-20 rounded-md py-2 px-2 text-center text-xs text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none" type="button">Serahkan</button>
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
                                <td class="px-4 pt-1 border-b border-slate-200 text-center">
                                    <a href="./detailusulansaya">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-4 border-b border-slate-200 text-center" id="edit1">
                                    <a href="./detailusulansayaedit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-4 border-b border-slate-200 text-center hidden" id="download1">
                                    <a href="./unduhdetailusulan">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <button id="serahkanButton1" class="w-20 rounded-md py-2 px-2 text-center text-xs text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none" type="button">Serahkan</button>
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
                                <td class="px-4 pt-1 border-b border-slate-200 text-center">
                                    <a href="./detailusulansaya">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-4 border-b border-slate-200 text-center" id="edit1">
                                    <a href="./detailusulansayaedit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-4 border-b border-slate-200 text-center hidden" id="download1">
                                    <a href="./unduhdetailusulan">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="p-4 border-b border-slate-200 text-center">
                                    <button id="serahkanButton1" class="w-20 rounded-md py-2 px-2 text-center text-xs text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none" type="button">Serahkan</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Modal -->
                <div id="modalPopup" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <p class="mb-4 text-gray-700">Apakah anda yakin ingin menyerahkan berkas pada admin?</p>
                        <div class="flex justify-end space-x-4">
                            <button id="cancelButton" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md">Periksa Kembali</button>
                            <button id="confirmButton" class="px-4 py-2 bg-green-500 text-white rounded-md">Ya, Serahkan</button>
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
        document.getElementById('serahkanButton1').addEventListener('click', function() {
            document.getElementById('modalPopup').classList.remove('hidden');
        });

        document.getElementById('cancelButton').addEventListener('click', function() {
            document.getElementById('modalPopup').classList.add('hidden');
        });

        document.getElementById('confirmButton').addEventListener('click', function() {
            // Hide the modal popup
            document.getElementById('modalPopup').classList.add('hidden');

            // Change the button state to 'Sudah Diserahkan' and disable it
            const serahkanButton = document.getElementById('serahkanButton1');
            serahkanButton.textContent = 'Sudah Diserahkan';
            serahkanButton.disabled = true;
            serahkanButton.classList.add('disabled', 'opacity-50', 'bg-gray-800');

            // Update the available actions: hide edit and show download
            document.getElementById('edit1').classList.add('hidden');
            document.getElementById('download1').classList.remove('hidden');
        });
    </script>

    <?= $this->endSection() ?>
</body>