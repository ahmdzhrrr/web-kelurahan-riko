<?php

$berita = $berita ?? [];

$total = count($berita);

$published = 0;
$draft = 0;

foreach ($berita as $item) {

    if (($item['status'] ?? '') === 'published') {
        $published++;
    }

    if (($item['status'] ?? '') === 'draft') {
        $draft++;
    }
}

?>

<div class="max-w-7xl">


    <!-- ================================================= -->
    <!-- HEADER -->
    <!-- ================================================= -->

    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>

            <h1 class="text-2xl font-bold text-slate-800">
                Kelola Berita
            </h1>

            <p class="mt-2 text-sm leading-6 text-slate-500">
                Kelola berita dan informasi yang ditampilkan
                pada website Kelurahan Riko.
            </p>

        </div>


        <a
            href="/superadmin/berita/create"
            class="inline-flex items-center justify-center
                   rounded-xl
                   bg-green-900
                   px-5 py-3
                   text-sm font-semibold
                   text-white
                   transition
                   hover:bg-green-800"
        >

            <i class="fa-solid fa-plus mr-2"></i>

            Tambah Berita

        </a>

    </div>


    <!-- ================================================= -->
    <!-- STATISTIK -->
    <!-- ================================================= -->

    <div class="mb-8 grid gap-5 md:grid-cols-3">


        <!-- Total -->

        <div
            class="rounded-2xl
                   bg-white
                   p-6
                   shadow-sm
                   ring-1 ring-slate-200"
        >

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500">
                        Total Berita
                    </p>

                    <p class="mt-2 text-3xl font-bold text-slate-800">
                        <?= $total ?>
                    </p>

                </div>


                <div
                    class="flex h-12 w-12
                           items-center justify-center
                           rounded-xl
                           bg-green-100
                           text-green-800"
                >

                    <i class="fa-solid fa-newspaper text-lg"></i>

                </div>

            </div>

        </div>


        <!-- Published -->

        <div
            class="rounded-2xl
                   bg-white
                   p-6
                   shadow-sm
                   ring-1 ring-slate-200"
        >

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500">
                        Published
                    </p>

                    <p class="mt-2 text-3xl font-bold text-slate-800">
                        <?= $published ?>
                    </p>

                </div>


                <div
                    class="flex h-12 w-12
                           items-center justify-center
                           rounded-xl
                           bg-green-100
                           text-green-700"
                >

                    <i class="fa-solid fa-circle-check text-lg"></i>

                </div>

            </div>

        </div>


        <!-- Draft -->

        <div
            class="rounded-2xl
                   bg-white
                   p-6
                   shadow-sm
                   ring-1 ring-slate-200"
        >

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500">
                        Draft
                    </p>

                    <p class="mt-2 text-3xl font-bold text-slate-800">
                        <?= $draft ?>
                    </p>

                </div>


                <div
                    class="flex h-12 w-12
                           items-center justify-center
                           rounded-xl
                           bg-yellow-100
                           text-yellow-700"
                >

                    <i class="fa-solid fa-file-lines text-lg"></i>

                </div>

            </div>

        </div>

    </div>


    <!-- ================================================= -->
    <!-- TABLE -->
    <!-- ================================================= -->

    <section
        class="overflow-hidden
               rounded-2xl
               bg-white
               shadow-sm
               ring-1 ring-slate-200"
    >

        <div
            class="border-b border-slate-200
                   px-6 py-5"
        >

            <h2 class="text-lg font-bold text-green-800">
                Daftar Berita
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Daftar berita yang tersimpan dalam sistem.
            </p>

        </div>


        <?php if (empty($berita)): ?>


            <!-- EMPTY -->

            <div class="px-6 py-16 text-center">

                <div
                    class="mx-auto mb-4
                           flex h-16 w-16
                           items-center justify-center
                           rounded-full
                           bg-slate-100
                           text-slate-400"
                >

                    <i class="fa-solid fa-newspaper text-2xl"></i>

                </div>


                <h3 class="text-lg font-semibold text-slate-700">
                    Belum ada berita
                </h3>


                <p class="mt-2 text-sm text-slate-500">
                    Belum ada berita yang tersimpan.
                </p>


                <a
                    href="/superadmin/berita/create"
                    class="mt-5 inline-flex
                           items-center
                           rounded-xl
                           bg-green-900
                           px-5 py-3
                           text-sm font-semibold
                           text-white
                           hover:bg-green-800"
                >

                    <i class="fa-solid fa-plus mr-2"></i>

                    Tambah Berita

                </a>

            </div>


        <?php else: ?>


            <!-- TABLE -->

            <div class="overflow-x-auto">

                <table class="w-full text-sm">


                    <thead class="bg-slate-50">

                        <tr>

                            <th
                                class="px-6 py-4
                                       text-left
                                       font-semibold
                                       text-slate-600"
                            >
                                Berita
                            </th>


                            <th
                                class="px-6 py-4
                                       text-left
                                       font-semibold
                                       text-slate-600"
                            >
                                Kategori
                            </th>


                            <th
                                class="px-6 py-4
                                       text-left
                                       font-semibold
                                       text-slate-600"
                            >
                                Penulis
                            </th>


                            <th
                                class="px-6 py-4
                                       text-left
                                       font-semibold
                                       text-slate-600"
                            >
                                Status
                            </th>


                            <th
                                class="px-6 py-4
                                       text-left
                                       font-semibold
                                       text-slate-600"
                            >
                                Views
                            </th>


                            <th
                                class="px-6 py-4
                                       text-right
                                       font-semibold
                                       text-slate-600"
                            >
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-100">


                        <?php foreach ($berita as $item): ?>


                            <tr class="transition hover:bg-slate-50">


                                <!-- BERITA -->

                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-4">


                                        <?php if (!empty($item['thumbnail'])): ?>

                                            <img
                                                src="/<?= e(
                                                    ltrim(
                                                        $item['thumbnail'],
                                                        '/'
                                                    )
                                                ) ?>"
                                                alt="<?= e(
                                                    $item['thumbnail_alt']
                                                    ?? $item['judul']
                                                ) ?>"
                                                class="h-14 w-20
                                                       rounded-lg
                                                       object-cover"
                                            >

                                        <?php else: ?>

                                            <div
                                                class="flex h-14 w-20
                                                       items-center
                                                       justify-center
                                                       rounded-lg
                                                       bg-slate-100
                                                       text-slate-400"
                                            >

                                                <i class="fa-solid fa-image"></i>

                                            </div>

                                        <?php endif; ?>


                                        <div class="min-w-0">

                                            <p
                                                class="max-w-xs
                                                       truncate
                                                       font-semibold
                                                       text-slate-800"
                                            >

                                                <?= e(
                                                    $item['judul']
                                                    ?? '-'
                                                ) ?>

                                            </p>


                                            <?php if (!empty($item['is_featured'])): ?>

                                                <span
                                                    class="mt-1 inline-flex
                                                           items-center
                                                           text-xs
                                                           font-medium
                                                           text-yellow-600"
                                                >

                                                    <i class="fa-solid fa-star mr-1"></i>

                                                    Featured

                                                </span>

                                            <?php endif; ?>

                                        </div>

                                    </div>

                                </td>


                                <!-- KATEGORI -->

                                <td class="px-6 py-4">

                                    <?= e(
                                        $item['kategori']
                                        ?? 'Tanpa kategori'
                                    ) ?>

                                </td>


                                <!-- PENULIS -->

                                <td class="px-6 py-4">

                                    <?= e(
                                        $item['penulis']
                                        ?? '-'
                                    ) ?>

                                </td>


                                <!-- STATUS -->

                                <td class="px-6 py-4">

                                    <?php if (
                                        ($item['status'] ?? '')
                                        === 'published'
                                    ): ?>

                                        <span
                                            class="inline-flex
                                                   items-center
                                                   rounded-full
                                                   bg-green-100
                                                   px-3 py-1
                                                   text-xs
                                                   font-semibold
                                                   text-green-700"
                                        >

                                            Published

                                        </span>

                                    <?php else: ?>

                                        <span
                                            class="inline-flex
                                                   items-center
                                                   rounded-full
                                                   bg-yellow-100
                                                   px-3 py-1
                                                   text-xs
                                                   font-semibold
                                                   text-yellow-700"
                                        >

                                            Draft

                                        </span>

                                    <?php endif; ?>

                                </td>


                                <!-- VIEWS -->

                                <td class="px-6 py-4">

                                    <span class="text-slate-600">

                                        <i
                                            class="fa-solid fa-eye
                                                   mr-1
                                                   text-slate-400"
                                        ></i>

                                        <?= number_format(
                                            (int) (
                                                $item['views']
                                                ?? 0
                                            )
                                        ) ?>

                                    </span>

                                </td>


                                <!-- AKSI -->

                                <td class="px-6 py-4">

                                    <div
                                        class="flex
                                               justify-end
                                               gap-1"
                                    >


                                        <!-- EDIT -->

                                        <a
                                            href="/superadmin/berita/edit/<?= (int) $item['id'] ?>"
                                            title="Edit"
                                            class="flex h-9 w-9
                                                   items-center
                                                   justify-center
                                                   rounded-lg
                                                   text-blue-600
                                                   hover:bg-blue-50"
                                        >

                                            <i
                                                class="fa-solid
                                                       fa-pen-to-square"
                                            ></i>

                                        </a>


                                        <!-- DELETE -->

                                        <form
                                            action="/superadmin/berita/delete/<?= (int) $item['id'] ?>"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus berita ini?')"
                                        >

                                            <button
                                                type="submit"
                                                title="Hapus"
                                                class="flex h-9 w-9
                                                       items-center
                                                       justify-center
                                                       rounded-lg
                                                       text-red-600
                                                       hover:bg-red-50"
                                            >

                                                <i
                                                    class="fa-solid
                                                           fa-trash"
                                                ></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>


                            </tr>


                        <?php endforeach; ?>


                    </tbody>

                </table>

            </div>


        <?php endif; ?>


    </section>

</div>