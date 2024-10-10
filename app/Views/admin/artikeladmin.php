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
  <?= $this->include('template/sidebaradmin') ?>

  <!-- Main Content -->
  <div class="lg:flex-1 p-6">
    <div class="min-h-screen flex flex-col">

      <!-- Header -->
      <header class="bg-white shadow">
        <div class="container mx-auto flex items-center justify-between p-4 md:p-6">
          <h1 class="text-xl md:text-2xl font-semibold text-gray-700">Dashboard</h1>
          <div class="flex items-center">
            <p class="text-gray-500 mr-2 md:mr-4">Hello, Admin</p>
            <button class="bg-rejected text-white px-3 py-2 md:px-4 md:py-2 rounded-lg">Keluar</button>
          </div>
        </div>
      </header>

      <!-- Main Content -->
      <div class="flex-1 p-4 md:p-6 container mx-auto">
        <!-- Cards Summary -->
        <div class="grid gap-4 mb-8 sm:grid-cols-2 lg:grid-cols-4">
            <form id="isiArtikelForm" class="mt-4 mb-2 w-full">
                <div class="grid grid-cols-1 gap-4" id="formContainer">
                    <div>
                        <label class="block mb-2 text-sm text-black">Judul Artikel</label>
                        <input type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                    </div>
                    <div>
                        <label class="block mb-2 text-sm text-black">Isi Artikel</label>
                        <textarea id="artikel" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" rows="4"
                            oninput="updateWordCount(this, 'artikelCount', 1000)"></textarea>
                        <p id="artikelCount" class="text-xs text-slate-400 flex justify-end">0/1000 Kata</p>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm text-black">Unggah Foto Artikel <span class="text-primary">(.jpg/jpeg)</span></label>
                        <input id="fotoArtikel" type="file" accept="application/jpg,application/jpeg"
                            class="w-full border-2 border-slate-200 text-primary text-xs rounded-lg p-2 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none">
                    </div>
                </div>

                <div class="flex justify-end mt-4">
                    <button id="uploadBtn" class="w-40 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none" type="button">Unggah</button>
                </div>
            </form>
          

      </div>
    </div>
  </div>

</body>

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
    </script>

</html>
