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
        <h1 class="text-xl md:text-2xl font-semibold text-gray-700">Akun DLHK</h1>
        <div class="flex items-center">
          <p class="text-gray-500 mr-2 md:mr-4">Hello, Admin</p>
          <button class="bg-rejected text-white px-3 py-2 md:px-4 md:py-2 rounded-lg">Keluar</button>
        </div>
      </div>
      <div>
        <a href="../admin/daftarakundlhk">
          <button id="tambahCalon" class="w-48 rounded-md py-2 ml-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
            <span>&#10010</span> Tambah Akun DLHK
          </button>
        </a>
      </div>

      <div class="relative flex flex-col w-full h-full bg-white shadow-md rounded-lg bg-clip-border my-6">
        <table class="w-full text-left table-auto min-w-max">
          <thead>
            <tr>
              <th class="p-4 border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                <p class="text-sm font-bold text-slate-800 text-center">No</p>
              </th>
              <th class="p-4 border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                <p class="text-sm font-bold text-slate-800 text-center">Nama</p>
              </th>
              <th class="p-4 border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                <p class="text-sm font-bold text-slate-800 text-center">Akun</p>
              </th>
              <th class="p-4 border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                <p class="text-sm font-bold text-slate-800 text-center">Provinsi</p>
              </th>
              <th class="p-4 border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                <p class="text-sm font-bold text-slate-800 text-center">Detail</p>
              </th>
              <th class="p-4 border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                <p class="text-sm font-bold text-slate-800 text-center">Status</p>
              </th>
              <th class="p-4 border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                <p class="text-sm font-bold text-slate-800 text-center">Kata Sandi</p>
              </th>
              <th class="p-4 border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                <p class="text-sm font-bold text-slate-800 text-center">Hapus</p>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr class="hover:bg-slate-50">
              <td class="p-4 border-b text-sm border-slate-200 text-center">01</td>
              <td class="p-4 border-b text-sm border-slate-200 text-center">Dinas Lingkungan Hidup Bogor</td>
              <td class="p-4 border-b text-sm border-slate-200 text-center">example@gmail.com</td>
              <td class="p-4 border-b text-sm border-slate-200 text-center">Jawa Barat</td>
              <td class="p-4 border-b text-sm border-slate-200 text-center">
                <button class="mt-4 w-full rounded-md py-2 px-2 text-center text-sm text-white bg-primary hover:bg-primaryhover shadow-md">Selengkapnya</button>
              </td>
              <td class="p-4 border-b text-sm border-slate-200 text-center">
                <button class="toggleBtn mt-4 w-full rounded-md py-2 px-2 text-center text-sm text-white bg-footer shadow-md" data-active="Aktif" data-inactive="Aktifkan">Aktifkan</button>
              </td>
              <td class="p-4 border-b text-sm border-slate-200 text-center">
                <button id="sandi" class="mt-4 w-full rounded-md py-2 px-2 text-center text-sm text-white bg-rejected hover:bg-rejected">Lupa Sandi</button>
              </td>
              <td class="p-4 border-b text-sm border-slate-200 text-center">
                <button>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="size-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal Lupa Sandi -->
  <div id="modalLupaSandi" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
      <h2 class="text-xl font-semibold mb-4">Reset Kata Sandi</h2>
      <form>
        <label for="newPassword" class="block text-sm font-medium text-gray-700">Kata Sandi Baru</label>
        <input id="newPassword" type="password" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm" placeholder="Masukkan kata sandi baru">
        
        <div class="mt-6 flex justify-end">
          <button type="button" id="cancelButton" class="bg-rejected text-white px-4 py-2 rounded-lg mr-2">Batal</button>
          <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  <!-- JavaScript untuk modal dan sidebar -->
  <script>
    const lupaSandiButton = document.getElementById('sandi');
    const modal = document.getElementById('modalLupaSandi');
    const cancelButton = document.getElementById('cancelButton');
    const sidebar = document.getElementById('sidebar');

    // Tampilkan modal dan sembunyikan sidebar saat "Lupa Sandi" diklik
    lupaSandiButton.addEventListener('click', () => {
      modal.classList.remove('hidden');
      sidebar.classList.add('hidden');
    });

    // Sembunyikan modal dan tampilkan sidebar saat "Batal" diklik
    cancelButton.addEventListener('click', () => {
      modal.classList.add('hidden');
      sidebar.classList.remove('hidden');
    });
  </script>
</body>

</html>
