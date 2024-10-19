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
                Pemberitahuan
            </h4>
            <div class="relative flex flex-col w-full h-[28rem] bg-white overflow-y-auto text-gray-700 shadow-md rounded-lg mt-4">
            <table class="w-full text-left table-auto min-w-max h-screen">
            <tbody>
                <?php if (!empty($pendaftaran)): ?>
                    <?php foreach ($pendaftaran as $item): ?>
                        <tr class="hover:bg-slate-100">
                            <td class="p-4 border-b border-slate-200">
                                <img src="/images/penghargaankalpatarucircle.png" alt="penghargaankalpatarucircle" class="w-8 h-8 rounded-full ms-8">
                            </td>
                            <td class="p-4 border-b border-slate-200">
                                <p class="text-sm text-slate-800 text-start">
                                    <?php if ($pengusul['role_akun'] == 'Pengusul'): ?>
                                        Terimakasih, <b><?= $item['nama']; ?></b> telah mendaftar pada provinsi <b><?= $item['provinsi']; ?></b>.
                                    <?php else: ?>
                                        Selamat! Ada calon usulan baru atas nama <b><?= $item['nama']; ?></b> di provinsi <b><?= $item['provinsi']; ?></b>.
                                    <?php endif; ?>
                                </p>
                                <p class="text-xs"><?= date('d F Y', strtotime($item['tanggal_pendaftaran'])); ?></p>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2" class="p-4 border-b border-slate-200 text-center">
                            <p class="text-sm text-slate-800">
                                Tidak ada pemberitahuan
                            </p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
            </div>
        </div>
    </div>

    <?= $this->endSection() ?>
</body>

</html>