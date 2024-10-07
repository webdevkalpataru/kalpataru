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
                Pemberitahuan
            </h4>
            <!-- Membatasi tinggi kontainer agar hanya menampilkan 5 baris sebelum scroll -->
            <div class="relative flex flex-col w-full h-96 bg-white overflow-y-auto text-gray-700 shadow-md rounded-lg bg-clip-border mt-4">
                <table class="w-full text-left table-auto min-w-max">
                    <tbody>
                        <tr class="hover:bg-slate-50">
                            <td class="p-4 border-b border-slate-200 w-20">
                                <img src="/images/logoklhk.png" alt="logoklhk" class="w-8 h-8 rounded-full">
                            </td>
                            <td class="p-4 border-b border-slate-200">
                                <p class="text-sm text-slate-800 text-start">
                                    Selamat! usulan Anda atas nama Hendra Kurniawan
                                </p>
                                <p class="text-xs">20 September 2023</p>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50">
                            <td class="p-4 border-b border-slate-200 w-20">
                                <img src="/images/logoklhk.png" alt="logoklhk" class="w-8 h-8 rounded-full">
                            </td>
                            <td class="p-4 border-b border-slate-200">
                                <p class="text-sm text-slate-800 text-start">
                                    Selamat! usulan Anda atas nama Hendra Kurniawan
                                </p>
                                <p class="text-xs">20 September 2023</p>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50">
                            <td class="p-4 border-b border-slate-200 w-20">
                                <img src="/images/logoklhk.png" alt="logoklhk" class="w-8 h-8 rounded-full">
                            </td>
                            <td class="p-4 border-b border-slate-200">
                                <p class="text-sm text-slate-800 text-start">
                                    Selamat! usulan Anda atas nama Hendra Kurniawan
                                </p>
                                <p class="text-xs">20 September 2023</p>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50">
                            <td class="p-4 border-b border-slate-200 w-20">
                                <img src="/images/logoklhk.png" alt="logoklhk" class="w-8 h-8 rounded-full">
                            </td>
                            <td class="p-4 border-b border-slate-200">
                                <p class="text-sm text-slate-800 text-start">
                                    Selamat! usulan Anda atas nama Hendra Kurniawan
                                </p>
                                <p class="text-xs">20 September 2023</p>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50">
                            <td class="p-4 border-b border-slate-200 w-20">
                                <img src="/images/logoklhk.png" alt="logoklhk" class="w-8 h-8 rounded-full">
                            </td>
                            <td class="p-4 border-b border-slate-200">
                                <p class="text-sm text-slate-800 text-start">
                                    Selamat! usulan Anda atas nama Hendra Kurniawan
                                </p>
                                <p class="text-xs">20 September 2023</p>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50">
                            <td class="p-4 border-b border-slate-200 w-20">
                                <img src="/images/logoklhk.png" alt="logoklhk" class="w-8 h-8 rounded-full">
                            </td>
                            <td class="p-4 border-b border-slate-200">
                                <p class="text-sm text-slate-800 text-start">
                                    Selamat! usulan Anda atas nama Hendra Kurniawan
                                </p>
                                <p class="text-xs">20 September 2023</p>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50">
                            <td class="p-4 border-b border-slate-200 w-20">
                                <img src="/images/logoklhk.png" alt="logoklhk" class="w-8 h-8 rounded-full">
                            </td>
                            <td class="p-4 border-b border-slate-200">
                                <p class="text-sm text-slate-800 text-start">
                                    Selamat! usulan Anda atas nama Hendra Kurniawan
                                </p>
                                <p class="text-xs">20 September 2023</p>
                            </td>
                        </tr>
                        <!-- Baris tambahan yang akan membuat scroll muncul -->
                        <tr class="hover:bg-slate-50">
                            <td class="p-4 border-b border-slate-200 w-20">
                                <img src="/images/logoklhk.png" alt="logoklhk" class="w-8 h-8 rounded-full">
                            </td>
                            <td class="p-4 border-b border-slate-200">
                                <p class="text-sm text-slate-800 text-start">
                                    Selamat! usulan Anda atas nama Hendra Kurniawan
                                </p>
                                <p class="text-xs">20 September 2023</p>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50">
                            <td class="p-4 border-b border-slate-200 w-20">
                                <img src="/images/logoklhk.png" alt="logoklhk" class="w-8 h-8 rounded-full">
                            </td>
                            <td class="p-4 border-b border-slate-200">
                                <p class="text-sm text-slate-800 text-start">
                                    Selamat! usulan Anda atas nama Hendra Kurniawan
                                </p>
                                <p class="text-xs">20 September 2023</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?= $this->endSection() ?>
</body>

</html>
