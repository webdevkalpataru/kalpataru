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

      <!-- Header -->
      <header class="bg-white shadow">
        <div class="container mx-auto flex items-center justify-between p-4 md:p-6">
          <h1 class="text-xl md:text-2xl font-semibold text-gray-700">Detail Artikel</h1>
          <div class="flex items-center">
            <p class="text-gray-500 mr-2 md:mr-4">Hello, <?= session()->get('nama'); ?></p>
            <a href="/auth/logoutinternal" class="bg-rejected text-white px-3 py-2 md:px-4 md:py-2 rounded-lg inline-block">Keluar</a>
          </div>
        </div>
      </header>

      <!-- Tabel Detail -->
      <div class="relative flex flex-col w-full h-full bg-white shadow-md rounded-lg bg-clip-border my-6">
        <div class="flex justify-center">
          <table class="w-full text-left table-auto min-w-max">
            <thead>
              <tr>
                <th class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                  <p class="flex items-center justify-center gap-2 text-sm font-bold leading-none text-slate-800">Judul Pamflet</p>
                </th>
                <th class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                  <p class="flex items-center justify-center gap-2 text-sm font-bold leading-none text-slate-800">Tanggal</p>
                </th>
                <th class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                  <p class="flex items-center justify-center gap-2 text-sm font-bold leading-none text-slate-800">Upload Pamflet</p>
                </th>
                <th class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                  <p class="flex items-center justify-center gap-2 text-sm font-bold leading-none text-slate-800">Status</p>
                </th>
              </tr>
            </thead>
            <tbody>
              <!-- Example row -->
              <tr class="hover:bg-slate-50">
                <td class="p-4 border-b border-slate-200 text-center">
                  <p class="block text-sm text-slate-800">Pamflet Pendaftaran Kalpataru 2024</p>
                </td>
                <td class="p-4 border-b border-slate-200 text-center">
                  <p class="block text-sm text-slate-800">2024-10-22</p>
                </td>
                <td class="p-4 border-b border-slate-200 text-center">
                  <input id="surat_pengantar" type="file" accept="application/pdf" name="surat_pengantar"
                    class="border-2 border-gray-300 text-primary text-xs rounded-lg p-2 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none">
                </td>
                <td class="p-4 text-center border-b border-slate-200">
                  <form id="filterForm2" action="" method="post" class="flex items-center justify-center">
                    <select name="status" id="statusSelect" class="ml-2 border-2 border-primary text-primary rounded-md shadow-sm">
                      <option value="Terkirim">Terbit</option>
                      <option value="Administrasi">Ditangguhkan</option>
                    </select>
                  </form>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- Tombol Kembali -->
      <button onclick="window.history.back()" class="text-sm font-bold text-gray-600 no-underline focus:outline-none text-start mb-4">
        <span class="font-bold text-lg items-center">←</span> Kembali
      </button>
    </div>
  </div>
</body>

</html>