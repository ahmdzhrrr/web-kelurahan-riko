<?php
$kontak = $kontak ?? [];
?>

<div class="max-w-6xl">

    <!-- Header -->

    <div class="mb-8">

        <h1 class="text-2xl font-bold text-slate-800">
            Kontak Kelurahan
        </h1>

        <p class="mt-2 text-sm leading-6 text-slate-500">
            Kelola alamat, kontak, lokasi, jam operasional,
            dan media sosial Kelurahan Riko.
        </p>

    </div>


    <form
        action="/superadmin/kontak/update"
        method="POST"
        class="space-y-6"
    >

        <!-- ================================================= -->
        <!-- INFORMASI UTAMA -->
        <!-- ================================================= -->

        <section
            class="rounded-2xl bg-white p-6 shadow-sm
                   ring-1 ring-slate-200"
        >

            <div class="mb-6">

                <h2 class="text-lg font-bold text-green-800">
                    Informasi Kontak
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Informasi yang digunakan pada bagian kontak website.
                </p>

            </div>


            <div class="space-y-5">

                <!-- Alamat -->

                <div>

                    <label
                        for="alamat"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Alamat
                    </label>

                    <textarea
                        id="alamat"
                        name="alamat"
                        rows="4"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm leading-7 outline-none
                               transition
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    ><?= e($kontak['alamat'] ?? '') ?></textarea>

                </div>


                <div class="grid gap-5 md:grid-cols-2">

                    <!-- Email -->

                    <div>

                        <label
                            for="email"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >
                            Email
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="<?= e($kontak['email'] ?? '') ?>"
                            placeholder="contoh@email.com"
                            class="w-full rounded-xl border border-slate-300
                                   px-4 py-3 text-sm outline-none
                                   focus:border-green-700
                                   focus:ring-2 focus:ring-green-100"
                        >

                    </div>


                    <!-- Telepon -->

                    <div>

                        <label
                            for="telepon"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >
                            Telepon
                        </label>

                        <input
                            type="text"
                            id="telepon"
                            name="telepon"
                            value="<?= e($kontak['telepon'] ?? '') ?>"
                            placeholder="0542xxxxxxx"
                            class="w-full rounded-xl border border-slate-300
                                   px-4 py-3 text-sm outline-none
                                   focus:border-green-700
                                   focus:ring-2 focus:ring-green-100"
                        >

                    </div>


                    <!-- WhatsApp -->

                    <div>

                        <label
                            for="whatsapp"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >
                            WhatsApp
                        </label>

                        <input
                            type="text"
                            id="whatsapp"
                            name="whatsapp"
                            value="<?= e($kontak['whatsapp'] ?? '') ?>"
                            placeholder="+628xxxxxxxxxx"
                            class="w-full rounded-xl border border-slate-300
                                   px-4 py-3 text-sm outline-none
                                   focus:border-green-700
                                   focus:ring-2 focus:ring-green-100"
                        >

                    </div>


                    <!-- Website -->

                    <div>

                        <label
                            for="website"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >
                            Website
                        </label>

                        <input
                            type="url"
                            id="website"
                            name="website"
                            value="<?= e($kontak['website'] ?? '') ?>"
                            placeholder="https://..."
                            class="w-full rounded-xl border border-slate-300
                                   px-4 py-3 text-sm outline-none
                                   focus:border-green-700
                                   focus:ring-2 focus:ring-green-100"
                        >

                    </div>

                </div>

            </div>

        </section>


        <!-- ================================================= -->
        <!-- LOKASI -->
        <!-- ================================================= -->

        <section
            class="rounded-2xl bg-white p-6 shadow-sm
                   ring-1 ring-slate-200"
        >

            <div class="mb-6">

                <h2 class="text-lg font-bold text-green-800">
                    Lokasi
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Masukkan koordinat lokasi dan embed Google Maps.
                </p>

            </div>


            <div class="space-y-5">

                <!-- Maps -->

                <div>

                    <label
                        for="maps"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Google Maps Embed
                    </label>

                    <textarea
                        id="maps"
                        name="maps"
                        rows="5"
                        placeholder="Masukkan URL embed Google Maps..."
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm leading-6 outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    ><?= e($kontak['maps'] ?? '') ?></textarea>

                    <p class="mt-2 text-xs text-slate-400">
                        Gunakan URL embed Google Maps, bukan URL halaman biasa.
                    </p>

                </div>


                <div class="grid gap-5 md:grid-cols-2">

                    <!-- Latitude -->

                    <div>

                        <label
                            for="latitude"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >
                            Latitude
                        </label>

                        <input
                            type="number"
                            id="latitude"
                            name="latitude"
                            step="0.00000001"
                            value="<?= e($kontak['latitude'] ?? '') ?>"
                            placeholder="-0.00000000"
                            class="w-full rounded-xl border border-slate-300
                                   px-4 py-3 text-sm outline-none
                                   focus:border-green-700
                                   focus:ring-2 focus:ring-green-100"
                        >

                    </div>


                    <!-- Longitude -->

                    <div>

                        <label
                            for="longitude"
                            class="mb-2 block text-sm font-semibold text-slate-700"
                        >
                            Longitude
                        </label>

                        <input
                            type="number"
                            id="longitude"
                            name="longitude"
                            step="0.00000001"
                            value="<?= e($kontak['longitude'] ?? '') ?>"
                            placeholder="116.00000000"
                            class="w-full rounded-xl border border-slate-300
                                   px-4 py-3 text-sm outline-none
                                   focus:border-green-700
                                   focus:ring-2 focus:ring-green-100"
                        >

                    </div>

                </div>

            </div>

        </section>


        <!-- ================================================= -->
        <!-- JAM OPERASIONAL -->
        <!-- ================================================= -->

        <section
            class="rounded-2xl bg-white p-6 shadow-sm
                   ring-1 ring-slate-200"
        >

            <div class="mb-6">

                <h2 class="text-lg font-bold text-green-800">
                    Jam Operasional
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Atur jadwal pelayanan yang akan ditampilkan
                    kepada masyarakat.
                </p>

            </div>


            <textarea
                id="jam_operasional"
                name="jam_operasional"
                rows="5"
                placeholder="Senin - Jumat: 08.00 - 16.00&#10;Sabtu - Minggu: Tutup"
                class="w-full rounded-xl border border-slate-300
                       px-4 py-3 text-sm leading-7 outline-none
                       focus:border-green-700
                       focus:ring-2 focus:ring-green-100"
            ><?= e($kontak['jam_operasional'] ?? '') ?></textarea>

        </section>


        <!-- ================================================= -->
        <!-- SOCIAL MEDIA -->
        <!-- ================================================= -->

        <section
            class="rounded-2xl bg-white p-6 shadow-sm
                   ring-1 ring-slate-200"
        >

            <div class="mb-6">

                <h2 class="text-lg font-bold text-green-800">
                    Media Sosial
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Masukkan URL akun media sosial resmi Kelurahan Riko.
                </p>

            </div>


            <div class="grid gap-5 md:grid-cols-2">

                <!-- Instagram -->

                <div>

                    <label
                        for="instagram"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Instagram
                    </label>

                    <div class="relative">

                        <i
                            class="fa-brands fa-instagram
                                   absolute left-4 top-1/2
                                   -translate-y-1/2
                                   text-slate-400"
                        ></i>

                        <input
                            type="url"
                            id="instagram"
                            name="instagram"
                            value="<?= e($kontak['instagram'] ?? '') ?>"
                            placeholder="https://instagram.com/..."
                            class="w-full rounded-xl border border-slate-300
                                   py-3 pl-11 pr-4 text-sm outline-none
                                   focus:border-green-700
                                   focus:ring-2 focus:ring-green-100"
                        >

                    </div>

                </div>


                <!-- Facebook -->

                <div>

                    <label
                        for="facebook"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Facebook
                    </label>

                    <div class="relative">

                        <i
                            class="fa-brands fa-facebook
                                   absolute left-4 top-1/2
                                   -translate-y-1/2
                                   text-slate-400"
                        ></i>

                        <input
                            type="url"
                            id="facebook"
                            name="facebook"
                            value="<?= e($kontak['facebook'] ?? '') ?>"
                            placeholder="https://facebook.com/..."
                            class="w-full rounded-xl border border-slate-300
                                   py-3 pl-11 pr-4 text-sm outline-none
                                   focus:border-green-700
                                   focus:ring-2 focus:ring-green-100"
                        >

                    </div>

                </div>


                <!-- YouTube -->

                <div>

                    <label
                        for="youtube"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        YouTube
                    </label>

                    <div class="relative">

                        <i
                            class="fa-brands fa-youtube
                                   absolute left-4 top-1/2
                                   -translate-y-1/2
                                   text-slate-400"
                        ></i>

                        <input
                            type="url"
                            id="youtube"
                            name="youtube"
                            value="<?= e($kontak['youtube'] ?? '') ?>"
                            placeholder="https://youtube.com/..."
                            class="w-full rounded-xl border border-slate-300
                                   py-3 pl-11 pr-4 text-sm outline-none
                                   focus:border-green-700
                                   focus:ring-2 focus:ring-green-100"
                        >

                    </div>

                </div>


                <!-- TikTok -->

                <div>

                    <label
                        for="tiktok"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        TikTok
                    </label>

                    <div class="relative">

                        <i
                            class="fa-brands fa-tiktok
                                   absolute left-4 top-1/2
                                   -translate-y-1/2
                                   text-slate-400"
                        ></i>

                        <input
                            type="url"
                            id="tiktok"
                            name="tiktok"
                            value="<?= e($kontak['tiktok'] ?? '') ?>"
                            placeholder="https://tiktok.com/@..."
                            class="w-full rounded-xl border border-slate-300
                                   py-3 pl-11 pr-4 text-sm outline-none
                                   focus:border-green-700
                                   focus:ring-2 focus:ring-green-100"
                        >

                    </div>

                </div>

            </div>

        </section>


        <!-- SAVE -->

        <div class="sticky bottom-4 flex justify-end">

            <button
                type="submit"
                class="rounded-xl bg-green-900
                       px-7 py-3
                       text-sm font-semibold text-white
                       shadow-lg
                       transition hover:bg-green-800"
            >

                <i class="fa-solid fa-floppy-disk mr-2"></i>

                Simpan Perubahan

            </button>

        </div>

    </form>

</div>