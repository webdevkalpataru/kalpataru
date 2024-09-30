<nav class="my-5 block rounded-lg w-full max-w-screen-lg px-4 py-4 mx-auto bg-white bg-opacity-90 sticky top-3 shadow-lg lg:px-8 lg:py-3 backdrop-blur-lg backdrop-saturate-150 z-[9999]">
    <div class="container flex flex-wrap items-center justify-between mx-auto text-slate-800">
        <a href="#" class="mr-4 block cursor-pointer py-1.5 text-base text-slate-800 font-semibold">
            <img src="/images/logo.png" alt="Logo" width="200">
        </a>
        <div class="hidden lg:block" id="desktop-menu">
            <ul class="flex flex-col gap-2 mt-2 mb-4 lg:mb-0 lg:mt-0 lg:flex-row lg:items-center lg:gap-6">
                <li class="flex items-center p-1 text-sm gap-x-2 text-primary hover:text-primaryhover">
                    <a href="/" class="flex items-center">Beranda</a>
                </li>
                <li class="flex items-center p-1 text-sm gap-x-2 text-primary hover:text-primaryhover">
                    <a href="#" class="flex items-center">Profil</a>
                </li>
                <li class="relative flex items-center p-1 text-sm gap-x-2 text-primary hover:text-primaryhover group">
                    <a href="#" class="flex items-center">Informasi</a>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                    <ul class="absolute left-0 top-full opacity-0 invisible group-hover:visible group-hover:opacity-100 transition-all duration-300 transform bg-white shadow-lg border-opacity-5 border-2 mt-1 py-2 rounded-lg z-50">
                        <li><a href="#" class="block px-4 py-2 text-primary hover:text-primaryhover hover:bg-secondary">Pengumuman</a></li>
                        <li><a href="#" class="block px-4 py-2 text-primary hover:text-primaryhover hover:bg-secondary">Peraturan dan Kebijakan</a></li>
                        <li><a href="#" class="block px-4 py-2 text-primary hover:text-primaryhover hover:bg-secondary">Data dan Statistik</a></li>
                    </ul>
                </li>
                <li class="relative flex items-center p-1 text-sm gap-x-2 text-primary hover:text-primaryhover group">
                    <a href="#" class="flex items-center">Publikasi</a>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                    <ul class="absolute left-0 top-full opacity-0 invisible group-hover:visible group-hover:opacity-100 transition-all duration-300 transform bg-white shadow-lg border-opacity-5 border-2 mt-1 py-2 rounded-lg z-50">
                        <li><a href="#" class="block px-4 py-2 text-primary hover:text-primaryhover hover:bg-secondary">Berita</a></li>
                        <li><a href="#" class="block px-4 py-2 text-primary hover:text-primaryhover hover:bg-secondary">Artikel</a></li>
                        <li><a href="#" class="block px-4 py-2 text-primary hover:text-primaryhover hover:bg-secondary">Video</a></li>
                        <li><a href="#" class="block px-4 py-2 text-primary hover:text-primaryhover hover:bg-secondary">Buku</a></li>
                    </ul>
                </li>
                <li class="relative flex items-center p-1 text-sm gap-x-2 text-primary hover:text-primaryhover group">
                    <a href="#" class="flex items-center">SIHARU</a>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                    <ul class="absolute left-0 top-full opacity-0 invisible group-hover:visible group-hover:opacity-100 transition-all duration-300 transform bg-white shadow-lg border-opacity-5 border-2 mt-1 py-2 rounded-lg z-50">
                        <li><a href="http://pskl.menlhk.go.id/" target="_blank" class="block px-4 py-2 text-primary hover:text-primaryhover hover:bg-secondary">SI PSKL</a></li>
                        <li><a href="https://gokups.menlhk.go.id/" target="_blank" class="block px-4 py-2 text-primary hover:text-primaryhover hover:bg-secondary">goKUPS</a></li>
                    </ul>
                </li>
                <li class="flex items-center p-1 text-sm gap-x-2 text-primary hover:text-primaryhover">
                    <a href="#" class="flex items-center">Kontak</a>
                </li>
                <li class="flex items-center p-1 text-sm gap-x-2 text-primary hover:text-primaryhover">
                    <button class="rounded-md bg-primary py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-primaryhover focus:shadow-none active:bg-primaryhover hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                        Masuk
                    </button>
                </li>
            </ul>
        </div>
        <button class="relative ml-auto h-6 w-6 select-none rounded-lg lg:hidden" type="button" id="hamburger">
            <span class="block w-full h-0.5 bg-slate-800 transition-all duration-300 ease-in-out origin-center" id="line-1"></span>
            <span class="block w-full h-0.5 bg-slate-800 mt-1.5 transition-all duration-300 ease-in-out origin-center" id="line-2"></span>
            <span class="block w-full h-0.5 bg-slate-800 mt-1.5 transition-all duration-300 ease-in-out origin-center" id="line-3"></span>
        </button>
    </div>

    <!-- Mobile -->
    <div id="mobile-menu" class="lg:hidden hidden">
        <ul class="flex flex-col text-center text-primary hover:text-primaryhover rounded-lg">
            <li><a href="/" class="text-left block px-4 py-2 text-primary hover:text-primaryhover hover:bg-secondary">Beranda</a></li>
            <li><a href="#" class="text-left block px-4 py-2 text-primary hover:text-primaryhover hover:bg-secondary">Profil</a></li>
            <li class="relative">
                <button class="flex items-center w-full text-left px-4 py-2 text-primary hover:text-primaryhover hover:bg-secondary" onclick="toggleDropdown('dropdown-informasi')">Informasi
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="flex"></div>
                <ul id="dropdown-informasi" class="hidden space-y-2 bg-white shadow-lg rounded-lg p-2">
                    <li><a href="#" class="text-left block px-4 py-2 text-primary hover:text-primaryhover hover:bg-secondary">Pengumuman</a></li>
                    <li><a href="#" class="text-left block px-4 py-2 text-primary hover:text-primaryhover hover:bg-secondary">Peraturan dan Kebijakan</a></li>
                    <li><a href="#" class="text-left block px-4 py-2 text-primary hover:text-primaryhover hover:bg-secondary">Data dan Statistik</a></li>
                </ul>
            </li>
            <li class="relative">
                <button class="flex items-center w-full text-left px-4 py-2 text-primary hover:text-primaryhover hover:bg-secondary" onclick="toggleDropdown('dropdown-publikasi')">Publikasi
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <ul id="dropdown-publikasi" class="hidden space-y-2 bg-white shadow-lg rounded-lg p-2">
                    <li><a href="#" class="text-left block px-4 py-2 text-primary hover:text-primaryhover hover:bg-secondary">Berita</a></li>
                    <li><a href="#" class="text-left block px-4 py-2 text-primary hover:text-primaryhover hover:bg-secondary">Artikel</a></li>
                    <li><a href="#" class="text-left block px-4 py-2 text-primary hover:text-primaryhover hover:bg-secondary">Video</a></li>
                    <li><a href="#" class="text-left block px-4 py-2 text-primary hover:text-primaryhover hover:bg-secondary">Buku</a></li>
                </ul>
            </li>
            <li class="relative">
                <button class="flex items-center w-full text-left px-4 py-2 text-primary hover:text-primaryhover hover:bg-secondary" onclick="toggleDropdown('dropdown-siharu')">SIHARU
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <ul id="dropdown-siharu" class="hidden space-y-2 bg-white shadow-lg rounded-lg p-2">
                    <li><a href="http://pskl.menlhk.go.id/" target="_blank" class="text-left block px-4 py-2 text-primary hover:text-primaryhover hover:bg-secondary">SI PSKL</a></li>
                    <li><a href="https://gokups.menlhk.go.id/" target="_blank" class="text-left block px-4 py-2 text-primary hover:text-primaryhover hover:bg-secondary">goKUPS</a></li>
                </ul>
            </li>
            <li><a href="#" class="text-left block px-4 py-2 text-primary hover:text-primaryhover hover:bg-secondary">Kontak</a></li>
            <li class="flex justify-end"><button class="text-left block px-4 py-2 rounded-md bg-primary border border-transparent text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-primaryhover focus:shadow-none active:bg-primaryhover hover:bg-primaryhover active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                    Masuk
                </button></li>

        </ul>
    </div>
</nav>

<script>
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobile-menu');
    const line1 = document.getElementById('line-1');
    const line2 = document.getElementById('line-2');
    const line3 = document.getElementById('line-3');

    hamburger.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
        mobileMenu.classList.toggle('block');

        if (mobileMenu.classList.contains('block')) {
            line1.style.transform = 'rotate(45deg)';
            line1.style.position = 'absolute';
            line1.style.top = '50%';
            line1.style.transformOrigin = 'center';
            line2.style.opacity = '0';
            line3.style.transform = 'rotate(-45deg)';
            line3.style.position = 'absolute';
            line3.style.top = '25%';
            line3.style.transformOrigin = 'center';
        } else {
            line1.style.transform = 'rotate(0deg)';
            line1.style.position = 'relative';
            line1.style.top = '0';
            line2.style.opacity = '1';
            line3.style.transform = 'rotate(0deg)';
            line3.style.position = 'relative';
            line3.style.top = '0';
        }
    });

    function toggleDropdown(id) {
        const dropdown = document.getElementById(id);
        dropdown.classList.toggle('hidden');
        dropdown.classList.toggle('block');
    };
</script>