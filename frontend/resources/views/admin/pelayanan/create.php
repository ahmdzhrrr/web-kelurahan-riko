<div class="max-w-4xl">

    <div class="mb-8">

        <a
            href="/superadmin/pelayanan"
            class="text-sm text-green-700 hover:text-green-900"
        >
            ← Kembali ke Pelayanan
        </a>

        <h1 class="mt-4 text-2xl font-bold text-slate-800">
            Tambah Pelayanan
        </h1>

    </div>


    <form
        action="/superadmin/pelayanan/store"
        method="POST"
        class="space-y-6"
    >

        <section
            class="rounded-2xl bg-white p-6 shadow-sm
                   ring-1 ring-slate-200"
        >

            <div class="space-y-5">

                <div>

                    <label
                        for="nama"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Nama Pelayanan
                    </label>

                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        required
                        placeholder="Contoh: Surat Keterangan Usaha"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    >

                </div>


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
                        placeholder="Kosongkan untuk dibuat otomatis"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    >

                </div>


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
                        rows="7"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm leading-7 outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    ></textarea>

                </div>


                <div>

                    <label
                        for="jam_pelayanan"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Jam Pelayanan
                    </label>

                    <textarea
                        id="jam_pelayanan"
                        name="jam_pelayanan"
                        rows="4"
                        placeholder="Senin - Jumat: 08.00 - 16.00"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm leading-7 outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    ></textarea>

                </div>


                <div>

                    <label
                        for="link"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Link Google Form
                    </label>

                    <input
                        type="url"
                        id="link"
                        name="link"
                        placeholder="https://forms.google.com/..."
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    >

                    <p class="mt-2 text-xs text-slate-400">
                        Digunakan sebagai tombol pengajuan layanan online.
                    </p>

                </div>


                <div>

                    <label
                        for="icon"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Icon Font Awesome
                    </label>

                    <input
                        type="text"
                        id="icon"
                        name="icon"
                        placeholder="fa-solid fa-file-lines"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    >

                </div>

            </div>

        </section>


        <div class="flex justify-end gap-3">

            <a
                href="/superadmin/pelayanan"
                class="rounded-xl border border-slate-300
                       px-5 py-3 text-sm font-semibold
                       text-slate-600 hover:bg-slate-50"
            >
                Batal
            </a>

            <button
                type="submit"
                class="rounded-xl bg-green-900
                       px-6 py-3
                       text-sm font-semibold text-white
                       hover:bg-green-800"
            >
                <i class="fa-solid fa-floppy-disk mr-2"></i>
                Simpan
            </button>

        </div>

    </form>

</div>