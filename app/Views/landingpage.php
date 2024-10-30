<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <style>
        .province-label {
            font-size: 16px;
            font-weight: bold;
            background: none;
            border: none;
            box-shadow: none;
            color: black;
            text-align: center;
            line-height: 1.5;
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <?= $this->extend('template/navbarfooter') ?>

    <?= $this->section('content') ?>

    <?php if (!empty($pamflet)): ?>
        <div id="popup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
            <div class="relative rounded-lg max-w-xs w-full flex items-start mt-12">
                <img src="<?= base_url('pamflet/' . rawurlencode(esc($pamflet['foto']))) ?>" alt="Popup Image" class="w-full rounded-md">
                <button id="close-btn" class="lg:text-5xl text-xl top-0 right-0 font-bold text-white ms-2">X</button>

            </div>
            <a href="auth/register" class="absolute left-1/2 bottom-8  transform -translate-x-1/2">
                <button class="rounded-md bg-primary text-white py-2 px-4 sm:py-3 sm:px-6 text-center text-xs sm:text-sm md:text-base lg:text-base  transition-all shadow-md hover:font-bold hover:shadow-lg focus:bg-primaryhover focus:shadow-none active:bg-primaryhover hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                    Daftar Sekarang
                </button>
            </a>
        </div>
    <?php endif; ?>

    <section id="herosection" class="w-full h-[20rem] sm:h-[30rem] md:h-[34rem] lg:h-[36rem] relative">
        <img src="/images/herosection.png" alt="herosection" class="w-full h-full object-cover object-right md:object-center">

        <div class="absolute top-2/4 left-1/2 transform -translate-x-1/2 -translate-y-2/4 w-[90%] sm:w-[70%] md:w-[60%] lg:left-[28%] lg:w-[36%] text-white text-left">
            <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold">Menyelamatkan Alam, Mewarisi Kehidupan</h1>
            <p class="text-sm sm:text-base md:text-lg mt-2 sm:mt-4">Penghargaan nasional untuk individu dan kelompok yang berkontribusi dalam pelestarian lingkungan hidup</p>
        </div>

        <a href="auth/register">
            <button class="absolute bottom-[18%] left-[20%] sm:left-[20%] lg:left-[17%] transform -translate-x-1/2 rounded-md bg-white py-2 px-4 sm:py-3 sm:px-6 text-center text-xs sm:text-sm md:text-base lg:text-base text-black transition-all shadow-md hover:font-bold hover:shadow-lg focus:bg-site focus:shadow-none active:bg-site hover:bg-site active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                Daftar Sekarang
            </button>
        </a>
    </section>

    <section id="tentangkalpataru">
        <div class="lg:my-12 md:my-8 my-4">
            <div id="texttentangkalpataru" class="w-full h-[4rem] sm:h-[5rem] relative flex items-center justify-center">
                <h2 class="text-lg sm:text-xl md:text-2xl lg:text-4xl font-bold text-black">Tentang Kalpataru</h2>
            </div>
            <hr class="border-2 border-primary max-w-40 mx-auto mt-0" />
        </div>

        <div class="w-full flex flex-col lg:flex-row items-center justify-between px-6 sm:px-10 md:px-16 lg:px-20 py-12">
            <div class="w-full lg:w-1/2 lg:pr-10">
                <h3 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-medium text-black">Penghargaan Tertinggi untuk Pelestari Lingkungan</h3>
                <br />
                <p class="text-sm sm:text-base md:text-lg text-justify">
                    Kalpataru adalah penghargaan yang diberikan kepada perorangan atau kelompok atas jasanya dalam melestarikan lingkungan hidup di Indonesia. Kalpataru sendiri adalah bahasa Sanskerta yang berarti pohon kehidupan (Kalpavriksha)
                    <br /><br />
                    Penghargaan Kalpataru merupakan penghargaan tertinggi dari pemerintah Indonesia yang diberikan kepada individu, kelompok, dan lembaga yang telah menunjukkan dedikasi dan prakarsa dalam menjaga dan melestarikan lingkungan hidup.
                </p>
            </div>

            <figure class="w-full lg:w-1/2 lg:pl-10 mt-8 lg:mt-0">
                <img src="/images/tentangkalpataru.png" alt="tentangkalpataru" class="w-full h-auto rounded-md shadow-lg">
                <figcaption class="text-sm italic text-center">Penyerahan penghargaan oleh Presiden Joko Widodo kepada N. Akelaras</figcaption>
            </figure>
        </div>
    </section>

    <section id="kategoripenghargaan">
        <div class="lg:my-12 md:my-8 my-4 lg:mx-20 md:mx-10 mx-7">
            <div id="texttentangkalpataru" class="w-full h-[4rem] sm:h-[5rem] relative flex items-center justify-start">
                <h2 class="text-lg sm:text-xl md:text-2xl lg:text-4xl font-medium text-black">Kategori Penghargaan <b>Kalpataru</b></h2>
            </div>
            <hr class="border-2 border-primary max-w-[45%] mt-0" />
        </div>

        <div class="relative w-full px-6 sm:px-10 md:px-16 lg:px-20 py-12">
            <!-- arrow kiri -->
            <button id="categoryScrollLeft" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-footer text-white p-2 rounded-full shadow-md z-10 focus:outline-none sm:block md:hidden">
                &#9664;
            </button>

            <!-- Kontainer gambar kategori dengan properti flex untuk memusatkan gambar -->
            <div id="categoryContainer" class="flex gap-16 lg:justify-center lg:items-center overflow-x-auto sm:overflow-x-auto md:overflow-x-hidden scrollbar-show snap-x snap-mandatory scroll-smooth">
                <a href="/kategori" class="block flex-shrink-0 snap-center">
                    <img src="/images/kategoria.jpg" alt="kategoria" class="w-56 h-auto rounded-2xl shadow-lg mx-auto">
                </a>
                <a href="/kategori" class="block flex-shrink-0 snap-center">
                    <img src="/images/kategorib.jpg" alt="kategorib" class="w-56 h-auto rounded-2xl shadow-lg mx-auto">
                </a>
                <a href="/kategori" class="block flex-shrink-0 snap-center">
                    <img src="/images/kategoric.jpg" alt="kategoric" class="w-56 h-auto rounded-2xl shadow-lg mx-auto">
                </a>
                <a href="/kategori" class="block flex-shrink-0 snap-center">
                    <img src="/images/kategorid.jpg" alt="kategorid" class="w-56 h-auto rounded-2xl shadow-lg mx-auto">
                </a>
            </div>

            <!-- backup permintaan gambar jadi text -->
            <!-- <div id="categoryContainer" class="flex gap-16 lg:justify-center lg:items-center overflow-x-auto sm:overflow-x-auto md:overflow-x-hidden scrollbar-show snap-x snap-mandatory scroll-smooth">
                <a href="/kategoria" class="block flex-shrink-0 snap-center">
                    <img src="/images/perintis.jpg" alt="perintis" class="w-56 h-auto rounded-2xl shadow-lg mx-auto">
                </a>
                <a href="/kategorib" class="block flex-shrink-0 snap-center">
                    <img src="/images/pengabdi.jpg" alt="pengabdi" class="w-56 h-auto rounded-2xl shadow-lg mx-auto">
                </a>
                <a href="/kategorib" class="block flex-shrink-0 snap-center">
                    <img src="/images/penyelamat.jpg" alt="penyelamat" class="w-56 h-auto rounded-2xl shadow-lg mx-auto">
                </a>
                <a href="/kategorid" class="block flex-shrink-0 snap-center">
                    <img src="/images/pembina.jpg" alt="pembina" class="w-56 h-auto rounded-2xl shadow-lg mx-auto">
                </a>
            </div> -->

            <!-- arrow kanan -->
            <button id="categoryScrollRight" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-footer text-white p-2 rounded-full shadow-md z-10 focus:outline-none sm:block md:hidden">
                &#9654;
            </button>
        </div>
    </section>

    <section id="tujuankalpataru" class="bg-primary">
        <div class="lg:my-12 md:my-8 my-4 pt-10 text-center">
            <div id="texttujuankalpataru" class="w-full h-[4rem] sm:h-[5rem] relative flex items-center justify-center">
                <h2 class="text-lg sm:text-xl md:text-2xl lg:text-4xl font-bold text-white">Tujuan Kalpataru</h2>
            </div>
            <hr class="border-2 border-white max-w-40 mx-auto mt-0" />
        </div>

        <div class="px-4 sm:px-10 md:px-16 lg:px-20 text-center">
            <p class="text-sm sm:text-base md:text-lg text-white mx-auto max-w-5xl">
                Meningkatkan kesadaran, membuka peluang bagi berkembangnya inovasi dan kreativitas, serta mendorong prakarsa masyarakat, sebagai bentuk apresiasi dan motivasi kepada individu dan kelompok masyarakat dalam melakukan perlindungan dan pengelolaan lingkungan hidup dan kehutanan secara berkelanjutan
            </p>

            <div class="grid gap-4 grid-cols-1 sm:grid-cols-1 lg:grid-cols-2 mt-6 py-10 justify-center">
                <!-- Card 1 -->
                <div class="bg-white shadow-sm border border-slate-200 rounded-lg w-4/5 mx-auto">
                    <div class="p-4">
                        <img src="/images/tujuan1.png" alt="tujuan1" class="w-10 mx-auto pb-2">
                        <h5 class="mb-2 text-slate-800 text-xl font-semibold">Mendorong Prakarsa Masyarakat</h5>
                        <p class="text-slate-600 leading-normal font-light">
                            Memberikan penghargaan kepada mereka yang telah mengambil langkah nyata dalam pelestarian lingkungan, baik melalui aksi individual maupun kolektif.
                        </p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white shadow-sm border border-slate-200 rounded-lg w-4/5 mx-auto">
                    <div class="p-4">
                        <img src="/images/tujuan2.png" alt="tujuan2" class="w-10 mx-auto pb-2">
                        <h5 class="mb-2 text-slate-800 text-xl font-semibold">Meningkatkan Kesadaran Masyarakat</h5>
                        <p class="text-slate-600 leading-normal font-light">
                            Mendorong kesadaran publik akan pentingnya menjaga keseimbangan ekosistem dan memanfaatkan sumber daya alam secara berkelanjutan.
                        </p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white shadow-sm border border-slate-200 rounded-lg w-4/5 mx-auto">
                    <div class="p-4">
                        <img src="/images/tujuan3.png" alt="tujuan3" class="w-10 mx-auto pb-2">
                        <h5 class="mb-2 text-slate-800 text-xl font-semibold">Menginspirasi Perubahan Positif</h5>
                        <p class="text-slate-600 leading-normal font-light">
                            Menjadikan para penerima penghargaan sebagai panutan bagi masyarakat luas dalam upaya pelestarian lingkungan, baik di tingkat lokal maupun nasional.
                        </p>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="bg-white shadow-sm border border-slate-200 rounded-lg w-4/5 mx-auto">
                    <div class="p-4">
                        <img src="/images/tujuan4.png" alt="tujuan4" class="w-10 mx-auto pb-2">
                        <h5 class="mb-2 text-slate-800 text-xl font-semibold">Mendorong Partisipasi Aktif</h5>
                        <p class="text-slate-600 leading-normal font-light">
                            Mengundang banyak individu, kelompok, dan organisasi untuk berperan aktif dalam upaya konservasi dan pemulihan lingkungan melalui prakarsa baru.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="statistikpeta">
        <div class="my-4 pt-10 text-center">
            <div id="texttujuankalpataru" class="w-full h-[4rem] sm:h-[5rem] relative flex items-center justify-center">
                <h2 class="text-lg sm:text-xl md:text-2xl lg:text-4xl font-medium text-black">Statistik Penyebaran Penghargaan Kalpataru</h2>
            </div>
            <hr class="border-2 border-primary max-w-64 mx-auto mt-0" />
        </div>

        <div class="relative w-full px-6 sm:px-10 md:px-16 lg:px-20 py-10">
            <div id="map"></div>
        </div>
    </section>

    <section id="statistikcard" class="bg-primary">
        <div class="px-4 sm:px-10 md:px-16 lg:px-20 py-10 text-center">
            <div class="grid gap-4 grid-cols-1 sm:grid-cols-1 lg:grid-cols-2 mt-6 py-10 justify-center">
                <!-- Card 1 -->
                <div class="bg-white shadow-sm border border-slate-200 rounded-lg w-4/5 mx-auto flex gap-4 items-center px-4">
                    <img src="/images/statistikcard1.png" alt="statistikcard1" class="w-32 h-w-32">
                    <div>
                        <h2 class="text-5xl font-bold text-gray-800 text-start mb-4">428</h2>
                        <p class="text-gray-600 text-justify">Penerima Penghargaan Kalpataru sejak program ini dimulai pada tahun 1980</p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white shadow-sm border border-slate-200 rounded-lg w-4/5 mx-auto flex items-center justify-center p-4">
                    <div class="space-y-4 w-96">
                        
                        <!-- Keanekaragaman Hayati -->
                        <div class="flex items-center">
                            <img src="/images/statistikkeanekaragamanhayati.png" alt="statistikkeanekaragamanhayati" class="w-10 h-10 mr-3">
                            <div class="w-full">
                                <div class="flex justify-between">
                                    <span class="text-gray-700">Keanekaragaman Hayati</span>
                                    <span class="text-black font-bold">199</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5 mt-1">
                                    <div id="card2progress2" class="bg-green-500 h-2.5 rounded-full" style="width: 0;"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Perubahan Iklim -->
                        <div class="flex items-center">
                            <img src="/images/statistikperubahaniklim.png" alt="statistikperubahaniklim" class="w-10 h-10 mr-3">
                            <div class="w-full">
                                <div class="flex justify-between">
                                    <span class="text-gray-700">Perubahan Iklim</span>
                                    <span class="text-black font-bold">109</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5 mt-1">
                                    <div id="card2progress4" class="bg-blue-500 h-2.5 rounded-full" style="width: 0;"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Pencemaran dan Kerusakan Lingkungan -->
                        <div class="flex items-center">
                            <img src="/images/statistikpencemarandankerusakanlingkungan.png" alt="statistikpencemarandankerusakanlingkungan" class="w-10 h-10 mr-3">
                            <div class="w-full">
                                <div class="flex justify-between">
                                    <span class="text-gray-700">Pencemaran dan Kerusakan Lingkungan</span>
                                    <span class="text-black font-bold">27</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5 mt-1">
                                    <div id="card2progress3" class="bg-yellow-500 h-2.5 rounded-full" style="width: 0;"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Hukum dan Budaya -->
                        <div class="flex items-center">
                            <img src="/images/statistikhukumdanbudaya.png" alt="statistikhukumdanbudaya" class="w-10 h-10 mr-3">
                            <div class="w-full">
                                <div class="flex justify-between">
                                    <span class="text-gray-700">Hukum dan Budaya</span>
                                    <span class="text-black font-bold">93</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5 mt-1">
                                    <div id="card2progress1" class="bg-red-500 h-2.5 rounded-full" style="width: 0;"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white shadow-sm border border-slate-200 rounded-lg w-4/5 mx-auto flex items-center justify-center p-4">
                    <div class="space-y-4 w-80">
                        <div class="flex items-center">
                            <img src="/images/statistikperintislingkungan.png" alt="statistikperintislingkungan" class="w-10 h-10 mr-3">
                            <div class="w-full">
                                <div class="flex justify-between">
                                    <span class="text-gray-700">Perintis Lingkungan</span>
                                    <span class="text-black font-bold">129</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5 mt-1">
                                    <div id="card3progress1" class="bg-red-500 h-2.5 rounded-full" style="width: 70%;"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Pengabdi Lingkungan -->
                        <div class="flex items-center">
                            <img src="/images/statistikpengabdilingkungan.png" alt="statistikpengabdilingkungan" class="w-10 h-10 mr-3">
                            <div class="w-full">
                                <div class="flex justify-between">
                                    <span class="text-gray-700">Pengabdi Lingkungan</span>
                                    <span class="text-black font-bold">104</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5 mt-1">
                                    <div id="card3progress2" class="bg-green-500 h-2.5 rounded-full" style="width: 80%;"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Penyelamat Lingkungan -->
                        <div class="flex items-center">
                            <img src="/images/statistikpenyelamatlingkungan.png" alt="statistikpenyelamatlingkungan" class="w-10 h-10 mr-3">
                            <div class="w-full">
                                <div class="flex justify-between">
                                    <span class="text-gray-700">Penyelamat Lingkungan</span>
                                    <span class="text-black font-bold">128</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5 mt-1">
                                    <div id="card3progress3" class="bg-yellow-500 h-2.5 rounded-full" style="width: 90%;"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Pembina Lingkungan -->
                        <div class="flex items-center">
                            <img src="/images/statistikpembinalingkungan.png" alt="statistikpembinalingkungan" class="w-10 h-10 mr-3">
                            <div class="w-full">
                                <div class="flex justify-between">
                                    <span class="text-gray-700">Pembina Lingkungan</span>
                                    <span class="text-black font-bold">67</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5 mt-1">
                                    <div id="card3progress4" class="bg-blue-500 h-2.5 rounded-full" style="width: 50%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="bg-white shadow-sm border border-slate-200 rounded-lg w-4/5 mx-auto p-4 flex flex-row items-center gap-4 justify-center">
                    <div>
                        <canvas id="genderChart" width="200" height="200"></canvas>
                    </div>
                    <div>
                        <div class="flex">
                            <span class="block w-4 h-4 bg-blue-500 mr-2"></span>
                            <span>Laki-Laki</span>
                        </div>
                        <div class="flex">
                            <span class="block w-4 h-4 bg-green-500 mr-2"></span>
                            <span>Perempuan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="ajakan" class="relative">
        <img src="/images/ajakan.png" alt="ajakan" class="w-full h-auto max-h-[300px] object-cover">

        <div class="absolute inset-0 grid grid-cols-2 p-4 sm:p-6 lg:p-8 lg:mt-7 lg:mx-28 text-white">

            <div class="text-left">
                <p class="text-xs sm:text-sm md:text-base lg:text-3xl font-medium">
                    Jadilah bagian dari <br /> perubahan
                </p>
            </div>

            <div class="lg:ms-16 text-left space-y-2">
                <p class="text-xs sm:text-xs md:text-base lg:text-lg">
                    Tunjukan dukungan Anda untuk upaya pelestarian lingkungan. Bergabunglah dengan kami dan buat perubahan nyata!
                </p>
                <a href="auth/register">
                    <button class="rounded-md bg-white lg:mt-2 py-2 px-4 sm:px-3 text-xs sm:text-sm md:text-base lg:text-base text-black transition-all shadow-md hover:font-bold hover:shadow-lg focus:bg-site focus:shadow-none active:bg-site hover:bg-site active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                        Daftar Sekarang
                    </button>
                </a>
            </div>
        </div>
    </section>

    <section id="berita">
        <div class="lg:mx-28 p-5">
            <div class="flex justify-between items-center lg:mt-10 mb-2">
                <h2 class="text-lg font-bold">Berita</h2>
                <a href="<?= base_url('publikasi/berita') ?>" class="flex items-center text-primary">
                    Selengkapnya
                    <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
            <hr class="border-2 border-primary w-full mt-0 mb-10" />

            <div class="relative flex overflow-x-auto space-x-4 scrollbar-hide">
                <!-- arrow kiri -->
                <button id="beritaScrollLeft" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-footer text-white p-2 rounded-full shadow-md z-10 focus:outline-none sm:block md:hidden">
                    &#9664;
                </button>
                <div id="beritaContainer" class="flex overflow-x-auto space-x-4 scrollbar-hide">
                    <?php if (!empty($berita) && is_array($berita)): ?>
                        <?php foreach ($berita as $item): ?>
                            <div class="flex-none w-64 bg-white rounded-lg shadow-md my-2">
                                <img src="/public/<?= esc($item['foto']); ?>" alt="<?= esc($item['judul']); ?>" class="w-full h-40 object-cover rounded-t-lg">
                                <div class="p-4">
                                    <h3 class="font-bold text-md mb-2"><?= word_limiter(esc($item['judul']), 4); ?></h3>
                                    <a href="/berita/<?= esc($item['slug']); ?>" class="text-primary flex items-center text-sm">
                                        Baca Selengkapnya
                                        <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Tidak ada berita yang terbit saat ini</p>
                    <?php endif; ?>
                </div>

                <!-- arrow kanan -->
                <button id="beritaScrollRight" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-footer text-white p-2 rounded-full shadow-md z-10 focus:outline-none sm:block md:hidden">
                    &#9654;
                </button>
            </div>
        </div>
    </section>

    <section id="video" class="mb-6">
        <div class="lg:mx-28 p-5">
            <div class="flex justify-between items-center lg:mt-10 mb-2">
                <h2 class="text-lg font-bold">Video</h2>
                <a href="<?= base_url('publikasi/video') ?>" class="flex items-center text-primary">
                    Selengkapnya
                    <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
            <hr class="border-2 border-primary w-full mt-0 mb-10" />

            <div class="relative flex overflow-x-auto space-x-4 scrollbar-hide">
                <!-- arrow kiri -->
                <button id="videoScrollLeft" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-footer text-white p-2 rounded-full shadow-md z-10 focus:outline-none sm:block md:hidden">
                    &#9664;
                </button>
                <div id="videoContainer" class="flex overflow-x-auto space-x-4 scrollbar-hide">
                    <?php if (!empty($video) && is_array($video)): ?>
                        <?php foreach ($video as $item): ?>
                            <div class="flex-none bg-white rounded-lg shadow-md my-2">
                                <?php
                                preg_match("/(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/", $item['link_video'], $matches);
                                $youtube_id = $matches[1];
                                ?>
                                <iframe class="w-full object-cover rounded-t-lg" height="200" src="https://www.youtube.com/embed/<?= $youtube_id; ?>"
                                    title="<?= esc($item['judul_video']); ?>" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                                <div class="p-2">
                                    <h5 class="font-bold text-sm mb-2"><?= word_limiter(esc($item['judul_video']), 6); ?></h5>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Tidak ada video saat ini</p>
                    <?php endif; ?>
                </div>

                <!-- arrow kanan -->
                <button id="videoScrollRight" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-footer text-white p-2 rounded-full shadow-md z-10 focus:outline-none sm:block md:hidden">
                    &#9654;
                </button>
            </div>
        </div>
    </section>

    <section id="faq">
        <div class="max-w-2xl mx-auto px-6 pt-6 pb-14">
            <h1 class="text-2xl font-medium text-center mb-2">Pertanyaan <b>Umum</b></h1>
            <hr class="border-2 border-primary w-32 mx-auto mt-0" />
            <p class="text-center text-gray-600 mt-2">Temukan jawaban atas pertanyaan Anda seputar Penghargaan Kalpataru dan pelestarian lingkungan</p>

            <div class="mt-8 space-y-4">
                <!-- Question 1 -->
                <div class="border rounded-lg p-4 shadow-md bg-white" id="card-1">
                    <div class="flex justify-between items-center cursor-pointer" onclick="toggleAnswer(1)">
                        <p class="font-semibold">Kapan batas waktu penyerahan dokumen usulan?</p>
                        <button class="text-gray-600" id="button-1">
                            <div class="flex items-center justify-center w-8 h-8">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path id="icon-1" stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </button>
                    </div>
                    <p id="answer-1" class="text-gray-600 mt-2 hidden">Batas waktu penyerahan dokumen adalah tanggal 20 Februari 2024 dan diunggah secara daring</p>
                </div>

                <!-- Question 2 -->
                <div class="border rounded-lg p-4 shadow-md bg-white" id="card-2">
                    <div class="flex justify-between items-center cursor-pointer" onclick="toggleAnswer(2)">
                        <p class="font-semibold">Dimanakah pengusul dapat mengakses contoh dokumen pengusulan dan tata cara pengisian formulir?</p>
                        <button class="text-gray-600" id="button-2">
                            <div class="flex items-center justify-center w-8 h-8">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path id="icon-2" stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </button>
                    </div>
                    <p id="answer-2" class="text-gray-600 mt-2 hidden">Format dokumen, contoh, dan tata cara pengisian formulir dapat diakses melalui tautan: <b>bit.ly/kalpataru2024</b></p>
                </div>

                <!-- Question 3 -->
                <div class="border rounded-lg p-4 shadow-md bg-white" id="card-3">
                    <div class="flex justify-between items-center cursor-pointer" onclick="toggleAnswer(3)">
                        <p class="font-semibold">Apakah calon yang pernah diusulkan dapat mengusulkan kembali?</p>
                        <button class="text-gray-600" id="button-3">
                            <div class="flex items-center justify-center w-8 h-8">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path id="icon-3" stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </button>
                    </div>
                    <p id="answer-3" class="text-gray-600 mt-2 hidden">Calon yang pernah diusulkan dan belum pernah meraih Penghargaan Kalpataru boleh untuk diusulkan kembali</p>
                </div>

                <!-- Question 4 -->
                <div class="border rounded-lg p-4 shadow-md bg-white" id="card-4">
                    <div class="flex justify-between items-center cursor-pointer" onclick="toggleAnswer(4)">
                        <p class="font-semibold">Mengapa disyaratkan kegiatan telah berlangsung minimal selama 5 tahun?</p>
                        <button class="text-gray-600" id="button-4">
                            <div class="flex items-center justify-center w-8 h-8">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path id="icon-4" stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </button>
                    </div>
                    <p id="answer-4" class="text-gray-600 mt-2 hidden">Acuan 5 tahun digunakan untuk melihat dampak, indikator keberhasilan, dan keberlanjutan kegiatan yang dilakukan calon</p>
                </div>

                <!-- Question 5 -->
                <div class="border rounded-lg p-4 shadow-md bg-white" id="card-5">
                    <div class="flex justify-between items-center cursor-pointer" onclick="toggleAnswer(5)">
                        <p class="font-semibold">Bagaimana jika kelompok belum memiliki Akta Notaris (legalitas), namun telah lama melakukan kegiatan pelestarian lingkungan?</p>
                        <button class="text-gray-600" id="button-5">
                            <div class="flex items-center justify-center w-8 h-8">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path id="icon-5" stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </button>
                    </div>
                    <p id="answer-5" class="text-gray-600 mt-2 hidden">Bukti pembentukkan kelompok harus ada, jika tidak memungkinkan membuat akta notaris, bisa membuat surat keterangan pembentukkan kelompok dari desa. <br /> Yang menjadi acuan adalah sejak kapan melakukan kegiatan, dengan melampirkan bukti dukung berupa dokumentasi kegiatan.</p>
                </div>

                <!-- Question 6 -->
                <div class="border rounded-lg p-4 shadow-md bg-white" id="card-6">
                    <div class="flex justify-between items-center cursor-pointer" onclick="toggleAnswer(6)">
                        <p class="font-semibold">Apakah satker di luar Dinas LHK dapat mengirimkan usulan penerima Kalpataru secara langsung ke Sekretariat Kalpataru Nasional?</p>
                        <button class="text-gray-600" id="button-6">
                            <div class="flex items-center justify-center w-8 h-8">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path id="icon-6" stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </button>
                    </div>
                    <p id="answer-6" class="text-gray-600 mt-2 hidden">Pengusul dapat mengirimkan surat pengusulan langsung melalui email Sekretariat Kalpataru, dengan mencantumkan tembusan kepada DLHK Provinsi masing-masing, sebagai bentuk koordinasi.</p>
                </div>

                <!-- Question 7 -->
                <div class="border rounded-lg p-4 shadow-md bg-white" id="card-7">
                    <div class="flex justify-between items-center cursor-pointer" onclick="toggleAnswer(7)">
                        <p class="font-semibold">Bagaimana melampirkan dokumentasi video jika kapasitasnya besar?</p>
                        <button class="text-gray-600" id="button-7">
                            <div class="flex items-center justify-center w-8 h-8">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path id="icon-7" stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </button>
                    </div>
                    <p id="answer-7" class="text-gray-600 mt-2 hidden">Video kegiatan calon diunggah dalam bentuk link Google Drive atau link media sosial</p>
                </div>
            </div>
        </div>
    </section>

    <script defer>
        // popup
        document.addEventListener('DOMContentLoaded', function() {
            // Set delay for 2 seconds (2000 milliseconds)
            setTimeout(function() {
                document.getElementById('popup').classList.remove('hidden');
            }, 2000); // 2 seconds delay

            // Close popup on clicking X button
            document.getElementById('close-btn').addEventListener('click', function() {
                document.getElementById('popup').classList.add('hidden');
            });
        });
    </script>

    <script defer>
        document.addEventListener('DOMContentLoaded', function() {
            var map = L.map('map', {
                center: [-1.062209, 113.885034],
                zoom: 5,
                minZoom: 4,
                maxZoom: 14,
                maxBounds: [
                    [-37.972342, 29.516035],
                    [32.873401, 178.643460]
                ]
            });

            L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager_nolabels/{z}/{x}/{y}{r}.png', {
                attribution: ''
            }).addTo(map);

            var penerimaData = <?= json_encode($peta); ?>;

            var geojsonUrls = {
                'DKI Jakarta': 'https://kalpatarujson.vercel.app/json/dkijakarta.json',
                'Jawa Barat': 'https://kalpatarujson.vercel.app/json/jawabarat.json',
                'Jawa Tengah': 'https://kalpatarujson.vercel.app/json/jawatengah.json',
                'Jawa Timur': 'https://kalpatarujson.vercel.app/json/jawatimur.json',
                'Banten': 'https://kalpatarujson.vercel.app/json/banten.json',
                'DI Yogyakarta': 'https://kalpatarujson.vercel.app/json/diy.json',
                'Bali': 'https://kalpatarujson.vercel.app/json/bali.json',
                'Aceh': 'https://kalpatarujson.vercel.app/json/aceh.json',
                'Papua Barat Daya': 'https://kalpatarujson.vercel.app/json/papuabaratdaya.json',
                'Papua Barat': 'https://kalpatarujson.vercel.app/json/papuabarat.json',
                'Papua Tengah': 'https://kalpatarujson.vercel.app/json/papuatengah.json',
                'Papua Selatan': 'https://kalpatarujson.vercel.app/json/papuaselatan.json',
                'Papua Pegunungan': 'https://kalpatarujson.vercel.app/json/papuapegunungan.json',
                'Papua': 'https://kalpatarujson.vercel.app/json/papua.json',
                'Maluku Utara': 'https://kalpatarujson.vercel.app/json/malukuutara.json',
                'Maluku': 'https://kalpatarujson.vercel.app/json/maluku.json',
                'Sulawesi Barat': 'https://kalpatarujson.vercel.app/json/sulawesibarat.json',
                'Gorontalo': 'https://kalpatarujson.vercel.app/json/gorontalo.json',
                'Sulawesi Tenggara': 'https://kalpatarujson.vercel.app/json/sulawesitenggara.json',
                'Sulawesi Selatan': 'https://kalpatarujson.vercel.app/json/sulawesiselatan.json',
                'Sulawesi Tengah': 'https://kalpatarujson.vercel.app/json/sulawesitengah.json',
                'Sulawesi Utara': 'https://kalpatarujson.vercel.app/json/sulawesiutara.json',
                'Kalimantan Utara': 'https://kalpatarujson.vercel.app/json/kalimantanutara.json',
                'Kalimantan Timur': 'https://kalpatarujson.vercel.app/json/kalimantantimur.json',
                'Kalimantan Selatan': 'https://kalpatarujson.vercel.app/json/kalimantanselatan.json',
                'Kalimantan Tengah': 'https://kalpatarujson.vercel.app/json/kalimantantengah.json',
                'Kalimantan Barat': 'https://kalpatarujson.vercel.app/json/kalimantanbarat.json',
                'Nusa Tenggara Timur': 'https://kalpatarujson.vercel.app/json/nusatenggaratimur.json',
                'Nusa Tenggara Barat': 'https://kalpatarujson.vercel.app/json/nusatenggarabarat.json',
                'Kepulauan Riau': 'https://kalpatarujson.vercel.app/json/kepulauanriau.json',
                'Kepulauan Bangka Belitung': 'https://kalpatarujson.vercel.app/json/kepulauanbangkabelitung.json',
                'Lampung': 'https://kalpatarujson.vercel.app/json/lampung.json',
                'Bengkulu': 'https://kalpatarujson.vercel.app/json/bengkulu.json',
                'Sumatera Selatan': 'https://kalpatarujson.vercel.app/json/sumateraselatan.json',
                'Sumatera Barat': 'https://kalpatarujson.vercel.app/json/sumaterabarat.json',
                'Sumatera Utara': 'https://kalpatarujson.vercel.app/json/sumaterautara.json',
                'Jambi': 'https://kalpatarujson.vercel.app/json/jambi.json',
                'Riau': 'https://kalpatarujson.vercel.app/json/riau.json',
            };

            var colorAbuMuda = '#D3D3D3';

            for (let provinsi in geojsonUrls) {
                fetch(geojsonUrls[provinsi])
                    .then(response => response.json())
                    .then(data => {
                        var penerimaDiProvinsi = penerimaData.find(function(penerima) {
                            return penerima.provinsi === provinsi;
                        });

                        var geojsonLayer = L.geoJSON(data, {
                            style: function() {
                                return penerimaDiProvinsi && penerimaDiProvinsi.total > 0 ? {
                                    color: 'none',
                                    fillColor: colorAbuMuda,
                                    fillOpacity: 1,
                                    weight: 0
                                } : {
                                    color: 'none',
                                    fillOpacity: 0
                                };
                            },
                            onEachFeature: function(feature, layer) {
                                var center = layer.getBounds().getCenter();
                                var label = L.marker(center, {
                                    icon: L.divIcon({
                                        className: 'province-label',
                                        html: '<div style="font-weight: bold; cursor: pointer;">' + provinsi + '</div>',
                                        iconSize: [100, 40],
                                        iconAnchor: [50, 20]
                                    })
                                }).addTo(map);

                                var popupContent = '<strong>' + provinsi + '</strong>';
                                if (penerimaDiProvinsi && penerimaDiProvinsi.total > 0) {
                                    popupContent += '<br>Jumlah Penerima: ' + penerimaDiProvinsi.total;
                                } else {
                                    popupContent += '<br>Tidak ada penerima.';
                                }

                                label.on('click', function() {
                                    var popup = L.popup()
                                        .setLatLng(center)
                                        .setContent(popupContent)
                                        .openOn(map);
                                });
                            }
                        }).addTo(map);
                    })
                    .catch(error => console.error('Error loading GeoJSON for ' + provinsi + ':', error));
            }

            var legend = L.control({
                position: 'bottomright'
            });

            legend.onAdd = function(map) {
                var div = L.DomUtil.create('div', 'info legend');
                var labels = ['<strong>Keterangan</strong>'];
                var colors = [colorAbuMuda];

                labels.push(
                    '<i style="background:' + colors[0] + '"></i> Penerima Kalpataru'
                );

                div.innerHTML = labels.join('<br>');
                return div;
            };

            legend.addTo(map);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        //  scroll kategori
        const categoryContainer = document.getElementById('categoryContainer');
        const categoryScrollLeft = document.getElementById('categoryScrollLeft');
        const categoryScrollRight = document.getElementById('categoryScrollRight');

        categoryScrollLeft.addEventListener('click', () => {
            categoryContainer.scrollBy({
                left: -200,
                behavior: 'smooth'
            });
        });

        categoryScrollRight.addEventListener('click', () => {
            categoryContainer.scrollBy({
                left: 200,
                behavior: 'smooth'
            });
        });

        // scroll berita
        const cardContainer = document.getElementById('beritaContainer');
        const beritaScrollLeft = document.getElementById('beritaScrollLeft');
        const beritaScrollRight = document.getElementById('beritaScrollRight');

        beritaScrollLeft.addEventListener('click', () => {
            cardContainer.scrollBy({
                left: -300,
                behavior: 'smooth'
            });
        });

        beritaScrollRight.addEventListener('click', () => {
            cardContainer.scrollBy({
                left: 300,
                behavior: 'smooth'
            });
        });

        // scroll video
        const videoContainer = document.getElementById('videoContainer');
        const videoScrollLeft = document.getElementById('videoScrollLeft');
        const videoScrollRight = document.getElementById('videoScrollRight');

        videoScrollLeft.addEventListener('click', () => {
            videoContainer.scrollBy({
                left: -300,
                behavior: 'smooth'
            });
        });

        videoScrollRight.addEventListener('click', () => {
            videoContainer.scrollBy({
                left: 300,
                behavior: 'smooth'
            });
        });

        // faq
        function toggleAnswer(index) {
            const answer = document.getElementById(`answer-${index}`);
            const icon = document.getElementById(`icon-${index}`);
            const button = document.getElementById(`button-${index}`);
            const card = document.getElementById(`card-${index}`);

            answer.classList.toggle('hidden');

            if (answer.classList.contains('hidden')) {
                button.classList.remove('text-primary');
                button.classList.add('text-gray-600');
                icon.setAttribute('d', 'M9 5l7 7-7 7');
                icon.classList.remove('text-white');
                button.querySelector('.flex').classList.remove('bg-primary', 'rounded-full');
                card.classList.remove('border-primary');
            } else {
                button.classList.remove('text-gray-600');
                button.classList.add('text-primary');
                icon.setAttribute('d', 'M19 9l-7 7-7-7');
                icon.classList.add('text-white');
                button.querySelector('.flex').classList.add('bg-primary', 'rounded-full');
                card.classList.add('border-primary');
            }
        }

        /* CARD DATA DAN STATISTIK */
        // CARD 2
        const progressDataCard2 = [{
                id: 'card2progress1',
                value: 93,
                max: 200
            },
            {
                id: 'card2progress2',
                value: 199,
                max: 200
            },
            {
                id: 'card2progress3',
                value: 27,
                max: 200
            },
            {
                id: 'card2progress4',
                value: 109,
                max: 200
            },
        ];

        // Update progress bars based on data
        progressDataCard2.forEach(data => {
            const progressElement = document.getElementById(data.id);
            const progressWidth = (data.value / data.max) * 100;
            progressElement.style.width = progressWidth + '%';
        });

        // CARD 3
        const progressDataCard3 = [{
                id: 'card3progress1',
                value: 129,
                max: 200
            }, // Adjust max as needed
            {
                id: 'card3progress2',
                value: 104,
                max: 200
            },
            {
                id: 'card3progress3',
                value: 128,
                max: 200
            },
            {
                id: 'card3progress4',
                value: 67,
                max: 200
            },
        ];

        progressDataCard3.forEach(data => {
            const progressElement = document.getElementById(data.id);
            const progressWidth = (data.value / data.max) * 100;
            progressElement.style.width = progressWidth + '%';
        });

        // CARD 4
        const ctx = document.getElementById('genderChart').getContext('2d');
        const genderChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Laki-Laki', 'Perempuan'],
                datasets: [{
                    label: 'Jumlah',
                    data: [380, 48],
                    backgroundColor: ['#4299E1', '#48BB78'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false // Hide default legend
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });
    </script>

    <?= $this->endSection() ?>
</body>

</html>