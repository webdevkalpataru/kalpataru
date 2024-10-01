<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penghargaan Kalpataru</title>
    <link rel="stylesheet" href="../css/app.css">
    <style>
        /* images */
        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(100%);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-100%);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .fade-in-right {
            animation: fadeInRight 0.5s forwards;
        }

        .fade-in-left {
            animation: fadeInLeft 0.5s forwards;
        }

        /* toast error */
        .toast {
            position: fixed;
            top: 10px;
            right: 10px;
            background-color: #800000;
            color: white;
            padding: 10px;
            border-radius: 5px;
            display: none;
        }

        .show-toast {
            display: block;
        }

        /* no underline on kembali button */
        .no-underline:hover {
            text-decoration: none;
        }

        /* Show/hide password */
        .relative input {
            padding-right: 2.5rem;
        }

        .password-icon {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #9CA3AF;
        }


        /* Responsive style */
        @media (max-width: 640px) {
            .max-w-md {
                max-width: 90%;
            }
        }

        /* toast hidden */
        .toasthidden {
            display: none;
        }
    </style>
</head>

<body>
    <div class="flex h-screen">
        <div class="flex-1 relative hidden sm:block">
            <img id="backgroundImage" src="/images/loginregist1.jpeg" alt="loginregist1"
                class="w-full h-full object-cover fade-in-right">
        </div>

        <div class="flex-1 flex items-center justify-center bg-white">
            <div class="w-full max-w-md p-6 fade-in-left">
                <button onclick="window.location.href='/'"
                    class="text-xs font-bold text-gray-400 mb-4 no-underline focus:outline-none">
                    &lt Kembali
                </button>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Daftar</h2>
                <form class="flex flex-col" onsubmit="validateForm(event)">
                    <label for="jenisInstansi" class="text-xs">Jenis Instansi</label>
                    <input id="jenisInstansi" type="text"
                        class="border-2 border-gray-300 text-primary text-xs rounded-lg p-2 mb-4 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none">

                    <label for="email" class="text-xs">Nama Instansi/ Nama Pribadi</label>
                    <input id="email" type="text"
                        class="border-2 border-gray-300 text-primary text-xs rounded-lg p-2 mb-4 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none"
                        placeholder="contoh: Kemitraan Lingkungan">

                    <label for="provinsi" class="text-xs">Provinsi</label>
                    <input id="provinsi" type="text"
                        class="border-2 border-gray-300 text-primary text-xs rounded-lg p-2 mb-4 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none" ">

                    <label for=" telepon" class="text-xs">Nomor Telepon <span class="text-primary">(Pastikan Nomor Aktif)</span></label>
                    <input id="telepon" type="text"
                        class="border-2 border-gray-300 text-primary text-xs rounded-lg p-2 mb-4 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none"
                        placeholder="Masukkan Email">

                    <label for="email" class="text-xs">Email <span class="text-primary">(Pastikan Email Aktif)</span></label>
                    <input id="email" type="text"
                        class="border-2 border-gray-300 text-primary text-xs rounded-lg p-2 mb-4 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none"
                        placeholder="Masukkan Email">

                    <label for="email" class="text-xs">Email</label>
                    <input id="email" type="text"
                        class="border-2 border-gray-300 text-primary text-xs rounded-lg p-2 mb-4 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none"
                        placeholder="Masukkan Email">

                    <label for="password" class="text-xs">Kata Sandi</label>
                    <div class="relative">
                        <input id="password" type="password"
                            class="border-2 border-gray-300 text-primary text-xs rounded-lg p-2 mb-4 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none"
                            placeholder="Masukkan Kata Sandi">
                        <span id="togglePassword" class="password-icon">
                            <img src="/images/hide.svg" alt="hide" class="w-4 h-4">
                        </span>
                    </div>

                    <div class="flex items-center justify-between flex-wrap">
                        <p class="text-gray-900">
                            Belum punya akun? <a href="./login" class="text-sm text-primary hover:underline font-bold">Masuk ke akun</a>
                        </p>
                    </div>
                    <button type="submit"
                        class="bg-secondary text-primary font-bold py-2 px-4 rounded-md mt-4 hover:bg-primary hover:text-white transition ease-in-out duration-150">
                        Daftar
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Add this popup after the toast element -->
    <div id="successPopup" class="toasthidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
        <div class="bg-green-700 text-center text-white p-6 rounded-lg max-w-md w-full">
            <h3 class="text-xl font-bold mb-4">Terima kasih telah mendaftar!</h3>
            <p class="text-sm">Akun Anda sedang dalam proses verifikasi oleh admin. Anda akan menerima email konfirmasi setelah akun diaktifkan.</p>
            <button onclick="window.location.href='/'"
                class="mt-4 px-4 py-2 bg-green-300 text-green-900 rounded-md hover:bg-green-400 transition">
                ← Beranda
            </button>
        </div>
    </div>


    <div id="toast" class="toast">Email atau password salah!</div>

    <script>
        const imageArray = ['/images/loginregist1.jpeg', '/images/loginregist2.jpeg', '/images/loginregist3.jpeg'];
        let currentImageIndex = 0;
        const backgroundImage = document.getElementById('backgroundImage');

        setInterval(() => {
            currentImageIndex = (currentImageIndex + 1) % imageArray.length;
            backgroundImage.src = imageArray[currentImageIndex];
            backgroundImage.classList.remove('fade-in-right');
            void backgroundImage.offsetWidth;
            backgroundImage.classList.add('fade-in-right');
        }, 10000);

        // Toggle password visibility
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');
        let isPasswordVisible = false;

        togglePassword.addEventListener('click', () => {
            isPasswordVisible = !isPasswordVisible;
            const type = isPasswordVisible ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Update the icon
            togglePassword.innerHTML = isPasswordVisible ?
                `<img src="/images/show.svg" alt="show" class="w-4 h-4">` :
                `<img src="/images/hide.svg" alt="hide" class="w-4 h-4">`;
        });

        // Form validation
        function validateForm(event) {
            event.preventDefault();
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            if (email === 'test@example.com' && password === 'password123') {
                loadNewPageContent();
            } else {
                showToast();
            }
        }

        // Replace form content with new content (simulating a page change)
        function loadNewPageContent() {
            const formContainer = document.querySelector('.flex-1.flex.items-center.justify-center.bg-white');

            // Replace the current form content with the new content
            formContainer.innerHTML = `
        <div class="w-full max-w-md p-6 fade-in-left">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Selamat Datang!</h2>
            <p class="text-gray-700 mb-4">Anda berhasil masuk ke akun Anda. Halaman ini akan memuat fitur-fitur penting.</p>
            <button onclick="window.location.href='/dashboard'"
                class="bg-primary text-white font-bold py-2 px-4 rounded-md mt-4 hover:bg-secondary transition ease-in-out duration-150">
                Lanjut ke Dashboard
            </button>
        </div>
    `;
        }


        // Show success popup
        function showPopup() {
            const successPopup = document.getElementById('successPopup');
            successPopup.classList.remove('hidden');
        }

        // Show toast
        function showToast() {
            const toast = document.getElementById('toast');
            toast.classList.add('show-toast');
            setTimeout(() => {
                toast.classList.remove('show-toast');
            }, 3000);
        }
    </script>
</body>

</html>