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
    <div class="w-64 bg-white text-white">
        <?= $this->include('template/sidebaradmin') ?>
    </div>

    <div class="lg:flex-1 p-6">
        <div class="min-h-screen flex flex-col">

            <header class="bg-white shadow">
                <div class="container mx-auto flex items-center justify-between p-4 md:p-6">
                    <h1 class="text-xl md:text-2xl font-semibold text-gray-700">Arsip Penerima</h1>
                    <div class="flex items-center">
                        <p class="text-gray-500 mr-2 md:mr-4">Hello, <?= session()->get('nama'); ?></p>
                        <a href="/auth/logoutinternal" class="bg-rejected text-white px-3 py-2 md:px-4 md:py-2 rounded-lg inline-block">Keluar</a>
                    </div>
                </div>
            </header>

            <div class="lg:flex justify-between items-center mt-6">
                <a href="/admin/tambaharsippenerima">
                    <button id="tambahCalon" class="w-48 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button"> <span>&#10010</span> Tambah Arsip Penerima</button>
                </a>
                <form method="get">
                    <div class="relative w-56 transition-all focus-within:w-64 lg:mt-0 mt-4 mr-4">
                        <input
                            placeholder="Masukan kata kunci"
                            class="input shadow-lg focus:border-2 border-2 text-primary border-primary px-5 py-1 pr-10 rounded-md w-full outline-none"
                            name="search"
                            value="" />
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

            <div class="relative  flex flex-col w-full h-full bg-white shadow-md rounded-lg bg-clip-border my-6">
                <table class="w-full text-center table-auto min-w-max">
                    <thead>
                        <tr>
                            <th class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                                <p class="flex items-center justify-center gap-2 text-sm font-bold leading-none text-slate-800">
                                    No
                                </p>
                            </th>
                            <th class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                                <p class="flex items-center justify-center gap-2 text-sm font-bold leading-none text-slate-800">
                                    Nama
                                </p>
                            </th>
                            <th class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                                <p class="flex items-center justify-center gap-2 text-sm font-bold leading-none text-slate-800">
                                    Kategori
                                </p>
                            </th>
                            <th class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                                <p class="flex items-center justify-center gap-2 text-sm font-bold leading-none text-slate-800">
                                    Provinsi
                                </p>
                            </th>
                            <th class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                                <p class="flex items-center justify-center gap-2 text-sm font-bold leading-none text-slate-800">
                                    Tahun
                                </p>
                            </th>
                            <th class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                                <p class="flex items-center justify-center gap-2 text-sm font-bold leading-none text-slate-800">
                                    Detail
                                </p>
                            </th>
                            <th class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                                <p class="flex items-center justify-center gap-2 text-sm font-bold leading-none text-slate-800">
                                    Hapus
                                </p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-slate-50">
                            <td class="p-4 border-b border-slate-200">
                                <p class="block text-sm text-slate-800">01</p>
                            </td>
                            <td class="p-4 border-b border-slate-200">
                                <p class="block text-sm text-slate-800">Sumanto</p>
                            </td>
                            <td class="p-4 border-b border-slate-200">
                                <p class="block text-sm text-slate-800">Pengabdi Lingkungan</p>
                            </td>
                            <td class="p-4 border-b border-slate-200">
                                <p class="block text-sm text-slate-800">Jawa Barat</p>
                            </td>

                            <td class="p-4 border-b border-slate-200">
                                <p class="block text-sm text-slate-800">2024</p>
                            </td>
                            <td class="p-4 border-b border-slate-200">
                                <div>
                                    <button id="uploadBtn" class="mt-4 w-full rounded-md py-2 px-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="submit">Selengkapnya</button>
                                </div>
                            </td>
                            <td class="p-4 border-b border-slate-200">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <!-- Repeat other rows as needed -->
                    </tbody>
                </table>

                <div class="row flex lg:justify-end justify-center my-6 lg:mr-4">
                    <button class="rounded-md rounded-r-none border border-r-0 border-slate-300 py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-primary hover:border-primary focus:text-white focus:bg-primary focus:border-primary active:border-primary active:text-white active:bg-primary disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd" d="M11.03 3.97a.75.75 0 0 1 0 1.06l-6.22 6.22H21a.75.75 0 0 1 0 1.5H4.81l6.22 6.22a.75.75 0 1 1-1.06 1.06l-7.5-7.5a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                        </svg>
                    </button>

                </div>
            </div>

            <button
                class="w-full rounded-md py-2 px-2 text-center font-semibold text-xs text-primary bg-secondary hover:shadow-md flex items-center justify-center gap-4" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0 1 12 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                </svg>
                Export Arsip Penerima
            </button>
        </div>
    </div>
</body>



</html>