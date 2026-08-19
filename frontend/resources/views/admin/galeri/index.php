<?php
$album = $album ?? [];
?>

<div class="max-w-7xl">

    <!-- HEADER -->

    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>

            <h1 class="text-2xl font-bold text-slate-800">
                Galeri
            </h1>

            <p class="mt-2 text-sm leading-6 text-slate-500">
                Kelola album dan foto galeri Kelurahan Riko.
            </p>

        </div>


        <a
            href="/superadmin/galeri/create"
            class="inline-flex items-center justify-center
                   rounded-xl bg-green-900
                   px-5 py-3
                   text-sm font-semibold text-white
                   shadow-sm transition
                   hover:bg-green-800"
        >

            <i class="fa-solid fa-plus mr-2"></i>

            Tambah Album

        </a>

    </div>


    <!-- ALBUM -->

    <?php if (empty($album)): ?>

        <div
            class="rounded-2xl bg-white p-10 text-center
                   shadow-sm ring-1 ring-slate-200"
        >

            <div
                class="mx-auto mb-4 flex h-16 w-16
                       items-center justify-center
                       rounded-full bg-green-50
                       text-green-800"
            >

                <i class="fa-solid fa-images text-2xl"></i>

            </div>

            <h2 class="text-lg font-bold text-slate-800">
                Belum ada album
            </h2>

            <p class="mt-2 text-sm text-slate-500">
                Silakan buat album pertama untuk mulai mengelola galeri.
            </p>

            <a
                href="/superadmin/galeri/create"
                class="mt-5 inline-flex items-center
                       rounded-xl bg-green-900
                       px-5 py-3
                       text-sm font-semibold text-white
                       hover:bg-green-800"
            >

                <i class="fa-solid fa-plus mr-2"></i>

                Tambah Album

            </a>

        </div>

    <?php else: ?>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

            <?php foreach ($album as $item): ?>

                <div
                    class="overflow-hidden rounded-2xl
                           bg-white shadow-sm
                           ring-1 ring-slate-200"
                >

                    <!-- COVER -->

                    <div class="relative h-48 bg-slate-100">

                        <?php if (!empty($item['cover'])): ?>

                            <img
                                src="/<?= e(ltrim($item['cover'], '/')) ?>"
                                alt="<?= e($item['nama']) ?>"
                                class="h-full w-full object-cover"
                            >

                        <?php else: ?>

                            <div
                                class="flex h-full items-center
                                       justify-center text-slate-300"
                            >

                                <i class="fa-solid fa-image text-5xl"></i>

                            </div>

                        <?php endif; ?>


                        <!-- JUMLAH FOTO -->

                        <div
                            class="absolute right-3 top-3
                                   rounded-full bg-black/60
                                   px-3 py-1.5
                                   text-xs font-semibold text-white"
                        >

                            <i class="fa-solid fa-images mr-1"></i>

                            <?= e($item['jumlah_foto'] ?? 0) ?> foto

                        </div>

                    </div>


                    <!-- CONTENT -->

                    <div class="p-5">

                        <h2 class="font-bold text-slate-800">

                            <?= e($item['nama']) ?>

                        </h2>


                        <?php if (!empty($item['deskripsi'])): ?>

                            <p
                                class="mt-2 line-clamp-2
                                       text-sm leading-6 text-slate-500"
                            >

                                <?= e($item['deskripsi']) ?>

                            </p>

                        <?php else: ?>

                            <p class="mt-2 text-sm text-slate-400">
                                Tidak ada deskripsi.
                            </p>

                        <?php endif; ?>


                        <!-- ACTION -->

                        <div
                            class="mt-5 flex flex-wrap gap-2"
                        >

                            <a
                                href="/superadmin/galeri/<?= (int) $item['id'] ?>/foto"
                                class="inline-flex flex-1
                                       items-center justify-center
                                       rounded-xl bg-green-900
                                       px-3 py-2.5
                                       text-xs font-semibold text-white
                                       hover:bg-green-800"
                            >

                                <i class="fa-solid fa-images mr-2"></i>

                                Kelola Foto

                            </a>


                            <a
                                href="/superadmin/galeri/edit/<?= (int) $item['id'] ?>"
                                class="inline-flex items-center
                                       justify-center
                                       rounded-xl bg-slate-100
                                       px-3 py-2.5
                                       text-xs font-semibold
                                       text-slate-700
                                       hover:bg-slate-200"
                            >

                                <i class="fa-solid fa-pen"></i>

                            </a>


                            <form
                                action="/superadmin/galeri/delete/<?= (int) $item['id'] ?>"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus album ini?')"
                            >

                                <button
                                    type="submit"
                                    class="inline-flex items-center
                                           justify-center
                                           rounded-xl bg-red-50
                                           px-3 py-2.5
                                           text-xs font-semibold
                                           text-red-600
                                           hover:bg-red-100"
                                >

                                    <i class="fa-solid fa-trash"></i>

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>

</div>