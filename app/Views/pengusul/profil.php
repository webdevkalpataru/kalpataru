<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/app.css">
  <title><?= $title; ?></title>
</head>

<body>

  <?= $this->extend('template/navbarfooter') ?>

  <?= $this->section('content') ?>

  <div class="flex flex-col lg:flex-row justify-end gap-16 m-4">
    <?= $this->include('template/sidebar') ?>

    <!-- Konten utama -->
    <div class="relative flex flex-col w-full max-w-2xl mx-auto mb-4 rounded-xl border-2 border-primary bg-white shadow-md lg:p-8 p-4">
      <h4 class="block text-xl font-bold text-slate-800 mb-2">
        Profil
      </h4>
      <div class="flex bg-yellow-400 items-center justify-center rounded-md px-2">
        <svg class="lg:ml-0 ml-2 w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
        </svg>
        <h3 class="block text-sm font-semibold p-2 text-black">
          Data pengusul wajib dilengkapi agar dapat mengajukan usulan, silahkan lengkapi data diri Anda!
        </h3>
      </div>

      <form class="mt-4 mb-2 w-full">
        <div class="grid grid-cols-2 gap-4">

          <!-- Kolom kiri -->
          <div class="space-y-4">
            <div>
              <label class="block mb-2 text-sm text-black">Jenis Instansi</label>
              <input type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Nama Instansi / Pribadi</label>
              <input type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Provinsi</label>
              <input type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Nomor Telepon</label>
              <input type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Email</label>
              <input type="email" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Jabatan/Pekerjaan</label>
              <input type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div class="w-full">
              <label class="block mb-2 text-sm text-black">Jenis Kelamin</label>
              <div class="lg:flex gap-6">
                <div class="flex items-center py-2 ">
                  <input name="jenis_kelamin" type="radio" class="peer h-5 w-5 cursor-pointer appearance-none rounded-full border border-primary checked:bg-primary transition-all" id="perempuan">
                  <label class="ml-2 text-black cursor-pointer text-sm" for="perempuan">Perempuan</label>
                </div>
                <div class="flex items-center py-2 ">
                  <input name="jenis_kelamin" type="radio" class="peer h-5 w-5 cursor-pointer appearance-none rounded-full border border-primary checked:bg-primary transition-all" id="laki-laki">
                  <label class="ml-2 text-black cursor-pointer text-sm" for="laki-laki">Laki-Laki</label>
                </div>
              </div>
            </div>
          </div>

          <!-- Kolom kanan -->
          <div class="space-y-4">
            <div>
              <label class="block mb-2 text-sm text-black">Jalan</label>
              <input type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">RT/RW</label>
              <input type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Desa/Kelurahan</label>
              <input type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Kecamatan</label>
              <input type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Kab/Kota</label>
              <input type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Kode Pos</label>
              <input type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Surat Pengantar</label>
              <input id="suratpengantar" type="file" accept="application/pdf"
                class="w-full border-2 border-gray-300 text-primary text-xs rounded-lg p-2 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none">
            </div>
          </div>
        </div>

        <div class="flex justify-end">
          <button class="mt-4 w-32 rounded-md py-2 px-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">Simpan</button>
        </div>
      </form>
    </div>


  </div>

  <?= $this->endSection() ?>
</body>

</html>