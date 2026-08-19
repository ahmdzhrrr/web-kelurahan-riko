<div class="max-w-5xl">

    <!-- Header -->

    <div class="mb-8">

        <h1 class="text-2xl font-bold text-slate-800">
            Visi & Misi
        </h1>

        <p class="mt-2 text-sm leading-6 text-slate-500">
            Kelola visi dan misi Kelurahan Riko yang ditampilkan
            pada halaman publik.
        </p>

    </div>


    <!-- ================================================= -->
    <!-- VISI -->
    <!-- ================================================= -->

    <section
        class="mb-6 rounded-2xl bg-white p-6 shadow-sm
               ring-1 ring-slate-200"
    >

        <div class="mb-6">

            <h2 class="text-lg font-bold text-green-800">
                Visi
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Visi utama Kelurahan Riko.
            </p>

        </div>


        <form
            action="/superadmin/visi-misi/update"
            method="POST"
        >

            <label
                for="visi"
                class="mb-2 block text-sm font-semibold text-slate-700"
            >
                Isi Visi
            </label>

            <textarea
                id="visi"
                name="visi"
                rows="6"
                required
                class="w-full rounded-xl border border-slate-300
                       px-4 py-3 text-sm leading-7 outline-none
                       focus:border-green-700
                       focus:ring-2 focus:ring-green-100"
            ><?= e($visi['isi'] ?? '') ?></textarea>


            <div class="mt-5 flex justify-end">

                <button
                    type="submit"
                    class="rounded-xl bg-green-900
                           px-6 py-3
                           text-sm font-semibold text-white
                           transition hover:bg-green-800"
                >
                    <i class="fa-solid fa-floppy-disk mr-2"></i>
                    Simpan Visi
                </button>

            </div>

        </form>

    </section>


    <!-- ================================================= -->
    <!-- MISI -->
    <!-- ================================================= -->

    <section
        class="rounded-2xl bg-white p-6 shadow-sm
               ring-1 ring-slate-200"
    >

        <div class="mb-6">

            <h2 class="text-lg font-bold text-green-800">
                Misi
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Daftar misi Kelurahan Riko.
            </p>

        </div>


        <?php if (!empty($misi)): ?>

            <form
                action="/superadmin/visi-misi/update-misi"
                method="POST"
            >

                <div class="space-y-5">

                    <?php foreach ($misi as $index => $item): ?>

                        <div>

                            <div class="mb-2 flex items-center gap-3">

                                <span
                                    class="flex h-8 w-8 shrink-0
                                           items-center justify-center
                                           rounded-full bg-green-100
                                           text-sm font-bold text-green-800"
                                >
                                    <?= $index + 1 ?>
                                </span>

                                <span
                                    class="text-sm font-semibold text-slate-700"
                                >
                                    Misi <?= $index + 1 ?>
                                </span>

                            </div>


                            <textarea
                                name="misi[<?= (int) $item['id'] ?>]"
                                rows="4"
                                required
                                class="w-full rounded-xl
                                       border border-slate-300
                                       px-4 py-3 text-sm leading-7
                                       outline-none
                                       focus:border-green-700
                                       focus:ring-2
                                       focus:ring-green-100"
                            ><?= e($item['isi'] ?? '') ?></textarea>

                        </div>

                    <?php endforeach; ?>

                </div>


                <div class="mt-6 flex justify-end">

                    <button
                        type="submit"
                        class="rounded-xl bg-green-900
                               px-6 py-3
                               text-sm font-semibold text-white
                               transition hover:bg-green-800"
                    >
                        <i class="fa-solid fa-floppy-disk mr-2"></i>
                        Simpan Misi
                    </button>

                </div>

            </form>

        <?php else: ?>

            <div
                class="rounded-xl border border-dashed
                       border-slate-300 bg-slate-50
                       px-6 py-10 text-center"
            >

                <i
                    class="fa-solid fa-bullseye
                           text-4xl text-slate-300"
                ></i>

                <p class="mt-3 text-sm text-slate-500">
                    Belum ada data misi.
                </p>

            </div>

        <?php endif; ?>

    </section>

</div>