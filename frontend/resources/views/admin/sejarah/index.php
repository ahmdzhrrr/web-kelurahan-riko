<?php
$sejarah = $sejarah ?? [];
?>

<div class="max-w-6xl">

    <!-- Header -->

    <div class="mb-8">

        <h1 class="text-2xl font-bold text-slate-800">
            Sejarah Kelurahan
        </h1>

        <p class="mt-2 text-sm leading-6 text-slate-500">
            Kelola informasi sejarah dan dokumentasi Kelurahan Riko.
        </p>

    </div>


    <form
        action="/superadmin/sejarah/update"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-6"
    >

        <!-- ================================================= -->
        <!-- INFORMASI SEJARAH -->
        <!-- ================================================= -->

        <section
            class="rounded-2xl bg-white p-6 shadow-sm
                   ring-1 ring-slate-200"
        >

            <div class="mb-6">

                <h2 class="text-lg font-bold text-green-800">
                    Informasi Sejarah
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Tulis sejarah Kelurahan Riko secara lengkap.
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
                    value="<?= e($sejarah['judul'] ?? '') ?>"
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
                    Isi Sejarah
                </label>

                <textarea
                    id="isi"
                    name="isi"
                    rows="18"
                    required
                    class="w-full rounded-xl border border-slate-300
                           px-4 py-3 text-sm leading-7 outline-none
                           transition
                           focus:border-green-700
                           focus:ring-2 focus:ring-green-100"
                ><?= e($sejarah['isi'] ?? '') ?></textarea>

                <p class="mt-2 text-xs text-slate-400">
                    Gunakan baris kosong untuk memisahkan paragraf.
                </p>

            </div>

        </section>


        <!-- ================================================= -->
        <!-- FOTO -->
        <!-- ================================================= -->

        <section
            class="rounded-2xl bg-white p-6 shadow-sm
                   ring-1 ring-slate-200"
        >

            <div class="mb-6">

                <h2 class="text-lg font-bold text-green-800">
                    Dokumentasi Sejarah
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Kedua foto ini digunakan pada halaman sejarah publik.
                </p>

            </div>


            <div class="grid gap-8 lg:grid-cols-2">

                <!-- FOTO 1 -->

                <div>

                    <label
                        for="foto_1"
                        class="mb-3 block text-sm font-semibold text-slate-700"
                    >
                        Foto 1
                    </label>


                    <?php if (!empty($sejarah['foto_1'])): ?>

                        <div
                            class="mb-4 overflow-hidden rounded-2xl
                                   border border-slate-200
                                   bg-slate-50"
                        >

                            <img
                                src="/<?= e(ltrim($sejarah['foto_1'], '/')) ?>"
                                alt="Foto Sejarah 1"
                                class="h-64 w-full object-cover"
                            >

                        </div>

                    <?php else: ?>

                        <div
                            class="mb-4 flex h-64 items-center
                                   justify-center rounded-2xl
                                   border border-dashed
                                   border-slate-300
                                   bg-slate-50"
                        >

                            <div class="text-center text-slate-400">

                                <i class="fa-solid fa-image text-4xl"></i>

                                <p class="mt-2 text-sm">
                                    Belum ada Foto 1
                                </p>

                            </div>

                        </div>

                    <?php endif; ?>


                    <input
                        type="file"
                        id="foto_1"
                        name="foto_1"
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
                        JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                    </p>

                </div>


                <!-- FOTO 2 -->

                <div>

                    <label
                        for="foto_2"
                        class="mb-3 block text-sm font-semibold text-slate-700"
                    >
                        Foto 2
                    </label>


                    <?php if (!empty($sejarah['foto_2'])): ?>

                        <div
                            class="mb-4 overflow-hidden rounded-2xl
                                   border border-slate-200
                                   bg-slate-50"
                        >

                            <img
                                src="/<?= e(ltrim($sejarah['foto_2'], '/')) ?>"
                                alt="Foto Sejarah 2"
                                class="h-64 w-full object-cover"
                            >

                        </div>

                    <?php else: ?>

                        <div
                            class="mb-4 flex h-64 items-center
                                   justify-center rounded-2xl
                                   border border-dashed
                                   border-slate-300
                                   bg-slate-50"
                        >

                            <div class="text-center text-slate-400">

                                <i class="fa-solid fa-image text-4xl"></i>

                                <p class="mt-2 text-sm">
                                    Belum ada Foto 2
                                </p>

                            </div>

                        </div>

                    <?php endif; ?>


                    <input
                        type="file"
                        id="foto_2"
                        name="foto_2"
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
                        JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                    </p>

                </div>

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