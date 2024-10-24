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
          <h1 class="text-xl md:text-2xl font-semibold text-gray-700">Tambah Berita</h1>
          <div class="flex items-center">
            <p class="text-gray-500 mr-2 md:mr-4">Hello, <?= session()->get('nama'); ?></p>
            <a href="/auth/logoutinternal" class="bg-rejected text-white px-3 py-2 md:px-4 md:py-2 rounded-lg inline-block">Keluar</a>
          </div>
        </div>
      </header>

      <!-- Main Content -->
      <div>
        <!-- Cards Summary -->
        <form id="isiArtikelForm" class="mt-4 mb-2 w-full" action="/admin/tambah-berita" method="POST" enctype="multipart/form-data">
          <div class="grid grid-cols-1 gap-4" id="formContainer">
            <div>
              <label class="block mb-2 text-sm text-black">Judul Berita</label>
              <input required id="judul" type="text" name="judul" class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2">
              <div class="text-red-500" id="judulError"></div> <!-- Menampilkan pesan kesalahan judul -->
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Isi Berita</label>
              <textarea required id="konten" name="konten" class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2" rows="4"></textarea>
              <div class="text-red-500" id="kontenError"></div> <!-- Menampilkan pesan kesalahan konten -->
            </div>
            <div>
              <label class="block mb-2 text-sm text-black">Unggah Foto Berita <span class="text-primary">(.jpg/jpeg/png)</span></label>
              <input required id="foto" name="foto" type="file" accept="image/*" class="w-full border-2 border-slate-200 text-primary text-xs rounded-lg p-2">
              <div class="text-red-500" id="fotoError"></div> <!-- Menampilkan pesan kesalahan foto -->
            </div>
          </div>
          <div class="flex justify-between mt-4">
            <a href="/admin/berita"
              class="text-sm font-bold text-gray-600 no-underline focus:outline-none text-start">
              <span class="font-bold text-lg items-center">←</span> Kembali
            </a>
            <button type="submit" class="w-40 rounded-md py-2 text-center text-sm text-white bg-primary hover:bg-primaryhover">Unggah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div id="successModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg p-8 flex flex-col items-center max-w-md">
      <img src="/images/sukses.png" alt="Success Icon" class="w-16 h-16 mb-4">
      <h2 class="text-center text-lg font-bold text-primary mb-2">Berita berhasil dibuat!</h2>
      <p class="text-center text-sm text-slate-600 mb-4">Status berita Anda masih ditangguhkan, silahkan ubah status ke Terbit agar berita bisa muncul di website.</p>
      <button id="successBtn" class="bg-primary text-white py-2 px-4 rounded-lg">Lihat Status</button>
    </div>
  </div>

  <script>
    // Batasan Kata
    function updateWordCount(textarea, countId, maxWords) {
      const countElement = document.getElementById(countId);
      const words = textarea.value.trim().split(/\s+/).filter(word => word.length > 0);
      const currentLength = words.length;

      countElement.textContent = `${currentLength}/${maxWords} kata`;

      if (currentLength > maxWords) {
        countElement.classList.add('text-rejected');
      } else {
        countElement.classList.remove('text-rejected');
      }
    }

    // Modal functionality
    const successModal = document.getElementById('successModal');
    const successBtn = document.getElementById('successBtn');

    // Fungsi validasi form
    function validateForm(event) {
      event.preventDefault();

      // Mengambil elemen form dan membuat FormData
      const form = document.getElementById('isiArtikelForm');
      const formData = new FormData(form);

      // Membersihkan error sebelumnya
      document.getElementById('judulError').textContent = '';
      document.getElementById('kontenError').textContent = '';
      document.getElementById('fotoError').textContent = '';

      // Mengirim request POST menggunakan Fetch API
      fetch(form.action, {
          method: form.method,
          body: formData,
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            // Jika berhasil, tampilkan modal sukses
            const successModal = document.getElementById('successModal');
            successModal.classList.remove('hidden');

            // Arahkan ke halaman berita admin ketika tombol "Oke" diklik
            document.getElementById('successBtn').addEventListener('click', function() {
              window.location.href = '/admin/berita'; // Ganti dengan URL yang sesuai
            });
          } else {
            // Jika gagal, tampilkan pesan error dari controller
            if (data.messages.judul) {
              document.getElementById('judulError').textContent = data.messages.judul;
            }
            if (data.messages.konten) {
              document.getElementById('kontenError').textContent = data.messages.konten;
            }
            if (data.messages.foto) {
              document.getElementById('fotoError').textContent = data.messages.foto;
            }
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert('Terjadi kesalahan. Silakan coba lagi.');
        });
    }

    // Attach event listener ke form submit
    document.getElementById('isiArtikelForm').addEventListener('submit', validateForm);

    successBtn.addEventListener('click', () => {
      successModal.classList.add('hidden');
    });
  </script>
</body>

</html>