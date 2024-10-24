<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/app.css">
    <title>Tambah Arsip Penerima</title>
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
                    <h1 class="text-xl md:text-2xl font-semibold text-gray-700">Tambah Arsip Penerima</h1>
                    <div class="flex items-center">
                        <p class="text-gray-500 mr-2 md:mr-4">Hello, Admin</p>
                        <button class="bg-rejected text-white px-3 py-2 md:px-4 md:py-2 rounded-lg">Keluar</button>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <div class="relative flex flex-col w-full lg:max-w-5xl mb-4 rounded-xl border-2 border-primary mt-4 bg-white shadow-md lg:p-8 p-4">

                <form action="/admin/daftardppk" class="mt-4 mb-2 w-full" method="post" id="profil-form">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <!-- Kolom kiri -->
                        <div class="space-y-4">
                            <div>
                                <label class="block mb-2 text-sm text-black">Nama Penerima</label>
                                <input type="text" name="penerima" id="penerima" class="w-full placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" required />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Kategori</label>
                                <select name="kategori" id="kategori" class="w-full placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    <option value="kategori1">Perintis Lingkungan</option>
                                    <option value="kategori2">Pengabdi Lingkungan</option>
                                    <option value="kategori3">Penyelamat Lingkungan</option>
                                    <option value="kategori4">Pembina Lingkungan</option>
                                </select>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Tema</label>
                                <select name="tema" id="tema" class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" required>
                                    <option value="" disabled selected>Pilih Tema</option>
                                    <option value="keanekaragaman_hayati">Keanekaragaman Hayati</option>
                                    <option value="perubahan_iklim">Perubahan Iklim</option>
                                    <option value="pencemaran_kerusakan_lingkungan">Pencemaran dan Kerusakan Lingkungan</option>
                                    <option value="hukum_budaya">Hukum dan Budaya</option>
                                </select>
                            </div>

                            <div>
                                <label class="block mb-2 text-sm text-black">Sub Tema</label>
                                <select name="subtema" id="subtema" class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" required disabled>
                                    <option value="" disabled selected>Pilih Subtema</option>
                                </select>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Tahun</label>
                                <input type="number" name="tahun" id="tahun" class="w-full placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" required />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Usia</label>
                                <input type="number" name="usia" id="usia" class="w-full placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" required />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="w-full placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" required>
                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Provinsi</label>
                                <input type="text" name="penerima" id="penerima" class="w-full placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" required />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Kab/Kota (saat menerima)</label>
                                <input type="text" name="penerima" id="penerima" class="w-full placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" required />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Kecamatan (saat menerima)</label>
                                <input type="text" name="penerima" id="penerima" class="w-full placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" required />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Desa (saat menerima)</label>
                                <input type="text" name="penerima" id="penerima" class="w-full placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" required />
                            </div>
                            <div>
                            <label class="block mb-2 text-sm text-black">Status</label>
                            <select name="status" id="status" class="w-full placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" required>
                                <option value="" disabled selected>Pilih Status</option>
                                <option value="aktif">Aktif</option>
                                <option value="tidak_aktif">Tidak Aktif</option>
                                <option value="meninggal">Meninggal</option>
                            </select>
                        </div>

                            
                        </div>

                        <!-- Kolom kanan -->
                        <div class="space-y-4">
                            <div>
                                <label class="block mb-2 text-sm text-black">Kegiatan</label>
                                <input type="text" name="status" id="status" class="w-full placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" required />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Dokumentasi (link drive)</label>
                                <input type="text" name="status" id="status" class="w-full placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" required />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Nama Pengusul/DLH Terkait</label>
                                <input type="text" name="status" id="status" class="w-full placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" required />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">Jabatan Pengusul/DLH Terkait</label>
                                <input type="text" name="status" id="status" class="w-full placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" required />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm text-black">No HP Pengusul/DLH Terkait</label>
                                <input type="number" name="HP" id="HP" class="w-full placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" required />
                            </div>
                        </div>

                        <!-- Tombol Paling Bawah di Mobile -->
                        <div class="md:col-span-2 flex justify-center md:justify-start">
                            <button id="uploadBtn" class="mt-4 w-full md:w-32 rounded-md py-2 px-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="submit" disabled>Tambahkan Arsip</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal -->
            <div id="uploadModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
                <div class="bg-white rounded-lg p-8 flex flex-col items-center max-w-md">
                    <img src="/images/sukses.png" alt="Success Icon" class="w-16 h-16 mb-4">
                    <h2 class="text-center text-lg font-bold text-primary mb-2">Arsip Berhasil Didaftaran</h2>
                    <a href="./arsippenerima">
                        <button id="closeModalBtn" class="bg-primary text-white py-2 px-4 rounded-lg">OK</button>
                    </a>
                </div>
            </div>

            <!-- Toast Notification -->
            <div id="toast" class="toast hidden fixed bottom-4 right-4 bg-gray-800 text-white p-2 rounded-md shadow-lg">Akun berhasil didaftarkan!</div>

            <script>
                // Modal and Toast functionality
                const uploadBtn = document.getElementById('uploadBtn');
                const uploadModal = document.getElementById('uploadModal');
                const closeModalBtn = document.getElementById('closeModalBtn');
                const form = document.getElementById('profil-form');
                const toast = document.getElementById('toast');

                // Sub tema options for each tema
                const subTemaOptions = {
                    keanekaragaman_hayati: [
                        'Pelestarian Keanekaragaman Hayati dan Kawasan Dilindungi yang Meliputi Pelestarian Sumber Daya Genetik, Jenis, dan Ekosistem',
                        'Pemanfaatan Keanekaragaman Hayati Secara Berkelanjutan',
                        'Jasa Lingkungan',
                    ],
                    perubahan_iklim: [
                        'Adaptasi Perubahan Iklim',
                        'Mitigasi Perubahan Iklim',
                        'Penerapan Ekonomi Hijau dan Ekonomi Biru',
                    ],
                    pencemaran_kerusakan_lingkungan: [
                        'Penanganan Pencemaran Air, Tanah, Udara Dari Industri, Pertanian, Domestik Terutama Plastik',
                        'Pencegahan dan Penanggulangan Kerusakan Lingkungan',
                        'Ekonomi Sirkular ',
                    ],
                    hukum_budaya: [
                        'Keadilan Terhadap Pemanfaatan Sumber Daya Alam dan Lingkungan',
                        'Kearifan Tradisional Dalam Pengelolaan Sumber Daya Alam',
                        'Komunikasi dan Pendidikan Lingkungan Hidup',
                    ],
                };

                // Update sub tema options based on selected tema
                document.getElementById('tema').addEventListener('change', function () {
                    const selectedTema = this.value;
                    const subtemaSelect = document.getElementById('subtema');

                    // Clear existing options
                    subtemaSelect.innerHTML = '<option value="" disabled selected>Pilih Subtema</option>';
                    
                    if (selectedTema && subTemaOptions[selectedTema]) {
                        subTemaOptions[selectedTema].forEach(subTema => {
                            const option = document.createElement('option');
                            option.value = subTema.toLowerCase().replace(/\s+/g, '_');
                            option.textContent = subTema;
                            subtemaSelect.appendChild(option);
                        });
                        subtemaSelect.disabled = false; // Enable the subtema dropdown
                    } else {
                        subtemaSelect.disabled = true; // Disable if no theme is selected
                    }
                });

                // Handle form submission with fetch (AJAX)
                form.addEventListener('submit', async (event) => {
                    event.preventDefault(); // Prevent immediate form submission

                    // Show modal when form is valid and button is clicked
                    uploadModal.classList.remove('hidden');

                    // Prepare form data to be sent
                    const formData = new FormData(form);

                    try {
                        // Send form data using fetch (AJAX)
                        const response = await fetch(form.action, {
                            method: 'POST',
                            body: formData
                        });

                        // Check if the response is OK
                        if (response.ok) {
                            // Show success modal
                            uploadModal.classList.remove('hidden');

                            // Show toast notification
                            toast.classList.remove('hidden');

                            // Hide toast after 3 seconds
                            setTimeout(() => {
                                toast.classList.add('hidden');
                            }, 3000);
                        } else {
                            const errorText = await response.text();
                            alert('Error: ' + errorText); // Show error in case of failure
                        }
                    } catch (error) {
                        alert('Error occurred: ' + error.message);
                    }
                });

                // Close modal button functionality
                closeModalBtn.addEventListener('click', () => {
                    uploadModal.classList.add('hidden');
                    // You can optionally reset the form or do something else here
                });

                // Check if all inputs are filled
                const inputs = document.querySelectorAll('input');

                inputs.forEach(input => {
                    input.addEventListener('input', checkFormValidity);
                });

                function checkFormValidity() {
                    const isValid = [...inputs].every(input => input.value.trim() !== '');
                    uploadBtn.disabled = !isValid;
                }
            </script>

        </div>
    </div>
</body>

</html>
