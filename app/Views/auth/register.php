<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penghargaan Kalpataru</title>
    <link rel="stylesheet" href="../css/app.css">
    <style>
        /* images *//* 
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
        } */

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

        /* Show/hide password */
        .password-icon {
            cursor: pointer;
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-weight: bold;
            font-size: 1.2rem;
        }

        .error-message {
            color: red;
            font-size: 0.8rem;
            margin-top: -12px;
            margin-bottom: 12px;
            display: none;
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

                <h2 class="text-2xl font-bold text-gray-900 mb-4">Daftar</h2>
                <form class="flex flex-col" onsubmit="validateForm(event)">
                    <label for="jenisInstansi" class="text-xs">Jenis Instansi</label>
                    <select id="jenisInstansi"
                        class="border-2 border-gray-300 text-primary text-xs rounded-lg p-2 mb-4 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none">
                        <option value="" disabled selected>Pilih Jenis Instansi</option>
                        <option value="Pemerintah">Pemerintah</option>
                        <option value="Nonpemerintah">Nonpemerintah</option>
                    </select>

                    <label for="nama" class="text-xs">Nama Instansi/ Nama Pribadi</label>
                    <input id="nama" type="text"
                        class="border-2 border-gray-300 text-primary text-xs rounded-lg p-2 mb-4 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none"
                        placeholder="contoh: Kemitraan Lingkungan">

                    <label for="provinsi" class="text-xs">Provinsi</label>
                    <select id="provinsi"
                        class="border-2 border-gray-300 text-primary text-xs rounded-lg p-2 mb-4 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none">
                        <option value="" disabled selected>Pilih Provinsi</option>
                        <option value="Aceh">Aceh</option>
                        <option value="Sumatera Utara">Sumatera Utara</option>
                        <option value="Sumatera Barat">Sumatera Barat</option>
                        <option value="Sumatera Selatan">Sumatera Selatan</option>
                        <option value="Riau">Riau</option>
                        <option value="Kepulauan Riau">Kepulauan Riau</option>
                        <option value="Jambi">Jambi</option>
                        <option value="Bengkulu">Bengkulu</option>
                        <option value="Lampung">Lampung</option>
                        <option value="Bangka Belitung">Bangka Belitung</option>
                        <option value="DKI Jakarta">DKI Jakarta</option>
                        <option value="Jawa Barat">Jawa Barat</option>
                        <option value="Jawa Tengah">Jawa Tengah</option>
                        <option value="DI Yogyakarta">DI Yogyakarta</option>
                        <option value="Jawa Timur">Jawa Timur</option>
                        <option value="Banten">Banten</option>
                        <option value="Bali">Bali</option>
                        <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                        <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                        <option value="Kalimantan Barat">Kalimantan Barat</option>
                        <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                        <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                        <option value="Kalimantan Timur">Kalimantan Timur</option>
                        <option value="Kalimantan Utara">Kalimantan Utara</option>
                        <option value="Sulawesi Utara">Sulawesi Utara</option>
                        <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                        <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                        <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                        <option value="Sulawesi Barat">Sulawesi Barat</option>
                        <option value="Gorontalo">Gorontalo</option>
                        <option value="Maluku">Maluku</option>
                        <option value="Maluku Utara">Maluku Utara</option>
                        <option value="Papua">Papua</option>
                        <option value="Papua Barat">Papua Barat</option>
                        <option value="Papua Barat">Papua Barat Daya</option>
                        <option value="Papua Tengah">Papua Tengah</option>
                        <option value="Papua Selatan">Papua Selatan</option>
                        <option value="Papua Pegunungan">Papua Pegunungan</option>
                    </select>

                    <label for=" telepon" class="text-xs">Nomor Telepon <span class="text-primary">(Pastikan Nomor Aktif)</span></label>
                    <input id="telepon" type="number"
                        class="border-2 border-gray-300 text-primary text-xs rounded-lg p-2 mb-4 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none"
                        placeholder="Contoh: 08XXXXXXXX">

                    <label for="email" class="text-xs">Email <span class="text-primary">(Pastikan Email Aktif)</span></label>
                    <input id="email" type="email"
                        class="border-2 border-gray-300 text-primary text-xs rounded-lg p-2 mb-4 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none"
                        placeholder="Masukkan Email Aktif">

                    <label for="password" class="text-xs">Kata Sandi</label>
                    <div class="relative">
                        <input id="password" type="password"
                            class="block w-full border-2 border-gray-300 text-primary text-xs rounded-lg p-2 pr-10 mb-4 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none"
                            placeholder="Masukkan Kata Sandi">
                        <span id="togglePassword" class="password-icon">
                            <img src="/images/hide.svg" alt="hide" class="w-4 h-4 mb-4">
                        </span>
                    </div>
                    <small id="passwordError" class="error-message">Kata sandi harus minimal 8 karakter, termasuk huruf kecil, huruf besar, dan simbol.</small>

                    <label for="passwordcheck" class="text-xs">Konfirmasi Kata Sandi</label>
                    <div class="relative">
                        <input id="passwordcheck" type="password"
                            class="block w-full border-2 border-gray-300 text-primary text-xs rounded-lg p-2 pr-10 mb-4 transition ease-in-out duration-150 focus:border-primary hover:border-primary focus:outline-none"
                            placeholder="Masukkan Konfirmasi Kata Sandi">
                        <span id="togglePasswordCheck" class="password-icon">
                            <img src="/images/hide.svg" alt="hide" class="w-4 h-4 mb-4">
                        </span>
                    </div>
                    <small id="passwordCheckError" class="error-message">Konfirmasi kata sandi tidak cocok.</small>

                    <div class="flex items-center justify-between flex-wrap">
                        <p class="text-gray-900 text-xs">
                            Sudah punya akun? <a href="./login" class="text-primary hover:underline font-bold">Masuk Sekarang</a>
                        </p>
                    </div>

                    <button type="submit"
                        class="bg-secondary text-primary font-bold py-2 px-4 rounded-md mt-4 hover:bg-primary hover:text-white transition ease-in-out duration-150">
                        Daftar
                    </button>
                </form>

                <div class="mt-4">
                    <button onclick="window.location.href='./login'"
                        class="text-sm font-bold text-gray-400 no-underline focus:outline-none">
                        <span class="font-bold text-lg items-center">←</span> Kembali
                    </button>
                </div>
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


    <div id="toast" class="toast"></div>

    <script>
        // Image Slider
        /* const imageArray = ['/images/loginregist1.jpeg', '/images/loginregist2.jpeg', '/images/loginregist3.jpeg'];
        let currentImageIndex = 0;
        const backgroundImage = document.getElementById('backgroundImage');

        setInterval(() => {
            currentImageIndex = (currentImageIndex + 1) % imageArray.length;
            backgroundImage.src = imageArray[currentImageIndex];
            backgroundImage.classList.remove('fade-in-right');
            void backgroundImage.offsetWidth;
            backgroundImage.classList.add('fade-in-right');
        }, 10000); */

        // Toggle password visibility
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');
        const passwordCheckInput = document.getElementById('passwordcheck');
        const togglePasswordCheck = document.getElementById('togglePasswordCheck');
        const passwordError = document.getElementById('passwordError');
        const passwordCheckError = document.getElementById('passwordCheckError');

        let isPasswordVisible = false;
        let isPasswordCheckVisible = false;

        // Toggle password visibility
        togglePassword.addEventListener('click', () => {
            isPasswordVisible = !isPasswordVisible;
            passwordInput.type = isPasswordVisible ? 'text' : 'password';
            togglePassword.innerHTML = isPasswordVisible ?
                `<img src="/images/show.svg" alt="show" class="w-4 h-4 mb-4">` :
                `<img src="/images/hide.svg" alt="hide" class="w-4 h-4 mb-4">`;
        });

        // Toggle password visibility for password confirmation
        togglePasswordCheck.addEventListener('click', () => {
            isPasswordCheckVisible = !isPasswordCheckVisible;
            passwordCheckInput.type = isPasswordCheckVisible ? 'text' : 'password';
            togglePasswordCheck.innerHTML = isPasswordCheckVisible ?
                `<img src="/images/show.svg" alt="show" class="w-4 h-4 mb-4">` :
                `<img src="/images/hide.svg" alt="hide" class="w-4 h-4 mb-4">`;
        });


        // Form validation
        function validateForm(event) {
            event.preventDefault();

            const jenisInstansi = document.getElementById('jenisInstansi').value;
            const namaInstansi = document.getElementById('nama').value;
            const provinsi = document.getElementById('provinsi').value;
            const telepon = document.getElementById('telepon').value;
            const email = document.getElementById('email').value;
            const password = passwordInput.value;
            const passwordCheck = passwordCheckInput.value;

            let isValid = true;
            let passwordErrors = [];

            // Check for length
            if (password.length < 8) {
                passwordErrors.push('Kata sandi harus minimal 8 karakter.');
            }

            // Check for lowercase letters
            if (!/[a-z]/.test(password)) {
                passwordErrors.push('Kata sandi harus mengandung setidaknya satu huruf kecil.');
            }

            // Check for uppercase letters
            if (!/[A-Z]/.test(password)) {
                passwordErrors.push('Kata sandi harus mengandung setidaknya satu huruf besar.');
            }

            // Check for special characters
            const specialCharacters = /[!@#$%^&*]/;
            if (!specialCharacters.test(password)) {
                passwordErrors.push('Kata sandi harus mengandung setidaknya satu simbol (!@#$%^&*).');
            }

            // Display password errors if any
            if (passwordErrors.length > 0) {
                passwordError.innerHTML = passwordErrors.join('<br>'); // Show all error messages
                passwordInput.classList.add('error');
                passwordError.style.display = 'block';
                isValid = false;
            } else {
                passwordInput.classList.remove('error');
                passwordError.style.display = 'none';
            }

            // Validasi Konfirmasi Kata Sandi
            if (password !== passwordCheck) {
                passwordCheckInput.classList.add('error');
                passwordCheckError.style.display = 'block';
                isValid = false;
            } else {
                passwordCheckInput.classList.remove('error');
                passwordCheckError.style.display = 'none';
            }

            // Validasi input lain
            if (jenisInstansi === '') {
                showToast('Jenis Instansi belum terisi. Silakan lengkapi');
                isValid = false;
            } else if (namaInstansi === '') {
                showToast('Nama Instansi/Nama Pribadi belum terisi. Silakan lengkapi');
                isValid = false;
            } else if (provinsi === '') {
                showToast('Provinsi belum terisi. Silakan lengkapi');
                isValid = false;
            } else if (telepon === '') {
                showToast('Nomor Telepon belum terisi. Silakan lengkapi');
                isValid = false;
            } else if (email === '') {
                showToast('Email belum terisi. Silakan lengkapi');
                isValid = false;
            }

            if (isValid) {
                showPopup();
            }
        }

        // Realtime validation for password
        passwordInput.addEventListener('input', () => {
            const password = passwordInput.value;
            let passwordErrors = [];

            // Check for length
            if (password.length < 8) {
                passwordErrors.push('Kata sandi harus minimal 8 karakter.');
            }

            // Check for lowercase letters
            if (!/[a-z]/.test(password)) {
                passwordErrors.push('Kata sandi harus mengandung setidaknya satu huruf kecil.');
            }

            // Check for uppercase letters
            if (!/[A-Z]/.test(password)) {
                passwordErrors.push('Kata sandi harus mengandung setidaknya satu huruf besar.');
            }

            // Check for special characters
            const specialCharacters = /[!@#$%^&*]/;
            if (!specialCharacters.test(password)) {
                passwordErrors.push('Kata sandi harus mengandung setidaknya satu simbol (!@#$%^&*).');
            }

            if (passwordErrors.length > 0) {
                passwordError.innerHTML = passwordErrors.join('<br>');
                passwordError.style.display = 'block';
            } else {
                passwordError.style.display = 'none';
            }
        });

        // Realtime validation for password confirmation
        passwordCheckInput.addEventListener('input', () => {
            if (passwordInput.value === passwordCheckInput.value) {
                passwordCheckError.style.display = 'none';
            } else {
                passwordCheckError.style.display = 'block';
            }
        });

        // Fungsi untuk menampilkan toast
        function showToast(message) {
            const toast = document.getElementById('toast');
            toast.textContent = message;
            toast.classList.add('show-toast');
            setTimeout(() => {
                toast.classList.remove('show-toast');
            }, 3000);
        }

        // Fungsi untuk menampilkan popup sukses
        function showPopup() {
            const successPopup = document.getElementById('successPopup');
            successPopup.classList.remove('toasthidden');
        }
    </script>
</body>

</html>