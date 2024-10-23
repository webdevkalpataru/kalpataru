<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title; ?></title>
</head>

<body>

  <?= $this->extend('template/navbarfooter') ?>

  <?= $this->section('content') ?>

  <div class="flex flex-col lg:flex-row justify-center m-4">
    <?= $this->include('template/sidebarpenerima') ?>

    <!-- Konten utama -->
    <div class="relative flex flex-col w-full lg:max-w-5xl mb-4 gap-4">
      <div class="border-2 border-primary bg-white rounded-xl shadow-md p-4">
        <h4 class="block text-xl font-bold text-slate-800 mb-2">
          Profil
        </h4>
        <div class="flex gap-4">
          <!-- Nama Individu -->
          <div class="w-full">
            <label class="block mb-2 text-sm text-black">Nama Individu</label>
            <input type="text" value="Joko Susilo" readonly class="w-full bg-transparent text-gray-800 bg-gray-200  text-sm  rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
          </div>

          <!-- Email -->
          <div class="w-full">
            <label class="block mb-2 text-sm text-black">Email</label>
            <input type="text" value="jokosusilo@gmail.com" readonly class="w-full bg-transparent text-gray-800 bg-gray-200  text-sm  rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
          </div>
        </div>
      </div>

      <div class="border-2 border-primary bg-white rounded-xl shadow-md p-4">
        <h4 class="block text-xl font-bold text-slate-800 mb-2">
          Artikel
        </h4>
        <!-- Tombol Tambah Artikel-->
        <div class="my-4 flex flex-col md:flex-row justify-between md:items-center gap-4">
          <a href="/penerima/tambahartikel" class="w-full md:w-auto">
            <button id="tambahArtikel" class="w-full md:w-48 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover">
              <span>&#10010</span> Tambah Artikel
            </button>
          </a>
        </div>

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

  </div>

  <!-- Modal -->
  <div id="uploadModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg p-8 flex flex-col items-center max-w-md">
      <img src="/images/sukses.png" alt="Success Icon" class="w-16 h-16 mb-4">
      <h2 class="text-center text-lg font-bold text-primary mb-2">Profil berhasil diperbarui!</h2>
      <a href="./profil">
        <button id="closeModalBtn" class="bg-primary text-white py-2 px-4 rounded-lg"><span class="font-bold text-lg items-center"></span>OK</button>
      </a>
    </div>
  </div>
  </div>

  <div id="toast" class="toast"></div>

  <script>
    // Modal functionality
    const uploadBtn = document.getElementById('uploadBtn');
    const uploadModal = document.getElementById('uploadModal');
    const closeModalBtn = document.getElementById('closeModalBtn');

    uploadBtn.addEventListener('click', () => {
      uploadModal.classList.remove('hidden');
    });

    closeModalBtn.addEventListener('click', () => {
      uploadModal.classList.add('hidden');
    });

    // Submit Form
    document.getElementById('profil-form').addEventListener('submit', function(e) {
      e.preventDefault(); // Mencegah form dari pengiriman default

      // Ambil data dari form
      const formData = new FormData(this);

      fetch(this.action, {
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .catch(error => {
          console.error('Error:', error);
          showToast('Terjadi kesalahan. Silakan coba lagi');
        });
    });

    // Toast
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