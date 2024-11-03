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
    <section id="buku" class="w-full h-[25rem] relative">
        <img src="/images/hero.png" alt="buku" class="w-full h-full object-cover object-center md:object-center">

        <div class="absolute inset-0 flex flex-col justify-center items-center text-white text-center">
            <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold">Data dan Statistik</h1>
            <p class="text-sm sm:text-base md:text-lg mt-2 sm:mt-4">Data berbicara lebih dari sejuta kata. Jelajahi angka-angka yang mengungkap kisah di balik setiap inisiatif Kalpataru.</p>
        </div>
    </section>

    <div class="lg:my-12 md:my-8 my-4">
        <div id="datapenerima" class="w-full h-[4rem] sm:h-[5rem] relative flex items-center justify-center">
            <h2 class="text-lg sm:text-xl md:text-2xl lg:text-4xl font-medium text-black">Data Penerima Penghargaan Kalpataru</h2>
        </div>
        <hr class="border-2 border-primary max-w-60 mx-auto mt-0" />
    </div>

    <section id="databykategori">
        <div class="lg:my-12 md:my-8 my-4 lg:mx-20 md:mx-10 mx-7">
            <div id="textdatabykategori" class="w-full h-[4rem] sm:h-[5rem] relative flex items-center justify-start">
                <h2 class="text-lg sm:text-xl md:text-2xl lg:text-2xl font-medium text-black">Berdasarkan <b>Kategori</b></h2>
            </div>
            <hr class="border-2 border-primary max-w-[16%] mt-0" />

            <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-4 gap-6 my-6">
                <div class="bg-white rounded-lg border-2 border-gray-200 shadow-md overflow-hidden">
                    <div class="p-4">
                        <h2 class="text-xs font-semibold">Kalpataru</h2>
                        <div class="text-start text-xs flex justify-start items-center">
                            <p class="text-lg text-primary mr-4">117</p>
                            <img src="/images/trophy.png" alt="trophy" class="w-10 h-10">
                        </div>
                        <p class="text-xs font-normal text-gray-600 text-start">Perintis Lingkungan</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg border-2 border-gray-200 shadow-md overflow-hidden">
                    <div class="p-4">
                        <h2 class="text-xs font-semibold">Kalpataru</h2>
                        <div class="text-start text-xs flex justify-start items-center">
                            <p class="text-lg text-primary mr-4">83</p>
                            <img src="/images/trophy.png" alt="trophy" class="w-10 h-10">
                        </div>
                        <p class="text-xs font-normal text-gray-600 text-start">Pengabdi Lingkungan</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg border-2 border-gray-200 shadow-md overflow-hidden">
                    <div class="p-4">
                        <h2 class="text-xs font-semibold">Kalpataru</h2>
                        <div class="text-start text-xs flex justify-start items-center">
                            <p class="text-lg text-primary mr-4">66</p>
                            <img src="/images/trophy.png" alt="trophy" class="w-10 h-10">
                        </div>
                        <p class="text-xs font-normal text-gray-600 text-start">Penyelamat Lingkungan</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg border-2 border-gray-200 shadow-md overflow-hidden">
                    <div class="p-4">
                        <h2 class="text-xs font-semibold">Kalpataru</h2>
                        <div class="text-start text-xs flex justify-start items-center">
                            <p class="text-lg text-primary mr-4">162</p>
                            <img src="/images/trophy.png" alt="trophy" class="w-10 h-10">
                        </div>
                        <p class="text-xs font-normal text-gray-600 text-start">Pembina Lingkungan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="databygender">
        <div class="lg:my-12 md:my-8 my-4 lg:mx-20 md:mx-10 mx-7">
            <div id="textdatabygender" class="w-full h-[4rem] sm:h-[5rem] relative flex items-center justify-start">
                <h2 class="text-lg sm:text-xl md:text-2xl lg:text-2xl font-medium text-black">Berdasarkan <b>Gender</b></h2>
            </div>
            <hr class="border-2 border-primary max-w-[16%] mt-0" />

            <div class="flex flex-col md:flex-row justify-around items-center gap-8 py-8">
                <!-- Left Card -->
                <div class="bg-white border-2 border-gray-200 rounded-lg p-4 shadow-lg flex flex-col items-start w-full md:w-2/4">
                    <h2 class="text-sm font-bold text-gray-800">Kalpataru</h2>
                    <p class="text-2xl font-semibold text-primary">428</p>
                    <h2 class="text-sm font-bold text-gray-800">Total Penerima</h2>

                    <div class="relative mt-4 flex items-center">
                        <svg class="w-16 h-16 md:w-24 md:h-24" viewBox="0 0 36 36">
                            <circle
                                class="text-brown-600"
                                stroke-width="4"
                                stroke="currentColor"
                                fill="transparent"
                                r="16"
                                cx="18"
                                cy="18"
                                stroke-dasharray="100, 100" />
                            <circle
                                class="text-primary"
                                stroke-width="4"
                                stroke="currentColor"
                                fill="transparent"
                                r="16"
                                cx="18"
                                cy="18"
                                stroke-dasharray="25, 100" />
                        </svg>
                        <!-- Div for text alignment -->
                        <div class="ml-2 md:ml-4">
                            <div class="flex items-center">
                                <span class="w-3 h-3 md:w-4 md:h-4 bg-primary rounded-full inline-block mr-2"></span>
                                <p class="text-xs md:text-sm text-gray-500">Perempuan</p>
                            </div>
                            <div class="flex items-center mt-2">
                                <span class="w-3 h-3 md:w-4 md:h-4 bg-brown-600 rounded-full inline-block mr-2"></span>
                                <p class="text-xs md:text-sm text-gray-500">Laki-Laki</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Card -->
                <div class="bg-white border-2 border-gray-200 rounded-lg p-6 shadow-lg h-auto md:h-52 flex justify-center items-center w-full md:w-auto">
                    <p class="text-gray-800 text-xs md:text-base mx-4 md:mx-32">
                        Dari total <span class="font-semibold">428</span> penerima penghargaan Kalpataru yang telah diberikan sejak tahun 1980, terdapat
                        <span class="font-semibold">265</span> penerima penghargaan yang berjenis kelamin <span class="font-bold">laki-laki</span> dan
                        <span class="font-semibold">163</span> penerima penghargaan yang berjenis kelamin <span class="font-bold">perempuan</span>.
                    </p>
                </div>
            </div>

        </div>
    </section>

    <section id="databyprovinsi">
        <div class="lg:my-12 md:my-8 my-4 lg:mx-20 md:mx-10 mx-7">
            <div id="textdatabyprovinsi" class="w-full h-[4rem] sm:h-[5rem] relative flex items-center justify-start">
                <h2 class="text-lg sm:text-xl md:text-2xl lg:text-2xl font-medium text-black">Berdasarkan <b>Provinsi</b></h2>
            </div>
            <hr class="border-2 border-primary max-w-[16%] mt-0" />

            <div class="relative flex flex-col w-full h-full bg-white shadow-md rounded-lg bg-clip-border my-6">
                <table class="w-full text-left table-auto min-w-max">
                    <thead>
                        <tr>
                            <th
                                class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                                <p
                                    class="flex items-center justify-between gap-2 text-sm font-normal leading-none text-slate-800">
                                    No
                                </p>
                            </th>

                            <th
                                class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                                <p
                                    class="flex items-center justify-between gap-2 text-sm font-normal leading-none text-slate-800">
                                    Provinsi
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                    </svg>
                                </p>
                            </th>

                            <th
                                class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                                <p
                                    class="flex items-center justify-between gap-2 text-sm font-normal leading-none text-slate-800">
                                    Perintis
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                    </svg>
                                </p>
                            </th>
                            <th
                                class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                                <p
                                    class="flex items-center justify-between gap-2 text-sm font-normal leading-none text-slate-800">
                                    Pengabdi
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                    </svg>
                                </p>
                            </th>
                            <th
                                class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                                <p
                                    class="flex items-center justify-between gap-2 text-sm font-normal leading-none text-slate-800">
                                    Penyelamat
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                    </svg>
                                </p>
                            </th>
                            <th
                                class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                                <p
                                    class="flex items-center justify-between gap-2 text-sm font-normal leading-none text-slate-800">
                                    Pembina
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                    </svg>
                                </p>
                            </th>
                            <th
                                class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                                <p
                                    class="flex items-center justify-between gap-2 text-sm font-normal leading-none text-slate-800">
                                    Total
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                    </svg>
                                </p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($provinsiData)): ?>
                            <?php $no = 1; ?>
                            <?php foreach ($provinsiData as $data): ?>
                                <tr class="hover:bg-slate-50">
                                    <td class="p-4 border-b border-slate-200"><?php echo $no++; ?></td>
                                    <td class="p-4 border-b border-slate-200"><?php echo $data['provinsi']; ?></td>
                                    <td class="p-4 border-b border-slate-200"><?php echo $data['perintis']; ?></td>
                                    <td class="p-4 border-b border-slate-200"><?php echo $data['pengabdi']; ?></td>
                                    <td class="p-4 border-b border-slate-200"><?php echo $data['penyelamat']; ?></td>
                                    <td class="p-4 border-b border-slate-200"><?php echo $data['pembina']; ?></td>
                                    <td class="p-4 border-b border-slate-200"><?php echo $data['total']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="p-4 text-center text-red-500">Data tidak tersedia</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

            </div>

        </div>
    </section>

    <?= $this->endSection() ?>
</body>

</html>