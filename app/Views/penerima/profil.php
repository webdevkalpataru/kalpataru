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

  <div class="flex flex-col lg:flex-row justify-center m-4">
    <?= $this->include('template/sidebarpenerima') ?>

    <div class="relative flex flex-col w-full max-w-4xl mb-4 rounded-xl border-2 border-primary bg-white shadow-md lg:p-8 p-4">
      <h4 class="block text-xl font-bold text-slate-800 mb-2">
        Profil
      </h4>
      <div class="flex bg-yellow-400 items-center justify-center rounded-md px-2">
      </div>

      <form class="mt-4 mb-2 w-full">
        <div class="grid grid-cols-2 gap-4">

          <!-- Kolom kiri -->
          <div class="space-y-4">
            <div>
              <label class="block mb-2 text-sm text-black">Nama Individu</label>
              <input type="text" value="Joko Susilo" readonly class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">NIK</label>
              <input type="text" value="3124577990898" readonly class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Tempat Lahir</label>
              <input type="text" value="Jakarta" readonly class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Tanggal Lahir</label>
              <input type="text" value="01-12-2000" readonly class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Usia</label>
              <input type="text" value="20" readonly class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div class="w-full">
              <label class="block mb-2 text-sm text-black">Jenis Kelamin</label>
              <div class="lg:flex gap-6">
                <div class="flex items-center py-2">
                  <input name="jenis_kelamin" type="radio" checked readonly class="peer h-5 w-5 cursor-pointer appearance-none rounded-full border border-primary checked:bg-primary transition-all" id="laki-laki">
                  <label class="ml-2 text-black cursor-pointer text-sm" for="laki-laki">Perempuan</label>
                </div>
                <div class="flex items-center py-2">
                  <input name="jenis_kelamin" type="radio" checked readonly class="peer h-5 w-5 cursor-pointer appearance-none rounded-full border border-primary checked:bg-primary transition-all" id="laki-laki">
                  <label class="ml-2 text-black cursor-pointer text-sm" for="laki-laki">Laki-Laki</label>
                </div>
              </div>
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Pekerjaan</label>
              <input type="text" value="Staff Administrasi" readonly class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">No Hp</label>
              <input type="text" value="08123456789" readonly class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Email</label>
              <input type="text" value="jokosusilo@gmail.com" readonly class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>

          </div>

          <!-- Kolom kanan -->
          <div class="space-y-4">
            <div>
              <label class="block mb-2 text-sm text-black">Jalan</label>
              <input type="text" value="Anggrek Raya" readonly class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">RT/RW</label>
              <input type="text" value="001/002" readonly class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Desa/Kelurahan</label>
              <input type="text" value="Karang Tengah" readonly class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Kecamatan</label>
              <input type="text" value="Setiabudi" readonly class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Kab/Kota</label>
              <input type="text" value="Bogor" readonly class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Provinsi</label>
              <input type="text" value="Jawa Barat" readonly class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Kode Pos</label>
              <input type="text" value="12345" readonly class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Pendidikan Terakhir</label>
              <input type="text" value="S1" readonly class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Media Sosial</label>
              <input type="text" value="@jksusilo" readonly class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>

          </div>
        </div>
      </form>
    </div>


  </div>

  <?= $this->endSection() ?>
</body>

</html>