<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/app.css">
    <title>Penghargaan Kalpataru</title>
</head>

    <body class="bg-site">
    <?= $this->extend('template/navbarfooter') ?>

        <?= $this->section('content') ?>
        <section id="herosection" class="w-full h-[10rem] sm:h-[20rem] md:h-[10rem] lg:h-[20rem] relative">
        <img src="/images/hero.png" alt="herosection" class="w-full h-full object-cover object-right md:object-center">

        <div class="absolute top-2/4 left-1/2 transform -translate-x-1/2 -translate-y-2/4 w-[90%] sm:w-[70%] md:w-[60%] lg:mid-[26%] lg:w-[36%] text-white">
            <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-center">Profil</h1>
        </div>

        <div class="text-sm sm:text-base absolute top-2/4 left-1/2 transform -translate-x-1/2 -translate-y-[60%] mt-8 text-white text-center">
            <p>Penghargaan tertinggi untuk pelestari lingkungan di Indonesia, mendedikasikan apresiasi bagi mereka yang berperan dalam menjaga keberlanjutan alam dan masa depan bumi kita.</p>
        </div>
        
    </section>


    
    <section id="quotes">
    <div class="w-full flex flex-col lg:flex-row items-center justify-between px-6 sm:px-10 md:px-16 lg:px-20 py-12">
        <div class="w-full lg:w-1/2 lg:pr-10">
            <p class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-medium text-black ml-12">
                Pembangunan dan pelestarian lingkungan hidup tidak harus saling bertentangan, keduanya bisa berjalan seiring demi kelanggengan sumber daya alam.
                <br>
                <br>
                <span class="text-sm">Presiden Soeharto (1978)</span>
            </p>
        </div>
        <figure class="w-full lg:w-1/2 lg:pl-10 mt-12 lg:mt-0">
            <img src="/images/Pres.png" alt="quotes" class="w-[300px] h-auto rounded-md shadow-lg ml-auto">
        </figure>
    </div>
    </section>

    <section id="sejarah">
    <div class="lg:my-12 md:my-8 my-4">
        <div id="sejarah" class="w-full h-[4rem] sm:h-[5rem] relative flex items-center justify-center">
            <h2 class="text-lg sm:text-xl md:text-2xl lg:text-4xl font-medium text-black">Sejarah Penghargaan Kalpataru</h2>
        </div>
        <hr class="border-2 border-primary max-w-40 mx-auto mt-0" />
    </div>

    <div class="w-full flex flex-col lg:flex-row items-center justify-between px-6 sm:px-10 md:px-16 lg:px-20 py-8"> 
            <p class="text-xl"> 
                Salah satu strategi Kementerian PPLH di bawah pimpinan Prof. Emil Salim untuk meningkatkan partisipasi masyarakat dalam pelestarian lingkungan adalah melalui pemberian Hadiah Lingkungan setiap tahun pada peringatan Hari Lingkungan Hidup Sedunia. Pada 5 Juni 1980, Hadiah Lingkungan pertama kali diberikan kepada delapan organisasi dan kelompok masyarakat, termasuk LP3ES Jakarta, Pondok Pesantren Cipasung Tasikmalaya, Badan Sosial Maumere, dan Masyarakat Desa Wonolelo.
                <br><br>
                Perubahan nama "Hadiah Lingkungan" menjadi "Kalpataru" terjadi pada tahun 1981. Nama ini ditemukan oleh Bapak Markoes Djajadiningrat, seorang Sarjana Seni Rupa dari ITB, saat ia mendesain prangko seri lingkungan hidup. Beliau menemukan relief "Pohon Kehidupan" yang dikelilingi uang dan batu permata di Candi Mendut. Pohon ini dikenal dengan berbagai nama, seperti Kalpawreksa (aksara Dewanagari), Kalpavṛkṣa (IAST), Kalpataru, Kalpadruma, dan Kalpapāda. Istilah Kalpataru banyak disinggung dalam kesusasteraan India awal, seperti Kitab Purana, Ramayana, Buvanakosa, Vayupurana, Meghaduta, dan Bhanabat. Selain itu, beliau juga yang mendesain Trofi Kalpataru.
            </p>  
    </div>
    </section>

    <section id="tujuankalpataru" class="bg-primary">
        <div class="lg:my-12 md:my-8 my-4 pt-10 text-center">
            <div id="texttujuankalpataru" class="w-full h-[4rem] sm:h-[5rem] relative flex items-center justify-center">
                <h2 class="text-lg sm:text-xl md:text-2xl lg:text-4xl font-bold text-white">Prinsip Kalpataru</h2>
            </div>
            <hr class="border-2 border-white max-w-40 mx-auto mt-0" />
        </div>

        <div class="px-4 sm:px-10 md:px-16 lg:px-20 text-center">
            <div class="grid gap-4 grid-cols-1 sm:grid-cols-1 lg:grid-cols-2 mt-6 py-10 justify-center">
                <!-- Card 1 -->
                <div class="bg-white shadow-sm border border-slate-200 rounded-lg w-4/5 mx-auto">
                    <div class="p-4">
                        <img src="/images/keterbukaan.png" alt="tujuan1" class="w-10 mx-auto pb-2">
                        <h5 class="mb-2 text-slate-800 text-xl font-semibold">Prinsip Keterbukaan</h5>
                        <p class="text-slate-600 leading-normal font-light">
                        Mengutamakan sikap jujur, rendah hati, adil, serta mau menerima pendapat dan kritik
                        </p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white shadow-sm border border-slate-200 rounded-lg w-4/5 mx-auto">
                    <div class="p-4">
                        <img src="/images/partisipatif.png" alt="tujuan2" class="w-10 mx-auto pb-2">
                        <h5 class="mb-2 text-slate-800 text-xl font-semibold">Prinsip Partisipatif</h5>
                        <p class="text-slate-600 leading-normal font-light">
                        Adanya keterlibatan aktif masyarakat terhadap pencapaian tujuan
                        </p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white shadow-sm border border-slate-200 rounded-lg w-4/5 mx-auto">
                    <div class="p-4">
                        <img src="/images/keteladanan.png" alt="tujuan1" class="w-10 mx-auto pb-2">
                        <h5 class="mb-2 text-slate-800 text-xl font-semibold">Prinsip Keteladanan</h5>
                        <p class="text-slate-600 leading-normal font-light">
                        Mengutamakan perilaku yang terpuji dan disenangi dan sesuai dengan nilai-nilai kebaikan dan kebenaran, serta keteladanan terhadap peduli lingkungan
                        </p>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="bg-white shadow-sm border border-slate-200 rounded-lg w-4/5 mx-auto">
                    <div class="p-4">
                        <img src="/images/edukatif.png" alt="tujuan2" class="w-10 mx-auto pb-2">
                        <h5 class="mb-2 text-slate-800 text-xl font-semibold">Prinsip Edukatif</h5>
                        <p class="text-slate-600 leading-normal font-light">
                        Membangun hubungan atau interaksi di dalam
                        masyarakat yang memuat unsur pembelajaran dan pengajaran
                        </p>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="bg-white shadow-sm border border-slate-200 rounded-lg w-4/5 mx-auto">
                    <div class="p-4">
                        <img src="/images/akuntabel.png" alt="tujuan3" class="w-10 mx-auto pb-2">
                        <h5 class="mb-2 text-slate-800 text-xl font-semibold">Prinsip Akuntabel</h5>
                        <p class="text-slate-600 leading-normal font-light">
                        Menjamin setiap tahap kegiatan
                        pemberian Penghargaan Kalpataru dapat dipertanggungjawabkan sesuai ketentuan peraturan perundang-undangan,
                        </p>
                    </div>
                </div>

                <!-- Card 6 -->
                <div class="bg-white shadow-sm border border-slate-200 rounded-lg w-4/5 mx-auto">
                    <div class="p-4">
                        <img src="/images/kesetaraan.png" alt="tujuan4" class="w-10 mx-auto pb-2">
                        <h5 class="mb-2 text-slate-800 text-xl font-semibold">Prinsip Kesetaraan Gender</h5>
                        <p class="text-slate-600 leading-normal font-light">
                        Menjamin bahwa Penghargaan Kalpataru memberikan kesempatan yang sama kepada perempuan dan laki-laki, serta kegiatan yang melibatkan peran aktif , dan dampak terhadap perempuan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <section id="kategori">
   <div class="lg:my-12 md:my-8 my-4">
    <div id="kategori" class="w-full h-auto sm:h-auto flex flex-col items-center justify-center">
        <h2 class="text-lg sm:text-xl md:text-2xl lg:text-4xl font-medium text-black py-4">Kategori Penghargaan</h2>
    </div>
    <hr class="border-2 border-primary max-w-40 mx-auto mt-0" />
    <p class="text-center text-black-500 mt-2 py-4">Dalam pelaksanaannya penghargaan Kalpataru tergabi menjadi 4 kategori utama. Di
        <br>
        mana setiap kategori memiliki definisi masing-masing dalam menjaga serta melertarikan lingkungan dan kehutanan di Indonesia</p>
    </div>



    <section id="kategori">
    <style>
    .custom-text {
        margin-top: 150px; 
    }
</style>
    <div class="max-w-6xl ml-4 pb-14">
        <h1 class="text-2xl font-medium text-left mb-2 ml-12"><b>Perintis</b> Lingkungan</h1>
        <hr class="border-2 border-primary w-32 ml-0 mt-0 ml-12" />
        
        <div class="flex items-start mt-4">
            <img src="/images/perintis.png" class="py-2 max-w-[120px] h-auto ml-12 mr-6">
            <div class="text-justify-center custom-text ml-12"> 
                <p>
                    Perintis Lingkungan adalah individu bukan pegawai negeri atau bukan pejabat negara yang
                    mempelopori upaya luar biasa bagi 
                    <br>perlindungan dan pengelolaan lingkungan hidup dan
                    kehutanan, dan merupakan kegiatan baru di wilayah/kawasan tertentu 
                    <br>dan/atau berhasil
                    mengembangkan teknologi lokal yang ramah lingkungan. Lebih lanjut, mereka berperan penting
                    dalam 
                    <br>menginspirasi masyarakat sekitar untuk melakukan kegiatan yang mendukung pelestarian
                    lingkungan secara terus menerus.
                    <br>
                    <button class="transform rounded-md bg-primary py-2 px-4 sm:py-3 sm:px-6 text-center text-xs sm:text-sm md:text-base lg:text-base text-white transition-all shadow-md hover:font-bold hover:shadow-lg focus:bg-site focus:shadow-none active:bg-site hover:bg-site active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                    Lihat Daftar Penerima >
                    </button>
                </p>
            </div>
         </div>

         <div class="max-w-6xl mr-4 pb-2 flex justify-end"> 
    <div class="text-left"> 
        <h1 class="text-2xl font-medium mb-2"><b>Pengabdi</b> Lingkungan</h1>
        <hr class="border-2 border-primary w-32 mt-0 justify-end" />
    </div>
</div>

<div class="flex items-start mt-4 justify-end"> 
    <div class="text-justify-center custom-text ml-12 px-2">
        <p>
        Pengabdi Lingkungan adalah individu baik petugas lapangan dan/atau pegawai negeri atau
        Aparatur Sipil Negara yang mendedikasikan hidupnya dalam upaya perlindungan dan
        pengelolaan lingkungan hidup dan kehutanan yang melampaui kewajiban dan tugas pokok
        profesi dalam jangka waktu lama secara berurutan
        <br>
            <button class="transform rounded-md bg-primary py-2 px-4 sm:py-3 sm:px-6 text-center text-xs sm:text-sm md:text-base lg:text-base text-white transition-all shadow-md hover:font-bold hover:shadow-lg focus:bg-site focus:shadow-none active:bg-site hover:bg-site active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
            Lihat Daftar Penerima >
            </button>
        </p>
    </div>
    <img src="/images/pengabdi.png" class="py-2 mr-4 max-w-[120px] h-auto ml-6"> 
</div>

<div class="max-w-6xl ml-4 pb-14">
        <h1 class="text-2xl font-medium text-left mb-2 ml-12"><b>Penyelamat</b> Lingkungan</h1>
        <hr class="border-2 border-primary w-32 ml-0 mt-0 ml-12" />
        
        <div class="flex items-start mt-4">
            <img src="/images/penyelamat.png" class="py-2 max-w-[120px] h-auto ml-12 mr-6">
            <div class="text-justify-center custom-text ml-12"> 
                <p>
                Penyelamat Lingkungan adalah kelompok orang dan/atau lembaga yang menjaga dan/atau
                memperbaiki penyelamatan fungsi dan tatanan lingkungan hidup atas dasar prakarsa
                kelompok.
                <br>
                    <button class="transform rounded-md bg-primary py-2 px-4 sm:py-3 sm:px-6 text-center text-xs sm:text-sm md:text-base lg:text-base text-white transition-all shadow-md hover:font-bold hover:shadow-lg focus:bg-site focus:shadow-none active:bg-site hover:bg-site active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                    Lihat Daftar Penerima >
                    </button>
                </p>
            </div>
         </div>

         <div class="max-w-6xl mr-4 pb-2 flex justify-end"> 
    <div class="text-left"> 
        <h1 class="text-2xl font-medium mb-2"><b>Pembina</b> Lingkungan</h1>
        <hr class="border-2 border-primary w-32 mt-0 justify-end" />
    </div>
</div>

<div class="flex items-start mt-4 justify-end"> 
    <div class="text-justify-center custom-text ml-12 px-2">
        <p>
        Pembina Lingkungan adalah individu/tokoh masyarakat bukan pejabat pemerintah yang
        melakukan pembinaan untuk membangkitkan kesadaran, prakarsa, dan peran masyarakat
        guna melestarikan fungsi dan tatanan lingkungan hidup dan/atau berhasil
        mengimplementasikan temuan teknologi baru yang ramah lingkungan.
            <br>
            <button class="transform rounded-md bg-primary py-2 px-4 sm:py-3 sm:px-6 text-center text-xs sm:text-sm md:text-base lg:text-base text-white transition-all shadow-md hover:font-bold hover:shadow-lg focus:bg-site focus:shadow-none active:bg-site hover:bg-site active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
            Lihat Daftar Penerima >
            </button>
        </p>
    </div>
    <img src="/images/pembina.png" class="py-2 mr-4 max-w-[120px] h-auto ml-2"> 
</div>
 
</section>

    <?= $this->endSection() ?>

</body>
</html>