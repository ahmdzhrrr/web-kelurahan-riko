<?php
$setting = $setting ?? [];
?>

<div class="max-w-5xl">

    <!-- Header -->
    <div class="mb-8">

        <h1 class="text-2xl font-bold text-slate-800">
            Pengaturan Website
        </h1>

        <p class="mt-2 text-sm leading-6 text-slate-500">
            Kelola informasi umum, identitas, tampilan, dan metadata
            website Kelurahan Riko.
        </p>

    </div>


    <form
        action="/superadmin/settings/update"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-6"
    >


        <!-- ================================================= -->
        <!-- IDENTITAS WEBSITE -->
        <!-- ================================================= -->

        <section
            class="rounded-2xl bg-white p-6 shadow-sm
                   ring-1 ring-slate-200"
        >

            <div class="mb-6">

                <h2 class="text-lg font-bold text-green-800">
                    Identitas Website
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Informasi utama yang digunakan pada website.
                </p>

            </div>


            <div class="grid gap-5 md:grid-cols-2">

                <!-- Site Name -->

                <div>

                    <label
                        for="site_name"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Nama Website
                    </label>

                    <input
                        type="text"
                        id="site_name"
                        name="site_name"
                        value="<?= e($setting['site_name'] ?? '') ?>"
                        required
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               transition
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    >

                </div>


                <!-- Site Subtitle -->

                <div>

                    <label
                        for="site_subtitle"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Subjudul Website
                    </label>

                    <input
                        type="text"
                        id="site_subtitle"
                        name="site_subtitle"
                        value="<?= e($setting['site_subtitle'] ?? '') ?>"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               transition
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    >

                </div>


                <!-- Tagline -->

                <div class="md:col-span-2">

                    <label
                        for="tagline"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Tagline
                    </label>

                    <input
                        type="text"
                        id="tagline"
                        name="tagline"
                        value="<?= e($setting['tagline'] ?? '') ?>"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               transition
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    >

                </div>

            </div>

        </section>


        <!-- ================================================= -->
        <!-- LOGO -->
        <!-- ================================================= -->

        <section
            class="rounded-2xl bg-white p-6 shadow-sm
                   ring-1 ring-slate-200"
        >

            <div class="mb-6">

                <h2 class="text-lg font-bold text-green-800">
                    Identitas Visual
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Kelola logo website.
                </p>

            </div>


            <div class="grid gap-8 md:grid-cols-2">

                <!-- Logo -->

                <div>

                    <label
                        for="logo"
                        class="mb-3 block text-sm font-semibold text-slate-700"
                    >
                        Logo Website
                    </label>


                    <?php if (!empty($setting['logo'])): ?>

                        <div
                            class="mb-4 flex h-32 items-center
                                   justify-center rounded-xl
                                   border border-slate-200
                                   bg-slate-50 p-4"
                        >

                            <img
                                src="/<?= e(ltrim($setting['logo'], '/')) ?>"
                                alt="Logo Website"
                                class="h-full max-w-full object-contain"
                            >

                        </div>

                    <?php endif; ?>


                    <input
                        type="file"
                        id="logo"
                        name="logo"
                        accept=".jpg,.jpeg,.png,.webp"
                        class="block w-full rounded-xl
                               border border-slate-300
                               bg-white text-sm text-slate-600
                               file:mr-4 file:border-0
                               file:bg-green-900
                               file:px-4 file:py-3
                               file:text-sm
                               file:font-semibold
                               file:text-white
                               hover:file:bg-green-800"
                    >

                    <p class="mt-2 text-xs text-slate-400">
                        JPG, PNG, WEBP. Maksimal 2 MB.
                    </p>

                </div>

            </div>

        </section>


        <!-- ================================================= -->
        <!-- HERO -->
        <!-- ================================================= -->

        <section
            class="rounded-2xl bg-white p-6 shadow-sm
                   ring-1 ring-slate-200"
        >

            <div class="mb-6">

                <h2 class="text-lg font-bold text-green-800">
                    Hero Website
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Informasi teks pada area hero.
                </p>

            </div>


            <div class="space-y-5">

                <div>

                    <label
                        for="hero_title"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Judul Hero
                    </label>

                    <input
                        type="text"
                        id="hero_title"
                        name="hero_title"
                        value="<?= e($setting['hero_title'] ?? '') ?>"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    >

                </div>


                <div>

                    <label
                        for="hero_subtitle"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Subtitle Hero
                    </label>

                    <textarea
                        id="hero_subtitle"
                        name="hero_subtitle"
                        rows="4"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    ><?= e($setting['hero_subtitle'] ?? '') ?></textarea>

                </div>

            </div>

        </section>


        <!-- ================================================= -->
        <!-- PROFIL WILAYAH -->
        <!-- ================================================= -->

        <section
            class="rounded-2xl bg-white p-6 shadow-sm
                   ring-1 ring-slate-200"
        >

            <div class="mb-6">

                <h2 class="text-lg font-bold text-green-800">
                    Informasi Wilayah
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Informasi dasar wilayah Kelurahan Riko.
                </p>

            </div>


            <div class="grid gap-5 md:grid-cols-2">

                <!-- Kecamatan -->

                <div>

                    <label
                        for="kecamatan"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Kecamatan
                    </label>

                    <input
                        type="text"
                        id="kecamatan"
                        name="kecamatan"
                        value="<?= e($setting['kecamatan'] ?? '') ?>"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    >

                </div>


                <!-- Luas -->

                <div>

                    <label
                        for="luas_wilayah"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Luas Wilayah (Km²)
                    </label>

                    <input
                        type="number"
                        id="luas_wilayah"
                        name="luas_wilayah"
                        step="0.01"
                        min="0"
                        value="<?= e($setting['luas_wilayah'] ?? '') ?>"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    >

                </div>


                <!-- Tipologi -->

                <div class="md:col-span-2">

                    <label
                        for="tipologi"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Tipologi
                    </label>

                    <textarea
                        id="tipologi"
                        name="tipologi"
                        rows="3"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    ><?= e($setting['tipologi'] ?? '') ?></textarea>

                </div>

            </div>

        </section>


        <!-- ================================================= -->
        <!-- FOOTER -->
        <!-- ================================================= -->

        <section
            class="rounded-2xl bg-white p-6 shadow-sm
                   ring-1 ring-slate-200"
        >

            <div class="mb-6">

                <h2 class="text-lg font-bold text-green-800">
                    Footer
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Atur informasi yang ditampilkan pada footer website.
                </p>

            </div>


            <div class="space-y-5">

                <div>

                    <label
                        for="footer"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Isi Footer
                    </label>

                    <textarea
                        id="footer"
                        name="footer"
                        rows="4"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    ><?= e($setting['footer'] ?? '') ?></textarea>

                </div>


                <div>

                    <label
                        for="copyright"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Copyright
                    </label>

                    <input
                        type="text"
                        id="copyright"
                        name="copyright"
                        value="<?= e($setting['copyright'] ?? '') ?>"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    >

                </div>

            </div>

        </section>


        <!-- ================================================= -->
        <!-- SEO -->
        <!-- ================================================= -->

        <section
            class="rounded-2xl bg-white p-6 shadow-sm
                   ring-1 ring-slate-200"
        >

            <div class="mb-6">

                <h2 class="text-lg font-bold text-green-800">
                    SEO
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Informasi yang digunakan untuk mesin pencari.
                </p>

            </div>


            <div class="space-y-5">

                <div>

                    <label
                        for="meta_title"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Meta Title
                    </label>

                    <input
                        type="text"
                        id="meta_title"
                        name="meta_title"
                        value="<?= e($setting['meta_title'] ?? '') ?>"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    >

                </div>


                <div>

                    <label
                        for="meta_description"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Meta Description
                    </label>

                    <textarea
                        id="meta_description"
                        name="meta_description"
                        rows="4"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    ><?= e($setting['meta_description'] ?? '') ?></textarea>

                </div>


                <div>

                    <label
                        for="meta_keywords"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Meta Keywords
                    </label>

                    <textarea
                        id="meta_keywords"
                        name="meta_keywords"
                        rows="3"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    ><?= e($setting['meta_keywords'] ?? '') ?></textarea>

                </div>

            </div>

        </section>


        <!-- ================================================= -->
        <!-- MAINTENANCE -->
        <!-- ================================================= -->

        <section
            class="rounded-2xl bg-white p-6 shadow-sm
                   ring-1 ring-slate-200"
        >

            <div
                class="flex items-center
                       justify-between gap-5"
            >

                <div>

                    <h2 class="text-lg font-bold text-green-800">
                        Maintenance Mode
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Menonaktifkan sementara akses website publik.
                    </p>

                </div>


                <label class="relative inline-flex cursor-pointer items-center">

                    <input
                        type="checkbox"
                        name="maintenance_mode"
                        value="1"
                        class="peer sr-only"
                        <?= !empty($setting['maintenance_mode'])
                            ? 'checked'
                            : ''
                        ?>
                    >

                    <div
                        class="h-6 w-11 rounded-full
                               bg-slate-300
                               peer-checked:bg-green-700
                               after:absolute after:left-[2px]
                               after:top-[2px]
                               after:h-5 after:w-5
                               after:rounded-full
                               after:bg-white
                               after:transition-all
                               peer-checked:after:translate-x-full"
                    ></div>

                </label>

            </div>

        </section>


        <!-- ================================================= -->
        <!-- SAVE -->
        <!-- ================================================= -->

        <div
            class="sticky bottom-4 flex justify-end"
        >

            <button
                type="submit"
                class="rounded-xl bg-green-900
                       px-7 py-3
                       text-sm font-semibold text-white
                       shadow-lg
                       transition
                       hover:bg-green-800"
            >

                <i class="fa-solid fa-floppy-disk mr-2"></i>

                Simpan Pengaturan

            </button>

        </div>


    </form>

</div>