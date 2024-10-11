<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <style>
        /* Animasi untuk fade-in dan slide-in */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1s ease-out forwards;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .bounce {
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
    </style>
</head>

<body class="lg:flex">

    <!-- Sidebar -->
    <?= $this->include('template/sidebartimteknis') ?>

    <!-- Main Content -->
    <div class="lg:flex-1 p-6 flex items-center justify-center">
        <div class="min-h-screen flex flex-col items-center justify-center text-center space-y-6">

            <!-- Gambar dengan animasi bounce dan efek hover -->
            <img src="/images/logomaintenance.png" alt="logomaintenance" class="w-1/3 mx-auto lg:w-1/4 hover:scale-105 transition-transform duration-300 bounce">

            <!-- Teks dengan animasi fade-in -->
            <p class="text-lg lg:text-xl text-gray-700 font-semibold w-1/2 fade-in">
                Mohon maaf, halaman ini belum dapat tersedia karena sedang dalam proses penyempurnaan. Kami menghargai kesabaran Anda selama proses ini. Terima kasih atas pengertiannya.
            </p>
        </div>
    </div>

</body>

</html>
