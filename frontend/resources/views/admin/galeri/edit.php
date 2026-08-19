<?php
$album = $album ?? [];
?>

<div class="max-w-4xl">

    <!-- HEADER -->

    <div class="mb-8">

        <div class="mb-3">

            <a
                href="/superadmin/galeri"
                class="text-sm font-medium text-green-800
                       hover:text-green-700"
            >

                <i class="fa-solid fa-arrow-left mr-2"></i>

                Kembali ke Galeri

            </a>

        </div>

        <h1 class="text-2xl font-bold text-slate-800">
            Edit Album
        </h1>

        <p class="mt-2 text-sm text-slate-500">
            Perbarui informasi album galeri.
        </p>

    </div>


    <form
        action="/superadmin/galeri/update/<?= (int) $album['id'] ?>"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-6"
    >

        <section
            class="rounded-2xl bg-white p-6
                   shadow-sm ring-1 ring-slate-200"
        >

            <div class="space-y-5">

                <!-- NAMA -->

                <div>

                    <label
                        for="nama"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Nama Album
                    </label>

                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        required
                        value="<?= e($album['nama'] ?? '') ?>"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    >

                </div>


                <!-- SLUG -->

                <div>

                    <label
                        for="slug"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Slug
                    </label>

                    <input
                        type="text"
                        id="slug"
                        name="slug"
                        value="<?= e($album['slug'] ?? '') ?>"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    >

                </div>


                <!-- DESKRIPSI -->

                <div>

                    <label
                        for="deskripsi"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Deskripsi
                    </label>

                    <textarea
                        id="deskripsi"
                        name="deskripsi"
                        rows="5"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm leading-7 outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    ><?= e($album['deskripsi'] ?? '') ?></textarea>

                </div>


                <!-- CURRENT COVER -->

                <?php if (!empty($album['cover'])): ?>

                    <div>

                        <p class="mb-2 text-sm font-semibold text-slate-700">
                            Cover Saat Ini
                        </p>

                        <img
                            src="/<?= e(ltrim($album['cover'], '/')) ?>"
                            alt="<?= e($album['nama']) ?>"
                            class="h-48 w-full rounded-xl
                                   object-cover sm:w-80"
                        >

                    </div>

                <?php endif; ?>


                <!-- NEW COVER -->

                <div>

                    <label
                        for="cover"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Ganti Cover
                    </label>

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
                        Kosongkan jika tidak ingin mengganti cover.
                    </p>

                </div>

            </div>

        </section>


        <div class="flex justify-end gap-3">

            <a
                href="/superadmin/galeri"
                class="rounded-xl bg-slate-100
                       px-6 py-3 text-sm font-semibold
                       text-slate-700 hover:bg-slate-200"
            >
                Batal
            </a>

            <button
                type="submit"
                class="rounded-xl bg-green-900
                       px-7 py-3 text-sm font-semibold
                       text-white hover:bg-green-800"
            >

                <i class="fa-solid fa-floppy-disk mr-2"></i>

                Simpan Perubahan

            </button>

        </div>

    </form>

</div>