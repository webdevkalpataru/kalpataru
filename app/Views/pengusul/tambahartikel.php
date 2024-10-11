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
        <?= $this->include('template/sidebarpengusul') ?>

        <!-- Konten utama -->
        <div class="relative flex flex-col w-full max-w-4xl mb-4 rounded-xl border-2 border-primary bg-white shadow-md lg:p-8 p-4">
            <h4 class="block text-xl font-bold text-slate-800 mb-2">
                Tambah Artikel
            </h4>
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

    <!-- Modal -->
    <div id="uploadModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg p-8 flex flex-col items-center max-w-md">
            <img src="/images/sukses.png" alt="Success Icon" class="w-16 h-16 mb-4">
            <h2 class="text-center text-lg font-bold text-primary mb-2">Terima kasih telah mengunggah artikel!</h2>
            <p class="text-center text-sm text-slate-600 mb-4">Artikel anda sedang dalam proses validasi. Anda dapat mengecek status artikel anda pada menu “Artikel Saya”.</p>
            <a href="./artikelsaya">
                <button id="closeModalBtn" class="bg-primary text-white py-2 px-4 rounded-lg">Lihat Status</button>
            </a>
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
        const uploadBtn = document.getElementById('uploadBtn');
        const uploadModal = document.getElementById('uploadModal');
        const closeModalBtn = document.getElementById('closeModalBtn');

        uploadBtn.addEventListener('click', () => {
            uploadModal.classList.remove('hidden');
        });

        closeModalBtn.addEventListener('click', () => {
            uploadModal.classList.add('hidden');
        });
    </script>

    <?= $this->endSection() ?>
</body>

</html>
