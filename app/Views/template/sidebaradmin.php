<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/app.css">
    <title><?= $title; ?></title>
</head>

<body class="bg-gray-100">
    <!-- Hamburger Button -->
    <div class="md:hidden flex justify-around items-center p-4 bg-primary text-white">
        <div class="text-xl font-bold">Penghargaan Kalpataru</div>
        <div class="hamburger" onclick="toggleSidebar()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </div>
    </div>

    <section class="grid md:grid-cols-[300px_1fr] grid-cols-1 h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="flex flex-col bg-white text-primary shadow-md md:h-[calc(100vh)] w-full max-w-[300px] mx-auto md:mx-0 p-6 transition-transform duration-300 transform -translate-x-full md:translate-x-0">
            <div class="mb-4 flex items-center gap-4 p-4">
                <img src="../images/logo.png" alt="brand" />
            </div>
            <hr class="my-2 border-primary" />

            <!-- Navigation -->
            <nav class="flex flex-col gap-1 font-sans text-base font-normal text-primary">
                <div class="block relative w-full">
                    <div class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all">
                        <p class="block antialiased font-sans text-xl font-extrabold leading-relaxed">Admin</p>
                    </div>
                </div>
                <hr class="my-2 border-primary" />

                <div role="button" class="text-md sidebar-item flex items-center w-full p-3 rounded-lg hover:bg-secondary">
                    Dashboard
                </div>
                <div role="button" class="text-md sidebar-item flex items-center w-full p-3 rounded-lg hover:bg-secondary">
                    Pengguna
                </div>
                <div role="button" class="text-md sidebar-item flex items-center w-full p-3 rounded-lg hover:bg-secondary">
                    Akun Baru Pengusul
                </div>
                <div role="button" class="text-md sidebar-item flex items-center w-full p-3 rounded-lg hover:bg-secondary">
                    Pembuatan Akun DPPK
                </div>
                <div role="button" class="text-md sidebar-item flex items-center w-full p-3 rounded-lg hover:bg-secondary">
                    Pembuatan Akun Tim Teknis
                </div>
                <div role="button" class="text-md sidebar-item flex items-center w-full p-3 rounded-lg hover:bg-secondary">
                    Data Calon
                </div>
                <div role="button" class="text-md sidebar-item flex items-center w-full p-3 rounded-lg hover:bg-secondary">
                    Nominasi Kalpataru
                </div>

                <div class="relative">
                    <div class="flex items-center w-full p-3 rounded-lg cursor-pointer hover:bg-secondary" onclick="toggleDropdown('sidang-dropdown', 'sidang-arrow')">
                        <span>Sidang</span>
                        <div class="ml-auto">
                            <svg id="sidang-arrow" class="h-5 w-5 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 16.5l6-6H6z" />
                            </svg>
                        </div>
                    </div>
                    <div id="sidang-dropdown" class="hidden bg-white rounded-lg shadow-lg mt-2 absolute w-full">
                        <a href="#" class="block px-4 py-2 hover:bg-secondary">Sidang 1</a>
                        <a href="#" class="block px-4 py-2 hover:bg-secondary">Sidang 2</a>
                    </div>
                </div>
                <div role="button" class="text-md sidebar-item flex items-center w-full p-3 rounded-lg hover:bg-secondary">
                    Arsip Penerima
                </div>

                <div class="relative">
                    <div class="flex items-center w-full p-3 rounded-lg cursor-pointer hover:bg-secondary" onclick="toggleDropdown('publikasi-dropdown', 'publikasi-arrow')">
                        <span>Publikasi</span>
                        <div class="ml-auto">
                            <svg id="publikasi-arrow" class="h-5 w-5 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 16.5l6-6H6z" />
                            </svg>
                        </div>
                    </div>
                    <div id="publikasi-dropdown" class="hidden bg-white rounded-lg shadow-lg mt-2 absolute w-full">
                        <a href="#" class="block px-4 py-2 hover:bg-secondary">Berita</a>
                        <a href="#" class="block px-4 py-2 hover:bg-secondary">Artikel Masuk</a>
                        <a href="#" class="block px-4 py-2 hover:bg-secondary">Pengumuman</a>
                        <a href="#" class="block px-4 py-2 hover:bg-secondary">Video</a>
                        <a href="#" class="block px-4 py-2 hover:bg-secondary">Buku</a>
                        <a href="#" class="block px-4 py-2 hover:bg-secondary">Kebijakan</a>
                    </div>
                </div>
            </nav>
        </div>

        <script>
            // Toggle Sidebar
            function toggleSidebar() {
                const sidebar = document.getElementById('sidebar');
                sidebar.classList.toggle('-translate-x-full');
            }

            // Toggle Dropdown
            function toggleDropdown(dropdownId, arrowId) {
                const dropdown = document.getElementById(dropdownId);
                const arrow = document.getElementById(arrowId);
                dropdown.classList.toggle('hidden');
                arrow.classList.toggle('rotate-180');
            }
        </script>
    </section>
</body>

</html>
