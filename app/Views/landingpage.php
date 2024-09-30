<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/app.css">
    <title>Penghargaan Kalpataru</title>
</head>

<body class="bg-site">
    <?= $this->include('template/scroll'); ?>
    <?= $this->include('template/navbar'); ?>

    <section id="herosection" class="w-full h-[20rem] sm:h-[30rem] md:h-[34rem] lg:h-[36rem] relative">
        <img src="/images/herosection.png" alt="herosection" class="w-full h-full object-cover object-right md:object-center">

        <div class="absolute top-2/4 left-1/2 transform -translate-x-1/2 -translate-y-2/4 w-[90%] sm:w-[70%] md:w-[60%] lg:left-[28%] lg:w-[36%] text-white text-left">
            <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold">Menyelamatkan Alam, Mewarisi Kehidupan</h1>
            <p class="text-sm sm:text-base md:text-lg mt-2 sm:mt-4">Penghargaan nasional untuk individu dan kelompok yang berkontribusi dalam pelestarian lingkungan hidup</p>
        </div>

        <button class="absolute bottom-[18%] left-[20%] sm:left-[20%] lg:left-[17%] transform -translate-x-1/2 rounded-md bg-white py-2 px-4 sm:py-3 sm:px-6 text-center text-xs sm:text-sm md:text-base lg:text-base text-black transition-all shadow-md hover:font-bold hover:shadow-lg focus:bg-site focus:shadow-none active:bg-site hover:bg-site active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
            Daftar Sekarang
        </button>
    </section>

    <section id="tentangkalpataru">
        <div class="lg:my-12 md:my-8 my-4">
            <div id="texttentangkalpataru" class="w-full h-[4rem] sm:h-[5rem] relative flex items-center justify-center">
                <h2 class="text-lg sm:text-xl md:text-2xl lg:text-4xl font-medium text-black">Tentang Kalpataru</h2>
            </div>
            <hr class="border-2 border-primary max-w-40 mx-auto mt-0" />
        </div>

        <div class="w-full flex flex-col lg:flex-row items-center justify-between px-6 sm:px-10 md:px-16 lg:px-20 py-12">
            <div class="w-full lg:w-1/2 lg:pr-10">
                <h3 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-medium text-black">Penghargaan Tertinggi untuk Pelestari Lingkungan</h3>
                <br />
                <p class="text-sm sm:text-base md:text-lg">
                    Kalpataru adalah penghargaan yang diberikan kepada perorangan atau kelompok atas jasanya dalam melestarikan lingkungan hidup di Indonesia. Kalpataru sendiri adalah bahasa Sanskerta yang berarti pohon kehidupan (Kalpavriksha)
                    <br /><br />
                    Penghargaan Kalpataru merupakan penghargaan tertinggi dari pemerintah Indonesia yang diberikan kepada individu, kelompok, dan lembaga yang telah menunjukkan dedikasi dan prakarsa dalam menjaga dan melestarikan lingkungan hidup.
                </p>
            </div>

            <figure class="w-full lg:w-1/2 lg:pl-10 mt-8 lg:mt-0">
                <img src="/images/tentangkalpataru.png" alt="tentangkalpataru" class="w-full h-auto rounded-md shadow-lg">
                <figcaption class="text-sm italic text-center">Penyerahan penghargaan oleh Presiden Joko Widodo kepada N. Akelaras</figcaption>
            </figure>
        </div>
    </section>

    <section id="kategoripenghargaan">
        <div class="lg:my-12 md:my-8 my-4 lg:mx-20 md:mx-10 mx-7">
            <div id="texttentangkalpataru" class="w-full h-[4rem] sm:h-[5rem] relative flex items-center justify-start">
                <h2 class="text-lg sm:text-xl md:text-2xl lg:text-4xl font-medium text-black">kategori Penghargaan Kalpataru</h2>
            </div>
            <hr class="border-2 border-primary max-w-40 mt-0" />
        </div>

        <<div class="w-full flex flex-col lg:flex-row items-center justify-c px-6 sm:px-10 md:px-16 lg:px-20 py-12">  
        <div class="w-full lg:w-1/2 lg:pr-10 flex justify-between">
            <img src="/images/kategoria.png" alt="kategoria" class="w-1/4 h-auto rounded-md shadow-lg">
            <img src="/images/kategorib.png" alt="kategorib" class="w-1/4 h-auto rounded-md shadow-lg">
            <img src="/images/kategoric.png" alt="kategoric" class="w-1/4 h-auto rounded-md shadow-lg">
            <img src="/images/kategorid.png" alt="kategorid" class="w-1/4 h-auto rounded-md shadow-lg">
        </div>
    </div>
    </section>


    <?= $this->include('template/footer'); ?>
</body>

</html>