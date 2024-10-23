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

    <div class="lg:flex-1 p-6">
        <div class="min-h-screen flex flex-col">

            <header class="bg-white shadow">
                <div class="container mx-auto flex items-center justify-between p-4 md:p-6">
                    <h1 class="text-xl md:text-2xl font-semibold text-gray-700">Buku Kalpataru</h1>
                    <div class="flex items-center">
                        <p class="text-gray-500 mr-2 md:mr-4">Hello, <?= session()->get('nama'); ?></p>
                        <a href="/auth/logoutinternal" class="bg-rejected text-white px-3 py-2 md:px-4 md:py-2 rounded-lg inline-block">Keluar</a>
                    </div>
                </div>
            </header>
            <a href="/admin/tambah-buku">
                <div>
                    <button id="tambahBuku" class="mt-4 w-48 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button"> <span>&#10010</span> Tambah Buku</button>
                </div>
            </a>
            <h4 class="text-xs:lg:text-md ml-4 lg:ml-0 font-semibold">
                Hasil: <?= esc($countTerbit) ?> Buku
            </h4>

            <div class="relative  flex flex-col w-full h-full overflow-scroll bg-white shadow-md rounded-lg bg-clip-border my-6">
                <table class="w-full text-left table-auto min-w-max">
                    <thead>
                        <tr>
                            <th class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                                <p class="flex items-center justify-between gap-2 text-sm font-bold leading-none text-slate-800">No</p>
                            </th>
                            <th class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                                <p class="flex items-center justify-between gap-2 text-sm font-bold leading-none text-slate-800">Cover</p>
                            </th>
                            <th class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                                <p class="flex items-center justify-between gap-2 text-sm font-bold leading-none text-slate-800">Judul</p>
                            </th>
                            <th class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                                <p class="flex items-center justify-between gap-2 text-sm font-bold leading-none text-slate-800">Tanggal</p>
                            </th>
                            <th class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                                <p class="flex items-center justify-between gap-2 text-sm font-bold leading-none text-slate-800">Status</p>
                            </th>
                            <th class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                                <p class="flex items-center ml-8 gap-2 text-sm font-bold leading-none text-slate-800">Detail</p>
                            </th>
                            <th class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                                <p class="flex items-left justify-left gap-2 text-sm font-bold leading-none text-slate-800">Hapus</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($buku) > 0): ?>
                            <?php
                            $no = 0;
                            foreach ($buku as $index => $b):
                                $no++;
                            ?>
                                <tr class="hover:bg-slate-50">
                                    <td class="p-4 border-b border-slate-200">
                                        <p class="block text-sm text-slate-800"><?= $no ?></p>
                                    </td>
                                    <td class="p-4 border-b border-slate-200">
                                        <img src="/public/<?= esc($b['cover']); ?>" alt="<?= esc($b['judul']) ?>" class="h-16 w-16 object-cover rounded-md">
                                    </td>
                                    <td class="p-4 border-b border-slate-200">
                                        <p class="block text-sm text-slate-800"><?= esc($b['judul']) ?></p>
                                    </td>
                                    <td class="p-4 border-b border-slate-200">
                                        <p class="block text-sm text-slate-800"><?= esc($b['tanggal']) ?></p>
                                    </td>
                                    <td class="p-4 border-b border-slate-200 text-center">
                                        <form method="POST" action="/admin/updatestatusbuku">
                                            <input type="hidden" name="id_buku" value="<?= $b['id_buku'] ?>">
                                            <select name="status" class="status-dropdown ml-2 border-2 border-primary text-primary rounded-md shadow-sm text-xs" data-id="<?= $b['id_buku'] ?>">
                                                <?php
                                                $statuses = ['Ditangguhkan', 'Terbit'];
                                                foreach ($statuses as $status) {
                                                    $selected = ($status == $b['status']) ? 'selected' : '';
                                                    echo "<option value='$status' $selected>$status</option>";
                                                }
                                                ?>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="p-4 border-b border-slate-200">
                                        <div>
                                            <a href="/admin/buku-kalpataru/<?= $b['id_buku']; ?>" class="mt-4 w-3/2 rounded-md py-2 px-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover">Selengkapnya</a>
                                        </div>
                                    </td>
                                    <td class="p-4 border-b border-slate-200">
                                        <form action="/admin/buku-kalpataru/hapus/<?= $b['id_buku'] ?>" method="POST">
                                            <button type="submit" class="text-red-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="p-4 text-center text-slate-800">Belum ada buku.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <div class="row flex lg:justify-end justify-center my-6 lg:mr-4">
                    <button class="rounded-md rounded-r-none border border-r-0 border-slate-300 py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-primary hover:border-primary focus:text-white focus:bg-primary focus:border-primary active:border-primary active:text-white active:bg-primary disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd" d="M11.03 3.97a.75.75 0 0 1 0 1.06l-6.22 6.22H21a.75.75 0 0 1 0 1.5H4.81l6.22 6.22a.75.75 0 1 1-1.06 1.06l-7.5-7.5a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <button class="rounded-md rounded-r-none rounded-l-none border border-r-0 border-slate-300 py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-primary hover:border-primary focus:text-white focus:bg-primary focus:border-primary active:border-primary active:text-white active:bg-primary disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                        1
                    </button>
                    <button class="rounded-md rounded-r-none rounded-l-none border border-r-0 border-slate-300 py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-primary hover:border-primary focus:text-white focus:bg-primary focus:border-primary active:border-primary active:text-white active:bg-primary disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                        2
                    </button>
                    <button class="rounded-md rounded-r-none rounded-l-none border border-r-0 border-slate-300 py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-primary hover:border-primary focus:text-white focus:bg-primary focus:border-primary active:border-primary active:text-white active:bg-primary disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                        3
                    </button>
                    <button class="rounded-md rounded-r-none rounded-l-none border border-r-0 border-slate-300 py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-primary hover:border-primary focus:text-white focus:bg-primary focus:border-primary active:border-primary active:text-white active:bg-primary disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                        4
                    </button>
                    <button class="rounded-md rounded-r-none rounded-l-none border border-r-0 border-slate-300 py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-primary hover:border-primary focus:text-white focus:bg-primary focus:border-primary active:border-primary active:text-white active:bg-primary disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                        5
                    </button>
                    <button class="rounded-md rounded-l-none border border-slate-300 py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-primary hover:border-primary focus:text-white focus:bg-primary focus:border-primary active:border-primary active:text-white active:bg-primary disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                            <path fill-rule="evenodd" d="M12.97 3.97a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 1 1-1.06-1.06l6.22-6.22H3a.75.75 0 0 1 0-1.5h16.19l-6.22-6.22a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Hapus -->
    <div id="deleteModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg p-8 flex flex-col max-w-md">
            <h2 class="text-left text-lg font-bold text-red-600 mb-2">Konfirmasi Hapus Buku</h2>
            <p class="text-justify text-sm text-slate-600 mb-4">Apakah Anda yakin ingin menghapus buku ini? Buku yang sudah dihapus tidak dapat dipulihkan kembali.</p>
            <div class="flex justify-end space-x-4">
                <button id="cancelDeleteButton" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-700 hover:text-white rounded-md">Batal</button>
                <button id="confirmDeleteButton" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md">Ya, Hapus Buku</button>
            </div>
        </div>
    </div>

    <!-- Modal Status -->
    <div id="statusModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg p-8 flex flex-col max-w-md">
            <h2 class="text-left text-lg font-bold text-primary mb-2">Konfirmasi Perubahan Status</h2>
            <p class="text-justify text-sm text-slate-600 mb-4">Apakah Anda yakin ingin mengubah status buku?</p>
            <div class="flex justify-end space-x-4">
                <button id="cancelStatusButton" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-700 hover:text-white rounded-md">Batal</button>
                <button id="confirmStatusButton" class="px-4 py-2 bg-primary hover:bg-primaryhover text-white rounded-md">Ya, Ubah Status</button>
            </div>
        </div>
    </div>

    <script>
        // POPUP MODAL STATUS
        const statusModal = document.getElementById('statusModal');
        const confirmStatusButton = document.getElementById('confirmStatusButton');
        const cancelStatusButton = document.getElementById('cancelStatusButton');
        let selectedDropdown = null;
        let initialValue = ''; // Menyimpan nilai awal dropdown

        // Event listener untuk setiap dropdown status
        document.querySelectorAll('.status-dropdown').forEach(dropdown => {
            dropdown.addEventListener('change', function() {
                selectedDropdown = this;
                initialValue = this.value; // Simpan nilai awal
                statusModal.classList.remove('hidden'); // Tampilkan modal
            });
        });

        // Ketika tombol "Ya, Ubah Status" ditekan
        confirmStatusButton.addEventListener('click', function() {
            if (selectedDropdown) {
                // Ambil data dari dropdown
                const formData = new FormData(selectedDropdown.form);

                // Kirim request ke server
                fetch(selectedDropdown.form.action, {
                        method: 'POST',
                        body: formData,
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            location.reload(); // Refresh halaman jika berhasil
                        } else {
                            alert(data.message); // Menampilkan pesan gagal
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan, silakan coba lagi.');
                    });

                statusModal.classList.add('hidden'); // Sembunyikan modal
            }
        });

        // Ketika tombol "Batal" ditekan
        cancelStatusButton.addEventListener('click', function() {
            if (selectedDropdown) {
                selectedDropdown.value = initialValue; // Kembalikan ke nilai awal
            }
            statusModal.classList.add('hidden'); // Sembunyikan modal
            location.reload(); // Refresh halaman
        });

        // Tutup modal jika klik di luar modal
        window.addEventListener('click', function(event) {
            if (event.target === statusModal) {
                statusModal.classList.add('hidden');
                if (selectedDropdown) {
                    selectedDropdown.value = initialValue; // Kembalikan ke nilai awal jika modal ditutup
                }
            }
        });

        // Function to toggle the button text
        function toggleButtonText(button) {
            const activeText = button.getAttribute("data-active");
            const inactiveText = button.getAttribute("data-inactive");

            if (button.innerText === inactiveText) {
                button.innerText = activeText;
            } else {
                button.innerText = inactiveText;
            }
        }

        // Select all buttons with the class 'toggleBtn'
        const buttons = document.querySelectorAll(".toggleBtn");

        // Attach the toggle function to each button's click event
        buttons.forEach(button => {
            button.addEventListener("click", () => toggleButtonText(button));
        });
    </script>
    <script>
        // POPUP MODAL HAPUS
        const deleteModal = document.getElementById('deleteModal');
        const confirmDeleteButton = document.getElementById('confirmDeleteButton');
        const cancelDeleteButton = document.getElementById('cancelDeleteButton');
        let deleteForm = null; // Menyimpan form hapus

        // Event listener untuk tombol hapus
        document.querySelectorAll('form[action^="/admin/buku-kalpataru/hapus/"] button').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Mencegah submit form langsung
                deleteForm = this.closest('form'); // Ambil form yang akan dihapus
                deleteModal.classList.remove('hidden'); // Tampilkan modal
            });
        });

        // Ketika tombol "Ya, Hapus Berita" ditekan
        confirmDeleteButton.addEventListener('click', function() {
            if (deleteForm) {
                deleteForm.submit(); // Submit form hapus Berita
            }
        });

        // Ketika tombol "Batal" ditekan, sembunyikan modal
        cancelDeleteButton.addEventListener('click', function() {
            deleteModal.classList.add('hidden');
        });
    </script>
</body>

</html>