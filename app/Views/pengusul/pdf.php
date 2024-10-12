<?php 
$prefix = session()->get('prefix'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Usulan Penghargaan Kalpataru 2025</title>
    <link href="https://fonts.googleapis.com/css2?family=Carlito:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Carlito', sans-serif;
            font-size: 24px;
            margin: 0;
            padding: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            padding-left: 25px;
        }
        td {
            padding: 8px;
            border: 1px solid black;
            vertical-align: top;
        }
        .heading {
            font-size: 24px;
            font-weight:bold;
        }
        .label {
            width: 35%;
        }
        .separator {
            width: 5%;
            text-align: center;
        }
        .input {
            width: 60%;
        }
        .indented {
            padding-left: 50px;
        }
    </style>
</head>
<body>
    <p style="font-size: 28px; font-weight:bold; text-align:center; margin-left:75px;">FORMULIR USULAN PENGHARGAAN KALPATARU TAHUN 2025</p>

    <p class="heading">A. IDENTITAS PENGUSUL</p>
    <table>
        <tr><td class="label">Nama Lengkap</td><td class="separator">:</td><td class="input"><?= $nama; ?></td></tr>
        <tr><td class="label">Jenis Kelamin</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Instansi/Lembaga/Organisasi/Individu</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Jabatan/Pekerjaan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label" style="border-right:none;">Alamat :</td><td class="separator" style="border-left: none; border-right:none;"></td><td class="input" style="border-left: none;"></td></tr>
        <tr><td class="label indented">Jalan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label indented">RT/RW</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label indented">Desa/Kelurahan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label indented">Kecamatan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label indented">Kabupaten/Kota</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label indented">Provinsi</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label indented">Kode Pos</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Nomor HP/Telepon</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Email Aktif</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Nama Calon yang diusulkan</td><td class="separator">:</td><td class="input"></td></tr>
    </table>

    <p class="heading">B. IDENTITAS CALON</p>
    <table>
        <?php if ($prefix === 'C'): ?>
        <tr><td class="label">Nama Kelompok/Komunitas</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Tahun Berdirinya Kelompok/Komunitas</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Jumlah Anggota</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Nama Ketua</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Nomor Identitas Kependudukan (NIK) Ketua</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Tempat Lahir Ketua</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Tanggal Lahir Ketua</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Usia</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Jenis Kelamin Ketua</td><td class="separator">:</td><td class="input"></td></tr>
        <?php endif; ?>

        <?php if ($prefix !== 'C'): ?>
        <tr><td class="label">Nama Lengkap</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Nomor Identitas Kependudukan (NIK)</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Tempat Lahir</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Tanggal Lahir</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Usia</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Jenis Kelamin</td><td class="separator">:</td><td class="input"></td></tr>
        <?php endif; ?>

        <tr><td class="label" style="border-right:none;">Alamat :</td><td class="separator" style="border-left: none; border-right:none;"></td><td class="input" style="border-left: none;"></td></tr>
        <tr><td class="label indented">Jalan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label indented">RT/RW</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label indented">Desa/Kelurahan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label indented">Kecamatan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label indented">Kabupaten/Kota</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label indented">Provinsi</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label indented">Kode Pos</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Pekerjaan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Nomor HP/Telepon</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Email Aktif</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Media sosial (Instagram, Facebook, Blog, website dll), Liputan Media, Publikasi</td><td class="separator">:</td><td class="input"></td></tr>
        
        <?php if ($prefix !== 'C'): ?>
        <tr><td class="label">Pendidikan Terakhir yang ditempuh oleh Calon</td><td class="separator">:</td><td class="input"></td></tr>
        <?php endif; ?>

        <?php if ($prefix === 'C'): ?>
        <tr><td class="label">Pendidikan Terakhir yang ditempuh oleh Calon (Ketua)</td><td class="separator">:</td><td class="input"></td></tr>
        <?php endif; ?>

    </table>

    <p class="heading" style="margin-bottom: 0px;">C. KEGIATAN CALON</p>
    <p class="heading" style="margin: 0px; padding-left: 25px;">1. Kegiatan Utama yang dilakukan oleh calon</p>
    <table style="margin: 0px;">
        <tr><td class="label">Tema Kegiatan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Sub Tema Kegiatan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Jenis Kegiatan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Tahun Mulai Kegiatan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Penjelasan Kegiatan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Lokasi Kegiatan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Para Pihak dan Perannya</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Keberhasilan yang telah dicapai</td><td class="separator">:</td><td class="input"></td></tr>
    </table>

    <p class="heading" style="margin-bottom: 0px; padding-left: 25px;">2. Kegiatan Lainnya yang dilakukan oleh calon</p>
    <p class="heading" style="margin: 0px; padding-left: 50px;">a. Kegiatan Lain (1)</p>
    <table style="margin: 0px;">
        <tr><td class="label">Tema Kegiatan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Sub Tema Kegiatan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Jenis Kegiatan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Tahun Mulai Kegiatan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Penjelasan Kegiatan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Lokasi Kegiatan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Para Pihak dan Perannya</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Keberhasilan yang telah dicapai</td><td class="separator">:</td><td class="input"></td></tr>
    </table>

    <p class="heading" style="margin: 0px; padding-left: 50px;">a. Kegiatan Lain (2)</p>
    <table style="margin: 0px;">
        <tr><td class="label">Tema Kegiatan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Sub Tema Kegiatan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Jenis Kegiatan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Tahun Mulai Kegiatan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Penjelasan Kegiatan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Lokasi Kegiatan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Para Pihak dan Perannya</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Keberhasilan yang telah dicapai</td><td class="separator">:</td><td class="input"></td></tr>
    </table>

    <p class="heading">D. DAMPAK KEGIATAN</p>
    <table>
        <tr><td class="label">Dampak kegiatan terhadap lingkungan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Dampak Ekonomi</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Dampak Sosial dan Budaya</td><td class="separator">:</td><td class="input"></td></tr>
    </table>

    <p class="heading">E. PRAKARSA, MOTIVASI, INOVASI DAN KREATIFITAS (PMIK)</p>
    <table>
        <tr><td class="label">Prakarsa</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Motivasi</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Inovasi</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Kreatifitas</td><td class="separator">:</td><td class="input"></td></tr>
    </table>

    <p class="heading">F. KESWADAYAAN DAN KEBERLANJUTAN</p>
    <table>
        <tr><td class="label">Sumber Pembiayaan Kegiatan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Teknologi/Alat/Fasilitas yang digunakan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Status Lahan/Areal Kegiatan</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Kelompok/Perorangan yang meniru</td><td class="separator">:</td><td class="input"></td></tr>
    </table>

    <p class="heading">G. KEISTIMEWAAN CALON</p>
    <table>
        <tr><td class="label">Keistimewaan Calon</td><td class="separator">:</td><td class="input"></td></tr>
        <tr><td class="label">Penghargaan Relevan yang diterima Calon</td><td class="separator">:</td><td class="input"></td></tr>
    </table>

</body>
</html>