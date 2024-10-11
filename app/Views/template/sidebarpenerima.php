<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/app.css">
</head>

<body class="bg-gray-100">
    <div id="sidebar" class="lg:w-[15rem] lg:h-3/4 lg:rounded-lg text-white mb-6 relative lg:mr-6 lg:z-0 z-50">
        <!-- Profil section -->
        <div class="mb-4 border-2 border-primaryhover rounded-lg px-4 py-2 flex items-start bg-primary hidden lg:flex">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20 mr-3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>

            <div>
                <h2 class="text-md font-bold">Joko Susilo</h2>
                <p class="text-sm text-secondary font-semibold">Penerima</p>
                <p class="text-sm text-secondary font-semibold">Jawa Barat</p>
            </div>
        </div>

        <?php
        $isDLHK = true;
        ?>
        <!-- Menu -->
        <ul class="lg:border-2 border-t-2 border-primaryhover lg:rounded-lg lg:px-4 lg:py-4 lg:bg-primary bg-primary flex justify-between fixed bottom-0 left-0 right-0 shadow-md lg:block lg:relative lg:shadow-none overflow-x-auto scroll-smooth overscroll-x-contain">
            <li class="flex items-center justify-center lg:justify-start">
                <a href="../penerima/profil" class="flex items-center block text-md hover:bg-secondary hover:text-primaryhover p-2 w-full rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <span class="ml-2 text-sm hidden lg:inline">Profil</span>
                </a>
            </li>
            <?php if ($isDLHK): ?>
                <li class="flex items-center justify-center lg:justify-start">
                    <a href="../penerima/tambahartikel" class="flex items-center block text-md hover:bg-secondary hover:text-primaryhover p-2 w-full rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                        <span class="ml-2 text-sm hidden lg:inline">Tambah Artikel</span>
                    </a>
                </li>
                <li class="flex items-center justify-center lg:justify-start">
                    <a href="../penerima/artikelsaya" class="flex items-center block text-md hover:bg-secondary hover:text-primaryhover p-2 w-full rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                        </svg>
                        <span class="ml-2 text-sm hidden lg:inline">Artikel Saya</span>
                    </a>
                </li>
            <?php endif; ?>
            <li class="flex items-center justify-center lg:justify-start">
                <a href="../auth/logout" class="flex items-center block text-md hover:bg-secondary hover:text-primaryhover p-2 w-full rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                    </svg>
                    <span class="ml-2 text-sm hidden lg:inline">Keluar</span>
                </a>
            </li>
        </ul>
    </div>
</body>

</html>