<?php

use App\Core\Auth;

$user = Auth::user();

/*
|--------------------------------------------------------------------------
| Current Path
|--------------------------------------------------------------------------
| Digunakan untuk menentukan menu sidebar yang sedang aktif.
*/

$currentPath = parse_url(
    $_SERVER['REQUEST_URI'] ?? '/',
    PHP_URL_PATH
);

$currentPath = rtrim(
    (string) $currentPath,
    '/'
);

if ($currentPath === '') {
    $currentPath = '/';
}


/*
|--------------------------------------------------------------------------
| Helper Active Menu
|--------------------------------------------------------------------------
| Jika URL sekarang sama dengan URL menu,
| maka menu diberi background seperti hover.
*/

$isActive = function (string $path) use ($currentPath): bool {
    return $currentPath === rtrim($path, '/');
};

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?= e($title ?? 'Superadmin') ?> -
        Kelurahan Riko
    </title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

    <style>

        html {
            scroll-behavior: smooth;
        }

    </style>

</head>


<body class="min-h-screen bg-slate-100">


<div class="flex min-h-screen">


    <!-- ================================================= -->
    <!-- SIDEBAR -->
    <!-- ================================================= -->

    <aside
        class="fixed inset-y-0 left-0 z-40
               w-64
               bg-green-950
               text-white"
    >


        <!-- ================================================= -->
        <!-- LOGO / BRAND -->
        <!-- ================================================= -->

        <div
            class="flex h-20 items-center
                   gap-3
                   border-b border-white/10
                   px-6"
        >

            <?php if (!empty($setting['logo'])): ?>

                <img
                    src="/<?= e(ltrim($setting['logo'], '/')) ?>"
                    alt="<?= e($setting['site_name'] ?? 'Kelurahan Riko') ?>"
                    class="h-14 w-14 shrink-0 object-contain"
                >

            <?php endif; ?>


            <div>

                <p class="text-sm font-bold leading-tight">

                    <?= e(
                        $setting['site_name']
                        ?? 'Kelurahan Riko'
                    ) ?>

                </p>


                <p class="mt-1 text-xs text-white/50">

                    Superadmin Panel

                </p>

            </div>

        </div>


        <!-- ================================================= -->
        <!-- MENU -->
        <!-- ================================================= -->

        <nav
            class="h-[calc(100vh-80px)]
                   overflow-y-auto
                   px-4 py-5"
        >


            <!-- ================================================= -->
            <!-- UTAMA -->
            <!-- ================================================= -->

            <div
                class="mb-2 px-3
                       text-[10px]
                       font-bold
                       uppercase
                       tracking-[0.2em]
                       text-white/40"
            >
                Utama
            </div>


            <!-- Dashboard -->

            <a
                href="/superadmin/dashboard"
                class="mb-1 flex items-center gap-3
                       rounded-xl px-4 py-3
                       text-sm font-medium
                       transition
                       <?= $isActive('/superadmin/dashboard')
                            ? 'bg-white/10 text-white'
                            : 'text-white/85 hover:bg-white/10 hover:text-white'
                       ?>"
            >

                <i class="fa-solid fa-gauge w-5"></i>

                Dashboard

            </a>


            <!-- ================================================= -->
            <!-- KONTEN WEBSITE -->
            <!-- ================================================= -->

            <div
                class="mb-2 mt-6 px-3
                       text-[10px]
                       font-bold
                       uppercase
                       tracking-[0.2em]
                       text-white/40"
            >
                Konten Website
            </div>


            <!-- Profil Kelurahan -->

            <a
                href="/superadmin/profil-website"
                class="mb-1 flex items-center gap-3
                       rounded-xl px-4 py-3
                       text-sm font-medium
                       transition
                       <?= $isActive('/superadmin/profil-website')
                            ? 'bg-white/10 text-white'
                            : 'text-white/85 hover:bg-white/10 hover:text-white'
                       ?>"
            >

                <i class="fa-solid fa-building w-5"></i>

                Profil Kelurahan

            </a>


            <!-- Sejarah -->

            <a
                href="/superadmin/sejarah"
                class="mb-1 flex items-center gap-3
                       rounded-xl px-4 py-3
                       text-sm font-medium
                       transition
                       <?= $isActive('/superadmin/sejarah')
                            ? 'bg-white/10 text-white'
                            : 'text-white/85 hover:bg-white/10 hover:text-white'
                       ?>"
            >

                <i class="fa-solid fa-book-open w-5"></i>

                Sejarah

            </a>


            <!-- Visi & Misi -->

            <a
                href="/superadmin/visi-misi"
                class="mb-1 flex items-center gap-3
                       rounded-xl px-4 py-3
                       text-sm font-medium
                       transition
                       <?= $isActive('/superadmin/visi-misi')
                            ? 'bg-white/10 text-white'
                            : 'text-white/85 hover:bg-white/10 hover:text-white'
                       ?>"
            >

                <i class="fa-solid fa-bullseye w-5"></i>

                Visi & Misi

            </a>


            <!-- Kontak -->

            <a
                href="/superadmin/kontak"
                class="mb-1 flex items-center gap-3
                       rounded-xl px-4 py-3
                       text-sm font-medium
                       transition
                       <?= $isActive('/superadmin/kontak')
                            ? 'bg-white/10 text-white'
                            : 'text-white/85 hover:bg-white/10 hover:text-white'
                       ?>"
            >

                <i class="fa-solid fa-address-book w-5"></i>

                Kontak

            </a>


            <!-- Pengaturan -->

            <a
                href="/superadmin/settings"
                class="mb-1 flex items-center gap-3
                       rounded-xl px-4 py-3
                       text-sm font-medium
                       transition
                       <?= $isActive('/superadmin/settings')
                            ? 'bg-white/10 text-white'
                            : 'text-white/85 hover:bg-white/10 hover:text-white'
                       ?>"
            >

                <i class="fa-solid fa-gear w-5"></i>

                Pengaturan

            </a>


            <!-- ================================================= -->
            <!-- DATA WEBSITE -->
            <!-- ================================================= -->

            <div
                class="mb-2 mt-6 px-3
                       text-[10px]
                       font-bold
                       uppercase
                       tracking-[0.2em]
                       text-white/40"
            >
                Data Website
            </div>


            <!-- Pelayanan -->

            <a
                href="/superadmin/pelayanan"
                class="mb-1 flex items-center gap-3
                       rounded-xl px-4 py-3
                       text-sm font-medium
                       transition
                       <?= $isActive('/superadmin/pelayanan')
                            ? 'bg-white/10 text-white'
                            : 'text-white/85 hover:bg-white/10 hover:text-white'
                       ?>"
            >

                <i class="fa-solid fa-briefcase w-5"></i>

                Pelayanan

            </a>


            <!-- Berita -->

            <a
                href="/superadmin/berita"
                class="mb-1 flex items-center gap-3
                       rounded-xl px-4 py-3
                       text-sm font-medium
                       transition
                       <?= $isActive('/superadmin/berita')
                            ? 'bg-white/10 text-white'
                            : 'text-white/85 hover:bg-white/10 hover:text-white'
                       ?>"
            >

                <i class="fa-solid fa-newspaper w-5"></i>

                Berita

            </a>


            <!-- Galeri -->

            <a
                href="/superadmin/galeri"
                class="mb-1 flex items-center gap-3
                       rounded-xl px-4 py-3
                       text-sm font-medium
                       transition
                       <?= $isActive('/superadmin/galeri')
                            ? 'bg-white/10 text-white'
                            : 'text-white/85 hover:bg-white/10 hover:text-white'
                       ?>"
            >

                <i class="fa-solid fa-images w-5"></i>

                Galeri

            </a>


            <!-- Fasilitas -->

            <a
                href="/superadmin/fasilitas"
                class="mb-1 flex items-center gap-3
                       rounded-xl px-4 py-3
                       text-sm font-medium
                       transition
                       <?= $isActive('/superadmin/fasilitas')
                            ? 'bg-white/10 text-white'
                            : 'text-white/85 hover:bg-white/10 hover:text-white'
                       ?>"
            >

                <i class="fa-solid fa-building-columns w-5"></i>

                Fasilitas

            </a>


            <!-- Pegawai -->

            <a
                href="/superadmin/pegawai"
                class="mb-1 flex items-center gap-3
                       rounded-xl px-4 py-3
                       text-sm font-medium
                       transition
                       <?= $isActive('/superadmin/pegawai')
                            ? 'bg-white/10 text-white'
                            : 'text-white/85 hover:bg-white/10 hover:text-white'
                       ?>"
            >

                <i class="fa-solid fa-users w-5"></i>

                Pegawai

            </a>


            <!-- Penduduk -->

            <a
                href="/superadmin/penduduk"
                class="mb-1 flex items-center gap-3
                       rounded-xl px-4 py-3
                       text-sm font-medium
                       transition
                       <?= $isActive('/superadmin/penduduk')
                            ? 'bg-white/10 text-white'
                            : 'text-white/85 hover:bg-white/10 hover:text-white'
                       ?>"
            >

                <i class="fa-solid fa-people-group w-5"></i>

                Penduduk

            </a>


            <!-- ================================================= -->
            <!-- AKUN -->
            <!-- ================================================= -->

            <div
                class="mb-2 mt-6 px-3
                       text-[10px]
                       font-bold
                       uppercase
                       tracking-[0.2em]
                       text-white/40"
            >
                Akun
            </div>


            <!-- Profil Saya -->

            <a
                href="/superadmin/profil"
                class="mb-1 flex items-center gap-3
                       rounded-xl px-4 py-3
                       text-sm font-medium
                       transition
                       <?= $isActive('/superadmin/profil')
                            ? 'bg-white/10 text-white'
                            : 'text-white/85 hover:bg-white/10 hover:text-white'
                       ?>"
            >

                <i class="fa-solid fa-user-gear w-5"></i>

                Profil Saya

            </a>


            <!-- ================================================= -->
            <!-- LOGOUT -->
            <!-- ================================================= -->

            <form
                action="/superadmin/logout"
                method="POST"
                class="mt-6
                       border-t
                       border-white/10
                       pt-4"
            >

                <button
                    type="submit"
                    class="flex w-full items-center gap-3
                           rounded-xl px-4 py-3
                           text-sm font-medium
                           text-red-200
                           transition
                           hover:bg-red-500/10
                           hover:text-red-100"
                >

                    <i class="fa-solid fa-right-from-bracket w-5"></i>

                    Keluar

                </button>

            </form>


        </nav>

    </aside>


    <!-- ================================================= -->
    <!-- MAIN -->
    <!-- ================================================= -->

    <main class="ml-64 min-h-screen flex-1">


        <!-- ================================================= -->
        <!-- TOP BAR -->
        <!-- ================================================= -->

        <header
            class="sticky top-0 z-30
                   border-b border-slate-200
                   bg-white/95
                   px-8 py-4
                   backdrop-blur"
        >

            <div
                class="flex items-center
                       justify-between"
            >


                <!-- Page Title -->

                <div>

                    <h2
                        class="text-lg font-bold text-slate-800"
                    >

                        <?= e(
                            $title
                            ?? 'Dashboard'
                        ) ?>

                    </h2>


                    <p
                        class="mt-0.5 text-xs text-slate-500"
                    >

                        Panel Superadmin Kelurahan Riko

                    </p>

                </div>


                <!-- User -->

                <div
                    class="flex items-center gap-3"
                >


                    <div
                        class="hidden text-right sm:block"
                    >

                        <p
                            class="text-sm font-semibold
                                   text-slate-800"
                        >

                            <?= e(
                                $user['nama']
                                ?? 'Superadmin'
                            ) ?>

                        </p>


                        <p
                            class="text-xs text-slate-500"
                        >

                            Superadmin

                        </p>

                    </div>


                    <div
                        class="flex h-10 w-10
                               items-center
                               justify-center
                               rounded-full
                               bg-green-100
                               text-green-800"
                    >

                        <i class="fa-solid fa-user"></i>

                    </div>


                </div>

            </div>

        </header>


        <!-- ================================================= -->
        <!-- CONTENT -->
        <!-- ================================================= -->

        <div class="p-6 sm:p-8 lg:p-10">

            <?php require $viewFile; ?>

        </div>


    </main>


</div>


</body>

</html>