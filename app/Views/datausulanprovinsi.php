<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
</head>

<body>
    <?= $this->extend('template/navbarfooter') ?>
    <?= $this->section('content'); ?>

    <section id="kategori" class="py-8 lg:mx-14 mx-0">
        <div class="text-center mb-4 px-4">
            <h2 class="text-lg sm:text-xl md:text-2xl lg:text-4xl font-medium text-black">Papua Barat</h2>
            <hr class="border-2 border-primary w-48 mx-auto mt-2">
            <p class="text-sm mt-12 lg:mx-32 mx-0">Berikut adalah daftar pemenang di Papua Barat</p>
        </div>
    </section>  

    <div class="flex flex-col lg:flex-row items-start lg:justify-between lg:items-center my-4 px-4 lg:px-24">
        <div class=" items-center mb-4 lg:mb-0">
            <form id="filterForm" action="" method="get" class="flex items-center mr-4">
                <label for="statusAkun" class="text-sm font-bold text-primary">Filter Kategori:</label>
                <select name="statusAkun" id="statusAkun" class="ml-2 border-2 border-primary text-primary rounded-md shadow-sm" onchange="document.getElementById('filterForm').submit();">
                    <option value="Kategori">Kategori</option>
                    <option value="Aktif">Perintis Lingkungan</option>
                    <option value="Pending">Pengabdi Lingkungan</option>
                    <option value="Aktif">Penyelamat Lingkungan</option>
                    <option value="Pending">Pembina Lingkungan</option>
                </select>
            </form>
            <h1 class="lg:text-md font-semibold mt-2">
                Hasil: 2 Penerima
            </h1> 
        </div>
        
        <div class="relative mr-4 lg:mr-0">
            <form method="get">
                <input
                    placeholder="Masukan kata kunci"
                    class="input shadow-lg focus:border-2 border-2 border-primary px-5 py-3 rounded-xl w-56 transition-all focus:w-64 outline-none"
                    name="search" />
                <svg
                    class="size-6 absolute top-3 right-3 text-primary"
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
            </form>
        </div>
    </div>

    <div id="" class="flex flex-col lg:flex-row items-center lg:items-start px-4 lg:px-24 my-12">
        <img src="/images/lukaskalpataru.jpg" alt="Perintis Lingkungan" class="w-40 lg:w-56 h-auto rounded-lg mb-4 lg:mb-0 lg:mr-6 mx-auto lg:mx-0" style="width: 250px; height: 250px;">
        <div class="text-center lg:text-left">
            <h3 class="text-xl font-medium mb-2">Lukas Awiman Barayap</h3>
            <hr class="border-2 border-primary w-40 mt-1 mb-4 mx-auto lg:mx-0">
            <p class="mb-1">Kategori: <b>Perintis Lingkungan</b></p>
            <p class="mb-4">Tahun: <b>2019</b></p>
            <p class="text-sm leading-relaxed text-justify mb-4">Lukas Awiman Barayap mengabdikan diri untuk menjaga lingkungan khususnya kehidupan laut.
                Lukas dikenal sebagai ‘pemanggil ikan’ di Kampung Bakaro, Distrik Manokwari Timur, Kabupaten Manokwari, Papua Barat. 
                Ia merasa memiliki kemampuan alami untuk memanggil ikan ke pinggir pantai. Jika penangkapan ikan memakai cara pemboman di laut, ucapnya, generasi berikut tidak akan menikmati hasil laut. Area mencari ikan pun akan semakin jauh. 
                Itu sebabnya Lukas Awiman Barayap menggunakan cara memanggil ikan.
                Semula, ia memakai sarang rayap sebagai bahan untuk memberi makan ikan. Sarang rayap didapatkannya di hutan sekitar Bakaro.
            </p>
            <button class="bg-primary text-white px-4 py-2 mb-6 lg:mb-0 rounded-md hover:bg-primaryhover">Selengkapnya</button>
        </div>
    </div>

    <div id="" class="flex flex-col lg:flex-row items-center lg:items-start px-4 lg:px-24 my-12">
        <img src="/images/petronelakalpataru.jpg" alt="Perintis Lingkungan" class="w-40 lg:w-56 h-auto rounded-lg mb-4 lg:mb-0 lg:mr-6 mx-auto lg:mx-0" style="width: 250px; height: 250px;">
        <div class="text-center lg:text-left">
            <h3 class="text-xl font-medium mb-2">Petronela Meraudje</h3>
            <hr class="border-2 border-primary w-40 mt-1 mb-4 mx-auto lg:mx-0">
            <p class="mb-1">Kategori: <b>Perintis Lingkungan</b></p>
            <p class="mb-4">Tahun: <b>2023</b></p>
            <p class="text-sm leading-relaxed text-justify mb-4">Petronela Meraudje dianugerahi Kalpataru dari Kementerian Lingkungan Hidup dan Kehutanan (LKH) RI setelah selama 10 tahun menjaga hutan mangrove atau hutan perempuan serta melestarikannya dari pencemaran sampah dan limbah di Teluk Youtefa, Kota Jayapura.
                Penghargaan tersebut diberikan oleh Menteri LHK, Siti Nurbaya kepada perempuan kampung Enggros itu bertepatan dengan hari Lingkungan Hidup Sedunia di Jakarta pada 5 Juni 2023 lalu.
                Berdasarkan penilaian dewan Kalpataru, Petronela berhak mendapatkan penghargaan kategori pembina lingkungan tersebut setelah terpilih menyisihkan 368 peserta dari seluruh Indonesia.
            </p>
            <button class="bg-primary text-white px-4 py-2 mb-6 lg:mb-0 rounded-md hover:bg-primaryhover">Selengkapnya</button>
        </div>
    </div>
    <div class="row flex justify-end mr-4 mb-8">
  <button class="rounded-md rounded-r-none border border-r-0 border-slate-300 py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-primary hover:bg-slate-800 hover:border-slate-800 focus:text-white focus:bg-slate-800 focus:border-slate-800 active:border-slate-800 active:text-white active:bg-slate-800 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
      <path fill-rule="evenodd" d="M11.03 3.97a.75.75 0 0 1 0 1.06l-6.22 6.22H21a.75.75 0 0 1 0 1.5H4.81l6.22 6.22a.75.75 0 1 1-1.06 1.06l-7.5-7.5a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
    </svg>
  </button>
  <button class="rounded-md rounded-r-none rounded-l-none border border-r-0 border-slate-300 py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-primary hover:text-primary hover:bg-slate-800 hover:border-slate-800 focus:text-white focus:bg-slate-800 focus:border-slate-800 active:border-slate-800 active:text-white active:bg-slate-800 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
    1
  </button>
  <button class="rounded-md rounded-r-none rounded-l-none border border-r-0 border-slate-300 py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-primary hover:text-primary hover:bg-slate-800 hover:border-slate-800 focus:text-white focus:bg-slate-800 focus:border-slate-800 active:border-slate-800 active:text-white active:bg-slate-800 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
    2
  </button>
  <button class="rounded-md rounded-l-none border border-slate-300 py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-primary hover:bg-slate-800 hover:border-slate-800 focus:text-white focus:bg-slate-800 focus:border-slate-800 active:border-slate-800 active:text-white active:bg-slate-800 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
      <path fill-rule="evenodd" d="M12.97 3.97a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 1 1-1.06-1.06l6.22-6.22H3a.75.75 0 0 1 0-1.5h16.19l-6.22-6.22a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
    </svg>
  </button>
</div>
    <?= $this->endSection() ?>
</body>

</html>
