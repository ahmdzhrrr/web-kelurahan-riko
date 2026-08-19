<div class="max-w-7xl">

    <div class="mb-8 flex items-center justify-between">

        <div>

            <h1 class="text-2xl font-bold text-slate-800">
                Foto Fasilitas
            </h1>

            <p class="mt-2 text-sm text-slate-500">
                <?= e($fasilitas['nama']) ?>
            </p>

        </div>


        <a
            href="/superadmin/fasilitas"
            class="rounded-xl border border-slate-300
                   px-5 py-3 text-sm font-semibold
                   text-slate-600 hover:bg-slate-50"
        >
            <i class="fa-solid fa-arrow-left mr-2"></i>
            Kembali
        </a>

    </div>


    <!-- UPLOAD -->

    <section
        class="mb-8 rounded-2xl bg-white p-6
               shadow-sm ring-1 ring-slate-200"
    >

        <h2 class="mb-1 text-lg font-bold text-green-800">
            Tambah Foto
        </h2>

        <p class="mb-5 text-sm text-slate-500">
            Upload foto fasilitas. Maksimal 5 MB.
        </p>


        <form
            action="/superadmin/fasilitas/<?= (int) $fasilitas['id'] ?>/photos/upload"
            method="POST"
            enctype="multipart/form-data"
        >

            <div class="flex flex-col gap-4 sm:flex-row sm:items-center">

                <input
                    type="file"
                    id="foto_1"
                    name="foto_1"
                    accept=".jpg,.jpeg,.png,.webp"
                    class="block w-full overflow-hidden rounded-xl border border-slate-300
                        bg-white text-sm text-slate-600
                        file:mr-4 file:border-0
                        file:bg-green-900 file:px-4 file:py-2.5
                        file:text-sm file:font-semibold file:text-white
                        hover:file:bg-green-800"
                >

                <button
                    type="submit"
                    class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl bg-green-900
                        px-6 py-2.5 text-sm font-semibold text-white transition-colors
                        hover:bg-green-800"
                >
                    <i class="fa-solid fa-upload"></i>
                    Upload
                </button>

            </div>

        </form>

    </section>


    <!-- FOTO -->

    <section
        class="rounded-2xl bg-white p-6
               shadow-sm ring-1 ring-slate-200"
    >

        <h2 class="mb-6 text-lg font-bold text-green-800">
            Galeri Foto
        </h2>


        <?php if (empty($foto)): ?>

            <div class="py-12 text-center text-slate-500">

                <i
                    class="fa-regular fa-image mb-3 text-4xl
                           text-slate-300"
                ></i>

                <p>
                    Belum ada foto.
                </p>

            </div>

        <?php else: ?>

            <div
                class="grid gap-6
                       sm:grid-cols-2
                       lg:grid-cols-3
                       xl:grid-cols-4"
            >

                <?php foreach ($foto as $item): ?>

                    <div
                        class="overflow-hidden rounded-2xl
                               border border-slate-200"
                    >

                        <img
                            src="/<?= e(ltrim($item['gambar'], '/')) ?>"
                            alt="<?= e($fasilitas['nama']) ?>"
                            class="h-52 w-full object-cover"
                        >


                        <div class="p-3">

                            <form
                                action="/superadmin/fasilitas/photos/delete/<?= (int) $item['id'] ?>"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus foto ini?')"
                            >

                                <button
                                    type="submit"
                                    class="w-full rounded-lg
                                           bg-red-50 px-3 py-2
                                           text-xs font-semibold
                                           text-red-700
                                           hover:bg-red-100"
                                >
                                    <i class="fa-solid fa-trash mr-1"></i>
                                    Hapus Foto
                                </button>

                            </form>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </section>

</div>