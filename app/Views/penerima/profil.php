<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

  <!-- Navbar and Footer -->
  <?= $this->extend('template/navbarfooter') ?>

  <!-- Main Content Section -->
  <?= $this->section('content') ?>

  <div class="container mx-auto p-4">
    <div class="grid grid-cols-1 lg:grid-cols-[1fr_2fr] gap-4"> <!-- Menggunakan grid untuk layout -->

      <!-- Sidebar -->
      <div> <!-- Sidebar mengambil 1 bagian -->
        <?= $this->include('template/sidebarpenerima') ?>
      </div>

      <!-- Konten Profil dan Artikel -->
      <div class="space-y-4"> <!-- Menggunakan dua kolom untuk profil dan artikel -->

        <!-- Profile Card -->
        <div class="relative w-full max-w-5xl bg-white border-2 border-primary rounded-xl shadow-md p-4 lg:p-8">
          <h4 class="text-xl font-bold text-slate-800 mb-4">Profil</h4>

          <!-- User Information -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- Nama Individu -->
            <div>
              <label class="block mb-2 text-sm text-black">Nama Individu</label>
              <input type="text" value="Joko Susilo" readonly class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>

            <!-- Email -->
            <div>
              <label class="block mb-2 text-sm text-black">Email</label>
              <input type="text" value="jokosusilo@gmail.com" readonly class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
          </div>
        </div>

        <!-- Artikel Saya Section -->
        <div class="relative w-full max-w-5xl mb-4 rounded-xl border-2 border-primary bg-white shadow-md lg:p-8 p-4">
          <h4 class="block text-xl font-bold text-slate-800 mb-2">Artikel Saya</h4>
          <!-- Tombol Tambah Artikel-->
          <div class="my-4 flex flex-col md:flex-row justify-between md:items-center gap-4">
            <a href="/admin/tambah-artikel" class="w-full md:w-auto">
              <button id="tambahArtikel" class="w-full md:w-48 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover">
                <span>&#10010</span> Tambah Artikel
              </button>
            </a>
          </div>
          <div class="relative flex flex-col w-full h-full overflow-hidden text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
            <div class="overflow-x-auto">
              <table class="w-full text-left table-auto min-w-max">
                <thead>
                  <tr>
                    <th class="p-4 border-b border-accent2 bg-accent1 text-center">
                      <p class="block text-xs md:text-sm font-bold leading-none text-accent2">Judul Artikel</p>
                    </th>
                    <th class="p-4 border-b border-accent2 bg-accent1 text-center">
                      <p class="block text-xs md:text-sm font-bold leading-none text-accent2">Isi Artikel</p>
                    </th>
                    <th class="p-4 border-b border-accent2 bg-accent1 text-center">
                      <p class="block text-xs md:text-sm font-bold leading-none text-accent2">Status</p>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="hover:bg-slate-50">
                    <td class="p-4 border-b border-slate-200 text-center">
                      <p class="block text-xs text-slate-800">Surga Tersembunyi di Maros</p>
                    </td>
                    <td class="p-4 border-b border-slate-200 text-center">
                      <a href="./detailartikelsaya">
                        <button class="w-24 rounded-md py-2 px-2 text-center text-xs text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover" type="button">Lihat Rincian</button>
                      </a>
                    </td>
                    <td class="p-4 border-b border-slate-200 text-center">
                      <p class="block text-xs font-bold text-accepted">Terbit</p>
                    </td>
                  </tr>
                  <!-- Rows lainnya -->
                </tbody>
              </table>
            </div>
            <!-- Pagination -->
            <div class="row flex lg:justify-end justify-center my-6 lg:me-2 me-0">
              <!-- Tombol Pagination -->
              <button class="rounded-md border border-r-0 border-slate-300 py-2 px-3 text-sm transition-all hover:shadow-lg text-slate-600 hover:text-white hover:bg-primary focus:text-white focus:bg-primary" type="button">
                <!-- SVG Icon for Previous -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                  <path fill-rule="evenodd" d="M11.03 3.97a.75.75 0 0 1 0 1.06l-6.22 6.22H21a.75.75 0 0 1 0 1.5H4.81l6.22 6.22a.75.75 0 1 1-1.06 1.06l-7.5-7.5a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                </svg>
              </button>
              <!-- Pagination Buttons -->
              <!-- Tombol lainnya untuk paginasi -->
              <button class="rounded-md border border-slate-300 py-2 px-3 text-sm transition-all hover:shadow-lg text-slate-600 hover:text-white hover:bg-primary focus:text-white focus:bg-primary" type="button">
                <!-- SVG Icon for Next -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                  <path fill-rule="evenodd" d="M12.97 3.97a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 1 1-1.06-1.06l6.22-6.22H3a.75.75 0 0 1 0-1.5h16.19l-6.22-6.22a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                </svg>
              </button>
            </div>
          </div>
        </div>

      </div> <!-- End Konten Profil dan Artikel -->

    </div> <!-- End Grid Layout -->
  </div>

  <?= $this->endSection() ?>

</body>

</html>