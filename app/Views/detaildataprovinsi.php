<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">

    <?= $this->extend('template/navbarfooter') ?>

    <?= $this->section('content') ?>

    <div class="flex items-center justify-center w-full"> <!-- Ensure the container takes full width -->
        <div class="max-w-5xl mb-4 rounded-xl border-2 border-primary bg-white shadow-md lg:p-8 p-4">
            <div class="flex flex-col lg:flex-row items-center"> <!-- Flex layout for image and form -->
                <!-- Gambar -->
                <div class="flex justify-center w-full lg:w-1/2 mb-4 lg:mb-0">
                    <img src="/images/lukaskalpataru.jpg" alt="Description of image" class="object-contain w-1/2 lg:w-full">
                </div>

               
                <form id="profil-pengusulForm" class="w-full lg:w-1/2 mb-2 ml-8">
                    <div class="grid grid-cols-1 gap-4">
                    
                        <div class="space-y-4">
                            <div class="w-full mb-4">
                                <label class="block mb-2 text-sm text-black">Nama</label>
                                <input readonly type="text" value="Lukas" class="w-full bg-transparent placeholder:text-slate-400 text-slate-400 text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none" />
                            </div>
                            <div class="w-full mb-4">
                                <label class="block mb-2 text-sm text-black">Kategori</label>
                                <input readonly type="text" value="Perintis Lingkungan" class="w-full bg-transparent placeholder:text-slate-400 text-slate-400 text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none" />
                            </div>
                            <div class="w-full mb-4">
                                <label class="block mb-2 text-sm text-black">Tahun</label>
                                <input readonly type="text" value="2023" class="w-full bg-transparent placeholder:text-slate-400 text-slate-400 text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none" />
                            </div>
                            <div class="w-full mb-4">
                                <label class="block mb-2 text-sm text-black">Provinsi</label>
                                <input readonly type="text" value="Papua Barat" class="w-full bg-transparent placeholder:text-slate-400 text-slate-400 text-sm border-2 border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="flex flex-col items-center mt-4"> 
                <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
            </div>
            <button onclick="window.history.back()"
                    class="text-sm font-bold text-gray-600 no-underline focus:outline-none text-start mt-6">
                    <span class="font-bold text-lg items-center">←</span> Kembali
                </button>
        </div>
    </div>

    <?= $this->endSection() ?>
</body>

</html>
