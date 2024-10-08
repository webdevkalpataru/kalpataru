<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/app.css">
    <title><?= $title; ?></title>
</head>

<body>

    <?= $this->extend('template/navbarfooter') ?>

    <?= $this->section('content') ?>

    <div class="flex flex-col lg:flex-row justify-end m-4">
        <?= $this->include('template/sidebarpengusul') ?>

        <!-- Konten utama -->
        <div class="relative flex flex-col w-full max-w-2xl mx-auto mb-4 rounded-xl border-2 border-primary bg-white shadow-md lg:p-8 p-4">

            <div class="w-full pt-1 px-4 lg:mb-8">
                <div class="relative flex items-center justify-between w-full flex-wrap gap-4 sm:gap-8">
                    <div class="absolute left-0 top-2/4 h-0.5 w-full -translate-y-2/4 bg-accent2 transition-all duration-500"></div>

                    <!-- Step 1 -->
                    <div class="relative z-10 grid w-8 h-8 sm:w-10 sm:h-10 font-bold text-white transition-all duration-300 bg-accent2 border-2 border-accent2 rounded-full place-items-center">
                        <div class="absolute -bottom-8 w-max text-center">
                            <p class="lg:block hidden font-sans text-xs lg:text-md antialiased font-semibold leading-relaxed tracking-normal text-gray-700 w-28 h-8">
                                Identitas Calon
                            </p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative z-10 grid w-8 h-8 sm:w-10 sm:h-10 font-bold text-white transition-all duration-300 bg-accent2 border-2 border-accent2 rounded-full place-items-center">
                        <div class="absolute -bottom-8 w-max text-center">
                            <p class="lg:block hidden font-sans text-xs lg:text-md antialiased font-semibold leading-relaxed tracking-normal text-gray-700 w-28 h-8">
                                Kegiatan Calon
                            </p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="relative z-10 grid w-8 h-8 sm:w-10 sm:h-10 font-bold text-accent1 transition-all duration-300 bg-accent2 border-2 border-accent2 rounded-full place-items-center">
                        <div class="absolute -bottom-8 w-max text-center">
                            <p class="lg:block hidden font-sans text-xs lg:text-md antialiased font-semibold leading-relaxed tracking-normal text-gray-700 w-28 h-8">
                                Dampak
                            </p>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="relative z-10 grid w-8 h-8 sm:w-10 sm:h-10 font-bold text-white transition-all duration-300 bg-accent1 border-2 border-accent2  rounded-full place-items-center">
                        <div class="absolute -bottom-8 w-max text-center">
                            <p class="lg:block hidden font-sans text-xs lg:text-md antialiased font-semibold leading-relaxed tracking-normal text-gray-700 w-28 h-8">
                                PMIK
                            </p>
                        </div>
                    </div>

                    <!-- Step 5 -->
                    <div class="relative z-10 grid w-8 h-8 sm:w-10 sm:h-10 font-bold text-white transition-all duration-300 bg-accent1 border-2 border-accent2 rounded-full place-items-center">
                        <div class="absolute -bottom-8 w-max text-center">
                            <p class="lg:block hidden font-sans text-xs lg:text-md antialiased font-semibold leading-relaxed tracking-normal text-gray-700 w-28 h-8">
                                Keswadayaan dan Keberlanjutan
                            </p>
                        </div>
                    </div>

                    <!-- Step 6 -->
                    <div class="relative z-10 grid w-8 h-8 sm:w-10 sm:h-10 font-bold text-accent1 transition-all duration-300 bg-accent1 border-2 border-accent2 rounded-full place-items-center">
                        <div class="absolute -bottom-8 w-max text-center">
                            <p class="lg:block hidden font-sans text-xs lg:text-md antialiased font-semibold leading-relaxed tracking-normal text-gray-700 w-28 h-8">
                                Keistimewaan
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <form action="<?= base_url('pengusul/simpancalondampak'); ?>" method="post" class="mt-4 mb-2 w-full">
                <div class="grid grid-cols-1 gap-4" id="formContainer">
                    <div>
                        <label class="block mb-2 text-sm text-black">Dampak kegiatan terhadap lingkungan</label>
                        <textarea name="dampak_lingkungan" id="dampak_lingkungan" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" rows="4"
                            oninput="updateWordCount(this, 'dampak_lingkunganCount', 1000)"></textarea>
                        <p id="dampak_lingkunganCount" class="text-xs text-slate-400 flex justify-end">0/1000 Kata</p>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm text-black">Dampak Ekonomi</label>
                        <textarea name="dampak_ekonomi" id="dampak_ekonomi" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" rows="4"
                            oninput="updateWordCount(this, 'dampak_ekonomiCount', 1000)"></textarea>
                        <p id="dampak_ekonomiCount" class="text-xs text-slate-400 flex justify-end">0/1000 Kata</p>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm text-black">Dampak Sosial dan Budaya</label>
                        <textarea name="dampak_sosial_budaya" id="dampak_sosial_budaya" class="w-full bg-transparent placeholder:text-slate-400 text-primary text-sm border-2 border-slate-200 rounded-md px-3 py-2 focus:outline-none focus:border-primary hover:border-primary transition duration-300 ease" rows="4"
                            oninput="updateWordCount(this, 'dampak_sosial_budayaCount', 1000)"></textarea>
                        <p id="dampak_sosial_budayaCount" class="text-xs text-slate-400 flex justify-end">0/1000 Kata</p>
                    </div>
                </div>

                <div class="flex justify-end mt-4">
                    <button class="w-40 rounded-md py-2 text-center text-sm text-white transition-all shadow-md hover:shadow-lg bg-primary hover:bg-primaryhover active:shadow-none" type="submit">Selanjutnya</button>
                </div>
            </form>
        </div>
    </div>


    <script>
        // Batasan Kata
        function updateWordCount(textarea, countId, maxWords) {
            const countElement = document.getElementById(countId);
            const words = textarea.value.trim().split(/\s+/).filter(word => word.length > 0);
            const currentLength = words.length;

            countElement.textContent = `${currentLength}/${maxWords} kata`;

            if (currentLength > maxWords) {
                countElement.classList.add('text-rejected');
            } else {
                countElement.classList.remove('text-rejected');
            }
        }
    </script>
    <?= $this->endSection() ?>
</body>

</html>