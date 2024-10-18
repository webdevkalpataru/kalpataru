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
        <?= $this->include('template/sidebarpengusul') ?>

        <div class="relative flex flex-col w-full max-w-5xl mb-4 rounded-xl border-2 border-primary bg-white shadow-md lg:p-8 p-4">
            <h4 class="block text-xl font-bold text-slate-800 mb-2">
                Usulan Saya
            </h4>
            <div class="flex bg-yellow-400 items-center justify-center rounded-md px-2">
                <svg class="lg:ml-0 ml-2 w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                </svg>
                <h3 class="block text-sm font-semibold p-2 text-black">
                    Setelah anda melakukan <span class="font-bold text-rejected">Kirim Data</span>, Anda tidak dapat melakukan perubahan atau pengeditan pada Data Usulan!
                </h3>
            </div>
            <div class="lg:flex justify-between items-center mt-6">
                <a href="./tambahcalon">
                    <button id="tambahCalon" class="w-48 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button"> <span>&#10010</span> Tambah Calon Usulan</button>
                </a>
                <form method="get">
                    <div class="relative w-56 transition-all focus-within:w-64 lg:mt-0 mt-4">
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
            <div class="relative flex flex-col w-full h-full mt-2 overflow-hidden text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
                <div class="overflow-x-auto">
                    <table class="w-full text-left table-auto min-w-max">
                        <thead>
                            <tr>
                                <th class="p-4 border-b border-accent2 bg-accent1 text-center">
                                    <p class="block text-xs md:text-sm font-bold leading-none text-accent2">No</p>
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
                                    <p class="block text-xs md:text-sm font-bold leading-none text-accent2">Catatan</p>
                                </th>
                                <th class="p-4 border-b border-accent2 bg-accent1 text-center" colspan="4">
                                    <p class="block text-xs md:text-sm font-bold leading-none text-accent2">Tindakan</p>
                                </th>
                                <th class="p-4 border-b border-accent2 bg-accent1 text-center">
                                    <p class="block text-xs md:text-sm font-bold leading-none text-accent2">Kirim Data</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($usulan)): ?>
                                <tr>
                                    <td colspan="8" class="p-4 text-center text-sm text-red-600">
                                        Belum ada data
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php $no = 1 + ($pager->getCurrentPage() - 1) * $pager->getPerPage(); ?>
                                <?php
                                $no = 0;
                                foreach ($usulan as $index => $u) :
                                    $no++;
                                ?>
                                    <tr class="hover:bg-slate-100">
                                        <td class="p-4 border-b border-slate-200 text-center">
                                            <p class="block text-xs text-slate-800"><?= $no ?></p>
                                        </td>
                                        <td class="p-4 border-b border-slate-200 text-center">
                                            <p class="block text-xs text-slate-800"><?= $u['nama']; ?></p>
                                        </td>
                                        <td class="p-4 border-b border-slate-200 text-center">
                                            <p class="block text-xs text-slate-800"><?= $u['kategori']; ?></p>
                                        </td>
                                        <td class="p-4 border-b border-slate-200 text-center">
                                            <p class="block text-xs text-slate-800"><?= $u['provinsi']; ?></p>
                                        </td>
                                        <td class="p-4 border-b border-slate-200 text-center">
                                            <?php
                                            $statusClass = ($u['status_pendaftaran'] === 'Tidak Lolos Administrasi') ? 'text-rejected' : 'text-accepted';
                                            ?>
                                            <p class="block text-xs font-bold w-24 <?= $statusClass ?>"><?= $u['status_pendaftaran'] ?></p>
                                        </td>
                                        <td class="p-4 border-b border-slate-200 text-center">
                                            <button class="lihatButton w-20 rounded-md py-2 px-2 text-center font-semibold text-xs text-primary bg-secondary" type="button">Lihat</button>
                                        </td>
                                        <td class="px-2 pt-1 border-b border-slate-200 text-center viewCell">
                                            <a href="./detailusulansaya/<?= $u['id_pendaftaran']; ?>">
                                                <!-- Ikon Lihat -->
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Zm3.75 11.625a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                                </svg>
                                            </a>
                                        </td>
                                        <td class="px-2 border-b border-slate-200 text-center editCell">
                                            <?php if (in_array($u['status_pendaftaran'], ['Draft', 'Perlu Perbaikan'])): ?>
                                                <a href="./detailusulansayaedit/<?= $u['id_pendaftaran']; ?>">
                                                    <!-- Ikon Edit -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg>
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-2 border-b border-slate-200 text-center downloadCell">
                                            <?php if (!in_array($u['status_pendaftaran'], ['Draft', 'Perlu Perbaikan'])): ?>
                                                <a href="./pdf/<?= $u['kode_registrasi']; ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                                    </svg>
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-2 border-b border-slate-200 text-center deleteCell">
                                            <?php if ($u['status_pendaftaran'] === 'Perlu Perbaikan'): ?>
                                                <a href="./detailusulansayadelete">
                                                    <!-- Ikon Hapus -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </a>
                                            <?php endif; ?>
                                        <td class="p-4 border-b border-slate-200 text-center">
                                            <?php if ($u['status_pendaftaran'] === 'Draft' || $u['status_pendaftaran'] === 'Perlu Perbaikan'): ?>
                                                <button class="kirimDataButton w-20 rounded-md py-2 px-2 text-center text-xs text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none" type="button" data-id="<?= $u['id_pendaftaran'] ?>">
                                                    Kirim Data
                                                </button>
                                            <?php else: ?>
                                                <button class="w-20 rounded-md py-2 px-2 text-center text-xs text-white transition-all shadow-md bg-gray-600 disabled opacity-50" type="button" disabled>
                                                    Data telah terkirim
                                                </button>
                                            <?php endif; ?>
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

    <!-- Modal -->
    <div id="modalPopup" class="fixed inset-0 z-50 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-8 flex flex-col items-center max-w-md">
            <img src="/images/question.png" alt="Question Icon" class="w-16 h-16 mb-4">
            <p class="text-center text-lg font-bold text-gray-700 mb-4">Apakah anda yakin ingin mengirimkan seluruh data pada admin?</p>
            <p class="text-center text-sm text-slate-600 mb-4">Data yang dikirimkan adalah Seluruh Data pada Identitas Calon, Kegiatan Calon, Dampak, PMIK, Keswadayaan dan Kebudayaan, dan Keistimewaan. <span class="font-bold"> Data yang telah dikirimkan tidak dapat diubah kembali, mohon perhatikan dengan seksama!</span></p>
            <div class="flex justify-end space-x-4">
                <button id="cancelButton" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-700 hover:text-white rounded-md">Periksa Kembali</button>
                <button id="confirmButton" class="px-4 py-2 bg-primary hover:bg-primaryhover text-white rounded-md">Ya, Kirim Data</button>
            </div>
        </div>
    </div>
    <script>
        // Ambil tombol untuk menampilkan modal
        const kirimDataButtons = document.querySelectorAll('.kirimDataButton');
        const modalPopup = document.getElementById('modalPopup');
        const confirmButton = document.getElementById('confirmButton');
        const cancelButton = document.getElementById('cancelButton');

        // Event untuk menampilkan modal
        kirimDataButtons.forEach((button) => {
            button.addEventListener('click', () => {
                const idPendaftaran = button.getAttribute('data-id');
                confirmButton.setAttribute('data-id', idPendaftaran); // Set data-id pada tombol confirm
                modalPopup.classList.remove('hidden'); // Tampilkan modal
            });
        });

        // Event untuk mengirim data saat tombol konfirmasi diklik
        confirmButton.addEventListener('click', () => {
            const idPendaftaran = confirmButton.getAttribute('data-id'); // Ambil ID dari tombol
            // Lakukan request POST untuk mengirim data
            fetch('/pengusul/usulansaya', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: new URLSearchParams({
                        'id_pendaftaran': idPendaftaran
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                        button.textContent = 'Data telah terkirim';
                        button.disabled = true;
                        button.classList.add('disabled');
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => console.error('Error:', error));

            modalPopup.classList.add('hidden'); // Sembunyikan modal setelah konfirmasi
        });

        // Fungsi untuk mengatur ulang kolom agar tombol maju ke kolom yang kosong
        function rearrangeColumns(index) {
            const rowCells = [
                document.querySelectorAll('.viewCell')[index],
                document.querySelectorAll('.editCell')[index],
                document.querySelectorAll('.downloadCell')[index],
                document.querySelectorAll('.deleteCell')[index]
            ];

            // Filter kolom yang tidak tersembunyi
            const visibleCells = rowCells.filter(cell => !cell.classList.contains('hidden'));

            // Reset display semua cell
            rowCells.forEach(cell => cell.style.display = 'none');

            // Tampilkan ulang kolom yang tidak tersembunyi, tanpa bolong
            visibleCells.forEach((cell, newIndex) => {
                cell.style.display = '';
                cell.style.order = newIndex;
            });
        }

        // Event untuk membatalkan dan menutup modal
        cancelButton.addEventListener('click', () => {
            modalPopup.classList.add('hidden');
        });

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

    <?= $this->endSection() ?>
</body>