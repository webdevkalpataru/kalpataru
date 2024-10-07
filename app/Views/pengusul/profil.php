<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/app.css">
  <title><?= $title; ?></title>
  <style>
    .toast {
      position: fixed;
      top: 10px;
      right: 10px;
      background-color: #800000;
      color: white;
      padding: 10px;
      border-radius: 5px;
      display: none;
    }

    .show-toast {
      display: block;
    }

    /* Show/hide password */
    .password-icon {
      cursor: pointer;
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      font-weight: bold;
      font-size: 1.2rem;
    }


    /* Responsive style */
    @media (max-width: 640px) {
      .max-w-md {
        max-width: 90%;
      }
    }

    .toasthidden {
      display: none;
    }
  </style>
</head>

<body>

  <?= $this->extend('template/navbarfooter') ?>

  <?= $this->section('content') ?>

  <div class="flex flex-col lg:flex-row justify-end m-4">
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

      <form class="mt-4 mb-2 w-full" action="/pengusul/profil" method="post" id="profil-form" onsubmit="validateForm(event)">
        <div class="grid grid-cols-2 gap-4">

          <!-- Kolom kiri -->
          <div class="space-y-4">
            <div>
              <label class="block mb-2 text-sm text-black">Jenis Instansi</label>
              <input type="text" name="jenis_instansi" readonly value="<?= session()->get('jenis_instansi'); ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Nama Instansi / Pribadi</label>
              <input type="text" name="nama" readonly value="<?= session()->get('nama'); ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Provinsi</label>
              <input type="text" name="provinsi" readonly value="<?= session()->get('provinsi'); ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Nomor Telepon</label>
              <input type="text" name="telepon" value="<?= session()->get('telepon'); ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Email</label>
              <input type="email" name="email" value="<?= session()->get('email'); ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Jabatan/Pekerjaan</label>
              <input type="text" name="jabatan_pekerjaan" value="<?= session()->get('jabatan_pekerjaan'); ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div class="w-full">
              <label class="block mb-2 text-sm text-black">Jenis Kelamin</label>
              <div class="lg:flex gap-6">
                <div class="flex items-center py-2">
                  <input name="jenis_kelamin" type="radio" value="Perempuan" class="peer h-5 w-5 cursor-pointer appearance-none rounded-full border border-primary checked:bg-primary transition-all" id="perempuan" <?= (session()->get('jenis_kelamin') == 'Perempuan') ? 'checked' : ''; ?>>
                  <label class="ml-2 text-black cursor-pointer text-sm" for="perempuan">Perempuan</label>
                </div>
                <div class="flex items-center py-2">
                  <input name="jenis_kelamin" type="radio" value="Laki-Laki" class="peer h-5 w-5 cursor-pointer appearance-none rounded-full border border-primary checked:bg-primary transition-all" id="laki-laki" <?= (session()->get('jenis_kelamin') == 'Laki-Laki') ? 'checked' : ''; ?>>
                  <label class="ml-2 text-black cursor-pointer text-sm" for="laki-laki">Laki-Laki</label>
                </div>
              </div>
            </div>
          </div>

          <!-- Kolom kanan -->
          <div class="space-y-4">
            <div>
              <label class="block mb-2 text-sm text-black">Jalan</label>
              <input type="text" name="jalan" value="<?= session()->get('jalan'); ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">RT/RW</label>
              <input type="text" name="rt_rw" value="<?= session()->get('rt_rw'); ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Desa/Kelurahan</label>
              <input type="text" name="desa" value="<?= session()->get('desa'); ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Kecamatan</label>
              <input type="text" name="kecamatan" value="<?= session()->get('kecamatan'); ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Kab/Kota</label>
              <input type="text" name="kab_kota" value="<?= session()->get('kab_kota'); ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Kode Pos</label>
              <input type="text" name="kode_pos" value="<?= session()->get('kode_pos'); ?>" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
            </div>
            <?php if (session()->get('role_akun') === 'DLHK'): ?>
              <div>
                <?php
                // Ambil path surat pengantar dari session
                $suratPengantar = session()->get('surat_pengantar');
                // Gunakan basename untuk mendapatkan hanya nama file
                $namaFile = basename($suratPengantar);
                ?>
                <label class="block mb-2 text-sm text-black">Surat Pengantar : <?= $namaFile; ?></label>
                <input id="suratpengantar" name="surat_pengantar" type="file" accept="application/pdf"
                  class="w-full border-2 border-gray-300 text-primary text-xs rounded-lg p-2 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none">
              </div>
            <?php endif; ?>

          </div>
        </div>

        <div class="flex justify-end">
          <button class="mt-4 w-32 rounded-md py-2 px-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="submit">Simpan</button>
        </div>
      </form>
    </div>


  </div>
  <div id="toast" class="toast"></div>

  <script>
    document.getElementById('profil-form').addEventListener('submit', function(e) {
      e.preventDefault(); // Mencegah form dari pengiriman default

      // Ambil data dari form
      const formData = new FormData(this);

      fetch(this.action, {
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            showToast(data.message);

            setTimeout(() => {
              location.reload();
            }, 2000);
          } else {
            showToast(data.message);
          }
        })
        .catch(error => {
          console.error('Error:', error);
          showToast('Terjadi kesalahan. Silakan coba lagi');
        });
    });

    function showToast(message) {
      const toast = document.getElementById('toast');
      toast.textContent = message;
      toast.classList.remove('hidden');
      toast.classList.add('show-toast');

      setTimeout(() => {
        toast.classList.remove('show-toast');
        toast.classList.add('hidden');
      }, 3000);
    }
  </script>



  <?= $this->endSection() ?>
</body>

</html>