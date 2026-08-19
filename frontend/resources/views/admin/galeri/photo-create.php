<?php
$album = $album ?? [];
?>

<div class="max-w-4xl">

    <div class="mb-8">

        <div class="mb-3">

            <a
                href="/superadmin/galeri/<?= (int) $album['id'] ?>/foto"
                class="text-sm font-medium text-green-800
                       hover:text-green-700"
            >

                <i class="fa-solid fa-arrow-left mr-2"></i>

                Kembali ke Foto

            </a>

        </div>

        <h1 class="text-2xl font-bold text-slate-800">
            Tambah Foto
        </h1>

        <p class="mt-2 text-sm text-slate-500">

            Tambahkan foto ke album
            <strong><?= e($album['nama']) ?></strong>.

        </p>

    </div>


    <form
        action="/superadmin/galeri/<?= (int) $album['id'] ?>/foto/store"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-6"
    >

        <section
            class="rounded-2xl bg-white p-6
                   shadow-sm ring-1 ring-slate-200"
        >

            <div class="space-y-5">

                <!-- JUDUL -->

                <div>

                    <label
                        for="judul"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Judul Foto
                    </label>

                    <input
                        type="text"
                        id="judul"
                        name="judul"
                        placeholder="Judul foto"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    >

                </div>


                <!-- CAPTION -->

                <div>

                    <label
                        for="caption"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Caption
                    </label>

                    <textarea
                        id="caption"
                        name="caption"
                        rows="4"
                        placeholder="Keterangan foto..."
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm leading-7 outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    ></textarea>

                </div>


                <!-- GAMBAR -->

                <div>

                    <label
                        for="gambar"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Foto
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


        <div class="flex justify-end gap-3">

            <a
                href="/superadmin/galeri/<?= (int) $album['id'] ?>/foto"
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

                <i class="fa-solid fa-upload mr-2"></i>

                Upload Foto

            </button>

        </div>

    </form>

</div>