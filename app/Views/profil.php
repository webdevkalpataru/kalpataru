<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body class="bg-site">
    <?= $this->extend('template/navbarfooter') ?>

    <?= $this->section('content') ?>

    <!-- Hero Section -->
    <section id="profil" class="w-full h-[25rem] relative">
        <img src="/images/hero.png" alt="profil" class="w-full h-full object-cover object-center md:object-center">

        <div class="absolute inset-0 flex flex-col justify-center items-center text-white text-center">
            <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold">Profil</h1>
            <p class="text-sm sm:text-base md:text-lg mt-2 sm:mt-4 w-2/3">Penghargaan tertinggi untuk pelestari lingkungan di Indonesia, mendedikasikan apresiasi bagi mereka yang berperan dalam menjaga keberlanjutan alam dan masa depan bumi kita</p>
        </div>
    </section>

    <!-- Quote Section -->
    <section id="quotes" class="lg:px-0 px-4 py-8 lg:py-12 container mx-auto">
        <div class="w-full flex flex-col lg:flex-row items-center justify-between">
            <div class="w-full lg:w-1/2 lg:pr-10">
                <p class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-medium text-black">
                    Pembangunan dan pelestarian lingkungan hidup tidak harus saling bertentangan, keduanya bisa berjalan seiring demi kelanggengan sumber daya alam.
                    <br><br>
                    <span class="text-sm">Presiden Soeharto (1978)</span>
                </p>
            </div>
            <figure class="w-full lg:w-1/2 lg:pl-10 mt-8 lg:mt-0">
                <img src="/images/Pres.png" alt="quotes" class="w-full h-auto rounded-md shadow-lg mx-auto lg:ml-auto">
            </figure>
        </div>
    </section>

    <!-- Sejarah Section -->
    <section id="sejarah" class="lg:my-12 md:my-8 my-4 px-4 sm:px-10 md:px-16 lg:px-20">
        <div class="text-center mb-6 lg:mb-0">
            <h2 class="text-lg sm:text-xl md:text-2xl lg:text-4xl font-medium text-black">Sejarah Penghargaan Kalpataru</h2>
            <hr class="border-2 border-primary w-40 mx-auto mt-2">
        </div>
        <div class="text-sm md:text-base lg:text-lg leading-relaxed lg:mx-14 mx-0">
            <p>Salah satu strategi Kementerian PPLH di bawah pimpinan Prof. Emil Salim untuk meningkatkan partisipasi masyarakat dalam pelestarian lingkungan adalah melalui pemberian Hadiah Lingkungan setiap tahun pada peringatan Hari Lingkungan Hidup Sedunia. Pada 5 Juni 1980, Hadiah Lingkungan pertama kali diberikan kepada delapan organisasi dan kelompok masyarakat, termasuk LP3ES Jakarta, Pondok Pesantren Cipasung Tasikmalaya, Badan Sosial Maumere, dan Masyarakat Desa Wonolelo.
                <br><br>
                Perubahan nama "Hadiah Lingkungan" menjadi "Kalpataru" terjadi pada tahun 1981. Nama ini ditemukan oleh Bapak Markoes Djajadiningrat, seorang Sarjana Seni Rupa dari ITB, saat ia mendesain prangko seri lingkungan hidup. Beliau menemukan relief "Pohon Kehidupan" yang dikelilingi uang dan batu permata di Candi Mendut. Pohon ini dikenal dengan berbagai nama, seperti Kalpawreksa (aksara Dewanagari), Kalpavṛkṣa (IAST), Kalpataru, Kalpadruma, dan Kalpapāda. Istilah Kalpataru banyak disinggung dalam kesusasteraan India awal, seperti Kitab Purana, Ramayana, Buvanakosa, Vayupurana, Meghaduta, dan Bhanabat. Selain itu, beliau juga yang mendesain Trofi Kalpataru.
            </p>
        </div>
    </section>

    <!-- Prinsip Kalpataru Section -->
    <section id="tujuankalpataru" class="bg-primary py-8">
        <div class="text-center text-white">
            <h2 class="text-lg sm:text-xl md:text-2xl lg:text-4xl font-bold">Prinsip Kalpataru</h2>
            <hr class="border-2 border-white w-16 mx-auto mt-2">
        </div>

        <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 px-4 py-8 lg:mx-28 mx-0">
            <!-- Card 1 -->
            <div class="bg-white shadow-md rounded-lg p-4 text-center">
                <img src="/images/keterbukaan.png" alt="Keterbukaan" class="w-10 mx-auto mb-2">
                <h5 class="text-xl font-semibold text-gray-800">Prinsip Keterbukaan</h5>
                <p class="text-gray-600 text-sm">Mengutamakan sikap jujur, rendah hati, adil, serta mau menerima pendapat dan kritik</p>
            </div>

            <div class="bg-white shadow-md rounded-lg p-4 text-center">
                <img src="/images/partisipatif.png" alt="partisipatif" class="w-10 mx-auto mb-2">
                <h5 class="text-xl font-semibold text-gray-800">Prinsip Partisipatif</h5>
                <p class="text-gray-600 text-sm">Adanya keterlibatan aktif masyarakat terhadap pencapaian tujuan</p>
            </div>

            <div class="bg-white shadow-md rounded-lg p-4 text-center">
                <img src="/images/keteladanan.png" alt="keteladanan" class="w-10 mx-auto mb-2">
                <h5 class="text-xl font-semibold text-gray-800">Prinsip Keteladanan</h5>
                <p class="text-gray-600 text-sm">Mengutamakan perilaku yang terpuji dan disenangi dan sesuai dengan nilai-nilai kebaikan dan kebenaran, serta keteladanan terhadap peduli lingkungan</p>
            </div>

            <div class="bg-white shadow-md rounded-lg p-4 text-center">
                <img src="/images/edukatif.png" alt="edukatif" class="w-10 mx-auto mb-2">
                <h5 class="text-xl font-semibold text-gray-800">Prinsip Edukatif</h5>
                <p class="text-gray-600 text-sm">Membangun hubungan atau interaksi di dalam
                    masyarakat yang memuat unsur pembelajaran dan pengajaran</p>
            </div>

            <div class="bg-white shadow-md rounded-lg p-4 text-center">
                <img src="/images/akuntabel.png" alt="akuntabel" class="w-10 mx-auto mb-2">
                <h5 class="text-xl font-semibold text-gray-800">Prinsip Akuntabel</h5>
                <p class="text-gray-600 text-sm">Menjamin setiap tahap kegiatan
                    pemberian Penghargaan Kalpataru dapat dipertanggungjawabkan sesuai ketentuan peraturan perundang-undangan</p>
            </div>

            <div class="bg-white shadow-md rounded-lg p-4 text-center">
                <img src="/images/kesetaraan.png" alt="kesetaraan" class="w-10 mx-auto mb-2">
                <h5 class="text-xl font-semibold text-gray-800">Prinsip Kesetaraan</h5>
                <p class="text-gray-600 text-sm">Menjamin bahwa Penghargaan Kalpataru memberikan kesempatan yang sama kepada perempuan dan laki-laki, serta kegiatan yang melibatkan peran aktif , dan dampak terhadap perempuan</p>
            </div>


        </div>
    </section>

    <!-- Kategori Section -->
    <section id="kategori" class="py-8 lg:mx-14 mx-0">
        <div class="text-center mb-4 px-4">
            <h2 class="text-lg sm:text-xl md:text-2xl lg:text-4xl font-medium text-black">Kategori Penghargaan</h2>
            <hr class="border-2 border-primary w-16 mx-auto mt-2">
            <p class="text-sm mt-12 lg:mx-32 mx-0">Dalam pelaksanaannya penghargaan Kalpataru tergabi menjadi 4 kategori utama. Di
                mana setiap kategori memiliki definisi masing-masing dalam menjaga serta melertarikan lingkungan dan kehutanan di Indonesia</p>
        </div>

        <!-- Perintis Lingkungan -->
        <div class="flex flex-col lg:flex-row items-center lg:items-start px-4 lg:px-24 my-12">
            <img src="/images/kategoria.jpg" alt="Perintis Lingkungan" class="w-40 lg:w-56 h-auto rounded-lg mb-4 lg:mb-0 lg:mr-6 mx-auto lg:mx-0">
            <div class="text-center lg:text-left">
                <h3 class="text-xl font-medium mb-2"><b>Perintis</b> Lingkungan</h3>
                <hr class="border-2 border-primary w-40 mt-1 mb-4 mx-auto lg:mx-0">
                <p class="text-sm leading-relaxed mb-4">Perintis Lingkungan adalah individu bukan pegawai negeri atau bukan pejabat negara yang
                    mempelopori upaya luar biasa bagi
                    perlindungan dan pengelolaan lingkungan hidup dan
                    kehutanan, dan merupakan kegiatan baru di wilayah/kawasan tertentu
                    dan/atau berhasil
                    mengembangkan teknologi lokal yang ramah lingkungan. Lebih lanjut, mereka berperan penting
                    dalam
                    menginspirasi masyarakat sekitar untuk melakukan kegiatan yang mendukung pelestarian
                    lingkungan secara terus menerus.
                </p>
                <button class="bg-primary text-white px-4 py-2 mb-6 lg:mb-0 rounded-md hover:bg-primaryhover">Lihat Daftar Penerima</button>
            </div>
        </div>

        <!-- Pengabdi Lingkungan (Reversed) -->
        <div class="flex flex-col lg:flex-row-reverse items-center lg:items-start px-4 lg:px-24 my-12">
            <img src="/images/kategorib.jpg" alt="Pengabdi Lingkungan" class="w-40 lg:w-56 h-auto rounded-lg mb-4 lg:mb-0 lg:ml-6 mx-auto lg:mx-0">
            <div class="text-center lg:text-left">
                <h3 class="text-xl font-medium mb-2"><b>Pengabdi</b> Lingkungan</h3>
                <hr class="border-2 border-primary w-40 mt-1 mb-4 mx-auto lg:mx-0">
                <p class="text-sm leading-relaxed mb-4"> Pengabdi Lingkungan adalah individu baik petugas lapangan dan/atau pegawai negeri atau
                    Aparatur Sipil Negara yang mendedikasikan hidupnya dalam upaya perlindungan dan
                    pengelolaan lingkungan hidup dan kehutanan yang melampaui kewajiban dan tugas pokok
                    profesi dalam jangka waktu lama secara berurutan</p>
                <button class="bg-primary text-white px-4 py-2 mb-6 lg:mb-0 rounded-md hover:bg-primaryhover">Lihat Daftar Penerima</button>
            </div>
        </div>

        <!-- Penyelamat Lingkungan -->
        <div class="flex flex-col lg:flex-row items-center lg:items-start px-4 lg:px-24 my-12">
            <img src="/images/kategoric.jpg" alt="Penyelamat Lingkungan" class="w-40 lg:w-56 h-auto rounded-lg mb-4 lg:mb-0 lg:mr-6 mx-auto lg:mx-0">
            <div class="text-center lg:text-left">
                <h3 class="text-xl font-medium mb-2"><b>Penyelamat</b> Lingkungan</h3>
                <hr class="border-2 border-primary w-40 mt-1 mb-4 mx-auto lg:mx-0">
                <p class="text-sm leading-relaxed mb-4"> Penyelamat Lingkungan adalah kelompok orang dan/atau lembaga yang menjaga dan/atau
                    memperbaiki penyelamatan fungsi dan tatanan lingkungan hidup atas dasar prakarsa
                    kelompok.</p>
                <button class="bg-primary text-white px-4 py-2 mb-6 lg:mb-0 rounded-md hover:bg-primaryhover">Lihat Daftar Penerima</button>
            </div>
        </div>

        <!-- Pembina Lingkungan (Reversed) -->
        <div class="flex flex-col lg:flex-row-reverse items-center lg:items-start px-4 lg:px-24 my-12">
            <img src="/images/kategorid.jpg" alt="Pembina Lingkungan" class="w-40 lg:w-56 h-auto rounded-lg mb-4 lg:mb-0 lg:ml-6 mx-auto lg:mx-0">
            <div class="text-center lg:text-left">
                <h3 class="text-xl font-medium mb-2"><b>Pembina</b> Lingkungan</h3>
                <hr class="border-2 border-primary w-40 mt-1 mb-4 mx-auto lg:mx-0">
                <p class="text-sm leading-relaxed mb-4"> Pembina Lingkungan adalah individu/tokoh masyarakat bukan pejabat pemerintah yang
                    melakukan pembinaan untuk membangkitkan kesadaran, prakarsa, dan peran masyarakat
                    guna melestarikan fungsi dan tatanan lingkungan hidup dan/atau berhasil
                    mengimplementasikan temuan teknologi baru yang ramah lingkungan.</p>
                <button class="bg-primary text-white px-4 py-2 mb-6 lg:mb-0 rounded-md hover:bg-primaryhover">Lihat Daftar Penerima</button>
            </div>
        </div>

    </section>


    <?= $this->endSection() ?>

</body>

</html>