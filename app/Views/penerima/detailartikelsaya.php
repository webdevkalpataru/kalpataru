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
        <?= $this->include('template/sidebarpenerima') ?>

        <div class="relative flex flex-col w-full max-w-5xl mb-4 rounded-xl border-2 border-primary bg-white shadow-md lg:p-8 p-4">
            <h4 class="block text-xl font-bold text-slate-800 mb-2">
                Detail Artikel Saya
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
        </div>

    </div>

    <?= $this->endSection() ?>
</body>

</html>