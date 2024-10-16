<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/app.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title><?= $title; ?></title>
</head>

<body class="lg:flex">



  <!-- Sidebar -->
  <?= $this->include('template/sidebaradmin') ?>
  <div class="lg:flex-1 p-6">

  <div class="container mx-auto flex items-center justify-between p-4 md:p-6">
          <h1 class="text-xl md:text-2xl font-semibold text-gray-700">Artikel Pengguna</h1>
          <div class="flex items-center">
            <p class="text-gray-500 mr-2 md:mr-4">Hello, Admin</p>
            <button class="bg-rejected text-white px-3 py-2 md:px-4 md:py-2 rounded-lg">Keluar</button>
          </div>
        </div>


        <div class="relative flex flex-col w-full max-w-2xl mx-auto mb-4 rounded-xl border-2 border-primary bg-white shadow-md lg:p-8">
            <h4 class="block text-xl font-bold text-slate-800 mb-2">
                Joko Susilo
            </h4>

            <div class="relative flex items-center justify-center h-full overflow-hidden text-white rounded-md">
                <img src="/images/hero.png" class="object-contain w-full h-full">
            </div>

            <div>
                <div class="my-4">
                    <h6 class="text-slate-800 text-md font-semibold">
                        Surga Tersembunyi di Maros
                    </h6>
                    <h3 class="text-sm">
                        7 Oktober 2024
                    </h3>
                </div>
                <p class="text-slate-600 leading-normal font-light text-justify mt-4">
                    Biru jumantara Sulawesi menaungi kemegahan dan damainya Kampung Rammang Rammang membuat siapapun takjub. Goa-goa gunung karst terbesar kedua di dunia ini menyimpan goresan, simbol, lukisan peradaban awal di bumi Celebes. Gugusan ekosistem alami gunung kapur yang terbentuk sejak 30 juta tahun lalu beserta catatan sejarah penting di dalamnya ini sedang dilindungi sekuat tenaga oleh masyarakat.
                    <br><br>
                    Aksi advokasi dan kolaborasi dengan stakeholder adalah keniscayaan. Sejak September 2022, kawasan ini masuk ke dalam lokasi Perhutanan Sosial. Sebuah usaha untuk memperkuat upaya perlindungan peradaban dan lingkungan yang dilakukan masyarakat. Kawasan ini pun menjadi surga bagi kita penikmatnya dan masyarakat Salenrang, Maros pemiliknya. Lewat advokasi dan perjuangan untuk mempertahankan Gunung Karst, M. Ikhwan menerima Penghargaan Kalpataru kategori perintis lingkungan tahun 2023.
                    <br><br>
                    Lokasi: Desa Salenrang, Kabupaten Maros, Sulawesi Selatan
                </p>
            </div>
            <div class="flex space-x-4">
    <div class="mt-4">
        <button id="tambahArtikel" class="w-48 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button"> 
            <i class="fas fa-plus"></i> Terbitkan Artikel
        </button>
    </div>
    <a>
    <div class="mt-4">
        <button id="editartikel" class="w-48 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button"> 
            <i class="fas fa-edit"></i> Edit Artikel
        </button>
    </div>
    </a>
    <div class="mt-4">
        <button id="tolakartikel" class="w-48 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-rejected hover:bg-rejectedhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button"> 
            <i class="fas fa-times"></i> Tolak Artikel
        </button>
    </div>
</div>
        </div> 
</body>
</html>      