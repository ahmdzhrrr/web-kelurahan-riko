<?php

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
                    Tambah Berita
                </h1>

                <p class="mt-1 text-sm text-slate-500">
                    Buat berita baru untuk website Kelurahan Riko.
                </p>

            </div>

        </div>

    </div>


    <form
        action="/superadmin/berita/store"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-6"
    >


        <!-- ================================================= -->
        <!-- INFORMASI UTAMA -->
        <!-- ================================================= -->

        <section
            class="rounded-2xl
                   bg-white
                   p-6
                   shadow-sm
                   ring-1 ring-slate-200"
        >

            <div class="mb-6">

                <h2 class="text-lg font-bold text-green-800">
                    Informasi Berita
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Masukkan informasi utama berita.
                </p>

            </div>


            <div class="space-y-5">


                <!-- JUDUL -->

                <div>

                    <label
                        for="judul"
                        class="mb-2 block
                               text-sm font-semibold
                               text-slate-700"
                    >
                        Judul Berita
                    </label>

                    <input
                        type="text"
                        id="judul"
                        name="judul"
                        required
                        placeholder="Masukkan judul berita"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3
                               text-sm
                               outline-none
                               focus:border-green-700
                               focus:ring-2
                               focus:ring-green-100"
                    >

                </div>


                <!-- KATEGORI -->

                <div>

                    <label
                        for="kategori_id"
                        class="mb-2 block
                               text-sm font-semibold
                               text-slate-700"
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
                               px-4 py-3
                               text-sm
                               outline-none
                               focus:border-green-700
                               focus:ring-2
                               focus:ring-green-100"
                    >

                        <option value="">
                            -- Pilih Kategori --
                        </option>

                        <?php foreach ($kategori as $item): ?>

                            <option
                                value="<?= (int) $item['id'] ?>"
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
                        class="mb-2 block
                               text-sm font-semibold
                               text-slate-700"
                    >
                        Ringkasan
                    </label>

                    <textarea
                        id="excerpt"
                        name="excerpt"
                        rows="4"
                        placeholder="Ringkasan singkat berita..."
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3
                               text-sm
                               leading-6
                               outline-none
                               focus:border-green-700
                               focus:ring-2
                               focus:ring-green-100"
                    ></textarea>

                </div>


                <!-- ISI -->

                <div>

                    <label
                        for="isi"
                        class="mb-2 block
                               text-sm font-semibold
                               text-slate-700"
                    >
                        Isi Berita
                    </label>

                    <textarea
                        id="isi"
                        name="isi"
                        rows="15"
                        required
                        placeholder="Tulis isi berita..."
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3
                               text-sm
                               leading-7
                               outline-none
                               focus:border-green-700
                               focus:ring-2
                               focus:ring-green-100"
                    ></textarea>

                </div>


            </div>

        </section>


        <!-- ================================================= -->
        <!-- THUMBNAIL -->
        <!-- ================================================= -->

        <section
            class="rounded-2xl
                   bg-white
                   p-6
                   shadow-sm
                   ring-1 ring-slate-200"
        >

            <div class="mb-6">

                <h2 class="text-lg font-bold text-green-800">
                    Thumbnail
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Gambar utama yang ditampilkan pada berita.
                </p>

            </div>


            <div class="space-y-5">


                <div>

                    <label
                        for="thumbnail"
                        class="mb-2 block
                               text-sm font-semibold
                               text-slate-700"
                    >
                        Gambar
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
                        JPG, PNG, atau WEBP. Maksimal 5 MB.
                    </p>

                </div>


                <div>

                    <label
                        for="thumbnail_alt"
                        class="mb-2 block
                               text-sm font-semibold
                               text-slate-700"
                    >
                        Alt Thumbnail
                    </label>

                    <input
                        type="text"
                        id="thumbnail_alt"
                        name="thumbnail_alt"
                        placeholder="Deskripsi gambar"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3
                               text-sm
                               outline-none
                               focus:border-green-700
                               focus:ring-2
                               focus:ring-green-100"
                    >

                </div>


            </div>

        </section>


        <!-- ================================================= -->
        <!-- SEO -->
        <!-- ================================================= -->

        <section
            class="rounded-2xl
                   bg-white
                   p-6
                   shadow-sm
                   ring-1 ring-slate-200"
        >

            <div class="mb-6">

                <h2 class="text-lg font-bold text-green-800">
                    SEO
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Informasi SEO untuk mesin pencari.
                </p>

            </div>


            <div class="space-y-5">


                <div>

                    <label
                        for="meta_title"
                        class="mb-2 block
                               text-sm font-semibold
                               text-slate-700"
                    >
                        Meta Title
                    </label>

                    <input
                        type="text"
                        id="meta_title"
                        name="meta_title"
                        placeholder="Judul SEO"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3
                               text-sm
                               outline-none
                               focus:border-green-700
                               focus:ring-2
                               focus:ring-green-100"
                    >

                </div>


                <div>

                    <label
                        for="meta_description"
                        class="mb-2 block
                               text-sm font-semibold
                               text-slate-700"
                    >
                        Meta Description
                    </label>

                    <textarea
                        id="meta_description"
                        name="meta_description"
                        rows="4"
                        placeholder="Deskripsi singkat untuk mesin pencari..."
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3
                               text-sm
                               leading-6
                               outline-none
                               focus:border-green-700
                               focus:ring-2
                               focus:ring-green-100"
                    ></textarea>

                </div>


            </div>

        </section>


        <!-- ================================================= -->
        <!-- STATUS -->
        <!-- ================================================= -->

        <section
            class="rounded-2xl
                   bg-white
                   p-6
                   shadow-sm
                   ring-1 ring-slate-200"
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
                        class="mb-2 block
                               text-sm font-semibold
                               text-slate-700"
                    >
                        Status
                    </label>

                    <select
                        id="status"
                        name="status"
                        class="w-full rounded-xl
                               border border-slate-300
                               bg-white
                               px-4 py-3
                               text-sm
                               outline-none
                               focus:border-green-700
                               focus:ring-2
                               focus:ring-green-100"
                    >

                        <option value="draft">
                            Draft
                        </option>

                        <option value="published">
                            Published
                        </option>

                    </select>

                </div>


                <label class="flex items-center gap-3">

                    <input
                        type="checkbox"
                        name="is_featured"
                        value="1"
                        class="h-4 w-4
                               rounded
                               border-slate-300
                               text-green-800
                               focus:ring-green-700"
                    >

                    <span class="text-sm font-medium text-slate-700">
                        Jadikan berita unggulan
                    </span>

                </label>


            </div>

        </section>


        <!-- ================================================= -->
        <!-- BUTTON -->
        <!-- ================================================= -->

        <div class="sticky bottom-4 flex justify-end gap-3">


            <a
                href="/superadmin/berita"
                class="rounded-xl
                       bg-white
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

                Simpan Berita

            </button>

        </div>


    </form>

</div>