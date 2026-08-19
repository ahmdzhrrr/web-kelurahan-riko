<?php

$userName = $user['nama'] ?? 'Superadmin';
?>

<div class="space-y-8">

    <!-- Header Dashboard -->
    <div>
        <p class="text-sm font-medium text-green-700">
            Dashboard Superadmin
        </p>

        <h1 class="mt-1 text-2xl font-bold tracking-tight text-slate-800">
            Selamat datang, <?= e($userName) ?>
        </h1>

        <p class="mt-2 text-sm leading-6 text-slate-500">
            Kelola informasi dan konten website Kelurahan Riko melalui panel ini.
        </p>
    </div>


    <!-- Statistik -->
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">

        <!-- Berita -->
        <a
            href="/superadmin/berita"
            class="group rounded-2xl bg-white p-6 shadow-sm
                   ring-1 ring-slate-200 transition duration-300
                   hover:-translate-y-1 hover:shadow-lg"
        >

            <div class="flex items-center justify-between">

                <div
                    class="flex h-12 w-12 items-center justify-center
                           rounded-xl bg-blue-50 text-blue-600"
                >
                    <i class="fa-solid fa-newspaper text-xl"></i>
                </div>

                <i
                    class="fa-solid fa-arrow-up-right-from-square
                           text-sm text-slate-300
                           transition group-hover:text-blue-600"
                ></i>

            </div>

            <h2 class="mt-5 text-base font-semibold text-slate-800">
                Berita
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Kelola berita dan informasi terbaru.
            </p>

        </a>


        <!-- Pelayanan -->
        <a
            href="/superadmin/pelayanan"
            class="group rounded-2xl bg-white p-6 shadow-sm
                   ring-1 ring-slate-200 transition duration-300
                   hover:-translate-y-1 hover:shadow-lg"
        >

            <div class="flex items-center justify-between">

                <div
                    class="flex h-12 w-12 items-center justify-center
                           rounded-xl bg-green-50 text-green-600"
                >
                    <i class="fa-solid fa-hand-holding-heart text-xl"></i>
                </div>

                <i
                    class="fa-solid fa-arrow-up-right-from-square
                           text-sm text-slate-300
                           transition group-hover:text-green-600"
                ></i>

            </div>

            <h2 class="mt-5 text-base font-semibold text-slate-800">
                Pelayanan
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Kelola layanan administrasi kelurahan.
            </p>

        </a>


        <!-- Galeri -->
        <a
            href="/superadmin/galeri"
            class="group rounded-2xl bg-white p-6 shadow-sm
                   ring-1 ring-slate-200 transition duration-300
                   hover:-translate-y-1 hover:shadow-lg"
        >

            <div class="flex items-center justify-between">

                <div
                    class="flex h-12 w-12 items-center justify-center
                           rounded-xl bg-purple-50 text-purple-600"
                >
                    <i class="fa-solid fa-images text-xl"></i>
                </div>

                <i
                    class="fa-solid fa-arrow-up-right-from-square
                           text-sm text-slate-300
                           transition group-hover:text-purple-600"
                ></i>

            </div>

            <h2 class="mt-5 text-base font-semibold text-slate-800">
                Galeri
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Kelola album dan dokumentasi kegiatan.
            </p>

        </a>


        <!-- Pegawai -->
        <a
            href="/superadmin/pegawai"
            class="group rounded-2xl bg-white p-6 shadow-sm
                   ring-1 ring-slate-200 transition duration-300
                   hover:-translate-y-1 hover:shadow-lg"
        >

            <div class="flex items-center justify-between">

                <div
                    class="flex h-12 w-12 items-center justify-center
                           rounded-xl bg-yellow-50 text-yellow-600"
                >
                    <i class="fa-solid fa-users text-xl"></i>
                </div>

                <i
                    class="fa-solid fa-arrow-up-right-from-square
                           text-sm text-slate-300
                           transition group-hover:text-yellow-600"
                ></i>

            </div>

            <h2 class="mt-5 text-base font-semibold text-slate-800">
                Aparatur
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Kelola data aparatur Kelurahan Riko.
            </p>

        </a>

    </div>


    <!-- Pengelolaan Website -->
    <div>

        <div class="mb-5">

            <h2 class="text-lg font-bold text-slate-800">
                Pengelolaan Website
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Akses cepat untuk mengubah informasi utama website.
            </p>

        </div>


        <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-3">

            <!-- Profil -->
            <a
                href="/superadmin/profil-website"
                class="flex items-start gap-4 rounded-2xl
                       bg-white p-5 shadow-sm
                       ring-1 ring-slate-200
                       transition hover:shadow-md"
            >

                <div
                    class="flex h-11 w-11 shrink-0 items-center justify-center
                           rounded-xl bg-emerald-50 text-emerald-700"
                >
                    <i class="fa-solid fa-building"></i>
                </div>

                <div>

                    <h3 class="font-semibold text-slate-800">
                        Profil Kelurahan
                    </h3>

                    <p class="mt-1 text-sm leading-6 text-slate-500">
                        Ubah informasi profil Kelurahan Riko.
                    </p>

                </div>

            </a>


            <!-- Sejarah -->
            <a
                href="/superadmin/sejarah"
                class="flex items-start gap-4 rounded-2xl
                       bg-white p-5 shadow-sm
                       ring-1 ring-slate-200
                       transition hover:shadow-md"
            >

                <div
                    class="flex h-11 w-11 shrink-0 items-center justify-center
                           rounded-xl bg-orange-50 text-orange-700"
                >
                    <i class="fa-solid fa-book-open"></i>
                </div>

                <div>

                    <h3 class="font-semibold text-slate-800">
                        Sejarah
                    </h3>

                    <p class="mt-1 text-sm leading-6 text-slate-500">
                        Ubah sejarah dan dokumentasi Kelurahan Riko.
                    </p>

                </div>

            </a>


            <!-- Visi Misi -->
            <a
                href="/superadmin/visi-misi"
                class="flex items-start gap-4 rounded-2xl
                       bg-white p-5 shadow-sm
                       ring-1 ring-slate-200
                       transition hover:shadow-md"
            >

                <div
                    class="flex h-11 w-11 shrink-0 items-center justify-center
                           rounded-xl bg-indigo-50 text-indigo-700"
                >
                    <i class="fa-solid fa-bullseye"></i>
                </div>

                <div>

                    <h3 class="font-semibold text-slate-800">
                        Visi & Misi
                    </h3>

                    <p class="mt-1 text-sm leading-6 text-slate-500">
                        Kelola visi dan misi Kelurahan.
                    </p>

                </div>

            </a>


            <!-- Fasilitas -->
            <a
                href="/superadmin/fasilitas"
                class="flex items-start gap-4 rounded-2xl
                       bg-white p-5 shadow-sm
                       ring-1 ring-slate-200
                       transition hover:shadow-md"
            >

                <div
                    class="flex h-11 w-11 shrink-0 items-center justify-center
                           rounded-xl bg-cyan-50 text-cyan-700"
                >
                    <i class="fa-solid fa-building"></i>
                </div>

                <div>

                    <h3 class="font-semibold text-slate-800">
                        Fasilitas
                    </h3>

                    <p class="mt-1 text-sm leading-6 text-slate-500">
                        Kelola fasilitas Kelurahan Riko.
                    </p>

                </div>

            </a>


            <!-- Kontak -->
            <a
                href="/superadmin/kontak"
                class="flex items-start gap-4 rounded-2xl
                       bg-white p-5 shadow-sm
                       ring-1 ring-slate-200
                       transition hover:shadow-md"
            >

                <div
                    class="flex h-11 w-11 shrink-0 items-center justify-center
                           rounded-xl bg-rose-50 text-rose-700"
                >
                    <i class="fa-solid fa-address-book"></i>
                </div>

                <div>

                    <h3 class="font-semibold text-slate-800">
                        Kontak
                    </h3>

                    <p class="mt-1 text-sm leading-6 text-slate-500">
                        Kelola alamat dan informasi kontak kelurahan.
                    </p>

                </div>

            </a>


            <!-- Pengaturan -->
            <a
                href="/superadmin/settings"
                class="flex items-start gap-4 rounded-2xl
                       bg-white p-5 shadow-sm
                       ring-1 ring-slate-200
                       transition hover:shadow-md"
            >

                <div
                    class="flex h-11 w-11 shrink-0 items-center justify-center
                           rounded-xl bg-slate-100 text-slate-700"
                >
                    <i class="fa-solid fa-gear"></i>
                </div>

                <div>

                    <h3 class="font-semibold text-slate-800">
                        Pengaturan Website
                    </h3>

                    <p class="mt-1 text-sm leading-6 text-slate-500">
                        Kelola nama website, logo, tagline, dan informasi umum.
                    </p>

                </div>

            </a>

        </div>

    </div>


    <!-- Profil Akun -->
    <div
        class="flex flex-col gap-5 rounded-2xl
               bg-green-900 p-6 text-white
               shadow-lg sm:flex-row
               sm:items-center sm:justify-between"
    >

        <div>

            <p class="text-sm font-medium text-green-200">
                Akun yang sedang digunakan
            </p>

            <h2 class="mt-1 text-xl font-bold">
                <?= e($user['nama'] ?? 'Superadmin') ?>
            </h2>

            <p class="mt-1 text-sm text-green-100/80">
                <?= e($user['username'] ?? '') ?>
            </p>

        </div>


        <a
            href="/superadmin/profil"
            class="inline-flex items-center justify-center
                   rounded-xl bg-white px-5 py-3
                   text-sm font-semibold text-green-900
                   transition hover:bg-green-50"
        >
            <i class="fa-solid fa-user-gear mr-2"></i>
            Kelola Profil
        </a>

    </div>

</div>