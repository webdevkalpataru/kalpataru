<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <style>
        /* scrollbar */
        ::-webkit-scrollbar {
            width: 20px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, rgb(230, 156, 59), rgba(217, 237, 191, 1));
            border-radius: 10px;
            border: 3px solid #f1f1f1;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, rgb(207, 140, 53), rgba(195, 213, 172, 1));
            opacity: 30%;
            border-radius: 10px;
            border: 3px solid #f1f1f1;
        }

        /* selection */
        ::selection {
            background-color: #2C7865;
            color: white;
        }
    </style>
</head>

<body class="lg:flex">

    <!-- Sidebar -->
    <?= $this->include('template/sidebartimteknis') ?>

    <!-- Main Content -->
    <div class="lg:flex-1 p-6">
        <div class="min-h-screen flex flex-col">

            <!-- Header -->
            <header class="bg-white shadow">
                <div class="container mx-auto flex items-center justify-between p-4 md:p-6">
                    <h1 class="text-xl font-bold text-slate-800 mb-2">Data Calon Usulan</h1>
                </div>
            </header>

            <!-- Main Content -->
            <div class="flex-1 container mx-auto">
                <div class="lg:flex lg:justify-between">
                    <!-- Dropdown Filter -->
                    <form id="filterForm" action="" method="get" class="flex items-center my-4 ms-4">
                        <label for="kategori" class="text-sm font-bold text-primary">Filter Kategori:</label>
                        <select name="kategori" id="kategori" class="ml-2 border-2 border-primary text-primary rounded-md shadow-sm" onchange="document.getElementById('filterForm').submit();">
                            <option value="">Semua Kategori</option>
                            <option value="Perintis Lingkungan" <?= ($kategori == 'Perintis Lingkungan') ? 'selected' : '' ?>>Perintis Lingkungan</option>
                            <option value="Pengabdi Lingkungan" <?= ($kategori == 'Pengabdi Lingkungan') ? 'selected' : '' ?>>Pengabdi Lingkungan</option>
                            <option value="Penyelamat Lingkungan" <?= ($kategori == 'Penyelamat Lingkungan') ? 'selected' : '' ?>>Penyelamat Lingkungan</option>
                            <option value="Pembina Lingkungan" <?= ($kategori == 'Pembina Lingkungan') ? 'selected' : '' ?>>Pembina Lingkungan</option>
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
                <div class="relative flex flex-col w-full h-full overflow-hidden text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left table-auto min-w-max">
                            <thead>
                                <tr>
                                    <th class="p-4 border-b border-accent2 bg-accent1 text-center">
                                        <p class="block text-xs md:text-sm font-bold leading-none text-accent2">No</p>
                                    </th>
                                    <th class="p-4 border-b border-accent2 bg-accent1 text-center">
                                        <p class="block text-xs md:text-sm font-bold leading-none text-accent2">Kode Registrasi</p>
                                    </th>
                                    <th class="p-4 border-b border-accent2 bg-accent1 text-center">
                                        <p class="block text-xs md:text-sm font-bold leading-none text-accent2">Nama</p>
                                    </th>
                                    <th class="p-4 border-b border-accent2 bg-accent1 text-center">
                                        <p class="block text-xs md:text-sm font-bold leading-none text-accent2">Kategori</p>
                                    </th>
                                    <th class="p-4 border-b border-accent2 bg-accent1 text-center">
                                        <p class="block text-xs md:text-sm font-bold leading-none text-accent2">Provinsi</p>
                                    </th>
                                    <th class="p-4 border-b border-accent2 bg-accent1 text-center">
                                        <p class="block text-xs md:text-sm font-bold leading-none text-accent2">Status</p>
                                    </th>
                                    <th class="p-4 border-b border-accent2 bg-accent1 text-center">
                                        <p class="block text-xs md:text-sm font-bold leading-none text-accent2">Detail</p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($usulan)): ?>
                                    <tr>
                                        <td colspan="8" class="p-4 text-center text-sm text-red-600">
                                            Tidak ditemukan data berdasarkan kategori "<?= $kategori ?: 'Semua Kategori'; ?>"
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php $no = 1 + ($pager->getCurrentPage() - 1) * $pager->getPerPage(); ?>
                                    <?php foreach ($usulan as $item): ?>
                                        <tr class="hover:bg-slate-100">
                                            <td class="p-4 border-b border-slate-200 text-center">
                                                <p class="block text-xs text-slate-800"><?= $no++ ?></p>
                                            </td>
                                            <td class="p-4 border-b border-slate-200 text-center">
                                                <p class="block text-xs text-slate-800"><?= $item['kode_registrasi'] ?></p>
                                            </td>
                                            <td class="p-4 border-b border-slate-200 text-center">
                                                <p class="block text-xs text-slate-800"><?= $item['nama'] ?></p>
                                            </td>
                                            <td class="p-4 border-b border-slate-200 text-center">
                                                <p class="block text-xs text-slate-800"><?= $item['kategori'] ?></p>
                                            </td>
                                            <td class="p-4 border-b border-slate-200 text-center">
                                                <p class="block text-xs text-slate-800"><?= $item['provinsi'] ?></p>
                                            </td>
                                            <td class="p-4 border-b border-slate-200 text-center">
                                                <?php
                                                $statusClass = ($item['status_pendaftaran'] === 'Tidak Lolos Administrasi') ? 'text-rejected' : 'text-accepted';
                                                ?>
                                                <p class="block text-xs font-bold <?= $statusClass ?>"><?= $item['status_pendaftaran'] ?></p>
                                            </td>
                                            <td class="p-4 border-b border-slate-200 text-center">
                                                <a href="<?= base_url('timteknis/detaildatacalonusulan/' . $item['id_pendaftaran']); ?>" class="mt-4 w-full rounded-md py-2 mb-2 px-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover">Selengkapnya</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row flex lg:justify-end justify-center my-6 lg:me-2 me-0">
                        <div class="pagination">
                            <?= $pager->links('usulan', 'template_pagination') ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div id="catatanModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg p-8 flex flex-col max-w-md">
            <h2 class="text-left text-lg font-bold text-primary mb-2">Catatan:</h2>
            <p class="text-justify text-sm text-slate-600 mb-4">Ini merupakan contoh catatan Ini merupakan contoh catatan Ini merupakan contoh catatan Ini merupakan contoh catatan</p>
            <button onclick="closeModal()"
                class="text-left text-sm font-bold text-gray-600 no-underline focus:outline-none">
                <span class="font-bold text-lg items-center">←</span> Kembali
            </button>
        </div>
    </div>

    <script>
        // POPUP MODAL CATATAN
        const modal = document.getElementById('catatanModal');
        const lihatButtons = document.querySelectorAll('.lihatButton');

        lihatButtons.forEach(button => {
            button.addEventListener('click', function() {
                modal.classList.remove('hidden');
            });
        });

        function closeModal() {
            modal.classList.add('hidden');
        }

        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                closeModal();
            }
        });
    </script>

</body>

</html>