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
            Tambah Album
        </h1>

        <p class="mt-2 text-sm leading-6 text-slate-500">
            Buat album baru untuk mengelompokkan foto galeri.
        </p>

    </div>


    <form
        action="/superadmin/galeri/store"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-6"
    >

        <!-- INFORMASI ALBUM -->

        <section
            class="rounded-2xl bg-white p-6
                   shadow-sm ring-1 ring-slate-200"
        >

            <div class="mb-6">

                <h2 class="text-lg font-bold text-green-800">
                    Informasi Album
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Masukkan informasi dasar album galeri.
                </p>

            </div>


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
                        placeholder="Contoh: Kegiatan Kelurahan"
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
                        placeholder="kegiatan-kelurahan"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    >

                    <p class="mt-2 text-xs text-slate-400">
                        Kosongkan jika ingin dibuat otomatis dari nama album.
                    </p>

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
                        placeholder="Deskripsi album..."
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm leading-7 outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    ></textarea>

                </div>


                <!-- COVER -->

                <div>

                    <label
                        for="cover"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Cover Album
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
                        Format JPG, JPEG, PNG, atau WEBP.
                    </p>

                </div>

            </div>

        </section>


        <!-- SAVE -->

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
                       text-white shadow-sm
                       hover:bg-green-800"
            >

                <i class="fa-solid fa-floppy-disk mr-2"></i>

                Simpan Album

            </button>

        </div>

    </form>

</div>