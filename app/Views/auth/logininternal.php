<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <title><?= $title; ?></title>
    <style>
        /* styles tetap sama seperti sebelumnya */
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

        .password-icon {
            cursor: pointer;
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-weight: bold;
            font-size: 1.2rem;
        }

        @media (max-width: 640px) {
            .max-w-md {
                max-width: 90%;
            }
        }
    </style>
</head>

<body>
    <div class="flex h-screen">
        <div class="flex-1 relative hidden sm:block">
            <img id="backgroundImage" src="/images/loginregist2.jpeg" alt="loginregist2"
                class="w-full h-full object-cover fade-in-right">
        </div>

        <div class="flex-1 flex items-center justify-center bg-white">
            <div class="w-full max-w-md p-6 fade-in-left">

                <h2 class="text-2xl font-bold text-gray-900 mb-4">Masuk</h2>
                <form class="flex flex-col gap-4" onsubmit="validateForm(event)" action="/auth/logininternal" method="POST">

                    <a href="/auth/loginadmin">
                        <div class="group overflow-hidden relative after:duration-500 before:duration-500 duration-500 hover:after:duration-500 hover:after:translate-x-16 hover:before:translate-y-8 hover:before:-translate-x-16 hover:duration-500 after:absolute after:w-16 after:h-16 after:bg-primaryhover after:rounded-full after:blur-lg after:bottom-16 after:right-8 after:w-8 after:h-8 before:absolute before:w-16 before:h-16 before:bg-secondary before:rounded-full before:blur-lg before:top-10 before:right-8 before:w-8 before:h-8 hover:rotate-6 flex justify-center items-center h-40 w-60 origin-bottom-right bg-neutral-900 rounded-xl outline outline-primary -outline-offset-4">
                            <div class="z-10 flex flex-col items-center gap-2">
                                <p class="text-primary">Login Sebagai:</p>
                                <span class="text-primary text-4xl font-bold">ADMIN</span>
                            </div>
                        </div>
                    </a>

                    <a href="/auth/logintimteknis">
                        <div class="group overflow-hidden relative after:duration-500 before:duration-500 duration-500 hover:after:duration-500 hover:after:translate-x-16 hover:before:translate-y-8 hover:before:-translate-x-16 hover:duration-500 after:absolute after:w-16 after:h-16 after:bg-primaryhover after:rounded-full after:blur-lg after:bottom-16 after:right-8 after:w-8 after:h-8 before:absolute before:w-16 before:h-16 before:bg-secondary before:rounded-full before:blur-lg before:top-10 before:right-8 before:w-8 before:h-8 hover:rotate-6 flex justify-center items-center h-40 w-60 origin-bottom-right bg-neutral-900 rounded-xl outline outline-primary -outline-offset-4">
                            <div class="z-10 flex flex-col items-center gap-2">
                                <p class="text-primary">Login Sebagai:</p>
                                <span class="text-primary text-4xl font-bold">TIM TEKNIS</span>
                            </div>
                        </div>
                    </a>

                    <a href="/auth/logindppk">
                        <div class="group overflow-hidden relative after:duration-500 before:duration-500 duration-500 hover:after:duration-500 hover:after:translate-x-16 hover:before:translate-y-8 hover:before:-translate-x-16 hover:duration-500 after:absolute after:w-16 after:h-16 after:bg-primaryhover after:rounded-full after:blur-lg after:bottom-16 after:right-8 after:w-8 after:h-8 before:absolute before:w-16 before:h-16 before:bg-secondary before:rounded-full before:blur-lg before:top-10 before:right-8 before:w-8 before:h-8 hover:rotate-6 flex justify-center items-center h-40 w-60 origin-bottom-right bg-neutral-900 rounded-xl outline outline-primary -outline-offset-4">
                            <div class="z-10 flex flex-col items-center gap-2">
                                <p class="text-primary">Login Sebagai:</p>
                                <span class="text-primary text-4xl font-bold">DPPK</span>
                            </div>
                        </div>


                </form>
            </div>
        </div>
    </div>

    <div id="toast" class="toast">Email atau password salah!</div>

    <script>
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
                `<img src="/images/show.svg" alt="show" class="w-4 h-4 mb-4">` :
                `<img src="/images/hide.svg" alt="hide" class="w-4 h-4 mb-4">`;
        });

        function validateForm(event) {
            event.preventDefault();
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            const form = event.target;
            const formData = new FormData(form);

            fetch(form.action, {
                    method: form.method,
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Redirect ke halaman yang diinginkan
                        window.location.href = '/admin/dashboard'; // Sesuaikan dengan URL tujuan setelah login
                    } else {
                        showToast(data.errors.email || data.errors.kata_sandi || 'Login gagal.'); // Tampilkan pesan kesalahan
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('Terjadi kesalahan. Silakan coba lagi');
                });
        }

        // Show toast with custom message
        function showToast(message) {
            const toast = document.getElementById('toast');
            toast.textContent = message;
            toast.classList.add('show-toast');
            setTimeout(() => {
                toast.classList.remove('show-toast');
            }, 3000);
        }
    </script>
</body>

</html>