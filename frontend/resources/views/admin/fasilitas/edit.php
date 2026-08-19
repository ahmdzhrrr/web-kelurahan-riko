<div class="max-w-4xl">

    <div class="mb-8">

        <h1 class="text-2xl font-bold text-slate-800">
            Edit Fasilitas
        </h1>

        <p class="mt-2 text-sm text-slate-500">
            Perbarui informasi fasilitas.
        </p>

    </div>


    <form
        action="/superadmin/fasilitas/update/<?= (int) $fasilitas['id'] ?>"
        method="POST"
        class="space-y-6"
    >

        <section
            class="rounded-2xl bg-white p-6
                   shadow-sm ring-1 ring-slate-200"
        >

            <div class="space-y-5">

                <div>

                    <label
                        for="nama"
                        class="mb-2 block text-sm font-semibold
                               text-slate-700"
                    >
                        Nama Fasilitas
                    </label>

                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        required
                        value="<?= e($fasilitas['nama'] ?? '') ?>"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    >

                </div>


                <div>

                    <label
                        for="deskripsi"
                        class="mb-2 block text-sm font-semibold
                               text-slate-700"
                    >
                        Deskripsi
                    </label>

                    <textarea
                        id="deskripsi"
                        name="deskripsi"
                        rows="8"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm leading-7 outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    ><?= e($fasilitas['deskripsi'] ?? '') ?></textarea>

                </div>

            </div>

        </section>


        <div class="flex justify-end gap-3">

            <a
                href="/superadmin/fasilitas"
                class="rounded-xl border border-slate-300
                       px-5 py-3 text-sm font-semibold
                       text-slate-600 hover:bg-slate-50"
            >
                Batal
            </a>


            <button
                type="submit"
                class="rounded-xl bg-green-900
                       px-6 py-3 text-sm font-semibold
                       text-white hover:bg-green-800"
            >
                <i class="fa-solid fa-floppy-disk mr-2"></i>
                Simpan Perubahan
            </button>

        </div>

    </form>

</div>