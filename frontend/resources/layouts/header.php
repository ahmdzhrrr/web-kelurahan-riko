<?php

$currentPath = parse_url(
    $_SERVER['REQUEST_URI'] ?? '/',
    PHP_URL_PATH
);

$currentPath = rtrim($currentPath, '/');

if ($currentPath === '') {
    $currentPath = '/';
}


/*
|--------------------------------------------------------------------------
| Cek menu aktif
|--------------------------------------------------------------------------
*/

$isActive = function (string $path) use ($currentPath): bool {

    $path = rtrim($path, '/');

    if ($path === '') {
        $path = '/';
    }

    return $currentPath === $path;
};


/*
|--------------------------------------------------------------------------
| Cek Profil aktif
|--------------------------------------------------------------------------
*/

$isProfilActive = str_starts_with(
    $currentPath,
    '/tentang/'
);


/*
|--------------------------------------------------------------------------
| Cek Beranda
|--------------------------------------------------------------------------
|
| Beranda dianggap aktif ketika:
|
| /
| /index.php
|
*/

$isHomeActive =
    $currentPath === '/' ||
    $currentPath === '/index.php';


/**
 * Mengecek apakah halaman saat ini sama dengan URL tertentu.
 */
$isActive = function (string $path) use ($currentPath): bool {
    return $currentPath === rtrim($path, '/');
};

/**
 * Mengecek apakah URL saat ini berada di dalam kelompok menu.
 * Contoh:
 * /tentang/profil
 * /tentang/visi-misi
 * /tentang/sejarah
 */
$isProfilActive = str_starts_with($currentPath, '/tentang/');
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= e($setting['site_name'] ?? 'Website Kelurahan Riko') ?></title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        html {
            scroll-behavior: smooth;
            scroll-padding-top: 2.5rem;
        }

        section[id] {
            scroll-margin-top: 2.5rem;
        }
    </style>
</head>

<body class="bg-slate-100 font-sans text-gray-800">

<!-- Header -->
<header class="border-b border-white/10 bg-gradient-to-r from-green-800 via-green-700 to-green-900 text-white shadow-lg">

    <div class="flex w-full items-center px-8 py-3 lg:px-12">

        <!-- Logo + Nama -->
        <div class="flex items-center gap-5">

            <?php if (!empty($setting['logo'])): ?>

                <img
                    src="/<?= e($setting['logo']) ?>"
                    alt="<?= e($setting['nama_website'] ?? 'Kelurahan Riko') ?>"
                    class="h-16 w-16 object-contain"
                >

            <?php endif; ?>

            <div>

                <h1 class="text-3xl font-bold tracking-tight sm:text-4xl lg:text-3xl">
                    <?= e($setting['site_name'] ?? 'Kelurahan Riko') ?>
                </h1>

                <?php if (!empty($setting['site_subtitle'])): ?>

                    <p class="mt-1 text-sm text-white/85">
                        <?= e($setting['site_subtitle']) ?>
                    </p>

                <?php endif; ?>

            </div>

        </div>

    </div>

</header>


<!-- Navigation -->
<nav class="sticky top-0 z-20 border-b border-white/10 bg-green-950/95 text-white shadow-lg backdrop-blur">

    <div class="mx-auto max-w-7xl px-2 sm:px-4 lg:px-2">

        <ul class="flex flex-wrap justify-center gap-x-8 gap-y-2 py-3 text-base font-semibold">


            <!-- ================================================= -->
            <!-- BERANDA -->
            <!-- ================================================= -->

            <li>

                <a
                    href="/"
                    class="
                        inline-flex items-center gap-2 rounded-full px-4 py-2
                        transition-colors duration-200

                        <?= $isHomeActive
                            ? 'bg-yellow-300 text-green-950 shadow-sm'
                            : 'text-white hover:bg-white/10 hover:text-yellow-300'
                        ?>
                    "
                >

                    <i class="fa-solid fa-house"></i>

                    <span>Beranda</span>

                </a>

            </li>


            <!-- ================================================= -->
            <!-- PROFIL -->
            <!-- ================================================= -->

            <li class="relative group">

                <button
                    type="button"
                    class="
                        inline-flex items-center gap-2 rounded-full px-4 py-2
                        transition-colors duration-200

                        <?= $isProfilActive
                            ? 'bg-yellow-300 text-green-950 shadow-sm'
                            : 'text-white hover:bg-white/10 hover:text-yellow-300'
                        ?>
                    "
                >

                    <i class="fas fa-building"></i>

                    <span>Profil</span>

                    <i
                        class="
                            fa-solid fa-chevron-down text-xs
                            transition-transform duration-200
                            group-hover:rotate-180
                        "
                    ></i>

                </button>


                <!-- Dropdown -->

                <div
                    class="
                        invisible absolute left-1/2 top-full z-50 mt-2
                        w-56 -translate-x-1/2 translate-y-2
                        rounded-xl bg-white py-2
                        text-sm text-slate-700
                        opacity-0 shadow-xl ring-1 ring-black/5
                        transition-all duration-200

                        group-hover:visible
                        group-hover:translate-y-0
                        group-hover:opacity-100
                    "
                >

                    <!-- Tentang Kami -->

                    <a
                        href="/tentang/profil"
                        class="
                            flex items-center gap-3 px-4 py-3
                            transition-colors

                            <?= $isActive('/tentang/profil')
                                ? 'bg-green-100 font-semibold text-green-900'
                                : 'hover:bg-green-50 hover:text-green-800'
                            ?>
                        "
                    >
                        <span>Tentang Kami</span>
                    </a>


                    <!-- Visi Misi -->

                    <a
                        href="/tentang/visi-misi"
                        class="
                            flex items-center gap-3 px-4 py-3
                            transition-colors

                            <?= $isActive('/tentang/visi-misi')
                                ? 'bg-green-100 font-semibold text-green-900'
                                : 'hover:bg-green-50 hover:text-green-800'
                            ?>
                        "
                    >
                        <span>Visi &amp; Misi</span>
                    </a>


                    <!-- Sejarah -->

                    <a
                        href="/tentang/sejarah"
                        class="
                            flex items-center gap-3 px-4 py-3
                            transition-colors

                            <?= $isActive('/tentang/sejarah')
                                ? 'bg-green-100 font-semibold text-green-900'
                                : 'hover:bg-green-50 hover:text-green-800'
                            ?>
                        "
                    >
                        <span>Sejarah Kelurahan</span>
                    </a>


                    <!-- Struktur -->

                    <a
                        href="/tentang/struktur"
                        class="
                            flex items-center gap-3 px-4 py-3
                            transition-colors

                            <?= $isActive('/tentang/struktur')
                                ? 'bg-green-100 font-semibold text-green-900'
                                : 'hover:bg-green-50 hover:text-green-800'
                            ?>
                        "
                    >
                        <span>Struktur Organisasi</span>
                    </a>


                    <!-- Penduduk -->

                    <a
                        href="/tentang/penduduk"
                        class="
                            flex items-center gap-3 px-4 py-3
                            transition-colors

                            <?= $isActive('/tentang/penduduk')
                                ? 'bg-green-100 font-semibold text-green-900'
                                : 'hover:bg-green-50 hover:text-green-800'
                            ?>
                        "
                    >
                        <span>Data Penduduk</span>
                    </a>

                </div>

            </li>


            <!-- ================================================= -->
            <!-- PELAYANAN -->
            <!-- ================================================= -->

            <li>

                <a
                    href="/pelayanan"
                    class="
                        inline-flex items-center gap-2 rounded-full px-4 py-2
                        transition-colors duration-200

                        <?= $isActive('/pelayanan')
                            ? 'bg-yellow-300 text-green-950 shadow-sm'
                            : 'text-white hover:bg-white/10 hover:text-yellow-300'
                        ?>
                    "
                >

                    <i class="fa-solid fa-briefcase"></i>

                    <span>Pelayanan</span>

                </a>

            </li>


            <!-- ================================================= -->
            <!-- BERITA -->
            <!-- ================================================= -->

            <li>

                <a
                    href="/berita"
                    class="
                        inline-flex items-center gap-2 rounded-full px-4 py-2
                        transition-colors duration-200

                        <?= $isActive('/berita')
                            ? 'bg-yellow-300 text-green-950 shadow-sm'
                            : 'text-white hover:bg-white/10 hover:text-yellow-300'
                        ?>
                    "
                >

                    <i class="fa-solid fa-newspaper"></i>

                    <span>Berita</span>

                </a>

            </li>


            <!-- ================================================= -->
            <!-- FASILITAS -->
            <!-- ================================================= -->

            <li>

                <a
                    href="/fasilitas"
                    class="
                        inline-flex items-center gap-2 rounded-full px-4 py-2
                        transition-colors duration-200

                        <?= $isActive('/fasilitas')
                            ? 'bg-yellow-300 text-green-950 shadow-sm'
                            : 'text-white hover:bg-white/10 hover:text-yellow-300'
                        ?>
                    "
                >

                    <i class="fa-solid fa-building-columns w-5"></i>

                    <span>Fasilitas</span>

                </a>

            </li>


            <!-- ================================================= -->
            <!-- PEGAWAI -->
            <!-- ================================================= -->

            <li>

                <a
                    href="/pegawai"
                    class="
                        inline-flex items-center gap-2 rounded-full px-4 py-2
                        transition-colors duration-200

                        <?= $isActive('/pegawai')
                            ? 'bg-yellow-300 text-green-950 shadow-sm'
                            : 'text-white hover:bg-white/10 hover:text-yellow-300'
                        ?>
                    "
                >

                    <i class="fa-solid fa-users"></i>

                    <span>Pegawai</span>

                </a>

            </li>


            <!-- ================================================= -->
            <!-- GALERI -->
            <!-- ================================================= -->

            <li>

                <a
                    href="/galeri"
                    class="
                        inline-flex items-center gap-2 rounded-full px-4 py-2
                        transition-colors duration-200

                        <?= $isActive('/galeri')
                            ? 'bg-yellow-300 text-green-950 shadow-sm'
                            : 'text-white hover:bg-white/10 hover:text-yellow-300'
                        ?>
                    "
                >

                    <i class="fa-solid fa-image"></i>

                    <span>Galeri</span>

                </a>

            </li>


            <!-- ================================================= -->
            <!-- KONTAK -->
            <!-- ================================================= -->

            <li>

                <a
                    href="/#kontak"
                    class="
                        inline-flex items-center gap-2 rounded-full px-4 py-2
                        transition-colors duration-200

                        <?= $isActive('/')
                            ? 'text-white hover:bg-white/10 hover:text-yellow-300'
                            : 'text-white hover:bg-white/10 hover:text-yellow-300'
                        ?>
                    "
                >

                    <i class="fa-solid fa-address-card"></i>

                    <span>Kontak</span>

                </a>

            </li>


        </ul>

    </div>

</nav>

<main class="w-full">