<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/app.css">
    <style>
        /* Sidebar terbuka secara default di layar besar (desktop) */
        @media (min-width: 768px) {
            #sidebar {
                display: block;
                /* Tampilkan sidebar di desktop */
            }

            #mainToggleBtn {
                display: none;
                /* Sembunyikan tombol utama ☰ di desktop */
            }
        }

        /* Sidebar tertutup secara default di layar kecil (mobile) */
        @media (max-width: 767px) {
            #sidebar {
                display: none;
                /* Sembunyikan sidebar di mobile */
            }

            #mainToggleBtn {
                display: block;
                /* Tampilkan tombol utama ☰ di mobile */
            }
        }
    </style>
</head>

<body>
    <div id="sidebar" class="w-full lg:w-1/4 h-3/4 rounded-lg lg:left-4 bg-white border-2 text-primary mb-6 p-5 relative">
        <button id="toggleSidebarBtn" class="absolute top-2 right-2 text-2xl text-primary">✖</button>
        <h2 class="text-md font-bold">Dinas Lingkungan Hidup Kab Bogor</h2>
        <p class="text-sm text-slate-400 font-semibold">Pengusul</p>
        <p class="text-sm text-slate-400 font-semibold">Jawa Barat</p>
        <ul class="mt-10 space-y-2">
            <li><a href="#" class="block text-md hover:bg-secondary p-2 rounded">Pemberitahuan</a></li>
            <li><a href="#" class="block text-md hover:bg-secondary p-2 rounded">Alur Pendaftaran</a></li>
            <li class="text-gray-400"><a href="#" class="block text-md hover:bg-secondary p-2 rounded">Tambah Calon Usulan</a></li>
            <li><a href="#" class="block text-md hover:bg-secondary p-2 rounded">Usulan Saya</a></li>
            <li><a href="#" class="block text-md hover:bg-secondary p-2 rounded">Panduan Pendaftaran</a></li>
            <li><a href="#" class="block text-md hover:bg-secondary p-2 rounded">Video Panduan</a></li>
            <li><a href="#" class="block text-md hover:bg-secondary p-2 rounded">Keluar</a></li>
        </ul>
    </div>

    <!-- Tombol toggle sidebar utama saat sidebar tertutup -->
    <button id="mainToggleBtn" class="text-xl text-primary hover:text-primaryhover hidden">☰</button>

    <script>
        // Toggle Sidebar
        const sidebar = document.getElementById('sidebar');
        const toggleSidebarBtn = document.getElementById('toggleSidebarBtn');
        const mainToggleBtn = document.getElementById('mainToggleBtn');

        // Event untuk menutup sidebar dan menampilkan tombol utama '☰'
        toggleSidebarBtn.addEventListener('click', () => {
            sidebar.classList.add('hidden'); // Sembunyikan sidebar
            mainToggleBtn.classList.remove('hidden'); // Tampilkan tombol utama ketika sidebar ditutup
        });

        // Event untuk membuka sidebar dan menyembunyikan tombol utama '☰'
        mainToggleBtn.addEventListener('click', () => {
            sidebar.classList.remove('hidden'); // Tampilkan sidebar
            mainToggleBtn.classList.add('hidden'); // Sembunyikan tombol utama ketika sidebar terbuka
        });

        // Menangani resize untuk menyesuaikan tampilan saat berpindah dari mobile ke desktop atau sebaliknya
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                sidebar.classList.remove('hidden'); // Pastikan sidebar terlihat di desktop
                mainToggleBtn.classList.add('hidden'); // Sembunyikan tombol utama di desktop
            } else {
                sidebar.classList.add('hidden'); // Sembunyikan sidebar di mobile
                mainToggleBtn.classList.remove('hidden'); // Tampilkan tombol utama di mobile
            }
        });
    </script>

</body>

</html>