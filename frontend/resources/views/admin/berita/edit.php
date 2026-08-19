<?php

$berita = $berita ?? [];

$kategori = $kategori ?? [];

?>

<div class="max-w-6xl">

    <!-- HEADER -->

    <div class="mb-8">

        <div class="flex items-center gap-3">

            <a
                href="/superadmin/berita"
                class="flex h-9 w-9
                       items-center justify-center
                       rounded-lg
                       text-slate-500
                       hover:bg-slate-200"
            >

                <i class="fa-solid fa-arrow-left"></i>

            </a>

            <div>

                <h1 class="text-2xl font-bold text-slate-800">
                    Edit Berita
                </h1>

                <p class="mt-1 text-sm text-slate-500">
                    Perbarui informasi berita.
                </p>

            </div>

        </div>

    </div>


    <form
        action="/superadmin/berita/update/<?= (int) $berita['id'] ?>"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-6"
    >


        <!-- ================================================= -->
        <!-- INFORMASI -->
        <!-- ================================================= -->

        <section
            class="rounded-2xl bg-white p-6
                   shadow-sm ring-1 ring-slate-200"
        >

            <div class="mb-6">

                <h2 class="text-lg font-bold text-green-800">
                    Informasi Berita
                </h2>

            </div>


            <div class="space-y-5">


                <!-- JUDUL -->

                <div>

                    <label
                        for="judul"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Judul Berita
                    </label>

                    <input
                        type="text"
                        id="judul"
                        name="judul"
                        required
                        value="<?= e($berita['judul'] ?? '') ?>"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3 text-sm
                               outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    >

                </div>


                <!-- KATEGORI -->

                <div>

                    <label
                        for="kategori_id"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Kategori
                    </label>

                    <select
                        id="kategori_id"
                        name="kategori_id"
                        required
                        class="w-full rounded-xl
                               border border-slate-300
                               bg-white
                               px-4 py-3 text-sm
                               outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    >

                        <option value="">
                            -- Pilih Kategori --
                        </option>

                        <?php foreach ($kategori as $item): ?>

                            <option
                                value="<?= (int) $item['id'] ?>"
                                <?= (int) $item['id']
                                    === (int) ($berita['kategori_id'] ?? 0)
                                    ? 'selected'
                                    : '' ?>
                            >

                                <?= e($item['nama']) ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>


                <!-- EXCERPT -->

                <div>

                    <label
                        for="excerpt"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Ringkasan
                    </label>

                    <textarea
                        id="excerpt"
                        name="excerpt"
                        rows="4"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3 text-sm leading-6
                               outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    ><?= e($berita['excerpt'] ?? '') ?></textarea>

                </div>


                <!-- ISI -->

                <div>

                    <label
                        for="isi"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Isi Berita
                    </label>

                    <textarea
                        id="isi"
                        name="isi"
                        rows="15"
                        required
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3 text-sm leading-7
                               outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    ><?= e($berita['isi'] ?? '') ?></textarea>

                </div>


            </div>

        </section>


        <!-- ================================================= -->
        <!-- THUMBNAIL -->
        <!-- ================================================= -->

        <section
            class="rounded-2xl bg-white p-6
                   shadow-sm ring-1 ring-slate-200"
        >

            <div class="mb-6">

                <h2 class="text-lg font-bold text-green-800">
                    Thumbnail
                </h2>

            </div>


            <?php if (!empty($berita['thumbnail'])): ?>

                <div class="mb-5">

                    <p class="mb-2 text-sm font-semibold text-slate-700">
                        Thumbnail Saat Ini
                    </p>

                    <img
                        src="/<?= e(
                            ltrim(
                                $berita['thumbnail'],
                                '/'
                            )
                        ) ?>"
                        alt="<?= e(
                            $berita['thumbnail_alt']
                            ?? $berita['judul']
                        ) ?>"
                        class="h-48 w-80
                               rounded-xl
                               object-cover"
                    >

                </div>

            <?php endif; ?>


            <div class="space-y-5">


                <div>

                    <label
                        for="thumbnail"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Ganti Thumbnail
                    </label>

                    <input
                        type="file"
                        id="thumbnail"
                        name="thumbnail"
                        accept="image/jpeg,image/png,image/webp"
                        class="block w-full rounded-xl
                               border border-slate-300
                               bg-white px-4 py-3 text-sm"
                    >

                    <p class="mt-2 text-xs text-slate-400">
                        Kosongkan jika tidak ingin mengganti gambar.
                    </p>

                </div>


                <div>

                    <label
                        for="thumbnail_alt"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Alt Thumbnail
                    </label>

                    <input
                        type="text"
                        id="thumbnail_alt"
                        name="thumbnail_alt"
                        value="<?= e(
                            $berita['thumbnail_alt'] ?? ''
                        ) ?>"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3 text-sm
                               outline-none
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
            class="rounded-2xl bg-white p-6
                   shadow-sm ring-1 ring-slate-200"
        >

            <div class="mb-6">

                <h2 class="text-lg font-bold text-green-800">
                    SEO
                </h2>

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
                        value="<?= e(
                            $berita['meta_title'] ?? ''
                        ) ?>"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3 text-sm
                               outline-none
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
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3 text-sm leading-6
                               outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    ><?= e(
                        $berita['meta_description'] ?? ''
                    ) ?></textarea>

                </div>


            </div>

        </section>


        <!-- ================================================= -->
        <!-- STATUS -->
        <!-- ================================================= -->

        <section
            class="rounded-2xl bg-white p-6
                   shadow-sm ring-1 ring-slate-200"
        >

            <div class="mb-6">

                <h2 class="text-lg font-bold text-green-800">
                    Publikasi
                </h2>

            </div>


            <div class="space-y-5">


                <div>

                    <label
                        for="status"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Status
                    </label>

                    <select
                        id="status"
                        name="status"
                        class="w-full rounded-xl
                               border border-slate-300
                               bg-white px-4 py-3 text-sm
                               outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    >

                        <option
                            value="draft"
                            <?= ($berita['status'] ?? '')
                                === 'draft'
                                ? 'selected'
                                : '' ?>
                        >
                            Draft
                        </option>

                        <option
                            value="published"
                            <?= ($berita['status'] ?? '')
                                === 'published'
                                ? 'selected'
                                : '' ?>
                        >
                            Published
                        </option>

                    </select>

                </div>


                <label class="flex items-center gap-3">

                    <input
                        type="checkbox"
                        name="is_featured"
                        value="1"
                        <?= !empty($berita['is_featured'])
                            ? 'checked'
                            : '' ?>
                        class="h-4 w-4 rounded border-slate-300
                               text-green-800
                               focus:ring-green-700"
                    >

                    <span class="text-sm font-medium text-slate-700">
                        Jadikan berita unggulan
                    </span>

                </label>


            </div>

        </section>


        <!-- BUTTON -->

        <div class="sticky bottom-4 flex justify-end gap-3">

            <a
                href="/superadmin/berita"
                class="rounded-xl bg-white
                       px-6 py-3
                       text-sm font-semibold
                       text-slate-600
                       shadow-lg
                       ring-1 ring-slate-200
                       hover:bg-slate-50"
            >
                Batal
            </a>


            <button
                type="submit"
                class="rounded-xl
                       bg-green-900
                       px-7 py-3
                       text-sm font-semibold
                       text-white
                       shadow-lg
                       hover:bg-green-800"
            >

                <i class="fa-solid fa-floppy-disk mr-2"></i>

                Simpan Perubahan

            </button>

        </div>


    </form>

</div>