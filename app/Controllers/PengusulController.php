<?php

namespace App\Controllers;

use App\Models\PengusulModel;
use App\Models\PendaftaranModel;
use App\Models\ArtikelModel;
use Dompdf\Dompdf;
use Dompdf\Options;
// use CodeIgniter\Controller;

class PengusulController extends BaseController
{
    protected $PendaftaranModel;

    public function __construct()
    {
        $this->PendaftaranModel = new PendaftaranModel();
    }

    public function index(): string
    {
        $pengusulModel = new PengusulModel();
        $data['pengusul'] = $pengusulModel->where('id_pengusul', session()->get('id_pengusul'))->first();
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth/login')->with('authMessage', 'Harap login terlebih dahulu');
        }

        $data['title'] = 'Profil Pengusul';
        return view('pengusul/profil', $data);
    }

    public function updateProfil()
    {
        $pengusulModel = new PengusulModel();

        $id_pengusul = session()->get('id_pengusul');

        $currentSuratPengantar = session()->get('surat_pengantar');

        $file = $this->request->getFile('surat_pengantar');
        $filePath = $currentSuratPengantar;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            if ($file->getClientMimeType() == 'application/pdf') {
                $filePath = $file->store('suratpengantar', $file->getRandomName());
            } else {
                return $this->response->setJSON(['success' => false, 'errors' => 'Invalid file type. Only PDF files are allowed']);
            }
        }

        $data = [
            'jenis_instansi' => $this->request->getPost('jenis_instansi'),
            'nama_instansi_pribadi' => $this->request->getPost('nama'),
            'provinsi' => $this->request->getPost('provinsi'),
            'telepon' => $this->request->getPost('telepon'),
            'email' => $this->request->getPost('email'),
            'jabatan_pekerjaan' => $this->request->getPost('jabatan_pekerjaan'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'jalan' => $this->request->getPost('jalan'),
            'rt_rw' => $this->request->getPost('rt_rw'),
            'desa' => $this->request->getPost('desa'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'kab_kota' => $this->request->getPost('kab_kota'),
            'kode_pos' => $this->request->getPost('kode_pos'),
            'surat_pengantar' => $filePath
        ];

        if ($pengusulModel->update($id_pengusul, $data)) {
            session()->set($data);

            return $this->response->setJSON(['success' => true, 'message' => 'Profil berhasil diperbarui.']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui profil.']);
        }
    }

    public function tambahcalon()
    {
        $id_pengusul = session()->get('id_pengusul');

        if (!$id_pengusul) {
            return redirect()->to('/login');
        }

        return view('pengusul/tambahcalon', ['id_pengusul' => $id_pengusul]);
    }

    public function inputKategori()
    {
        $Model = new PendaftaranModel();
        $id_pengusul = $this->request->getPost('id_pengusul');
        $kategori = $this->request->getPost('kategori');

        $totalKategori = $Model->where('kategori', $kategori)->countAllResults();

        switch ($kategori) {
            case 'Perintis Lingkungan':
                $prefix = 'A';
                break;
            case 'Pengabdi Lingkungan':
                $prefix = 'B';
                break;
            case 'Penyelamat Lingkungan':
                $prefix = 'C';
                break;
            case 'Pembina Lingkungan':
                $prefix = 'D';
                break;
            default:
                $prefix = 'X';
        }

        $kode_registrasi = $prefix . str_pad($totalKategori + 1, 2, '0', STR_PAD_LEFT);

        $data = [
            'id_pengusul' => $id_pengusul,
            'kategori' => $kategori,
            'tanggal_pendaftaran' => date('Y-m-d H:i:s'),
            'kode_registrasi' => $kode_registrasi
        ];

        session()->set('pendaftaran_data', $data);

        return redirect()->to('pengusul/tambahcalonidentitas')->with('success', 'Kategori berhasil dipilih, lanjutkan mengisi identitas.');
    }



    public function tambahCalonIdentitas()
    {
        $pendaftaranData = session()->get('pendaftaran_data');

        if (!$pendaftaranData || !isset($pendaftaranData['kategori'])) {
            return redirect()->back()->with('error', 'Data kategori atau pendaftaran tidak ditemukan.');
        }

        $provinsi_list = [
            'Aceh',
            'Bali',
            'Bangka Belitung',
            'Banten',
            'Bengkulu',
            'DI Yogyakarta',
            'DKI Jakarta',
            'Gorontalo',
            'Jambi',
            'Jawa Barat',
            'Jawa Tengah',
            'Jawa Timur',
            'Kalimantan Barat',
            'Kalimantan Selatan',
            'Kalimantan Tengah',
            'Kalimantan Timur',
            'Kalimantan Utara',
            'Kepulauan Bangka Belitung',
            'Kepulauan Riau',
            'Lampung',
            'Maluku',
            'Maluku Utara',
            'Nusa Tenggara Barat',
            'Nusa Tenggara Timur',
            'Papua',
            'Papua Barat',
            'Papua Barat Daya',
            'Papua Pegunungan',
            'Papua Selatan',
            'Papua Tengah',
            'Riau',
            'Sulawesi Barat',
            'Sulawesi Selatan',
            'Sulawesi Tengah',
            'Sulawesi Tenggara',
            'Sulawesi Utara',
            'Sumatera Barat',
            'Sumatera Selatan',
            'Sumatera Utara'
        ];

        return view('pengusul/tambahcalonidentitas', [
            'id_pengusul' => $pendaftaranData['id_pengusul'],
            'kategori' => $pendaftaranData['kategori'],
            'provinsi_list' => $provinsi_list
        ]);
    }

    public function simpanCalonIdentitas()
    {
        $Model = new PendaftaranModel();

        // Ambil data pendaftaran dari session
        $pendaftaranData = session()->get('pendaftaran_data');

        if (!$pendaftaranData || !isset($pendaftaranData['kategori'])) {
            return redirect()->back()->with('error', 'Data kategori atau pendaftaran tidak ditemukan.');
        }

        $validation = \Config\Services::validation();

        // Aturan validasi
        $rules = [
            'nama'     => 'required|min_length[3]|max_length[100]',
            'nik'      => 'required|exact_length[16]|numeric|is_unique[pendaftaran.nik]',
            'tempat_lahir'      => 'required|min_length[2]|max_length[50]',
            'tanggal_lahir'     => 'required|valid_date',
            'usia'              => 'required|numeric|min_length[1]|max_length[3]',
            'jenis_kelamin'     => 'required',
            'pekerjaan'         => 'required|min_length[3]|max_length[100]',
            'telepon'           => 'required|numeric|min_length[10]|max_length[15]',
            'email'             => 'required|valid_email',
            'pendidikan'        => 'required|min_length[2]|max_length[50]',
            'jalan'             => 'required|min_length[3]|max_length[255]',
            'rt_rw'             => 'required|max_length[10]',
            'desa'              => 'required|min_length[3]|max_length[100]',
            'kecamatan'         => 'required|min_length[3]|max_length[100]',
            'kab_kota'          => 'required|min_length[3]|max_length[100]',
            'provinsi'          => 'required',
            'kode_pos'          => 'required|numeric|exact_length[5]',
            'media_sosial'      => 'permit_empty|min_length[3]|max_length[100]',
            'ktp'               => 'uploaded[ktp]|mime_in[ktp,image/jpg,image/jpeg]|max_size[ktp,1024]',
            'skck'              => 'uploaded[skck]|mime_in[skck,application/pdf]|max_size[skck,1024]',
            'tanggal_skck'      => 'required|valid_date',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Pengelolaan file KTP, SKCK, dan legalitas
        $ktpFile = $this->request->getFile('ktp');
        $skckFile = $this->request->getFile('skck');
        $legalitasFile = $this->request->getFile('legalitas');

        // Proses file KTP
        $ktpFileName = $this->handleFileUpload($ktpFile, ['jpg', 'jpeg'], 'ktp');

        // Proses file SKCK
        $skckFileName = $this->handleFileUpload($skckFile, ['pdf'], 'skck');

        // Proses file legalitas (opsional)
        $legalitasFileName = null;
        if ($legalitasFile && $legalitasFile->isValid()) {
            $legalitasFileName = $this->handleFileUpload($legalitasFile, ['pdf'], 'legalitas');
        }

        // Simpan data lainnya tergantung kategori
        if ($pendaftaranData['kategori'] == 'Penyelamat Lingkungan') {
            $data = [
                'nama' => $this->request->getPost('nama'),
                'tahun_pembentukan' => $this->request->getPost('tahun_pembentukan'),
                'jumlah_anggota' => $this->request->getPost('jumlah_anggota'),
                'jalan' => $this->request->getPost('jalan'),
                'rt_rw' => $this->request->getPost('rt_rw'),
                'desa' => $this->request->getPost('desa'),
                'kecamatan' => $this->request->getPost('kecamatan'),
                'kab_kota' => $this->request->getPost('kab_kota'),
                'provinsi' => $this->request->getPost('provinsi'),
                'kode_pos' => $this->request->getPost('kode_pos'),
                'sosial_media' => $this->request->getPost('media_sosial'),
                'nama_kelompok' => $this->request->getPost('nama_kelompok'),
                'nik' => $this->request->getPost('nik'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'usia' => $this->request->getPost('usia'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'pekerjaan' => $this->request->getPost('pekerjaan'),
                'telepon' => $this->request->getPost('telepon'),
                'email' => $this->request->getPost('email'),
                'pendidikan' => $this->request->getPost('pendidikan'),
                'tanggal_skck' => $this->request->getPost('tanggal_skck'),
                'tanggal_legalitas' => $this->request->getPost('tanggal_legalitas'),
                'legalitas' => $legalitasFileName,
                'ktp' => $ktpFileName,
                'skck' => $skckFileName
            ];
        } else {
            $data = [
                'nama' => $this->request->getPost('nama'),
                'nik' => $this->request->getPost('nik'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'usia' => $this->request->getPost('usia'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'pekerjaan' => $this->request->getPost('pekerjaan'),
                'telepon' => $this->request->getPost('telepon'),
                'email' => $this->request->getPost('email'),
                'pendidikan' => $this->request->getPost('pendidikan'),
                'jalan' => $this->request->getPost('jalan'),
                'rt_rw' => $this->request->getPost('rt_rw'),
                'desa' => $this->request->getPost('desa'),
                'kecamatan' => $this->request->getPost('kecamatan'),
                'kab_kota' => $this->request->getPost('kab_kota'),
                'provinsi' => $this->request->getPost('provinsi'),
                'kode_pos' => $this->request->getPost('kode_pos'),
                'sosial_media' => $this->request->getPost('media_sosial'),
                'tanggal_skck' => $this->request->getPost('tanggal_skck'),
                'ktp' => $ktpFileName,
                'skck' => $skckFileName
            ];
        }

        // Gabungkan data identitas dengan data pendaftaran sebelumnya dari session
        $finalData = array_merge($pendaftaranData, $data);

        // Simpan data ke database
        if ($Model->insert($finalData)) {
            // Hapus session setelah data disimpan
            session()->remove('pendaftaran_data');

            return redirect()->to('pengusul/usulansaya')->with('success', 'Identitas berhasil disimpan.');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    /**
     * Fungsi untuk menangani upload file.
     * 
     * @param \CodeIgniter\HTTP\Files\UploadedFile $file
     * @param array $allowedExtensions
     * @param string $directory
     * @return string|null Nama file yang telah diunggah atau null
     */
    private function handleFileUpload($file, $allowedExtensions, $directory)
    {
        if ($file instanceof \CodeIgniter\HTTP\Files\UploadedFile && $file->isValid() && !$file->hasMoved()) {
            if (in_array($file->getExtension(), $allowedExtensions) && $file->getSize() <= 1024 * 1024) {
                $originalName = pathinfo($file->getClientName(), PATHINFO_FILENAME);
                $extension = $file->getExtension();
                $fileName = $originalName . '_' . bin2hex(random_bytes(5)) . '.' . $extension;
                $file->move(WRITEPATH . 'uploads/' . $directory, $fileName);
                return $fileName;
            }
        }
        return null;
    }

    public function showKTP($filename)
    {
        // Cek dengan ekstensi .jpg
        $filePathJpg = WRITEPATH . 'uploads/ktp/' . $filename;
        if (file_exists($filePathJpg)) {
            return $this->response
                ->setHeader('Content-Type', 'image/jpeg')
                ->setBody(file_get_contents($filePathJpg));
        }

        // Cek dengan ekstensi .jpeg
        $filePathJpeg = WRITEPATH . 'uploads/ktp/' . $filename;
        if (file_exists($filePathJpeg)) {
            return $this->response
                ->setHeader('Content-Type', 'image/jpeg')
                ->setBody(file_get_contents($filePathJpeg));
        }

        // Jika tidak ada file yang ditemukan, lempar pengecualian
        throw new \CodeIgniter\Exceptions\PageNotFoundException('File tidak ditemukan.');
    }

    public function showFotoKegiatan($folder, $filename)
    {
        $filePath = WRITEPATH . "uploads/foto_kegiatan$folder/" . $filename;
        if (file_exists($filePath)) {
            return $this->response
                ->setHeader('Content-Type', 'image/jpeg')
                ->setBody(file_get_contents($filePath));
        }

        throw new \CodeIgniter\Exceptions\PageNotFoundException('File tidak ditemukan.');
    }

    public function downloadSKCK($filename)
    {
        $path = WRITEPATH . 'uploads/skck/' . $filename;

        if (!file_exists($path)) {
            // File tidak ditemukan, Anda bisa mengarahkan ke halaman error atau menampilkan pesan
            throw new \CodeIgniter\Exceptions\PageNotFoundException('File tidak ditemukan.');
        }

        // Menyajikan file dengan header download
        return $this->response->download($path, null);
    }
    
    



    // -------------------------------------------------------------------------------------------------------------------

    public function simpanForm($formType)
    {
        $model = new PendaftaranModel();
        $id_pendaftaran = session()->get('id_pendaftaran');

        if (!$id_pendaftaran) {
            die('ID pendaftaran tidak ditemukan di session.');
        }

        switch ($formType) {
            case 'identitasc':
                $identitas = $model->getIdentitasByIdPendaftaran($id_pendaftaran);
                $data = [
                    'nama' => $this->request->getPost('nama_ketua'),
                    'tahun_pembentukan' => $this->request->getPost('tahun_pembentukan'),
                    'jumlah_anggota' => $this->request->getPost('jumlah_anggota'),
                    'jalan' => $this->request->getPost('jalan'),
                    'rt_rw' => $this->request->getPost('rt_rw'),
                    'desa' => $this->request->getPost('desa'),
                    'kecamatan' => $this->request->getPost('kecamatan'),
                    'kab_kota' => $this->request->getPost('kab_kota'),
                    'provinsi' => $this->request->getPost('provinsi'),
                    'kode_pos' => $this->request->getPost('kode_pos'),
                    'sosial_media' => $this->request->getPost('sosial_media'),
                    'nama_kelompok' => $this->request->getPost('nama_kelompok'),
                    'nik' => $this->request->getPost('nik'),
                    'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                    'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                    'usia' => $this->request->getPost('usia'),
                    'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                    'pekerjaan' => $this->request->getPost('pekerjaan'),
                    'telepon' => $this->request->getPost('telepon'),
                    'email' => $this->request->getPost('email'),
                    'pendidikan' => $this->request->getPost('pendidikan'),
                    'tanggal_skck' => $this->request->getPost('tanggal_skck'),
                ];

                // Logika untuk upload file SKCK
                $legalitasFile = $this->request->getFile('legalitas');
                if ($legalitasFile && $legalitasFile->isValid() && !$legalitasFile->hasMoved()) {
                    // Validasi file legalitas (PDF)
                    if ($legalitasFile->isValid() && $legalitasFile->getMimeType() === 'application/pdf' && $legalitasFile->getSize() <= 1024 * 1024) {
                        $legalitasFileName = $legalitasFile->getRandomName();
                        $legalitasFile->store('legalitas', $legalitasFileName);
                        $data['legalitas'] = $legalitasFileName;
                    }
                }


                // Logika untuk upload file KTP
                $ktpFile = $this->request->getFile('ktp');
                if ($ktpFile && $ktpFile->isValid() && !$ktpFile->hasMoved()) {
                    // Validasi file KTP (JPG/JPEG)
                    if ($ktpFile->isValid() && $ktpFile->getMimeType() === 'image/jpeg' && $ktpFile->getSize() <= 1024 * 1024) {
                        $ktpFileName = $ktpFile->getRandomName();
                        $ktpFile->store('ktp', $ktpFileName);
                        $data['ktp'] = $ktpFileName;
                    }
                }

                // Logika untuk upload file SKCK
                $skckFile = $this->request->getFile('skck');
                if ($skckFile && $skckFile->isValid() && !$skckFile->hasMoved()) {
                    // Validasi file SKCK (PDF)
                    if ($skckFile->isValid() && $skckFile->getMimeType() === 'application/pdf' && $skckFile->getSize() <= 1024 * 1024) {
                        $skckFileName = $skckFile->getRandomName();
                        $skckFile->store('skck', $skckFileName);
                        $data['skck'] = $skckFileName;
                    }
                }

                // Update atau insert data identitas
                if ($identitas) {
                    $model->updateIdentitas($data, ['id_pendaftaran' => $id_pendaftaran]);
                } else {
                    $model->insertIdentitas($data);
                }
                break;

            case 'identitasabd':
                $identitas = $model->getIdentitasByIdPendaftaran($id_pendaftaran);
                $data = [
                    'nama' => $this->request->getPost('nama_individu'),
                    'nik' => $this->request->getPost('nik_individu'),
                    'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                    'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                    'usia' => $this->request->getPost('usia'),
                    'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                    'pekerjaan' => $this->request->getPost('pekerjaan'),
                    'telepon' => $this->request->getPost('telepon'),
                    'email' => $this->request->getPost('email'),
                    'pendidikan' => $this->request->getPost('pendidikan'),
                    'jalan' => $this->request->getPost('jalan'),
                    'rt_rw' => $this->request->getPost('rt_rw'),
                    'desa' => $this->request->getPost('desa'),
                    'kecamatan' => $this->request->getPost('kecamatan'),
                    'kab_kota' => $this->request->getPost('kab_kota'),
                    'provinsi' => $this->request->getPost('provinsi'),
                    'kode_pos' => $this->request->getPost('kode_pos'),
                    'sosial_media' => $this->request->getPost('sosial_media'),
                    'tanggal_skck' => $this->request->getPost('tanggal_skck'),
                ];

                // Logika untuk upload file KTP dan SKCK sama seperti di atas
                // Upload KTP
                $ktpFile = $this->request->getFile('ktp');
                if ($ktpFile && $ktpFile->isValid() && !$ktpFile->hasMoved()) {
                    if ($ktpFile->isValid() && $ktpFile->getMimeType() === 'image/jpeg' && $ktpFile->getSize() <= 1024 * 1024) {
                        $ktpFileName = $ktpFile->getRandomName();
                        $ktpFile->store('ktp', $ktpFileName);
                        $data['ktp'] = $ktpFileName;
                    }
                }

                // Upload SKCK
                $skckFile = $this->request->getFile('skck');
                if ($skckFile && $skckFile->isValid() && !$skckFile->hasMoved()) {
                    if ($skckFile->isValid() && $skckFile->getMimeType() === 'application/pdf' && $skckFile->getSize() <= 1024 * 1024) {
                        $skckFileName = $skckFile->getRandomName();
                        $skckFile->store('skck', $skckFileName);
                        $data['skck'] = $skckFileName;
                    }
                }

                // Update atau insert data identitas
                if ($identitas) {
                    $model->updateIdentitas($data, ['id_pendaftaran' => $id_pendaftaran]);
                } else {
                    $model->insertIdentitas($data);
                }
                break;
                
                case 'kegiatan':
                    // Ambil data dari request untuk kegiatan utama
                    $data = [
                        'id_pendaftaran' => $id_pendaftaran,
                        'tema' => $this->request->getPost('tema'),
                        'sub_tema' => $this->request->getPost('sub_tema'),
                        'bentuk_kegiatan' => $this->request->getPost('bentuk_kegiatan'),
                        'tahun_mulai' => $this->request->getPost('tahun_mulai') ?: null,
                        'deskripsi_kegiatan' => $this->request->getPost('deskripsi_kegiatan'),
                        'lokasi_kegiatan' => $this->request->getPost('lokasi_kegiatan'),
                        'koordinat' => $this->request->getPost('koordinat'),
                        'pihak_dan_peran' => $this->request->getPost('pihak_dan_peran'),
                        'keberhasilan' => $this->request->getPost('keberhasilan'),
                    ];
                
                    // Cek apakah kegiatan utama sudah ada
                    $existingKegiatan = $model->getKegiatanByPendaftaranId($id_pendaftaran);
                    if (!empty($existingKegiatan)) {
                        // Update kegiatan utama
                        $model->updateKegiatan($data, ['id_kegiatan' => $existingKegiatan[0]['id_kegiatan']]);
                    } else {
                        // Insert kegiatan utama sebagai entri baru
                        $model->insertKegiatan($data);
                    }
                
                    // Cek apakah ada kegiatan tambahan yang akan ditambahkan atau diperbarui
                    $kegiatanLainnya = $this->request->getPost('kegiatan_lainnya');
                    if (!empty($kegiatanLainnya)) {
                        foreach ($kegiatanLainnya as $kegiatan) {
                            // Persiapkan data untuk kegiatan tambahan
                            $dataLain = [
                                'id_pendaftaran' => $id_pendaftaran,
                                'tema' => $kegiatan['tema'] ?? '',
                                'sub_tema' => $kegiatan['sub_tema'] ?? '',
                                'bentuk_kegiatan' => $kegiatan['bentuk_kegiatan'] ?? '',
                                'tahun_mulai' => !empty($kegiatan['tahun_mulai']) ? $kegiatan['tahun_mulai'] : null,
                                'deskripsi_kegiatan' => $kegiatan['deskripsi_kegiatan'] ?? '',
                                'lokasi_kegiatan' => $kegiatan['lokasi_kegiatan'] ?? '',
                                'koordinat' => $kegiatan['koordinat'] ?? '',
                                'pihak_dan_peran' => $kegiatan['pihak_dan_peran'] ?? '',
                                'keberhasilan' => $kegiatan['keberhasilan'] ?? '',
                            ];

                            // Validasi: Cek apakah deskripsi_kegiatan atau tema terisi
                            if (!empty($dataLain['deskripsi_kegiatan']) || !empty($dataLain['tema'])) {
                                // Cek ID dari kegiatan tambahan jika ada
                                if (isset($kegiatan['id_kegiatan']) && !empty($kegiatan['id_kegiatan'])) {
                                    // Jika ID ada, update kegiatan tambahan
                                    $model->updateKegiatan($dataLain, ['id_kegiatan' => $kegiatan['id_kegiatan']]);
                                } else {
                                    // Insert kegiatan tambahan sebagai entri baru
                                    $model->insertKegiatan($dataLain);
                                }
                            }
                        }
                    }

                    break;                                  

            case 'dampak':
                $dampak = $model->getDampakByIdPendaftaran($id_pendaftaran);
                $data = [
                    'id_pendaftaran' => $id_pendaftaran,
                    'dampak_lingkungan' => $this->request->getPost('dampak_lingkungan'),
                    'dampak_ekonomi' => $this->request->getPost('dampak_ekonomi'),
                    'dampak_sosial_budaya' => $this->request->getPost('dampak_sosial_budaya'),
                ];
                if ($dampak) {
                    $model->updateDampak($data, ['id_pendaftaran' => $id_pendaftaran]);
                } else {
                    $model->insertDampak($data);
                }
                break;

            case 'pmik':
                $pmik = $model->getPMIKByIdPendaftaran($id_pendaftaran);
                $data = [
                    'id_pendaftaran' => $id_pendaftaran,
                    'prakarsa' => $this->request->getPost('prakarsa'),
                    'motivasi' => $this->request->getPost('motivasi'),
                    'inovasi' => $this->request->getPost('inovasi'),
                    'kreativitas' => $this->request->getPost('kreativitas'),
                ];
                if ($pmik) {
                    $model->updatePMIK($data, ['id_pendaftaran' => $id_pendaftaran]);
                } else {
                    $model->insertPMIK($data);
                }
                break;

            case 'keswadayaan':
                $keswadayaan = $model->getKeswadayaanByIdPendaftaran($id_pendaftaran);
                $data = [
                    'id_pendaftaran' => $id_pendaftaran,
                    'sumber_biaya' => $this->request->getPost('sumber_biaya'),
                    'teknologi_kegiatan' => $this->request->getPost('teknologi_kegiatan'),
                    'status_lahan_kegiatan' => $this->request->getPost('status_lahan_kegiatan'),
                    'jumlah_kelompok_serupa' => $this->request->getPost('jumlah_kelompok_serupa'),
                ];
                if ($keswadayaan) {
                    $model->updateKeswadayaan($data, ['id_pendaftaran' => $id_pendaftaran]);
                } else {
                    $model->insertKeswadayaan($data);
                }
                break;

                case 'keistimewaan':
                    $keistimewaan = $model->getKeistimewaanByIdPendaftaran($id_pendaftaran);
                    $data = [
                        'id_pendaftaran' => $id_pendaftaran,
                        'keistimewaan' => $this->request->getPost('keistimewaan'),
                        'penghargaan' => $this->request->getPost('penghargaan'),
                        'tautan_video' => $this->request->getPost('tautan_video'),
                        'tautan_dokumen_pendukung' => $this->request->getPost('tautan_dokumen_pendukung'),
                    ];
                
                    for ($i = 1; $i <= 5; $i++) {
                        $fotoField = 'foto_kegiatan' . $i;
                        $deskripsiField = 'deskripsi_foto_kegiatan' . $i;
                        $fotoFile = $this->request->getFile($fotoField);
                
                        if ($fotoFile && $fotoFile->isValid() && !$fotoFile->hasMoved()) {
                            if ($fotoFile->getMimeType() === 'image/jpeg' && $fotoFile->getSize() <= 1024 * 1024) {
                                $originalName = pathinfo($fotoFile->getClientName(), PATHINFO_FILENAME);
                                $extension = $fotoFile->getExtension();
                                $randomNamePart = bin2hex(random_bytes(4));
                                $fotoFileName = $originalName . '_' . $randomNamePart . '.' . $extension;
                                $fotoFile->move(WRITEPATH . 'uploads/foto_kegiatan' . $i, $fotoFileName);
                                $data[$fotoField] = $fotoFileName;
                            }
                        }
                
                        $deskripsiFoto = $this->request->getPost($deskripsiField);
                        if (!empty($deskripsiFoto)) {
                            $data[$deskripsiField] = $deskripsiFoto;
                        }
                    }
                
                    if ($keistimewaan) {
                        $model->updateKeistimewaan($data, ['id_pendaftaran' => $id_pendaftaran]);
                    } else {
                        $model->insertKeistimewaan($data);
                    }
                    break;

            default:
                return redirect()->back()->with('error', 'Form tidak ditemukan.');
        }

        // Tentukan target section berikutnya berdasarkan form yang disimpan
        $nextFormTarget = '';
        switch ($formType) {
                case 'identitasc':
                case 'identitasabd':
                    $nextFormTarget = 'kegiatan';
                break;
            case 'kegiatan':
                $nextFormTarget = 'dampak';
                break;
            case 'dampak':
                $nextFormTarget = 'pmik';
                break;
            case 'pmik':
                $nextFormTarget = 'keswadayaan';
                break;
            case 'keswadayaan':
                $nextFormTarget = 'keistimewaan';
                break;
            case 'keistimewaan':
                return redirect()->to('/pengusul/usulansaya')->with('success', '');
            default:
                $nextFormTarget = 'identitas-calon';
        }

            return redirect()->to('pengusul/detailusulansayaedit/' . $id_pendaftaran . '?section=' . $nextFormTarget)
                    ->with('success', ucfirst($formType) . ' berhasil disimpan.');
    }

    public function detailUsulanSayaEdit($id_pendaftaran)
    {
        $model = new PendaftaranModel();
        $pendaftaran = $model->getPendaftaranById($id_pendaftaran);
        $identitas = $model->getIdentitasByIdPendaftaran($id_pendaftaran);
        $kegiatan = $model-> getKegiatanByPendaftaranId($id_pendaftaran);
        $dampak = $model->getDampakByIdPendaftaran($id_pendaftaran);
        $pmik = $model->getPMIKByIdPendaftaran($id_pendaftaran);
        $keswadayaan = $model->getKeswadayaanByIdPendaftaran($id_pendaftaran);
        $keistimewaan = $model->getKeistimewaanByIdPendaftaran($id_pendaftaran);
        $kegiatanUtama = isset($kegiatan[0]) ? $kegiatan[0] : null;
        $kegiatanLainnya = array_slice($kegiatan, 1);

        if (!$pendaftaran) {
            return redirect()->to('pengusul/usulansaya')->with('error', 'Data tidak ditemukan.');
        }

        session()->set('id_pendaftaran', $id_pendaftaran);

        $data = [
            'pendaftaran' => $pendaftaran,
            'identitasc' => $identitas,
            'identitasabd' => $identitas,
            'kegiatan' => $kegiatan,
            'dampak' => $dampak,
            'pmik' => $pmik,
            'keswadayaan' => $keswadayaan,
            'keistimewaan' => $keistimewaan,
            'kegiatanUtama' => $kegiatanUtama,
            'kegiatanLainnya' => $kegiatanLainnya
        ];
        
        return view('pengusul/detailusulansayaedit', $data);
    }
    
    public function detailusulansaya($id)
    {
        $model = new PendaftaranModel();
        $pendaftaran = $model->getDetailById($id);

        $kegiatan = $model->getKegiatanByPendaftaranId($pendaftaran['id_pendaftaran']);
        $pendaftaran['kegiatan'] = $kegiatan;

        if (!$pendaftaran) {
            return redirect()->to('/pengusul/usulansaya')->with('error', 'Data tidak ditemukan.');
        }

        $data = [
            'title' => 'Usulan Saya',
            'pendaftaran' => $pendaftaran,
            'kegiatan' => $kegiatan,
        ];

        return view('pengusul/detailusulansaya', $data);
    }
    
    // -------------------------------------------------------------------------------------------------------------------
    

    public function usulansaya()
    {
        $Model = new PendaftaranModel();
        $PengusulModel = new PengusulModel();

        // Ambil data dengan pagination, limit 5 per halaman
        $perPage = 5;

        // Ambil ID pengusul dari session
        $id_pengusul = session()->get('id_pengusul');

        // Ambil kata kunci dari request untuk pencarian
        $keyword = $this->request->getGet('search');

        // Jika ada keyword, tambahkan kondisi pencarian
        if ($keyword) {
            $usulan = $Model->where('id_pengusul', $id_pengusul)
                ->like('nama', $keyword) // Filter berdasarkan nama_instansi_pribadi
                ->paginate($perPage, 'usulan');
        } else {
            // Jika tidak ada pencarian, ambil semua data usulan berdasarkan id_pengusul
            $usulan = $Model->where('id_pengusul', $id_pengusul)
                ->paginate($perPage, 'usulan');
        }

        // Ambil data pengusul dari tabel pengusul
        $pengusul = $PengusulModel->where('id_pengusul', $id_pengusul)->first();

        // Cek kelengkapan data pengusul
        $isComplete = !empty($pengusul['jabatan_pekerjaan']) && !empty($pengusul['jenis_kelamin']) && !empty($pengusul['jalan']) && !empty($pengusul['rt_rw']) && !empty($pengusul['desa']) && !empty($pengusul['kecamatan']) && !empty($pengusul['kab_kota']) && !empty($pengusul['kode_pos']) && !empty($pengusul['surat_pengantar']);

        // Persiapkan data untuk dikirim ke view
        $data = [
            'usulan' => $usulan,
            'pager' => $Model->pager,
            'title' => "Usulan Saya",
            'keyword' => $keyword,
            'isComplete' => $isComplete,
        ];

        // Load view untuk menampilkan data calon
        return view('pengusul/usulansaya', $data);
    }

    // Fungsi untuk update status pendaftaran dan edit
    public function updateStatus()
    {
        // Validasi ID pendaftaran
        $id_pendaftaran = $this->request->getPost('id_pendaftaran');

        if (!$id_pendaftaran) {
            return $this->response->setJSON(['success' => false, 'message' => 'ID pendaftaran tidak ditemukan']);
        }

        // Ambil model
        $pendaftaranModel = new PendaftaranModel();

        // Perbarui status pendaftaran menjadi 'Terkirim' dan edit menjadi 'Off'
        $data = [
            'status_pendaftaran' => 'Terkirim',
            'edit' => 'Off',
        ];

        $updated = $pendaftaranModel->update($id_pendaftaran, $data);

        if ($updated) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui status']);
        }
    }

    public function usulandlhk()
    {
        $model = new PendaftaranModel();

        // Ambil data dengan pagination, limit 5 per halaman
        $perPage = 5;

        // Ambil kategori dari filter
        $kategori = $this->request->getVar('kategori');

        // Ambil kata kunci dari request untuk pencarian
        $keyword = $this->request->getGet('search');

        // Ambil ID pengusul dan provinsi dari session
        $id_pengusul = session()->get('id_pengusul');
        $provinsi = session()->get('provinsi');

        // Filter query berdasarkan id_pengusul
        $model->where('id_pengusul', $id_pengusul);

        // Filter query berdasarkan provinsi
        if ($provinsi) {
            $model->where('provinsi', $provinsi);
        }

        // Tambahkan filter untuk status pendaftaran
        $validStatuses = ['Sesuai', 'Verifikasi Administrasi', 'Lolos Administrasi', 'Tidak Lolos Administrasi'];
        $model->whereIn('status_pendaftaran', $validStatuses);

        // Jika kategori dipilih, tambahkan filter kategori
        if ($kategori) {
            $model->where('kategori', $kategori);
        }

        // Jika ada kata kunci, tambahkan kondisi pencarian berdasarkan nama
        if ($keyword) {
            $model->like('nama', $keyword);
        }

        // Dapatkan data dengan pagination
        $usulan = $model->paginate($perPage, 'usulan');

        // Ambil pager untuk pagination
        $pager = $model->pager;

        // Persiapkan data untuk dikirim ke view
        $data = [
            'title' => 'Usulan DLHK',
            'usulan' => $usulan,
            'pager' => $pager,
            'kategori' => $kategori,
            'keyword' => $keyword,
        ];

        return view('pengusul/usulandlhk', $data);
    }



    public function editUsulan($id)
    {
        $Model = new PendaftaranModel();
        $pendaftaran = $Model->getDetailById($id);

        // Validasi jika data ditemukan atau tidak
        if (!$pendaftaran) {
            return redirect()->to('/pengusul/usulansaya')->with('error', 'Data tidak ditemukan.');
        }

        session()->set('id_pendaftaran', $pendaftaran['id_pendaftaran']); // Menyimpan id_pendaftaran ke session

        $provinsi_list = [
            'Aceh',
            'Bali',
            'Bangka Belitung',
            'Banten',
            'Bengkulu',
            'DI Yogyakarta',
            'DKI Jakarta',
            'Gorontalo',
            'Jambi',
            'Jawa Barat',
            'Jawa Tengah',
            'Jawa Timur',
            'Kalimantan Barat',
            'Kalimantan Selatan',
            'Kalimantan Tengah',
            'Kalimantan Timur',
            'Kalimantan Utara',
            'Kepulauan Bangka Belitung',
            'Kepulauan Riau',
            'Lampung',
            'Maluku',
            'Maluku Utara',
            'Nusa Tenggara Barat',
            'Nusa Tenggara Timur',
            'Papua',
            'Papua Barat',
            'Papua Barat Daya',
            'Papua Pegunungan',
            'Papua Selatan',
            'Papua Tengah',
            'Riau',
            'Sulawesi Barat',
            'Sulawesi Selatan',
            'Sulawesi Tengah',
            'Sulawesi Tenggara',
            'Sulawesi Utara',
            'Sumatera Barat',
            'Sumatera Selatan',
            'Sumatera Utara'
        ];

        $tema = [
            'Keanekaragaman Hayati',
            'Perubahan Iklim',
            'Pencemaran dan Kerusakan Lingkungan',
            'Hukum dan Budaya'
        ];

        $subtema = [
            'Pelestarian keanekaragaman hayati dan kawasan dilindungi yang meliputi pelestarian sumber daya genetik, jenis, dan ekosistem',
            'Pemanfaatan keanekaragaman hayati secara berkelanjutan',
            'Jasa lingkungan',
            'Adaptasi perubahan iklim',
            'Mitigasi Perubahan Iklim',
            'Penerapan ekonomi hijau dan ekonomi biru',
            'Penanganan pencemaran air, tanah, udara dari industri, pertanian, domestic terutama plastik',
            'Pencegahan dan penanggulangan kerusakan lingkungan',
            'Ekonomi Sirkular',
            'Keadilan terhadap pemanfaatan sumber daya alam dan lingkungan',
            'Kearifan tradisional dalam pengelolaan sumber daya alam',
            'Komunikasi dan pendidikan lingkungan hidup'
        ];

        // Ambil data dari semua tabel terkait menggunakan join
        $data = [
            'title' => 'Edit Usulan Saya',
            'pendaftaran' => $pendaftaran,
            'tema' => $tema,
            'sub_tema' => $subtema,
            'provinsi_list' => $provinsi_list
        ];
        return view('pengusul/detailusulansayaedit', $data);
    }


    public function detailusulandlhk()
    {
        $data['title'] = 'Detail Usulan DLHK';
        return view('pengusul/detailusulandlhk', ['title' => 'Detail Usulan DLHK']);
    }

    public function tambahartikel()
    {
        // Mengambil ID pengusul dari session
        $data = [
            'title' => 'Tambah Artikel',
            'id_pengusul' => session()->get('id_pengusul'),
        ];

        return view('pengusul/tambahartikel', $data);
    }

    public function tambahArtikelAction()
    {
        if (!session()->has('id_pengusul')) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Session id_pengusul tidak ditemukan. Silakan login kembali.'
            ]);
        }

        $model = new ArtikelModel();

        // Ambil input dari formulir
        $judulArtikel = $this->request->getPost('judul');
        $konten = $this->request->getPost('konten');

        // Memproses foto yang diupload
        $foto = $this->request->getFile('foto');

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => [
                'label' => 'Judul',
                'rules' => 'required|min_length[5]|max_length[100]|is_unique[artikel.judul]' // Judul harus unik dan panjang antara 5 dan 100 karakter
            ],
            'konten' => [
                'label' => 'Konten',
                'rules' => 'required|min_length[20]' // Konten harus ada dan panjang minimum 20 karakter
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'uploaded[foto]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,1024]'
            ]
        ]);


        if (!$this->validate($validation->getRules())) {
            return $this->response->setJSON([
                'success' => false,
                'messages' => $validation->getErrors(),
            ]);
        }

        // Menangani upload file foto
        $fotoPath = '';
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Memastikan tipe file dan membuat nama file acak
            $fotoName = $foto->getRandomName();

            // Memindahkan file ke folder public/images/artikel
            if ($foto->move('public/images/artikel', $fotoName)) {
                // Jika berhasil, simpan path foto ke database
                $fotoPath = 'images/artikel/' . $fotoName;
            } else {
                return $this->response->setJSON(['success' => false, 'errors' => 'Gagal menyimpan file foto.']);
            }
        } else {
            return $this->response->setJSON(['success' => false, 'errors' => 'File tidak valid atau belum diupload.']);
        }

        // Menghasilkan slug yang unik
        $slug = url_title($judulArtikel, '-', true);
        $existingArticle = $model->where('slug', $slug)->first(); // Cek apakah slug sudah ada
        if ($existingArticle) {
            return $this->response->setJSON(['success' => false, 'errors' => 'Judul sudah digunakan.']);
        }

        // Simpan data artikel ke dalam database
        $dataArtikel = [
            'id_pengusul' => session()->get('id_pengusul'),
            'judul' => htmlspecialchars($judulArtikel, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
            'slug' => $slug,
            'konten' => htmlspecialchars($konten, ENT_QUOTES, 'UTF-8'), // Sanitasi untuk menghindari XSS
            'foto' => $fotoPath,
            'tanggal' => date('Y-m-d H:i:s'),
        ];

        // Simpan artikel
        if ($model->insert($dataArtikel)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Artikel berhasil ditambahkan.']);
        } else {
            // Tampilkan pesan umum untuk kesalahan penyimpanan
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal menambahkan artikel.']);
        }
    }



    public function artikelsaya()
    {
        $model = new ArtikelModel();
        $id_pengusul = session()->get('id_pengusul'); // Mengambil id_pengusul dari session

        // Ambil data dengan pagination, limit 5 per halaman
        $perPage = 5;

        // Ambil kata kunci dari request untuk pencarian
        $keyword = $this->request->getGet('search');

        // Jika ada keyword, tambahkan kondisi pencarian
        if ($keyword) {
            $artikels = $model->where('id_pengusul', $id_pengusul)
                ->like('judul', $keyword)
                ->paginate($perPage, 'artikel');
        } else {
            $artikels = $model->where('id_pengusul', $id_pengusul)
                ->paginate($perPage, 'artikel');
        }

        // Menyiapkan data untuk view
        $data['title'] = 'Artikel Saya';
        $data['artikels'] = $artikels;
        $data['pager'] = $model->pager;
        $data['keyword'] = $keyword;

        // Menampilkan view dengan data artikel
        return view('pengusul/artikelsaya', $data);
    }

    public function detailartikel($slug)
    {
        $Model = new ArtikelModel();
        $artikel = $Model->where('slug', $slug)->first(); // Ambil artikel berdasarkan slug

        if (!$artikel) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Ambil ID pengguna yang sedang login (baik admin maupun pengusul)
        $id_pengusul = session()->get('id_pengusul');
        $id_admin = session()->get('id_admin');

        // Jika artikel masih ditangguhkan
        if ($artikel['status'] == 'Ditangguhkan') {
            // Cek apakah yang mengakses adalah admin atau pembuat artikel
            if (!$id_admin && $artikel['id_pengusul'] != $id_pengusul) {
                // Jika bukan admin atau pembuat artikel, tampilkan 404
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }

        $data = [
            'title' => 'Detail Artikel Saya',
            'artikel' => $artikel,
        ];
        return view('pengusul/detailartikelsaya', $data);
    }

    public function pemberitahuan()
    {
        $pendaftaranModel = new PendaftaranModel();
        $pengusulModel = new PengusulModel();

        $id_pengusul = session()->get('id_pengusul');
        $pengusul = $pengusulModel->find($id_pengusul);

        $pendaftaran = [];

        if ($pengusul) {
            if ($pengusul['role_akun'] == 'DLHK') {
                $provinsi = session()->get('provinsi');
                $pendaftaran = $pendaftaranModel->where('provinsi', $provinsi)->findAll();
            } else if ($pengusul['role_akun'] == 'Pengusul') {
                $pendaftaran = $pendaftaranModel->where('id_pengusul', $id_pengusul)->findAll();
            }
        }

        $data = [
            'title' => 'Pemberitahuan',
            'pendaftaran' => $pendaftaran,
            'pengusul' => $pengusul
        ];

        return view('pengusul/pemberitahuan', $data);
    }

    public function alurpendaftaran()
    {
        $data['title'] = 'Alur Pendaftaran';
        return view('pengusul/alurpendaftaran', ['title' => 'Alur Pendaftaran']);
    }
    public function videopanduan()
    {
        $data['title'] = 'Video Panduan';
        return view('pengusul/videopanduan', ['title' => 'Video Panduan']);
    }
    public function panduanpendaftaran()
    {
        $data['title'] = 'Panduan Pendaftaran';
        return view('pengusul/panduanpendaftaran', ['title' => 'Panduan Pendaftaran']);
    }

    public function halamanLainnya()
    {
        $pengusulModel = new PengusulModel();
        $pengusul = $pengusulModel->where('id_pengusul', session()->get('id_pengusul'))->first();

        // Cek apakah semua field sudah diisi
        if (empty($pengusul['nama_instansi_pribadi']) || empty($pengusul['telepon']) || empty($pengusul['email'])) {
            return redirect()->to(base_url('pengusul/profil'))->with('error', 'Silakan lengkapi profil Anda terlebih dahulu.');
        }

        // Jika profil sudah lengkap, lanjutkan ke halaman lainnya
        return view('pengusul/halaman_lainnya');
    }

    public function generatePDF($kode_registrasi)
    {
        $id_pengusul = session()->get('id_pengusul');
        $role_akun = session()->get('role_akun');
        $provinsi = session()->get('provinsi');

        if (!$id_pengusul) {
            return redirect()->back()->with('error', '');
        }

        $pendaftaranModel = new PendaftaranModel();
        $pengusulModel = new PengusulModel();

        $pendaftaranData = $pendaftaranModel->where('kode_registrasi', $kode_registrasi)->first();

        if (!$pendaftaranData || ($pendaftaranData['id_pengusul'] != $id_pengusul && !($role_akun == 'DLHK' && $pendaftaranData['provinsi'] == $provinsi))) {
            return redirect()->back()->with('error', 'Error');
        }

        $pengusulData = $pengusulModel->where('id_pengusul', $pendaftaranData['id_pengusul'])->first();

        $kegiatan = $pendaftaranModel->getKegiatanByPendaftaranId($pendaftaranData['id_pendaftaran']);
        $pendaftaranData['kegiatan'] = $kegiatan;

        $dampak = $pendaftaranModel->db->table('dampak')->where('id_pendaftaran', $pendaftaranData['id_pendaftaran'])->get()->getRowArray();
        $pmik = $pendaftaranModel->db->table('pmik')->where('id_pendaftaran', $pendaftaranData['id_pendaftaran'])->get()->getRowArray();
        $keswadayaan = $pendaftaranModel->db->table('keswadayaan')->where('id_pendaftaran', $pendaftaranData['id_pendaftaran'])->get()->getRowArray();
        $keistimewaan = $pendaftaranModel->db->table('keistimewaan')->where('id_pendaftaran', $pendaftaranData['id_pendaftaran'])->get()->getRowArray();

        $data = [
            'pendaftaran' => $pendaftaranData,
            'pengusul' => $pengusulData,
            'kegiatan' => $kegiatan,
            'dampak' => $dampak,
            'pmik' => $pmik,
            'keswadayaan' => $keswadayaan,
            'keistimewaan' => $keistimewaan
        ];

        $kategori = $pendaftaranData['kategori'];
        switch ($kategori) {
            case 'Perintis Lingkungan':
                $prefix = 'A';
                break;
            case 'Pengabdi Lingkungan':
                $prefix = 'B';
                break;
            case 'Penyelamat Lingkungan':
                $prefix = 'C';
                break;
            case 'Pembina Lingkungan':
                $prefix = 'D';
                break;
            default:
                $prefix = 'X';
        }

        session()->set('prefix', $prefix);

        $html = view('pengusul/pdf', $data);

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('defaultPaperSize', 'A4');
        $options->set('defaultPaperOrientation', 'portrait');
        $options->set('dpi', 150);
        $options->set('enable_php', false);
        $options->set('enable_javascript', true);
        $options->set('enable_html5_parser', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $dompdf->stream('laporan_calon_usulan.pdf', ['Attachment' => false]);
    }
}
