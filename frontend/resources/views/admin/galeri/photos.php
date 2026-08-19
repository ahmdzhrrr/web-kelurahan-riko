<?php

$album = $album ?? [];
$galeri = $galeri ?? [];

?>

<div class="max-w-7xl">

    <!-- HEADER -->

    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>

            <div class="mb-3">

                <a
                    href="/superadmin/galeri"
                    class="text-sm font-medium text-green-800
                           hover:text-green-700"
                >

                    <i class="fa-solid fa-arrow-left mr-2"></i>

                    Kembali ke Album

                </a>

            </div>

            <h1 class="text-2xl font-bold text-slate-800">

                <?= e($album['nama']) ?>

            </h1>

            <p class="mt-2 text-sm text-slate-500">
                Kelola foto yang terdapat dalam album ini.
            </p>

        </div>


        <a
            href="/superadmin/galeri/<?= (int) $album['id'] ?>/foto/create"
            class="inline-flex items-center justify-center
                   rounded-xl bg-green-900
                   px-5 py-3
                   text-sm font-semibold text-white
                   hover:bg-green-800"
        >

            <i class="fa-solid fa-plus mr-2"></i>

            Tambah Foto

        </a>

    </div>


    <?php if (empty($galeri)): ?>

        <div
            class="rounded-2xl bg-white p-10
                   text-center shadow-sm
                   ring-1 ring-slate-200"
        >

            <div
                class="mx-auto mb-4 flex h-16 w-16
                       items-center justify-center
                       rounded-full bg-green-50
                       text-green-800"
            >

                <i class="fa-solid fa-image text-2xl"></i>

            </div>

            <h2 class="text-lg font-bold text-slate-800">
                Belum ada foto
            </h2>

            <p class="mt-2 text-sm text-slate-500">
                Tambahkan foto ke album ini.
            </p>

        </div>

    <?php else: ?>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

            <?php foreach ($galeri as $foto): ?>

                <div
                    class="overflow-hidden rounded-2xl
                           bg-white shadow-sm
                           ring-1 ring-slate-200"
                >

                    <!-- IMAGE -->

                    <div class="h-52 bg-slate-100">

                        <?php if (!empty($foto['gambar'])): ?>

                            <img
                                src="/<?= e(ltrim($foto['gambar'], '/')) ?>"
                                alt="<?= e($foto['judul']) ?>"
                                class="h-full w-full object-cover"
                            >

                        <?php else: ?>

                            <div
                                class="flex h-full items-center
                                       justify-center text-slate-300"
                            >

                                <i class="fa-solid fa-image text-4xl"></i>

                            </div>

                        <?php endif; ?>

                    </div>


                    <!-- CONTENT -->

                    <div class="p-4">

                        <h2
                            class="font-semibold text-slate-800"
                        >

                            <?= e($foto['judul']) ?>

                        </h2>


                        <?php if (!empty($foto['caption'])): ?>

                            <p
                                class="mt-2 line-clamp-2
                                       text-sm leading-6
                                       text-slate-500"
                            >

                                <?= e($foto['caption']) ?>

                            </p>

                        <?php endif; ?>


                        <div class="mt-4 flex gap-2">

                            <a
                                href="/superadmin/galeri/foto/edit/<?= (int) $foto['id'] ?>"
                                class="flex-1 rounded-xl
                                       bg-slate-100 px-3 py-2
                                       text-center text-xs
                                       font-semibold text-slate-700
                                       hover:bg-slate-200"
                            >

                                <i class="fa-solid fa-pen mr-1"></i>

                                Edit

                            </a>


                            <form
                                action="/superadmin/galeri/foto/delete/<?= (int) $foto['id'] ?>"
                                method="POST"
                                class="flex-1"
                                onsubmit="return confirm('Yakin ingin menghapus foto ini?')"
                            >

                                <button
                                    type="submit"
                                    class="w-full rounded-xl
                                           bg-red-50 px-3 py-2
                                           text-xs font-semibold
                                           text-red-600
                                           hover:bg-red-100"
                                >

                                    <i class="fa-solid fa-trash mr-1"></i>

                                    Hapus

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>

</div>