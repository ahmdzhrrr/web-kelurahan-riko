<div class="max-w-5xl">

    <div class="mb-8">

        <a
            href="/superadmin/pelayanan"
            class="text-sm text-green-700 hover:text-green-900"
        >
            ← Kembali ke Pelayanan
        </a>

        <h1 class="mt-4 text-2xl font-bold text-slate-800">
            Edit Pelayanan
        </h1>

        <p class="mt-2 text-sm text-slate-500">
            <?= e($pelayanan['nama']) ?>
        </p>

    </div>


    <!-- ================================================= -->
    <!-- INFORMASI PELAYANAN -->
    <!-- ================================================= -->

    <form
        action="/superadmin/pelayanan/update/<?= (int) $pelayanan['id'] ?>"
        method="POST"
        class="mb-6"
    >

        <section
            class="rounded-2xl bg-white p-6 shadow-sm
                   ring-1 ring-slate-200"
        >

            <div class="space-y-5">

                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Nama Pelayanan
                    </label>

                    <input
                        type="text"
                        name="nama"
                        value="<?= e($pelayanan['nama']) ?>"
                        required
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    >

                </div>


                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Slug
                    </label>

                    <input
                        type="text"
                        name="slug"
                        value="<?= e($pelayanan['slug']) ?>"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    >

                </div>


                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Deskripsi
                    </label>

                    <textarea
                        name="deskripsi"
                        rows="8"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm leading-7 outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    ><?= e($pelayanan['deskripsi'] ?? '') ?></textarea>

                </div>


                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Jam Pelayanan
                    </label>

                    <textarea
                        name="jam_pelayanan"
                        rows="4"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm leading-7 outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    ><?= e($pelayanan['jam_pelayanan'] ?? '') ?></textarea>

                </div>


                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Link Google Form
                    </label>

                    <input
                        type="url"
                        name="link"
                        value="<?= e($pelayanan['link'] ?? '') ?>"
                        placeholder="https://forms.google.com/..."
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    >

                    <?php if (!empty($pelayanan['link'])): ?>

                        <a
                            href="<?= e($pelayanan['link']) ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="mt-2 inline-flex items-center gap-2
                                   text-sm text-green-700
                                   hover:text-green-900"
                        >
                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            Buka Google Form
                        </a>

                    <?php endif; ?>

                </div>


                <div>

                    <label
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Icon
                    </label>

                    <input
                        type="text"
                        name="icon"
                        value="<?= e($pelayanan['icon'] ?? '') ?>"
                        placeholder="fa-solid fa-file-lines"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    >

                </div>

            </div>


            <div class="mt-6 flex justify-end">

                <button
                    type="submit"
                    class="rounded-xl bg-green-900
                           px-6 py-3
                           text-sm font-semibold text-white
                           hover:bg-green-800"
                >
                    <i class="fa-solid fa-floppy-disk mr-2"></i>
                    Simpan Pelayanan
                </button>

            </div>

        </section>

    </form>


    <!-- ================================================= -->
    <!-- PERSYARATAN -->
    <!-- ================================================= -->

    <section
        class="rounded-2xl bg-white p-6 shadow-sm
               ring-1 ring-slate-200"
    >

        <div class="mb-6">

            <h2 class="text-lg font-bold text-green-800">
                Persyaratan
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Kelola persyaratan untuk pelayanan ini.
            </p>

        </div>


        <!-- Tambah persyaratan -->

        <form
            action="/superadmin/pelayanan/<?= (int) $pelayanan['id'] ?>/persyaratan/store"
            method="POST"
            class="mb-8 rounded-xl bg-slate-50 p-5"
        >

            <div class="grid gap-4 md:grid-cols-[1fr_120px_auto]">

                <input
                    type="text"
                    name="persyaratan"
                    placeholder="Contoh: Fotokopi KTP"
                    required
                    class="rounded-xl border border-slate-300
                           bg-white px-4 py-3 text-sm outline-none
                           focus:border-green-700
                           focus:ring-2 focus:ring-green-100"
                >

                <input
                    type="number"
                    name="urutan"
                    value="1"
                    min="1"
                    class="rounded-xl border border-slate-300
                           bg-white px-4 py-3 text-sm outline-none
                           focus:border-green-700
                           focus:ring-2 focus:ring-green-100"
                >

                <button
                    type="submit"
                    class="rounded-xl bg-green-900
                           px-5 py-3 text-sm
                           font-semibold text-white
                           hover:bg-green-800"
                >
                    <i class="fa-solid fa-plus mr-1"></i>
                    Tambah
                </button>

            </div>

        </form>


        <!-- Daftar persyaratan -->

        <?php if (!empty($persyaratan)): ?>

            <div class="space-y-4">

                <?php foreach ($persyaratan as $index => $item): ?>

                    <div
                        class="rounded-xl border border-slate-200
                               bg-white p-4"
                    >

                        <form
                            action="/superadmin/persyaratan/<?= (int) $item['id'] ?>/update"
                            method="POST"
                            class="flex flex-col gap-4 lg:flex-row
                                   lg:items-center"
                        >

                            <div
                                class="flex h-8 w-8 shrink-0
                                       items-center justify-center
                                       rounded-full bg-green-100
                                       text-sm font-bold text-green-800"
                            >
                                <?= $index + 1 ?>
                            </div>


                            <div class="flex-1">

                                <input
                                    type="text"
                                    name="persyaratan"
                                    value="<?= e($item['persyaratan']) ?>"
                                    required
                                    class="w-full rounded-xl
                                           border border-slate-300
                                           px-4 py-3 text-sm outline-none
                                           focus:border-green-700
                                           focus:ring-2
                                           focus:ring-green-100"
                                >

                            </div>


                            <div>

                                <input
                                    type="number"
                                    name="urutan"
                                    value="<?= (int) $item['urutan'] ?>"
                                    min="1"
                                    class="w-24 rounded-xl
                                           border border-slate-300
                                           px-4 py-3 text-sm outline-none
                                           focus:border-green-700
                                           focus:ring-2
                                           focus:ring-green-100"
                                >

                            </div>


                            <button
                                type="submit"
                                class="rounded-xl bg-blue-50
                                       px-4 py-3
                                       text-blue-700
                                       hover:bg-blue-100"
                                title="Simpan"
                            >
                                <i class="fa-solid fa-floppy-disk"></i>
                            </button>

                        </form>


                        <div class="mt-3 flex justify-end">

                            <form
                                action="/superadmin/persyaratan/<?= (int) $item['id'] ?>/delete"
                                method="POST"
                                onsubmit="return confirm('Hapus persyaratan ini?');"
                            >

                                <button
                                    type="submit"
                                    class="text-sm text-red-600
                                           hover:text-red-800"
                                >
                                    <i class="fa-solid fa-trash mr-1"></i>
                                    Hapus
                                </button>

                            </form>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php else: ?>

            <div
                class="rounded-xl border border-dashed
                       border-slate-300 bg-slate-50
                       p-10 text-center"
            >

                <i
                    class="fa-solid fa-list-check
                           text-4xl text-slate-300"
                ></i>

                <p class="mt-3 text-sm text-slate-500">
                    Belum ada persyaratan.
                </p>

            </div>

        <?php endif; ?>

    </section>

</div>