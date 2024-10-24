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
        <h1 class="text-xl md:text-2xl font-semibold text-gray-700">Akun Penerima</h1>

        <div class="flex items-center">
          <p class="text-gray-500 mr-2 md:mr-4">Hello, Admin</p>
          <button class="bg-rejected text-white px-3 py-2 md:px-4 md:py-2 rounded-lg">Keluar</button>
        </div>
      </div>
      <div>
        <a href="../admin/daftarakunpengguna">
          <button id="tambahCalon" class="w-48 rounded-md py-2 ml-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button"> <span>&#10010</span> Tambah Akun Penerima</button>
        </a>
        
      </div>

      

      <div class="relative flex flex-col w-full h-full bg-white shadow-md rounded-lg bg-clip-border my-6">
        <table class="w-full text-left table-auto min-w-max mx-auto">
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
                  Akun
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
                  Kategori
                </p>
              </th>
              <th class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                  <p class="flex items-center font-bold justify-center gap-2 text-sm  leading-none text-slate-800">Kata Sandi</p>
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
              <td class="p-4 border-b border-slate-200 text-center">
                <p class="block text-sm text-slate-800 justify-center">01</p>
              </td>
              <td class="p-4 border-b border-slate-200 text-center">
                <p class="block text-sm text-slate-800">Dinas Lingkuhan Hidup Bogor</p>
              </td>
              <td class="p-4 border-b border-slate-200 text-center">
                <p class="block text-sm text-slate-800">example@gmail.com</p>
              </td>
              <td class="p-4 border-b border-slate-200 text-center">
                <p class="block text-sm text-slate-800">Jawa Barat</p>
              </td>
              
              <td class="p-4 border-b border-slate-200 text-center">
                <div>
                  <button id="uploadBtn" class="mt-4 w-3/2 rounded-md py-2 px-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="submit">Selengkapnya</button>
                </div>
              </td>
              <td class="p-4 border-b border-slate-200 text-center">
                <p>Perintis Lingkungan</p>
              </td>
              <td class="p-4 border-b border-slate-200 text-center">
                  <button id="sandi" class="mt-4 w-3/2 rounded-md py-2 px-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-rejected hover:bg-rejected active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">Lupa Sandi</button>
                </td>
              <td class="p-4 border-b border-slate-200 text-center">
                <button>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                  </svg>
                </button>
              </td>
            </tr>

          </tbody>
        </table>
        <div class="row flex lg:justify-end justify-center my-6 lg:mr-4">
          <button class="rounded-md rounded-r-none rounded-l-none border border-r-0 border-slate-300 py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-primary hover:border-primary focus:text-white focus:bg-primary focus:border-primary active:border-primary active:text-white active:bg-primary disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
              <path fill-rule="evenodd" d="M11.03 3.97a.75.75 0 0 1 0 1.06l-6.22 6.22H21a.75.75 0 0 1 0 1.5H4.81l6.22 6.22a.75.75 0 1 1-1.06 1.06l-7.5-7.5a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
            </svg>
          </button>
        </div>
        <div id="modalLupaSandi" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
      <h2 class="text-xl font-semibold mb-4">Reset Kata Sandi</h2>
      <form>
        <label for="newPassword" class="block text-sm font-medium text-gray-700">Kata Sandi Baru</label>
        <input id="newPassword" type="password" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary" placeholder="Masukkan kata sandi baru">
        
        <div class="mt-6 flex justify-end">
          <button type="button" id="cancelButton" class="bg-rejected text-white px-4 py-2 rounded-lg mr-2">Batal</button>
          <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  <!-- JavaScript for Modal -->
  <script>
    const lupaSandiButton = document.getElementById('sandi');
    const modal = document.getElementById('modalLupaSandi');
    const cancelButton = document.getElementById('cancelButton');
    const sidebar = document.getElementById('sidebar');

    // Ketika tombol "Lupa Sandi" diklik
    lupaSandiButton.addEventListener('click', () => {
      modal.classList.remove('hidden'); // Tampilkan modal
      sidebar.classList.add('hidden'); // Sembunyikan sidebar
    });

    // Ketika tombol "Batal" diklik
    cancelButton.addEventListener('click', () => {
      modal.classList.add('hidden'); // Sembunyikan modal
      sidebar.classList.remove('hidden'); // Tampilkan sidebar lagi
    });
  </script>
      </div>
    </div>
  </div>
</body>

</html>
