<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/app.css">
</head>

<body>

    <?= $this->extend('template/navbarfooter') ?>

    <?= $this->section('content') ?>

    <div class="flex flex-col lg:flex-row justify-end m-4">
        <?= $this->include('template/sidebarpengusul') ?>

        <!-- Konten utama -->
        <div class="relative flex flex-col w-full max-w-2xl mx-auto mb-4 rounded-xl border-2 border-primary bg-white shadow-md lg:p-8 p-4">

            <div class="w-full pt-1 px-4 lg:mb-8">
                <div class="relative flex items-center justify-between w-full flex-wrap gap-4 sm:gap-8">
                    <div class="absolute left-0 top-2/4 h-0.5 w-full -translate-y-2/4 bg-accent2 transition-all duration-500"></div>

                    <!-- Step 1 -->
                    <div class="relative z-10 grid w-8 h-8 sm:w-10 sm:h-10 font-bold text-white transition-all duration-300 bg-accent2 border-2 border-accent2 rounded-full place-items-center">
                        <div class="absolute -bottom-8 w-max text-center">
                            <p class="lg:block hidden font-sans text-xs lg:text-md antialiased font-semibold leading-relaxed tracking-normal text-gray-700 w-28 h-8">
                                Identitas Calon
                            </p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative z-10 grid w-8 h-8 sm:w-10 sm:h-10 font-bold text-white transition-all duration-300 bg-accent2 border-2 border-accent2 rounded-full place-items-center">
                        <div class="absolute -bottom-8 w-max text-center">
                            <p class="lg:block hidden font-sans text-xs lg:text-md antialiased font-semibold leading-relaxed tracking-normal text-gray-700 w-28 h-8">
                                Kegiatan Calon
                            </p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="relative z-10 grid w-8 h-8 sm:w-10 sm:h-10 font-bold text-accent1 transition-all duration-300 bg-accent1 border-2 border-accent2 rounded-full place-items-center">
                        <div class="absolute -bottom-8 w-max text-center">
                            <p class="lg:block hidden font-sans text-xs lg:text-md antialiased font-semibold leading-relaxed tracking-normal text-gray-700 w-28 h-8">
                                Dampak
                            </p>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="relative z-10 grid w-8 h-8 sm:w-10 sm:h-10 font-bold text-white transition-all duration-300 bg-accent1 border-2 border-accent2  rounded-full place-items-center">
                        <div class="absolute -bottom-8 w-max text-center">
                            <p class="lg:block hidden font-sans text-xs lg:text-md antialiased font-semibold leading-relaxed tracking-normal text-gray-700 w-28 h-8">
                                PMIK
                            </p>
                        </div>
                    </div>

                    <!-- Step 5 -->
                    <div class="relative z-10 grid w-8 h-8 sm:w-10 sm:h-10 font-bold text-white transition-all duration-300 bg-accent1 border-2 border-accent2 rounded-full place-items-center">
                        <div class="absolute -bottom-8 w-max text-center">
                            <p class="lg:block hidden font-sans text-xs lg:text-md antialiased font-semibold leading-relaxed tracking-normal text-gray-700 w-28 h-8">
                                Keswadayaan dan Keberlanjutan
                            </p>
                        </div>
                    </div>

                    <!-- Step 6 -->
                    <div class="relative z-10 grid w-8 h-8 sm:w-10 sm:h-10 font-bold text-accent1 transition-all duration-300 bg-accent1 border-2 border-accent2 rounded-full place-items-center">
                        <div class="absolute -bottom-8 w-max text-center">
                            <p class="lg:block hidden font-sans text-xs lg:text-md antialiased font-semibold leading-relaxed tracking-normal text-gray-700 w-28 h-8">
                                Keistimewaan
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <form action="<?= base_url('pengusul/simpancalonkegiatan'); ?>" method="post">
                <div class="grid grid-cols-1 gap-4" id="formContainer">

                    <!-- Kolom kiri -->
                    <div class="space-y-4">
                        <div>
                            <label for="tema" class="block mb-2 text-sm text-black">Tema Kegiatan</label>
                            <select name="tema" id="tema" class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" required>
                                <option value="" disabled selected>Pilih Tema Kegiatan</option>
                                <option value="keanekaragaman-hayati">Keanekaragaman Hayati (Biodiversity)</option>
                                <option value="perubahan-iklim">Perubahan Iklim</option>
                                <option value="pencemaran-kerusakan-lingkungan">Pencemaran dan Kerusakan Lingkungan</option>
                                <option value="hukum-dan-budaya">Hukum dan Budaya</option>
                            </select>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm text-black">Sub Tema Kegiatan</label>
                            <select name="sub_tema" class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" required>
                                <option value="" disabled selected>Pilih Sub Tema Kegiatan</option>
                                <option value="pelestarian-keanekaragaman-hayati-kawasan-dilindungi">Pelestarian keanekaragaman hayati dan kawasan dilindungi</option>
                                <option value="pemanfaatan-keanekaragaman-hayati-berkelanjutan">Pemanfaatan keanekaragaman hayati secara berkelanjutan</option>
                                <option value="jasa-lingkungan">Jasa Lingkungan</option>
                                <option value="adaptasi-perubahan-iklim">Adaptasi Perubahan Iklim</option>
                                <option value="mitigasi-perubahan-iklim">Mitigasi Perubahan Iklim</option>
                                <option value="penerapan-ekonomi-hijau-biru">Penerapan ekonomi hijau dan biru</option>
                                <option value="penanganan-pencemaran-air-tanah-udara">Penanganan pencemaran air, tanah, udara</option>
                                <option value="kearifan-tradisional-pengelolaan-sda">Kearifan tradisional dalam pengelolaan sumber daya alam</option>
                                <option value="keadilan-pemanfaatan-sda-lingkungan">Keadilan terhadap pemanfaatan sumber daya alam dan lingkungan</option>
                                <option value="komunikasi-pendidikan-lingkungan-hidup">Komunikasi dan Pendidikan Lingkungan Hidup</option>
                            </select>
                        </div>

                        <div>
                            <label class="block mb-2 text-sm text-black">Jenis Kegiatan</label>
                            <select name="jenis_kegiatan" id="jenis_kegiatan" class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" onchange="toggleJenisLainnya()">
                                <option value="" disabled selected>Pilih Jenis Kegiatan</option>
                                <option value="konservasi-hutan">Konservasi Hutan</option>
                                <option value="konservasi-karst">Konservasi Karst</option>
                                <option value="mangrove">Mangrove</option>
                                <option value="konservasi-terumbu-karang">Konservasi Terumbu Karang</option>
                                <option value="konservasi-mata-air">Konservasi Mata Air</option>
                                <option value="konservasi-das">Konservasi DAS</option>
                                <option value="konservasi-kawasan-perairan">Konservasi Kawasan Perairan</option>
                                <option value="konservasi-satwa">Konservasi Satwa</option>
                                <option value="konservasi-tanaman">Konservasi Tanaman</option>
                                <option value="tanaman-obat">Tanaman Obat</option>
                                <option value="penanaman-tanaman-budidaya">Penanaman Tanaman Budidaya</option>
                                <option value="pengelolaan-hutan">Pengelolaan Hutan</option>
                                <option value="pengelolaan-budidaya-perairan">Pengelolaan Budidaya Perairan</option>
                                <option value="ekowisata">Ekowisata</option>
                                <option value="penyediaan-air-bersih">Penyediaan Air Bersih</option>
                                <option value="energi-terbarukan">Energi Terbarukan</option>
                                <option value="pemanfaatan-teknologi-ramah-lingkungan">Pemanfaatan Teknologi Ramah Lingkungan</option>
                                <option value="penghijauan">Penghijauan</option>
                                <option value="rehabilitasi-lahan-kritis">Rehabilitasi Lahan Kritis</option>
                                <option value="ruang-terbuka-hijau">Ruang Terbuka Hijau</option>
                                <option value="pertanian-ramah-lingkungan">Pertanian Ramah Lingkungan</option>
                                <option value="urban-farming">Urban Farming</option>
                                <option value="kawasan-peduli-lingkungan">Kawasan Peduli Lingkungan</option>
                                <option value="ketahanan-pangan">Ketahanan Pangan</option>
                                <option value="pemulihan-area-rusak-tercemar">Pemulihan Area Rusak dan Tercemar</option>
                                <option value="penanganan-bencana">Penanganan Bencana</option>
                                <option value="pengelolaan-sampah-limbah">Pengelolaan Sampah dan Limbah</option>
                                <option value="hutan-adat">Hutan Adat</option>
                                <option value="kearifan-lokal">Kearifan Lokal</option>
                                <option value="advokasi-lingkungan">Advokasi Lingkungan</option>
                                <option value="edukasi-lingkungan">Edukasi Lingkungan</option>
                                <option value="gerakan-aksi-lingkungan">Gerakan Aksi Lingkungan</option>
                                <option value="jenis-kegiatan-lainnya">Jenis Kegiatan Lainnya</option>
                            </select>
                        </div>
                        <div id="jenisLainnya" class="hidden">
                            <label class="block mb-2 text-sm text-black">Jenis Kegiatan Lainnya</label>
                            <input type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" />
                        </div>
                        <div>
                            <label class="block mb-2 text-sm text-black">Tahun Mulai Kegiatan</label>
                            <input type="date" name="tahun_mulai" id="tahun_mulai" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                        </div>
                        <div>
                            <label class="block mb-2 text-sm text-black">Penjelasan Kegiatan</label>
                            <textarea name="deskripsi_kegiatan" id="deskripsi_kegiatan" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" rows="4"
                                oninput="updateWordCount(this, 'penjelasanCount', 1000)"></textarea>
                            <p id="penjelasanCount" class="text-xs text-slate-400 flex justify-end ">0/1000 Kata</p>
                        </div>
                    </div>

                    <!-- Kolom kanan -->
                    <div class="space-y-4">
                        <div>
                            <label class="block mb-2 text-sm text-black">Lokasi Kegiatan</label>
                            <input type="text" name="lokasi_kegiatan" id="lokasi_kegiatan" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                        </div>
                        <div>
                            <label class="block mb-2 text-sm text-black">Para Pihak dan Perannya</label>
                            <textarea name="pihak_dan_peran" id="pihak_dan_peran" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" rows="4"
                                oninput="updateWordCount(this, 'pihak_dan_peranCount', 1000)"></textarea>
                            <p id="pihak_dan_peranCount" class="text-xs text-slate-400 flex justify-end ">0/1000 Kata</p>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm text-black">Keberhasilan yang Dicapai</label>
                            <textarea name="keberhasilan" id="keberhasilan" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" rows="4"
                                oninput="updateWordCount(this, 'keberhasilanCount', 1000)"></textarea>
                            <p id="keberhasilanCount" class="text-xs text-slate-400 flex justify-end ">0/1000 kata</p>
                        </div>

                    </div>
                </div>

                <div class="flex justify-between mt-4">
                    <button id="tambahKegiatanBtn" class="w-40 rounded-md py-2 text-center text-sm text-primary transition-all shadow-md hover:shadow-lg bg-secondary active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button" onclick="tambahKegiatan()"> <span>&#10010</span> Tambah Kegiatan</button>
                    <div class="flex justify-end mt-4">
                        <button class="w-40 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none" type="submit">Selanjutnya</button>
                    </div>
                </div>


            </form>

        </div>


    </div>

    <script>
        // Jenis Kegiatan Lainnya
        /* function toggleJenisLainnya() {
            const jenisKegiatan = document.getElementById('jenisKegiatan');
            const jenisLainnya = document.getElementById('jenisLainnya');
            if (jenisKegiatan.value === 'jenis-kegiatan-lainnya') {
                jenisLainnya.classList.remove('hidden');
            } else {
                jenisLainnya.classList.add('hidden');
            }
        } */

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

        // Tambah Form Kegiatan
        document.addEventListener('DOMContentLoaded', function() {
            const formContainer = document.getElementById('formContainer');

            // Delegasikan event untuk jenis kegiatan lainnya
            formContainer.addEventListener('change', function(event) {
                if (event.target && event.target.matches('select[id^="jenisKegiatan"]')) {
                    const jenisLainnya = event.target.closest('.grid').querySelector('#jenisLainnya');
                    if (event.target.value === 'jenis-kegiatan-lainnya') {
                        jenisLainnya.classList.remove('hidden');
                    } else {
                        jenisLainnya.classList.add('hidden');
                    }
                }
            });
        });

        let kegiatanCount = 1; // Awal dari 1 karena sudah ada 1 form
        const maxKegiatan = 4;

        function tambahKegiatan() {
            if (kegiatanCount < maxKegiatan) {
                kegiatanCount++;
                const formContainer = document.getElementById('formContainer');

                // Salin form yang ada
                const newForm = `
            <div class="grid grid-cols-1 gap-4 mt-4">
                <!-- Kolom kiri -->
                <div class="space-y-4">
                        <div>
                            <label class="block mb-2 text-sm text-black">Tema Kegiatan</label>
                            <select class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease">
                                <option value="" disabled selected>Pilih Tema Kegiatan</option>
                                <option value="keanekaragaman-hayati">Keanekaragaman Hayati</option>
                                <option value="perubahan-iklim">Perubahan Iklim</option>
                                <option value="pencemaran-kerusakan-lingkungan">Pencemaran dan Kerusakan Lingkungan</option>
                                <option value="hukum-dan-budaya">Hukum dan Budaya</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm text-black">Sub Tema Kegiatan</label>
                            <select class="w-full bg-transparent text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease">
                                <option value="" disabled selected>Pilih Sub Tema Kegiatan</option>
                                <option value="pelestarian-keanekaragaman-hayati-kawasan-dilindungi">Pelestarian keanekaragaman hayati dan kawasan dilindungi</option>
                                <option value="pemanfaatan-keanekaragaman-hayati-berkelanjutan">Pemanfaatan keanekaragaman hayati secara berkelanjutan</option>
                                <option value="jasa-lingkungan">Jasa Lingkungan</option>
                                <option value="adaptasi-perubahan-iklim">Adaptasi Perubahan Iklim</option>
                                <option value="mitigasi-perubahan-iklim">Mitigasi Perubahan Iklim</option>
                                <option value="penerapan-ekonomi-hijau-biru">Penerapan ekonomi hijau dan biru</option>
                                <option value="penanganan-pencemaran-air-tanah-udara">Penanganan pencemaran air, tanah, udara</option>
                                <option value="kearifan-tradisional-pengelolaan-sda">Kearifan tradisional dalam pengelolaan sumber daya alam</option>
                                <option value="keadilan-pemanfaatan-sda-lingkungan">Keadilan terhadap pemanfaatan sumber daya alam dan lingkungan</option>
                                <option value="komunikasi-pendidikan-lingkungan-hidup">Komunikasi dan Pendidikan Lingkungan Hidup</option>
                            </select>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm text-black">Jenis Kegiatan</label>
                            <input type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" />
                        </div>
                        <div>
                            <label class="block mb-2 text-sm text-black">Tahun Mulai Kegiatan</label>
                            <input type="date" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                        </div>
                        <div>
                    <label class="block mb-2 text-sm text-black">Penjelasan Kegiatan</label>
                    <textarea id="penjelasan${kegiatanCount}" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" rows="4"
                        oninput="updateWordCount(this, 'penjelasanCount${kegiatanCount}', 1000)"></textarea>
                    <p id="penjelasanCount${kegiatanCount}" class="text-xs text-slate-400 flex justify-end ">0/1000 Kata</p>
                </div>
                    </div>

                <!-- Kolom kanan -->
                <div class="space-y-4">
                        <div>
                            <label class="block mb-2 text-sm text-black">Lokasi Kegiatan</label>
                            <input type="text" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-primary hover:border-primary focus:shadow" />
                        </div>
                        <div>
                    <label class="block mb-2 text-sm text-black">Para Pihak dan Perannya</label>
                    <textarea id="pihakPeran${kegiatanCount}" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" rows="4"
                        oninput="updateWordCount(this, 'pihakPeranCount${kegiatanCount}', 1000)"></textarea>
                    <p id="pihakPeranCount${kegiatanCount}" class="text-xs text-slate-400 flex justify-end ">0/1000 Kata</p>
                </div>
                        <div>
                    <label class="block mb-2 text-sm text-black">Keberhasilan yang Dicapai</label>
                    <textarea id="keberhasilan${kegiatanCount}" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" rows="4"
                        oninput="updateWordCount(this, 'keberhasilanCount${kegiatanCount}', 1000)"></textarea>
                    <p id="keberhasilanCount${kegiatanCount}" class="text-xs text-slate-400 flex justify-end ">0/1000 Kata</p>
                </div>

                    </div>
                </div>
            </div>`;

                // Tambahkan form baru di bawah form yang sudah ada
                formContainer.insertAdjacentHTML('beforeend', newForm);

                // Jika sudah mencapai batas, sembunyikan tombol tambah
                if (kegiatanCount === maxKegiatan) {
                    document.getElementById('tambahKegiatanBtn').style.display = 'none';
                }
            }
        }
    </script>

    <?= $this->endSection() ?>
</body>

</html>