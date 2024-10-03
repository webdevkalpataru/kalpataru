<?= $this->extend('template/sidebarpengusul') ?>

<?= $this->section('content'); ?>
<main class="w-full flex-grow p-6">
    <div class="row row-cols-2 g-4">
        <form action="<?= base_url('pengusul/updateProfil') ?>" method="post" enctype="multipart/form-data">
            <div>
                <label for="jenis_instansi">Jenis Instansi:</label>
                <select name="jenis_instansi" id="jenis_instansi" required>
                    <option value="Pemerintah">Pemerintah</option>
                    <option value="Non Pemerintah">Non Pemerintah</option>
                </select>
            </div>
            <div>
                <label for="nama_instansi_pribadi">Nama Instansi/Pribadi:</label>
                <input type="text" name="nama_instansi_pribadi" id="nama_instansi_pribadi" required>
            </div>
            <div>
                <label for="telepon">Telepon:</label>
                <input type="text" name="telepon" id="telepon" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="jabatan_pekerjaan">Jabatan/Pekerjaan:</label>
                <input type="text" name="jabatan_pekerjaan" id="jabatan_pekerjaan" required>
            </div>
            <div>
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <input type="text" name="jenis_kelamin" id="jenis_kelamin" required>
            </div>
            <div>
                <label for="jalan">Nama Jalan</label>
                <input type="text" name="jalan" id="jalan" required>
            </div>
            <div>
                <label for="rt_rw">RT/RW</label>
                <input type="text" name="rt_rw" id="rt_rw" required>
            </div>
            <div>
                <label for="desa">Desa</label>
                <input type="text" name="desa" id="desa" required>
            </div>
            <div>
                <label for="kecamatan">Kecamatan</label>
                <input type="text" name="kecamatan" id="kecamatan" required>
            </div>
            <div>
                <label for="kab_kota">kab_kota</label>
                <input type="text" name="kab_kota" id="kab_kota" required>
            </div>
            <div>
                <label for="provinsi">provinsi</label>
                <input type="text" name="provinsi" id="provinsi" required>
            </div>
            <div>
                <label for="kode_pos">kode_pos</label>
                <input type="text" name="kode_pos" id="kode_pos" required>
            </div>
            <div>
                <label for="surat_pengantar">surat_pengantar</label>
                <input type="text" name="surat_pengantar" id="surat_pengantar" required>
            </div>
            <!-- Lanjutkan untuk field lainnya... -->
            <button type="submit" class="bg-primary text-white py-2 px-4 rounded">Update Profil</button>
        </form>
    </div>
</main>
<?= $this->endSection(); ?>