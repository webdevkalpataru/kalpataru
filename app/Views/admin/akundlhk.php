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

            <header class="bg-white shadow">
                <div class="container mx-auto flex items-center justify-between p-4 md:p-6">
                    <h1 class="text-xl md:text-2xl font-semibold text-gray-700">Akun DLHK</h1>
                    <div class="flex items-center">
                        <p class="text-gray-500 mr-2 md:mr-4">Hello, <?= session()->get('nama'); ?></p>
                        <a href="/auth/logoutinternal" class="bg-rejected text-white px-3 py-2 md:px-4 md:py-2 rounded-lg inline-block">Keluar</a>
                    </div>
                </div>
            </header>


            <div>
                <a href="/admin/daftarakundlhk">
                    <button id="tambahCalon" class="w-48 rounded-md py-2 ml-2 mt-4 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                        <span>&#10010</span> Tambah Akun DLHK
                    </button>
                </a>
            </div>

            <div class="lg:flex lg:justify-between">
                <!-- Dropdown Filter -->
                <form id="filterForm" action="" method="get" class="flex items-center my-4 ms-4">
                    <label for="statusAkun" class="text-sm font-bold text-primary">Filter Status Akun:</label>
                    <select name="statusAkun" id="statusAkun" class="ml-2 border-2 border-primary text-primary rounded-md shadow-sm" onchange="document.getElementById('filterForm').submit();">
                        <option value="">Semua Status Akun</option>
                        <option value="Aktif" <?= ($statusAkun == 'Aktif') ? 'selected' : '' ?>>Aktif</option>
                        <option value="Pending" <?= ($statusAkun == 'Pending') ? 'selected' : '' ?>>Pending</option>
                    </select>
                </form>
                <form method="get" class="flex items-center justify-end my-4">
                    <div class="relative lg:w-56 w-80 transition-all focus-within:w-64 lg:mt-0 mt-4">
                        <input
                            placeholder="Masukan kata kunci"
                            class="input shadow-lg focus:border-2 border-2 text-primary border-primary px-5 py-1 pr-10 rounded-md w-full outline-none"
                            name="search"
                            value="<?= esc($keyword) ?>" />
                        <svg
                            class="w-6 h-6 absolute top-1/2 right-3 transform -translate-y-1/2 text-primary"
                            stroke="currentColor"
                            stroke-width="1.5"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                                stroke-linejoin="round"
                                stroke-linecap="round"></path>
                        </svg>
                    </div>
                </form>
            </div>


            <h4 class="text-sm font-semibold text-primary ms-4">
                Hasil: <?= esc($countAllPengusul) ?> Akun
            </h4>

            <div class="overflow-auto bg-white shadow-md rounded-lg">
                <table class="w-full text-left table-auto min-w-max">
                    <thead>
                        <tr>
                            <th
                                class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                                <p
                                    class="flex items-center justify-between gap-2 text-sm font-normal leading-none text-slate-800">
                                    No
                                </p>
                            </th>

                            <th
                                class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                                <p
                                    class="flex items-center justify-between gap-2 text-sm font-normal leading-none text-slate-800">
                                    Nama Instansi
                                </p>
                            </th>
                            <th
                                class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                                <p
                                    class="flex items-center justify-between gap-2 text-sm font-normal leading-none text-slate-800">
                                    Email
                                </p>
                            </th>
                            <th
                                class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                                <p
                                    class="flex items-center justify-between gap-2 text-sm font-normal leading-none text-slate-800">
                                    Provinsi
                                </p>
                            </th>
                            <th
                                class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                                <p
                                    class="flex items-center justify-between gap-2 text-sm font-normal leading-none text-slate-800">
                                    Status
                                </p>
                            </th>
                            <th
                                class="p-4 transition-colors cursor-pointer border-b border-slate-300 bg-slate-50 hover:bg-slate-100">
                                <p
                                    class="flex items-center justify-between gap-2 text-sm font-normal leading-none text-slate-800">
                                    Detail
                                </p>
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($pengusul) > 0): ?>
                            <?php
                            $no = 0;
                            foreach ($pengusul as $index => $p):
                                $no++;
                            ?>
                                <tr class="hover:bg-slate-50">
                                    <td class="p-4 border-b border-slate-200">
                                        <p class="block text-sm text-slate-800">
                                            <?= $no ?>
                                        </p>
                                    </td>
                                    <td class="p-4 border-b border-slate-200">
                                        <p class="block text-sm text-slate-800">
                                            <?= esc($p['instansi']); ?> </p>
                                    </td>
                                    <td class="p-4 border-b border-slate-200">
                                        <p class="block text-sm text-slate-800">
                                            <?= esc($p['email']); ?> </p>
                                    </td>
                                    <td class="p-4 border-b border-slate-200">
                                        <p class="block text-sm text-slate-800">
                                            <?= esc($p['provinsi']); ?> </p>
                                    </td>
                                    <td class="p-4 border-b border-slate-200 text-center">
                                        <form method="POST" action="/admin/updatepengusul">
                                            <input type="hidden" name="id_pengusul" value="<?= esc($p['id_pengusul']); ?>">
                                            <select name="status_akun" class="status-dropdown ml-2 border-2 border-primary text-primary rounded-md shadow-sm text-xs" data-id="<?= $p['id_pengusul'] ?>">
                                                <?php
                                                $statuses = ['Pending', 'Aktif'];
                                                foreach ($statuses as $status) {
                                                    $selected = ($status == $p['status_akun']) ? 'selected' : '';
                                                    echo "<option value='$status' $selected>$status</option>";
                                                }
                                                ?>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="p-4 border-b border-slate-200">
                                        <div>
                                            <a href="/admin/pengusul/detail/<?= $p['id_pengusul']; ?>" class="mt-4 w-3/2 rounded-md py-2 px-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover">Lihat</a>
                                        </div>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="p-4 text-center text-slate-800">Belum ada akun</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <div class="row flex lg:justify-end justify-center my-6 lg:me-2 me-0">
                    <div class="pagination">
                        <?= $pager->links('pengusul', 'template_pagination') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Status -->
    <div id="statusModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg p-8 flex flex-col max-w-md">
            <h2 class="text-left text-lg font-bold text-primary mb-2">Konfirmasi Perubahan Status</h2>
            <p class="text-justify text-sm text-slate-600 mb-4">Apakah Anda yakin ingin mengubah status akun pengusul ini?</p>
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
</body>

</html>
</body>

</html>