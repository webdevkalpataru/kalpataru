<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/app.css">
    <title><?= $title; ?></title>
</head>

<body>
    <section class="grid md:grid-cols-[300px_1fr] grid-cols-1 h-screen">
        <!-- Sidebar -->
        <div class="flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md md:h-[calc(100vh)] w-full max-w-[300px] mx-auto md:mx-0 p-6">
            <div class="mb-2 flex items-center gap-4 p-4">
                <img src="../images/logo.png" alt="brand" />
            </div>
            <hr class="my-2 border-gray-200" />

            <!-- Navigation -->
            <nav class="flex flex-col gap-1 font-sans text-base font-normal text-gray-700">
                <div class="block relative w-full">
                    <div data-selected="false" role="button" data-ripple-dark="true" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-gray-50 focus:bg-gray-50 hover:text-gray-900">
                        <p class="block antialiased font-sans text-xl font-bold leading-relaxed text-blue-gray-900">Admin</p>
                    </div>
                </div>

                <hr class="my-2 border-gray-200" />
                <div role="button" class="flex items-center w-full p-3 rounded-lg hover:bg-gray-100 focus:bg-gray-100">
                    <div class="grid place-items-center mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                            <path fill-rule="evenodd" d="M1.5 7.125c0-1.036.84-1.875 1.875-1.875h6c1.036 0 1.875.84 1.875 1.875v3.75c0 1.036-.84 1.875-1.875 1.875h-6A1.875 1.875 0 0 1 1.5 10.875v-3.75Zm12 1.5c0-1.036.84-1.875 1.875-1.875h5.25c1.035 0 1.875.84 1.875 1.875v8.25c0 1.035-.84 1.875-1.875 1.875h-5.25a1.875 1.875 0 0 1-1.875-1.875v-8.25ZM3 16.125c0-1.036.84-1.875 1.875-1.875h5.25c1.036 0 1.875.84 1.875 1.875v2.25c0 1.035-.84 1.875-1.875 1.875h-5.25A1.875 1.875 0 0 1 3 18.375v-2.25Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    Dashboard
                </div>
                <div role="button" class="flex items-center w-full p-3 rounded-lg hover:bg-gray-100 focus:bg-gray-100">
                    <div class="grid place-items-center mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                            <path fill-rule="evenodd" d="M1.5 7.125c0-1.036.84-1.875 1.875-1.875h6c1.036 0 1.875.84 1.875 1.875v3.75c0 1.036-.84 1.875-1.875 1.875h-6A1.875 1.875 0 0 1 1.5 10.875v-3.75Zm12 1.5c0-1.036.84-1.875 1.875-1.875h5.25c1.035 0 1.875.84 1.875 1.875v8.25c0 1.035-.84 1.875-1.875 1.875h-5.25a1.875 1.875 0 0 1-1.875-1.875v-8.25ZM3 16.125c0-1.036.84-1.875 1.875-1.875h5.25c1.036 0 1.875.84 1.875 1.875v2.25c0 1.035-.84 1.875-1.875 1.875h-5.25A1.875 1.875 0 0 1 3 18.375v-2.25Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    Pengguna
                </div>
                <div role="button" class="flex items-center w-full p-3 rounded-lg hover:bg-gray-100 focus:bg-gray-100">
                    <div class="grid place-items-center mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                            <path fill-rule="evenodd" d="M1.5 7.125c0-1.036.84-1.875 1.875-1.875h6c1.036 0 1.875.84 1.875 1.875v3.75c0 1.036-.84 1.875-1.875 1.875h-6A1.875 1.875 0 0 1 1.5 10.875v-3.75Zm12 1.5c0-1.036.84-1.875 1.875-1.875h5.25c1.035 0 1.875.84 1.875 1.875v8.25c0 1.035-.84 1.875-1.875 1.875h-5.25a1.875 1.875 0 0 1-1.875-1.875v-8.25ZM3 16.125c0-1.036.84-1.875 1.875-1.875h5.25c1.036 0 1.875.84 1.875 1.875v2.25c0 1.035-.84 1.875-1.875 1.875h-5.25A1.875 1.875 0 0 1 3 18.375v-2.25Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    Akun Baru Pengusul
                </div>
                <div role="button" class="flex items-center w-full p-3 rounded-lg hover:bg-gray-100 focus:bg-gray-100">
                    <div class="grid place-items-center mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                            <path fill-rule="evenodd" d="M1.5 7.125c0-1.036.84-1.875 1.875-1.875h6c1.036 0 1.875.84 1.875 1.875v3.75c0 1.036-.84 1.875-1.875 1.875h-6A1.875 1.875 0 0 1 1.5 10.875v-3.75Zm12 1.5c0-1.036.84-1.875 1.875-1.875h5.25c1.035 0 1.875.84 1.875 1.875v8.25c0 1.035-.84 1.875-1.875 1.875h-5.25a1.875 1.875 0 0 1-1.875-1.875v-8.25ZM3 16.125c0-1.036.84-1.875 1.875-1.875h5.25c1.036 0 1.875.84 1.875 1.875v2.25c0 1.035-.84 1.875-1.875 1.875h-5.25A1.875 1.875 0 0 1 3 18.375v-2.25Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    Pembuatan Akun DPPK
                </div>
                <div role="button" class="flex items-center w-full p-3 rounded-lg hover:bg-gray-100 focus:bg-gray-100">
                    <div class="grid place-items-center mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                            <path fill-rule="evenodd" d="M1.5 7.125c0-1.036.84-1.875 1.875-1.875h6c1.036 0 1.875.84 1.875 1.875v3.75c0 1.036-.84 1.875-1.875 1.875h-6A1.875 1.875 0 0 1 1.5 10.875v-3.75Zm12 1.5c0-1.036.84-1.875 1.875-1.875h5.25c1.035 0 1.875.84 1.875 1.875v8.25c0 1.035-.84 1.875-1.875 1.875h-5.25a1.875 1.875 0 0 1-1.875-1.875v-8.25ZM3 16.125c0-1.036.84-1.875 1.875-1.875h5.25c1.036 0 1.875.84 1.875 1.875v2.25c0 1.035-.84 1.875-1.875 1.875h-5.25A1.875 1.875 0 0 1 3 18.375v-2.25Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    Pembuatan Akun Tim Teknis
                </div>
                <div role="button" class="flex items-center w-full p-3 rounded-lg hover:bg-gray-100 focus:bg-gray-100">
                    <div class="grid place-items-center mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                            <path fill-rule="evenodd" d="M1.5 7.125c0-1.036.84-1.875 1.875-1.875h6c1.036 0 1.875.84 1.875 1.875v3.75c0 1.036-.84 1.875-1.875 1.875h-6A1.875 1.875 0 0 1 1.5 10.875v-3.75Zm12 1.5c0-1.036.84-1.875 1.875-1.875h5.25c1.035 0 1.875.84 1.875 1.875v8.25c0 1.035-.84 1.875-1.875 1.875h-5.25a1.875 1.875 0 0 1-1.875-1.875v-8.25ZM3 16.125c0-1.036.84-1.875 1.875-1.875h5.25c1.036 0 1.875.84 1.875 1.875v2.25c0 1.035-.84 1.875-1.875 1.875h-5.25A1.875 1.875 0 0 1 3 18.375v-2.25Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    Data Calon
                </div>
                <div role="button" class="flex items-center w-full p-3 rounded-lg hover:bg-gray-100 focus:bg-gray-100">
                    <div class="grid place-items-center mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                            <path fill-rule="evenodd" d="M1.5 7.125c0-1.036.84-1.875 1.875-1.875h6c1.036 0 1.875.84 1.875 1.875v3.75c0 1.036-.84 1.875-1.875 1.875h-6A1.875 1.875 0 0 1 1.5 10.875v-3.75Zm12 1.5c0-1.036.84-1.875 1.875-1.875h5.25c1.035 0 1.875.84 1.875 1.875v8.25c0 1.035-.84 1.875-1.875 1.875h-5.25a1.875 1.875 0 0 1-1.875-1.875v-8.25ZM3 16.125c0-1.036.84-1.875 1.875-1.875h5.25c1.036 0 1.875.84 1.875 1.875v2.25c0 1.035-.84 1.875-1.875 1.875h-5.25A1.875 1.875 0 0 1 3 18.375v-2.25Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    Nominasi Kalpataru
                </div>
                <div role="button" class="flex items-center w-full p-3 rounded-lg hover:bg-gray-100 focus:bg-gray-100">
                    <div class="grid place-items-center mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                            <path fill-rule="evenodd" d="M1.5 7.125c0-1.036.84-1.875 1.875-1.875h6c1.036 0 1.875.84 1.875 1.875v3.75c0 1.036-.84 1.875-1.875 1.875h-6A1.875 1.875 0 0 1 1.5 10.875v-3.75Zm12 1.5c0-1.036.84-1.875 1.875-1.875h5.25c1.035 0 1.875.84 1.875 1.875v8.25c0 1.035-.84 1.875-1.875 1.875h-5.25a1.875 1.875 0 0 1-1.875-1.875v-8.25ZM3 16.125c0-1.036.84-1.875 1.875-1.875h5.25c1.036 0 1.875.84 1.875 1.875v2.25c0 1.035-.84 1.875-1.875 1.875h-5.25A1.875 1.875 0 0 1 3 18.375v-2.25Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    Sidang
                    <!-- Dropdown -->
                    <!-- Sidang 1 -->
                    <!-- Sidang 2 -->
                </div>
                <div role="button" class="flex items-center w-full p-3 rounded-lg hover:bg-gray-100 focus:bg-gray-100">
                    <div class="grid place-items-center mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                            <path fill-rule="evenodd" d="M1.5 7.125c0-1.036.84-1.875 1.875-1.875h6c1.036 0 1.875.84 1.875 1.875v3.75c0 1.036-.84 1.875-1.875 1.875h-6A1.875 1.875 0 0 1 1.5 10.875v-3.75Zm12 1.5c0-1.036.84-1.875 1.875-1.875h5.25c1.035 0 1.875.84 1.875 1.875v8.25c0 1.035-.84 1.875-1.875 1.875h-5.25a1.875 1.875 0 0 1-1.875-1.875v-8.25ZM3 16.125c0-1.036.84-1.875 1.875-1.875h5.25c1.036 0 1.875.84 1.875 1.875v2.25c0 1.035-.84 1.875-1.875 1.875h-5.25A1.875 1.875 0 0 1 3 18.375v-2.25Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    Arsip Penerima
                </div>
                <div role="button" class="flex items-center w-full p-3 rounded-lg hover:bg-gray-100 focus:bg-gray-100">
                    <div class="grid place-items-center mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                            <path fill-rule="evenodd" d="M1.5 7.125c0-1.036.84-1.875 1.875-1.875h6c1.036 0 1.875.84 1.875 1.875v3.75c0 1.036-.84 1.875-1.875 1.875h-6A1.875 1.875 0 0 1 1.5 10.875v-3.75Zm12 1.5c0-1.036.84-1.875 1.875-1.875h5.25c1.035 0 1.875.84 1.875 1.875v8.25c0 1.035-.84 1.875-1.875 1.875h-5.25a1.875 1.875 0 0 1-1.875-1.875v-8.25ZM3 16.125c0-1.036.84-1.875 1.875-1.875h5.25c1.036 0 1.875.84 1.875 1.875v2.25c0 1.035-.84 1.875-1.875 1.875h-5.25A1.875 1.875 0 0 1 3 18.375v-2.25Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    Publikasi
                    <!-- Dropdown -->
                    <!-- Berita-->
                    <!-- Artikel Masuk-->
                    <!-- Pengumuman-->
                    <!-- Video-->
                    <!-- Buku-->
                    <!-- Kebijakan-->
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="p-6">
            <div class="min-h-screen flex flex-col">

                <!-- Header -->
                <header class="bg-white shadow">
                    <div class="container mx-auto flex items-center justify-between p-4 md:p-6">
                        <h1 class="text-xl md:text-2xl font-semibold text-gray-700">Dashboard</h1>
                        <div class="flex items-center">
                            <p class="text-gray-500 mr-2 md:mr-4">Hello, Admin</p>
                            <button class="bg-rejected text-white px-3 py-2 md:px-4 md:py-2 rounded-lg">Keluar</button>
                        </div>
                    </div>
                </header>

                <!-- Main Content -->
                <div class="flex-1 p-4 md:p-6 container mx-auto">
                    <!-- Cards Summary -->
                    <div class="grid gap-4 mb-8 sm:grid-cols-2 lg:grid-cols-4">
                        <div class="flex items-center p-4 bg-white shadow rounded-lg">
                            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zM4 5a1 1 0 011-1h10a1 1 0 011 1v10a1 1 0 01-1 1H5a1 1 0 01-1-1V5z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div>
                                <p class="mb-1 md:mb-2 text-sm font-medium text-gray-600">Total Users</p>
                                <p class="text-lg font-semibold text-gray-700">1,245</p>
                            </div>
                        </div>
                        <div class="flex items-center p-4 bg-white shadow rounded-lg">
                            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c1.105 0 2 .672 2 1.5S13.105 11 12 11s-2-.672-2-1.5S10.895 8 12 8zm0 0c-2.5 0-3 1.875-3 1.875S9.5 13 12 13s3-1.875 3-1.875S14.5 8 12 8zm0 4.875v2.625m-5-2.625a5 5 0 0110 0" />
                                </svg>
                            </div>
                            <div>
                                <p class="mb-1 md:mb-2 text-sm font-medium text-gray-600">Revenue</p>
                                <p class="text-lg font-semibold text-gray-700">$12,432</p>
                            </div>
                        </div>
                        <div class="flex items-center p-4 bg-white shadow rounded-lg">
                            <div class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a5 5 0 00-10 0v2H5v10h14V9h-2zm-6 6a2 2 0 110-4 2 2 0 010 4z" />
                                </svg>
                            </div>
                            <div>
                                <p class="mb-1 md:mb-2 text-sm font-medium text-gray-600">Orders</p>
                                <p class="text-lg font-semibold text-gray-700">157</p>
                            </div>
                        </div>
                        <div class="flex items-center p-4 bg-white shadow rounded-lg">
                            <div class="p-3 mr-4 text-red-500 bg-red-100 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-10.707a1 1 0 00-1.414-1.414L9 9.586 7.707 8.293a1 1 0 00-1.414 1.414L9 12.414l5-5z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div>
                                <p class="mb-1 md:mb-2 text-sm font-medium text-gray-600">Completed</p>
                                <p class="text-lg font-semibold text-gray-700">420</p>
                            </div>
                        </div>
                    </div>

                    <!-- Chart Section -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div class="bg-white shadow rounded-lg p-4 md:p-6">
                            <h2 class="text-lg md:text-xl font-semibold mb-4">Sales Overview</h2>
                            <div>
                                <!-- Placeholder for Chart -->
                                <div class="w-full h-48 md:h-64 bg-gray-200 flex items-center justify-center text-gray-500">[Insert Chart Here]</div>
                            </div>
                        </div>

                        <div class="bg-white shadow rounded-lg p-4 md:p-6">
                            <h2 class="text-lg md:text-xl font-semibold mb-4">Recent Orders</h2>
                            <table class="w-full">
                                <thead>
                                    <tr class="text-gray-500 text-xs md:text-sm">
                                        <th class="px-2 md:px-4 py-2 text-left">Order ID</th>
                                        <th class="px-2 md:px-4 py-2 text-left">Customer</th>
                                        <th class="px-2 md:px-4 py-2 text-left">Status</th>
                                        <th class="px-2 md:px-4 py-2 text-left">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-gray-50 text-xs md:text-sm">
                                        <td class="px-2 md:px-4 py-2">#1234</td>
                                        <td class="px-2 md:px-4 py-2">John Doe</td>
                                        <td class="px-2 md:px-4 py-2 text-green-600">Completed</td>
                                        <td class="px-2 md:px-4 py-2">$120.00</td>
                                    </tr>
                                    <tr class="text-xs md:text-sm">
                                        <td class="px-2 md:px-4 py-2">#1235</td>
                                        <td class="px-2 md:px-4 py-2">Jane Smith</td>
                                        <td class="px-2 md:px-4 py-2 text-yellow-600">Pending</td>
                                        <td class="px-2 md:px-4 py-2">$90.00</td>
                                    </tr>
                                    <tr class="bg-gray-50 text-xs md:text-sm">
                                        <td class="px-2 md:px-4 py-2">#1236</td>
                                        <td class="px-2 md:px-4 py-2">Bob Lee</td>
                                        <td class="px-2 md:px-4 py-2 text-red-600">Cancelled</td>
                                        <td class="px-2 md:px-4 py-2">$50.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</body>

</html>