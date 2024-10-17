<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class KontakController extends BaseController
{
    public function sendEmail()
    {
        // Ambil data dari permintaan POST (JSON body)
        $data = $this->request->getJSON();

        $nama = $data->nama;
        $email = $data->email;
        $telepon = $data->telepon;
        $pesan = $data->pesan;

        // Validasi input form (optional)
        if (!$nama || !$email || !$telepon || !$pesan) {
            return $this->response->setJSON(['success' => false, 'message' => 'Semua field harus diisi!']);
        }

        // Inisialisasi PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Set konfigurasi SMTP
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                       // SMTP server Gmail
            $mail->SMTPAuth   = true;                                   // Aktifkan autentikasi SMTP
            $mail->Username   = '';                   // Email Gmail Anda
            $mail->Password   = '';                  // App Password from Gmail
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enkripsi TLS
            $mail->Port       = 587;                                    // Port SMTP Gmail

            // Set detail pengirim dan penerima
            $mail->setFrom($email, $nama);                              // Email pengirim
            $mail->addAddress('');                    // Email tujuan

            // Konten email
            $mail->isHTML(true);                                       
            $mail->Subject = 'Pesan dari Form Kontak Website Sistem Informasi Penghargaan Kalpataru'; 
            $mail->Body    = "
                <h2>Pesan dari Form Kontak Website Sistem Informasi Penghargaan Kalpataru</h2>
                <p><strong>Nama:</strong> $nama</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Telepon:</strong> $telepon</p>
                <p><strong>Pesan:</strong> $pesan</p>
            ";                                                          
            $mail->AltBody = "Nama: $nama\nEmail: $email\nTelepon: $telepon\nPesan: $pesan";

            // Kirim email
            $mail->send();
            return $this->response->setJSON(['success' => true, 'message' => 'Pesan berhasil dikirim!']);
        } catch (Exception $e) {
            return $this->response->setJSON(['success' => false, 'message' => 'Pesan gagal dikirim. Error: ' . $mail->ErrorInfo]);
        }
    }
}
