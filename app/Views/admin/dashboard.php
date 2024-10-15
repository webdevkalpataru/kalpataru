<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/app.css">
  <title><?= $title; ?></title>
</head>

<body class="lg:flex">

  <!-- Sidebar -->
  <?= $this->include('template/sidebaradmin') ?>

  <!-- Main Content -->
  <div class="lg:flex-1 p-6">
    <div class="min-h-screen flex flex-col">

      <!-- Header -->
      <header class="bg-white shadow">
        <div class="container mx-auto flex items-center justify-between p-4 md:p-6">
          <h1 class="text-xl md:text-2xl font-semibold text-gray-700">Dashboard</h1>
          <div class="flex items-center">
            <p class="text-gray-500 mr-2 md:mr-4">Hello, <?= session()->get('nama'); ?></p>
            <a href="/auth/logout" class="bg-rejected text-white px-3 py-2 md:px-4 md:py-2 rounded-lg inline-block">Keluar</a>
          </div>
        </div>
      </header>

      <!-- Main Content -->
      <div class="flex-1 p-4 md:p-6 container mx-auto">
        <!-- Cards Summary -->
        <div class="grid gap-4 mb-8 sm:grid-cols-2 lg:grid-cols-4">
          <div class="flex items-center p-4 bg-white shadow rounded-lg">
            <img src="../images/kategoria.jpg" class="w-1/4 mr-4">
            <div>
              <p class="mb-1 md:mb-2 text-sm font-medium text-gray-600">Perntis Lingkungan</p>
              <p class="text-lg font-semibold text-gray-700">1,245</p>
            </div>
          </div>
          <div class="flex items-center p-4 bg-white shadow rounded-lg">
          <img src="../images/kategorib.jpg" class="w-1/4 mr-4">
            <div>
              <p class="mb-1 md:mb-2 text-sm font-medium text-gray-600">Pengabdi Lingkungan</p>
              <p class="text-lg font-semibold text-gray-700">2,432</p>
            </div>
          </div>
          <div class="flex items-center p-4 bg-white shadow rounded-lg">
          <img src="../images/kategoric.jpg" class="w-1/4 mr-4">
            <div>
              <p class="mb-1 md:mb-2 text-sm font-medium text-gray-600">Penyelamat Lingkungan</p>
              <p class="text-lg font-semibold text-gray-700">157</p>
            </div>
          </div>
          <div class="flex items-center p-4 bg-white shadow rounded-lg">
          <img src="../images/kategorid.jpg" class="w-1/4 mr-4">
            <div>
              <p class="mb-1 md:mb-2 text-sm font-medium text-gray-600">Pembina Lingkungan</p>
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

</body>

</html>