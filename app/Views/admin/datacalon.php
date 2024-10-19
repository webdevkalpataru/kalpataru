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
  
    <?= $this->include('template/sidebaradmin') ?>
  
  
  <div class="lg:flex-1 p-6">
    <div class="min-h-screen flex flex-col">

      <div class="container mx-auto flex items-center justify-between p-4 md:p-6">
        <h1 class="text-xl md:text-2xl font-semibold text-gray-700">Data Calon</h1>
        <div class="flex items-center">
          <p class="text-gray-500 mr-2 md:mr-4">Hello, Admin</p>
          <button class="bg-rejected text-white px-3 py-2 md:px-4 md:py-2 rounded-lg">Keluar</button>
        </div>
      </div>

      <div class="relative flex flex-col w-full h-full bg-white shadow-md rounded-lg bg-clip-border my-6">
        <div class="flex justify-end items-center">
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

        <table class="w-full text-center table-auto min-w-max mt-4">
          <!-- Isi tabel -->
        </table>

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
                  Detail
                </p>
              </th>
              <th class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                <p class="flex items-center justify-center gap-2 text-sm font-bold leading-none text-slate-800">
                  Status
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
                <div>
                  <button id="uploadBtn" class="mt-4 w-full rounded-md py-2 px-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="submit">Selengkapnya</button>
                </div>
              </td>
              <td class="p-4 text-center border-b border-slate-200">
                <form id="filterForm" action="" method="get" class="flex items-center justify-center my-4 ms-4">
                  <select name="kategori" id="kategori" class="ml-2 border-2 border-primary text-primary rounded-md shadow-sm">
                    <option value="Terkirim">Terkirim</option>
                    <option id="tambahCatatanBtn" value="Perbaikan">Perlu Perbaikan</option>
                    <option value="Administrasi">Verifikasi Administrasi</option>
                  </select>
                </form>
              </td>

              <!-- Pop-up Modal -->
              <div id="popupModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
                <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                  <h2 class="text-xl font-semibold mb-4">Tambah Catatan Perbaikan</h2>
                  <textarea id="catatanPerbaikan" rows="4" class="w-full p-2 border border-slate-300 rounded-md" placeholder="Masukan catatan perbaikan..."></textarea>
                  <div class="flex justify-end mt-4">
                    <button id="kirimCatatanBtn" class="px-4 py-2 bg-primary text-white rounded-md hover:bg-blue-600 transition">Kirim Catatan</button>
                    <button id="batalBtn" class="ml-2 px-4 py-2 bg-gray-300 text-black rounded-md hover:bg-gray-400 transition">Batal</button>
                  </div>
                </div>
              </div>
            </tr>
          </tbody>
        </table>

      </div>
    </div>
  </div>

  <script>
    const tambahCatatanBtn = document.getElementById('tambahCatatanBtn');
    const popupModal = document.getElementById('popupModal');
    const sidebar = document.getElementById('sidebar');
    const batalBtn = document.getElementById('batalBtn');
    const kategoriSelect = document.getElementById('kategori');

    // Fungsi untuk menampilkan modal dan menyembunyikan sidebar
    function showModal() {
      popupModal.classList.remove('hidden'); // Tampilkan modal
      sidebar.classList.add('hidden'); // Sembunyikan sidebar
    }

    // Fungsi untuk menyembunyikan modal dan menampilkan sidebar
    function hideModal() {
      popupModal.classList.add('hidden'); // Sembunyikan modal
      sidebar.classList.remove('hidden'); // Tampilkan kembali sidebar
    }

    // Event listener untuk tombol tambah catatan
    tambahCatatanBtn.addEventListener('click', showModal);

    // Event listener untuk tombol batal
    batalBtn.addEventListener('click', hideModal);

    // Event listener untuk dropdown kategori
    kategoriSelect.addEventListener('change', function () {
      if (kategoriSelect.value === "Perbaikan") {
        showModal(); // Tampilkan modal jika status diubah ke "Perlu Perbaikan"
      }
    });
  </script>
</body>

</html>
