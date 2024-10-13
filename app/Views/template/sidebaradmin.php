<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/app.css">
    <title><?= $title; ?></title>
</head>

<body class="bg-gray-100">

    <!-- Tombol Hamburger untuk Mobile -->
    <button id="hamburgerBtn" class="absolute top-4 left-4 z-50 block md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>

    </button>

    <!-- Sidebar -->
    <div id="sidebar"
        class="fixed top-0 left-0 z-40 mt-4 h-full w-64 -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out flex flex-col rounded-xl bg-white bg-clip-border px-4 py-8 text-gray-700 shadow-xl shadow-blue-gray-900/5 md:relative md:w-1/5">

        <img src="../images/logo.png">
        <hr class="border-primary border-2">
        <div class="p-4 mb-2">
            <h5 class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-primary">
                Admin
            </h5>
        </div>
        <div class="relative block w-full">
                <div role="button"
                    class="flex items-center w-full p-0 leading-tight transition-all rounded-lg outline-none bg-blue-gray-50/50 text-start text-blue-gray-700 hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-primary focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-primary active:bg-blue-gray-50 active:bg-opacity-80 active:text-primary">
                    <button id="dropdownBtn1" type="button"
                        class="flex items-center justify-between w-full p-3 font-sans text-xl antialiased font-semibold leading-snug text-left transition-colors border-b-0 select-none border-b-blue-gray-100 text-primary hover:text-primary">
                        <div class="grid mr-4 place-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                            </svg>
                        </div>
                        <p class="block mr-auto font-sans text-base antialiased font-normal leading-relaxed text-primary">
                            Dashboard
                        </p>
                    </button>
                </div>
            </div>
            <div class="relative block w-full">
                <div role="button"
                    class="flex items-center w-full p-0 leading-tight mt-2 transition-all rounded-lg outline-none bg-blue-gray-50/50 text-start text-blue-gray-700 hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-primary focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-primary active:bg-blue-gray-50 active:bg-opacity-80 active:text-primary">
                    <button id="dropdownBtn4" type="button"
                        class="flex items-center justify-between w-full p-3 font-sans text-xl antialiased font-semibold leading-snug text-left transition-colors border-b-0 select-none border-b-blue-gray-100 text-primary hover:text-primary">
                        <div class="grid mr-4 place-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </div>
                        <p class="block mr-auto font-sans text-base antialiased font-normal leading-relaxed text-primary">
                            Pengguna
                        </p>
                        <span class="ml-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                stroke="currentColor" aria-hidden="true" id="dropdownIcon4"
                                class="w-4 h-4 mx-auto transition-transform rotate-180">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5">
                                </path>
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
            <div id="dropdownMenu4" class="hidden">
                    <div class="block w-full py-1 font-sans text-sm antialiased font-light leading-normal text-gray-700">
                        <nav
                            class="flex min-w-[240px] flex-col gap-1 p-0 font-sans text-base font-normal text-blue-gray-700">
                            <div role="button"
                                class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-primary focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-primary active:bg-blue-gray-50 active:bg-opacity-80 active:text-primary">
                                <div class="grid mr-4 place-items-center">
                                
                                </div>
                                DPPK
                            </div>
                            <div role="button"
                                class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-primary focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-primary active:bg-blue-gray-50 active:bg-opacity-80 active:text-primary">
                                <div class="grid mr-4 place-items-center">
                                    
                                </div>
                                Tim Teknis
                            </div>
                            <div role="button"
                                class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-primary focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-primary active:bg-blue-gray-50 active:bg-opacity-80 active:text-primary">
                                <div class="grid mr-4 place-items-center">
                                   
                                </div>
                                Penerima
                            </div>
                            <div role="button"
                                class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-primary focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-primary active:bg-blue-gray-50 active:bg-opacity-80 active:text-primary">
                                <div class="grid mr-4 place-items-center">
                                    
                                </div>
                                Pengusul
                            </div>
                        </nav>
                    </div>
                </div>
            
            <div class="relative block w-full">
                <div role="button"
                    class="flex items-center mt-2 w-full p-0 leading-tight transition-all rounded-lg outline-none bg-blue-gray-50/50 text-start text-blue-gray-700 hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-primary focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-primary active:bg-blue-gray-50 active:bg-opacity-80 active:text-primary">
                    <button id="dropdownBtn5" type="button"
                        class="flex items-center justify-between w-full p-3 font-sans text-xl antialiased font-semibold leading-snug text-left transition-colors border-b-0 select-none border-b-blue-gray-100 text-primary hover:text-primary">
                        <div class="grid mr-4 place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                        </svg>
                        </div>
                        <p class="block mr-auto font-sans text-base antialiased font-normal leading-relaxed text-primary">
                            Tambah Akun
                        </p>
                        <span class="ml-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                stroke="currentColor" aria-hidden="true" id="dropdownIcon5"
                                class="w-4 h-4 mx-auto transition-transform rotate-180">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5">
                                </path>
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
            <div id="dropdownMenu5" class="hidden">
                    <div class="block w-full py-1 font-sans text-sm antialiased font-light leading-normal text-gray-700">
                        <nav
                            class="flex min-w-[240px] flex-col gap-1 p-0 font-sans text-base font-normal text-blue-gray-700">
                            <div role="button"
                                class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-primary focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-primary active:bg-blue-gray-50 active:bg-opacity-80 active:text-primary">
                                <div class="grid mr-4 place-items-center">
                                   
                                </div>
                                Akun DPPK
                            </div>
                            <div role="button"
                                class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-primary focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-primary active:bg-blue-gray-50 active:bg-opacity-80 active:text-primary">
                                <div class="grid mr-4 place-items-center">
                                  
                                </div>
                                Akun Tim Teknis
                            </div>
                            <div role="button"
                                class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-primary focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-primary active:bg-blue-gray-50 active:bg-opacity-80 active:text-primary">
                                <div class="grid mr-4 place-items-center">
                                   
                                </div>
                                Akun Tim Penerima
                            </div>
                            <div role="button"
                                class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-primary focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-primary active:bg-blue-gray-50 active:bg-opacity-80 active:text-primary">
                                <div class="grid mr-4 place-items-center">
                                    
                                </div>
                                Akun DLHK
                            </div>
                        </nav>
                    </div>
                </div>
            
            <div class="relative block w-full">
                <div role="button"
                    class="flex items-center mt-2 w-full p-0 leading-tight transition-all rounded-lg outline-none bg-blue-gray-50/50 text-start text-blue-gray-700 hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-primary focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-primary active:bg-blue-gray-50 active:bg-opacity-80 active:text-primary">
                    <button id="dropdownBtn1" type="button"
                        class="flex items-center justify-between w-full p-3 font-sans text-xl antialiased font-semibold leading-snug text-left transition-colors border-b-0 select-none border-b-blue-gray-100 text-primary hover:text-primary">
                        <div class="grid mr-4 place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                        </svg>
                        </div>
                        <p class="block mr-auto font-sans text-base antialiased font-normal leading-relaxed text-primary">
                            Data Calon
                        </p>
                    </button>
                </div>
            </div>
            <div class="relative block w-full">
                <div role="button"
                    class="flex items-center mt-2 w-full p-0 leading-tight transition-all rounded-lg outline-none bg-blue-gray-50/50 text-start text-blue-gray-700 hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-primary focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-primary active:bg-blue-gray-50 active:bg-opacity-80 active:text-primary">
                    <button id="dropdownBtn1" type="button"
                        class="flex items-center justify-between w-full p-3 font-sans text-xl antialiased font-semibold leading-snug text-left transition-colors border-b-0 select-none border-b-blue-gray-100 text-primary hover:text-primary">
                        <div class="grid mr-4 place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                        </svg>

                        </div>
                        <p class="block mr-auto font-sans text-base antialiased font-normal leading-relaxed text-primary">
                            Nominasi Kalpataru
                        </p>
                    </button>
                </div>
            </div>
            <div class="relative block w-full">
                <div role="button"
                    class="flex items-center mt-2 w-full p-0 leading-tight transition-all rounded-lg outline-none bg-blue-gray-50/50 text-start text-blue-gray-700 hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-primary focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-primary active:bg-blue-gray-50 active:bg-opacity-80 active:text-primary">
                    <button id="dropdownBtn3" type="button"
                        class="flex items-center justify-between w-full p-3 font-sans text-xl antialiased font-semibold leading-snug text-left transition-colors border-b-0 select-none border-b-blue-gray-100 text-primary hover:text-primary">
                        <div class="grid mr-4 place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" />
                        </svg>
                        </div>
                        <p class="block mr-auto font-sans text-base antialiased font-normal leading-relaxed text-primary">
                            Sidang
                        </p>
                        <span class="ml-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                stroke="currentColor" aria-hidden="true" id="dropdownIcon"
                                class="w-4 h-4 mx-auto transition-transform rotate-180">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5">
                                </path>
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
            <div id="dropdownMenu3" class="hidden">
                    <div class="block w-full py-1 font-sans text-sm antialiased font-light leading-normal text-gray-700">
                        <nav
                            class="flex min-w-[240px] flex-col gap-1 p-0 font-sans text-base font-normal text-blue-gray-700">
                            <div role="button"
                                class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-primary focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-primary active:bg-blue-gray-50 active:bg-opacity-80 active:text-primary">
                                <div class="grid mr-4 place-items-center">
                                   
                                </div>
                                Sidang 1
                            </div>
                            <div role="button"
                                class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-primary focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-primary active:bg-blue-gray-50 active:bg-opacity-80 active:text-primary">
                                <div class="grid mr-4 place-items-center">
                                   
                                </div>
                                Sidang 2
                            </div>
                        </nav>
                    </div>
                </div>
            <div class="relative block w-full">
                <div role="button"
                    class="flex items-center mt-2 w-full p-0 leading-tight transition-all rounded-lg outline-none bg-blue-gray-50/50 text-start text-blue-gray-700 hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-primary focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-primary active:bg-blue-gray-50 active:bg-opacity-80 active:text-primary">
                    <button id="dropdownBtn1" type="button"
                        class="flex items-center justify-between w-full p-3 font-sans text-xl antialiased font-semibold leading-snug text-left transition-colors border-b-0 select-none border-b-blue-gray-100 text-primary hover:text-primary">
                        <div class="grid mr-4 place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                        </svg>
                        </div>
                        <p class="block mr-auto font-sans text-base antialiased font-normal leading-relaxed text-primary">
                            Arsip Penerima
                        </p>
                    </button>
                </div>
            </div>

            <!-- Dropdown Dashboard 2 -->
            <div class="relative block w-full">
                <div role="button"
                    class="flex items-center mt-2 w-full p-0 leading-tight transition-all rounded-lg outline-none bg-blue-gray-50/50 text-start text-blue-gray-700 hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-primary focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-primary active:bg-blue-gray-50 active:bg-opacity-80 active:text-primary">
                    <button id="dropdownBtn2" type="button"
                        class="flex items-center justify-between w-full p-3 font-sans text-xl antialiased font-semibold leading-snug text-left transition-colors border-b-0 select-none border-b-blue-gray-100 text-primary hover:text-primary">
                        <div class="grid mr-4 place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                        </svg>
                        </div>
                        <p class="block mr-auto font-sans text-base antialiased font-normal leading-relaxed text-primary">
                            Publikasi
                        </p>
                        <span class="ml-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                stroke="currentColor" aria-hidden="true" id="dropdownIcon2"
                                class="w-4 h-4 mx-auto transition-transform rotate-180">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5">
                                </path>
                            </svg>
                        </span>
                    </button>
                </div>
                <div id="dropdownMenu2" class="hidden">
                    <div class="block w-full py-1 font-sans text-sm antialiased font-light leading-normal text-gray-700">
                        <nav
                            class="flex min-w-[240px] flex-col gap-1 p-0 font-sans text-base font-normal text-blue-gray-700">
                            <div role="button"
                                class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-primary focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-primary active:bg-blue-gray-50 active:bg-opacity-80 active:text-primary">
                                <div class="grid mr-4 place-items-center">
                                    
                                </div>
                                Artikel
                            </div>
                            <div role="button"
                                class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-primary focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-primary active:bg-blue-gray-50 active:bg-opacity-80 active:text-primary">
                                <div class="grid mr-4 place-items-center">
                                    
                                </div>
                                Berita
                            </div>
                            <div role="button"
                                class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-primary focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-primary active:bg-blue-gray-50 active:bg-opacity-80 active:text-primary">
                                <div class="grid mr-4 place-items-center">
                                   
                                </div>
                                Pengumuman
                            </div>
                            <div role="button"
                                class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-primary focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-primary active:bg-blue-gray-50 active:bg-opacity-80 active:text-primary">
                                <div class="grid mr-4 place-items-center">
                                    
                                </div>
                                Video
                            </div>
                            <div role="button"
                                class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-primary focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-primary active:bg-blue-gray-50 active:bg-opacity-80 active:text-primary">
                                <div class="grid mr-4 place-items-center">
                                   
                                </div>
                                Buku
                            </div>
                            <div role="button"
                                class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-primary focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-primary active:bg-blue-gray-50 active:bg-opacity-80 active:text-primary">
                                <div class="grid mr-4 place-items-center">
                                    
                                </div>
                                Kebijakan
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <script>
        // Toggle Dashboard 2
        document.getElementById("dropdownBtn2").addEventListener("click", function () {
            document.getElementById("dropdownMenu2").classList.toggle("hidden");
            document.getElementById("dropdownIcon2").classList.toggle("rotate-180");
        });

        document.getElementById("dropdownBtn3").addEventListener("click", function () {
            document.getElementById("dropdownMenu3").classList.toggle("hidden");
            document.getElementById("dropdownIcon3").classList.toggle("rotate-180");
        });

        document.getElementById("dropdownBtn4").addEventListener("click", function () {
            document.getElementById("dropdownMenu4").classList.toggle("hidden");
            document.getElementById("dropdownIcon4").classList.toggle("rotate-180");
        });

        document.getElementById("dropdownBtn5").addEventListener("click", function () {
            document.getElementById("dropdownMenu5").classList.toggle("hidden");
            document.getElementById("dropdownIcon5").classList.toggle("rotate-180");
        });

         // Toggle Hamburger Menu for Sidebar
         document.getElementById("hamburgerBtn").addEventListener("click", function () {
            let sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle("-translate-x-full");
        });


       
    </script>
</body>

</html>
