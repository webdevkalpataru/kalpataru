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

  <!-- Main Content -->
  <div class="lg:flex-1 p-6">
    <div class="min-h-screen flex flex-col">

      <!-- Header -->
      <header class="bg-white shadow">
        <div class="container mx-auto flex items-center justify-between p-4 md:p-6">
          <h1 class="text-xl md:text-2xl font-semibold text-gray-700">Tambah Buku</h1>
          <div class="flex items-center">
            <p class="text-gray-500 mr-2 md:mr-4">Hello, Admin</p>
            <button class="bg-rejected text-white px-3 py-2 md:px-4 md:py-2 rounded-lg">Keluar</button>
          </div>
        </div>
      </header>

      <!-- Main Content -->
      <div>
        <!-- Cards Summary -->
        <form id="isiArtikelForm" class="mt-4 mb-2 w-full">
                <div class="grid grid-cols-1 gap-4" id="formContainer">
                    <div>
                        <label class="block mb-2 text-sm text-black">Judul Buku</label>
                        <input type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                    </div>
                    <div>
                        <label class="block mb-2 text-sm text-black">Unggah Cover Buku <span class="text-primary">(.jpg/jpeg)</span></label>
                        <input id="coverbuku" type="file" accept="application/jpg,application/jpeg"
                            class="w-full border-2 border-slate-200 text-primary text-xs rounded-lg p-2 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm text-black">Unggah File Buku <span class="text-primary">(.pdf)</span></label>
                        <input id="filebuku" type="file" accept="application/jpg,application/jpeg"
                            class="w-full border-2 border-slate-200 text-primary text-xs rounded-lg p-2 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none">
                    </div>
                </div>

                <div class="flex  mt-4">
                    <button id="uploadBtn" class="w-40 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none" type="button">Unggah</button>
                </div>
            </form>
  </div>

</body>

</html>
