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

<body class="bg-gray-100">
    <div id="sidebar" class="w-full lg:w-[15rem] h-3/4 rounded-lg text-primary mb-6 relative lg:left-36">
        <button id="toggleSidebarBtn" class="absolute top-2 right-3 text-2xl text-primary">✖</button>
        <div class="mt-12 mb-4 border-2 border-primary rounded-lg px-4 py-2 flex items-start bg-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20 mr-3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>

            <div>
                <h2 class="text-md font-bold">Joko Susilo</h2>
                <p class="text-sm text-slate-400 font-semibold">Penerima</p>
                <p class="text-sm text-slate-400 font-semibold">Jawa Barat</p>
            </div>
        </div>

        <ul class="border-2 border-primary rounded-lg px-4 py-4 bg-white">
            <li><a href="#" class="block text-md hover:bg-secondary p-2 rounded">Profil</a></li>
            <li><a href="#" class="block text-md hover:bg-secondary p-2 rounded">Tambah Berita</a></li>
            <li class="text-gray-400"><a href="#" class="block text-md hover:bg-secondary p-2 rounded">Berita Saya</a></li>
            <li><a href="/auth/logout" class="block text-md hover:bg-secondary p-2 rounded">Keluar</a></li>
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