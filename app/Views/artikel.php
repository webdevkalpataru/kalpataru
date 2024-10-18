<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?= $this->extend('template/navbarfooter') ?>

    <?= $this->section('content') ?>
    <section id="artikel" class="w-full h-[25rem] relative">
        <img src="/images/hero.png" alt="artikel" class="w-full h-full object-cover object-center md:object-center">

        <div class="absolute inset-0 flex flex-col justify-center items-center text-white text-center">
            <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold">Artikel</h1>
            <p class="text-sm sm:text-base md:text-lg mt-2 sm:mt-4">Jelajahi berbagai topik menarik seputar lingkungan dan konservasi</p>
        </div>
    </section>

    <section id="artikelcontent">
        <div class="container mx-auto max-w-screen-lg">
            <!-- Search Bar -->
            <div class="flex justify-between items-center my-6">
                <h1 class="text-xs:lg:text-md ml-4 lg:ml-0 font-semibold">
                    Hasil: <?= esc($countTerbit) ?> Artikel
                </h1>
                <div class="relative mr-4 lg:mr-0">
                    <form method="get">
                        <input
                            placeholder="Masukan kata kunci"
                            class="input shadow-lg focus:border-2 border-2 border-primary 0 px-5 py-3 rounded-xl w-56 transition-all focus:w-64 outline-none"
                            name="search" />
                        <svg
                            class="size-6 absolute top-3 right-3 text-primary"
                            stroke="currentColor"
                            stroke-width="1.5"
                            viewBox="0 0 24 24"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                                stroke-linejoin="round"
                                stroke-linecap="round"></path>
                        </svg>
                    </form>
                </div>
            </div>

            <!-- Cards Section -->
            <div class="grid gap-4 px-4 lg:px-0">
                <?php if (!empty($artikels) && is_array($artikels)): ?>
                    <?php foreach ($artikels as $item): ?>
                        <div class="bg-white rounded-lg shadow-md flex flex-col md:flex-row overflow-hidden">
                            <img src="/public/<?= $item['foto']; ?>" alt="<?= esc($item['judul']) ?>" class="w-full md:w-48 h-32 md:h-auto object-cover">
                            <div class="p-4">
                                <h2 class="text-lg md:text-xl font-semibold mb-2"><?= esc($item['judul']) ?></h2>
                                <p class="text-gray-600 text-sm md:text-base mb-4"><?= word_limiter(esc($item['konten']), 30); ?></p>
                                <a href="/artikel/<?= $item['slug'] ?>" class="text-black font-medium flex justify-end items-center">
                                    Baca Selengkapnya
                                    <img src="/images/arrowkanan.svg" alt="arrowkanan" class="w-6 h-6 md:w-8 md:h-8 ml-2">
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Tidak ada artikel yang terbit saat ini.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="row flex lg:justify-end justify-center lg:mr-36 my-6">
            <button class="rounded-md rounded-r-none border border-r-0 border-slate-300 py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-primary hover:border-primary focus:text-white focus:bg-primary focus:border-primary active:border-primary active:text-white active:bg-primary disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                    <path fill-rule="evenodd" d="M11.03 3.97a.75.75 0 0 1 0 1.06l-6.22 6.22H21a.75.75 0 0 1 0 1.5H4.81l6.22 6.22a.75.75 0 1 1-1.06 1.06l-7.5-7.5a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                </svg>
            </button>
            <button class="rounded-md rounded-r-none rounded-l-none border border-r-0 border-slate-300 py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-primary hover:border-primary focus:text-white focus:bg-primary focus:border-primary active:border-primary active:text-white active:bg-primary disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                1
            </button>
            <button class="rounded-md rounded-r-none rounded-l-none border border-r-0 border-slate-300 py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-primary hover:border-primary focus:text-white focus:bg-primary focus:border-primary active:border-primary active:text-white active:bg-primary disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                2
            </button>
            <button class="rounded-md rounded-r-none rounded-l-none border border-r-0 border-slate-300 py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-primary hover:border-primary focus:text-white focus:bg-primary focus:border-primary active:border-primary active:text-white active:bg-primary disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                3
            </button>
            <button class="rounded-md rounded-r-none rounded-l-none border border-r-0 border-slate-300 py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-primary hover:border-primary focus:text-white focus:bg-primary focus:border-primary active:border-primary active:text-white active:bg-primary disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                4
            </button>
            <button class="rounded-md rounded-r-none rounded-l-none border border-r-0 border-slate-300 py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-primary hover:border-primary focus:text-white focus:bg-primary focus:border-primary active:border-primary active:text-white active:bg-primary disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                5
            </button>
            <button class="rounded-md rounded-l-none border border-slate-300 py-2 px-3 text-center text-sm transition-all shadow-sm hover:shadow-lg text-slate-600 hover:text-white hover:bg-primary hover:border-primary focus:text-white focus:bg-primary focus:border-primary active:border-primary active:text-white active:bg-primary disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                    <path fill-rule="evenodd" d="M12.97 3.97a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 1 1-1.06-1.06l6.22-6.22H3a.75.75 0 0 1 0-1.5h16.19l-6.22-6.22a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </section>

    <?= $this->endSection() ?>
</body>

</html>