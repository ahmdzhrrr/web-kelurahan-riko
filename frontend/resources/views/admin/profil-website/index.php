<?php
$profil = $profil ?? [];
?>

<div class="max-w-5xl">

    <!-- Header -->
    <div class="mb-8">

        <h1 class="text-2xl font-bold text-slate-800">
            Profil Kelurahan
        </h1>

        <p class="mt-2 text-sm leading-6 text-slate-500">
            Kelola informasi profil Kelurahan Riko yang ditampilkan
            pada halaman publik.
        </p>

    </div>


    <form
        action="/superadmin/profil-website/update"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-6"
    >

        <!-- ================================================= -->
        <!-- INFORMASI PROFIL -->
        <!-- ================================================= -->

        <section
            class="rounded-2xl bg-white p-6 shadow-sm
                   ring-1 ring-slate-200"
        >

            <div class="mb-6">

                <h2 class="text-lg font-bold text-green-800">
                    Informasi Profil
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Informasi utama yang ditampilkan pada halaman profil
                    Kelurahan Riko.
                </p>

            </div>


            <!-- Judul -->

            <div class="mb-5">

                <label
                    for="judul"
                    class="mb-2 block text-sm font-semibold text-slate-700"
                >
                    Judul
                </label>

                <input
                    type="text"
                    id="judul"
                    name="judul"
                    value="<?= e($profil['judul'] ?? '') ?>"
                    required
                    class="w-full rounded-xl border border-slate-300
                           px-4 py-3 text-sm outline-none
                           transition
                           focus:border-green-700
                           focus:ring-2 focus:ring-green-100"
                >

            </div>


            <!-- Isi -->

            <div>

                <label
                    for="isi"
                    class="mb-2 block text-sm font-semibold text-slate-700"
                >
                    Isi Profil
                </label>

                <textarea
                    id="isi"
                    name="isi"
                    rows="14"
                    required
                    class="w-full rounded-xl border border-slate-300
                           px-4 py-3 text-sm leading-7 outline-none
                           transition
                           focus:border-green-700
                           focus:ring-2 focus:ring-green-100"
                ><?= e($profil['isi'] ?? '') ?></textarea>

                <p class="mt-2 text-xs text-slate-400">
                    Gunakan paragraf dengan baris kosong agar lebih mudah
                    dibaca pada halaman publik.
                </p>

            </div>

        </section>


        <!-- ================================================= -->
        <!-- GAMBAR -->
        <!-- ================================================= -->

        <section
            class="rounded-2xl bg-white p-6 shadow-sm
                   ring-1 ring-slate-200"
        >

            <div class="mb-6">

                <h2 class="text-lg font-bold text-green-800">
                    Gambar Profil
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Ganti gambar utama yang digunakan pada halaman profil.
                </p>

            </div>


            <?php if (!empty($profil['gambar'])): ?>

                <div
                    class="mb-5 overflow-hidden rounded-2xl
                           border border-slate-200
                           bg-slate-50"
                >

                    <img
                        src="/<?= e(ltrim($profil['gambar'], '/')) ?>"
                        alt="<?= e($profil['judul'] ?? 'Profil Kelurahan Riko') ?>"
                        class="h-72 w-full object-cover"
                    >

                </div>

            <?php else: ?>

                <div
                    class="mb-5 flex h-56 items-center
                           justify-center rounded-2xl
                           border border-dashed border-slate-300
                           bg-slate-50 text-slate-400"
                >

                    <div class="text-center">

                        <i class="fa-solid fa-image text-4xl"></i>

                        <p class="mt-2 text-sm">
                            Belum ada gambar
                        </p>

                    </div>

                </div>

            <?php endif; ?>


            <input
                type="file"
                id="gambar"
                name="gambar"
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
                JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
            </p>

        </section>


        <!-- VIDEO -->

        <section
            class="rounded-2xl bg-white p-6 shadow-sm
                ring-1 ring-slate-200"
        >

            <div class="mb-6">

                <h2 class="text-lg font-bold text-green-800">
                    Video Profil
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Gunakan salah satu: masukkan URL YouTube atau upload video MP4.
                    Jika keduanya diisi, URL YouTube akan digunakan.
                </p>

            </div>


            <!-- YouTube -->

            <div class="mb-6">

                <label
                    for="video_url"
                    class="mb-2 block text-sm font-semibold text-slate-700"
                >
                    URL YouTube
                </label>

                <input
                    type="url"
                    id="video_url"
                    name="video_url"
                    value="<?= e($profil['video_url'] ?? '') ?>"
                    placeholder="https://www.youtube.com/watch?v=..."
                    class="w-full rounded-xl border border-slate-300
                        px-4 py-3 text-sm outline-none
                        transition
                        focus:border-green-700
                        focus:ring-2 focus:ring-green-100"
                >

            </div>


            <!-- MP4 -->

            <div>

                <label
                    for="video_file"
                    class="mb-2 block text-sm font-semibold text-slate-700"
                >
                    Upload Video MP4
                </label>

                <?php if (!empty($profil['video_file'])): ?>

                    <div
                        class="mb-4 rounded-xl
                            border border-slate-200
                            bg-slate-50 p-4"
                    >

                        <p class="text-xs font-semibold text-slate-500">
                            Video saat ini:
                        </p>

                        <video
                            controls
                            class="mt-3 max-h-72 w-full rounded-xl"
                        >
                            <source
                                src="/<?= e(ltrim($profil['video_file'], '/')) ?>"
                                type="video/mp4"
                            >

                            Browser Anda tidak mendukung video.
                        </video>

                    </div>

                <?php endif; ?>


                <input
                    type="file"
                    id="video_file"
                    name="video_file"
                    accept="video/mp4,.mp4"
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
                    Format MP4. Maksimal 50 MB.
                </p>

            </div>

        </section>

        <!-- ================================================= -->
        <!-- SAVE -->
        <!-- ================================================= -->

        <div class="sticky bottom-4 flex justify-end">

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

                Simpan Perubahan

            </button>

        </div>

    </form>

</div>