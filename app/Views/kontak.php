<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../public/css/app.css">
    <title><?= $title; ?></title>
    <style>
        .fixed {
            position: fixed;
        }

        .bottom-4 {
            bottom: 1rem;
        }

        .right-4 {
            right: 1rem;
        }

        .bg-red-500 {
            background-color: #800000;
        }

        .text-white {
            color: white;
        }

        .p-4 {
            padding: 1rem;
        }

        .rounded {
            border-radius: 0.25rem;
        }

        .shadow {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>

</head>

<body>
    <?= $this->extend('template/navbarfooter') ?>

    <?= $this->section('content') ?>
    <div class="max-w-5xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
        <div class="border-2 border-footer">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <!-- Left Section (Contact Information) -->
                <div class="bg-footer p-8 text-white">
                    <h2 class="text-2xl font-bold mb-2 flex justify-center">Kontak Kami</h2>
                    <hr class="border-2 border-white w-1/4 mx-auto">
                    <div class="grid  grid-rows-3 gap-x-2">
                        <!-- TELEPON -->
                        <div class="flex items-center">
                            <img src="/images/phone.svg" alt="phone" class="h-6 w-6 mr-2">
                            <div class="ml-4">
                                <span class="font-semibold">TELEPON</span>
                                <p class="text-sm">021-5701109</p>
                            </div>
                        </div>

                        <!-- EMAIL -->
                        <div class="flex items-center">
                            <img src="/images/mail.svg" alt="mail" class="h-6 w-6 mr-2">
                            <div class="ml-4">
                                <span class="font-semibold">EMAIL</span>
                                <p class="underline text-sm">kalpataru@menlhk.go.id</p>
                            </div>
                        </div>

                        <!-- LOKASI -->
                        <div class="flex items-center">
                            <img src="/images/location.svg" alt="location" class="h-6 w-6 mr-2">
                            <div class="ml-4">
                                <span class="font-semibold">LOKASI</span>
                                <p class="text-sm">Gedung Manggala Wanabakti Blok IV, Lantai 6, Wings B, Jl. Gatot Subroto, Senayan, Jakarta Pusat, 10270, Indonesia</p>
                            </div>
                        </div>
                        <div class="ml-12 mt-2">
                            <iframe class="w-full h-40 md:w-96 md:h-48"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4354811880426!2d106.79589797499023!3d-6.2061464937816915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f15686ca29a1%3A0xed7fb816ccc5dbf5!2sManggala%20Wanabakti!5e0!3m2!1sen!2sid!4v1727858044898!5m2!1sen!2sid"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>

                    </div>
                </div>


                <!-- Right Section (Contact Form) -->
                <div class="p-8">
                    <h2 class="text-2xl font-bold mb-2 flex justify-center">Kontak Kami</h2>
                    <hr class="border-2 border-footer w-1/4 mx-auto">
                    <form id="contactForm" class="mt-4" onsubmit="return validateForm()">
                        <div class="mb-4">
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Instansi / Nama Pribadi</label>
                            <input type="text" name="nama" id="nama" placeholder="contoh: Kemitraan Lingkungan" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" placeholder="contoh: johndoe@example.com" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                        </div>

                        <div class="mb-4">
                            <label for="telepon" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                            <input type="number" name="telepon" id="telepon" placeholder="contoh: 08xxxxxxxx" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                        </div>

                        <div class="mb-4">
                            <label for="pesan" class="block text-sm font-medium text-gray-700">Pesan dan Saran</label>
                            <textarea name="pesan" id="pesan" rows="4" placeholder="Isi pesan dan saran Anda" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"></textarea>
                        </div>

                        <button type="submit" class="w-full bg-primary hover:bg-primaryhover text-white font-semibold py-2 px-4 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">KIRIM</button>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <script>
        function validateForm() {
            let nama = document.getElementById('nama').value.trim();
            let email = document.getElementById('email').value.trim();
            let telepon = document.getElementById('telepon').value.trim();
            let pesan = document.getElementById('pesan').value.trim();

            if (!nama) {
                showToast('Silahkan lengkapi nama instansi / nama pribadi');
                return false; // Stop form submission
            }

            if (!email) {
                showToast('Silahkan lengkapi email Anda');
                return false;
            }

            // Simple email format validation
            let emailPattern = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
            if (!emailPattern.test(email)) {
                showToast('Format email tidak valid');
                return false;
            }

            if (!telepon) {
                showToast('Silahkan lengkapi nomor telepon Anda');
                return false;
            }

            if (!pesan) {
                showToast('Silahkan isi pesan dan saran Anda');
                return false;
            }

            return true;
        }

        function showToast(message) {
            let toast = document.createElement('div');
            toast.className = 'fixed top-32 right-4 bg-[#800000] text-white p-4 rounded shadow';
            toast.innerText = message;

            document.body.appendChild(toast);

            setTimeout(() => {
                toast.remove();
            }, 3000);
        }
    </script>

    <?= $this->endSection() ?>


</body>

</html>