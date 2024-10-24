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

      <div class="container mx-auto flex items-center justify-between p-4 md:p-6">
        <h1 class="text-xl md:text-2xl font-semibold text-gray-700">Data Calon</h1>
        <div class="flex items-center">
          <p class="text-gray-500 mr-2 md:mr-4">Hello, Admin</p>
          <button class="bg-rejected text-white px-3 py-2 md:px-4 md:py-2 rounded-lg">Keluar</button>
        </div>
      </div>

      <div class="relative flex flex-col w-full h-full bg-white shadow-md rounded-lg bg-clip-border my-6">
        <div class="flex justify-end items-center">
          <form id="filterForm1" action="" method="get" class="flex items-center my-4 ms-4">
            <label for="kategori" class="text-sm font-bold text-primary">Filter Kategori:</label>
            <select name="kategori" id="kategori" class="ml-2 border-2 border-primary text-primary rounded-md shadow-sm">
              <option value="">Semua Kategori</option>
              <option value="Perintis Lingkungan">Perintis Lingkungan</option>
              <option value="Pengabdi Lingkungan">Pengabdi Lingkungan</option>
              <option value="Penyelamat Lingkungan">Penyelamat Lingkungan</option>
              <option value="Pembina Lingkungan">Pembina Lingkungan</option>
            </select>
          </form>
        </div>

        <table class="w-full text-center table-auto min-w-max mt-4">
          <thead>
            <tr>
              <th class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">No</th>
              <th class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">Nama</th>
              <th class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">Kategori</th>
              <th class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">Provinsi</th>
              <th class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">Detail</th>
              <th class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr class="hover:bg-slate-50">
              <td class="p-4 border-b border-slate-200">01</td>
              <td class="p-4 border-b border-slate-200">Sumanto</td>
              <td class="p-4 border-b border-slate-200">Pengabdi Lingkungan</td>
              <td class="p-4 border-b border-slate-200">Jawa Barat</td>
              <td class="p-4 border-b border-slate-200">
                <button id="uploadBtn" class="mt-4 w-full rounded-md py-2 mb-2 px-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover">Selengkapnya</button>
              </td>
              <td class="p-4 text-center border-b border-slate-200">
                <form id="filterForm2" action="" method="post" class="flex items-center justify-center">
                  <select name="status" id="statusSelect" class="ml-2 border-2 border-primary text-primary rounded-md shadow-sm">
                    <option value="Terkirim">Terkirim</option>
                    <option id="tambahCatatanBtn" value="Perbaikan">Perlu Perbaikan</option>
                    <option value="Administrasi">Verifikasi Administrasi</option>
                  </select>
                </form>
              </td>
            </tr>
          </tbody>
        </table>

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

      </div>
    </div>
  </div>

  <script>
    const tambahCatatanBtn = document.getElementById('tambahCatatanBtn');
    const popupModal = document.getElementById('popupModal');
    const batalBtn = document.getElementById('batalBtn');
    const statusSelect = document.getElementById('statusSelect');
    const sidebar = document.getElementById('sidebar');

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

    // Event listener untuk dropdown status
    statusSelect.addEventListener('change', function () {
      if (statusSelect.value === "Perbaikan") {
        showModal(); // Tampilkan modal jika status diubah ke "Perlu Perbaikan"
      }
    });

    // Event listener untuk tombol batal
    batalBtn.addEventListener('click', hideModal);
  </script>
</body>

</html>
