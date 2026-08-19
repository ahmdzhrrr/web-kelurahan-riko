<?php

$pegawai = $pegawai ?? [];

?>

<div class="max-w-7xl">

    <!-- Header -->

    <div class="mb-8 flex items-center justify-between">

        <div>

            <h1 class="text-2xl font-bold text-slate-800">
                Pegawai
            </h1>

            <p class="mt-2 text-sm text-slate-500">
                Kelola data aparatur dan pegawai Kelurahan Riko.
            </p>

        </div>


        <a
            href="/superadmin/pegawai/create"
            class="inline-flex items-center gap-2
                   rounded-xl bg-green-900
                   px-5 py-3
                   text-sm font-semibold text-white
                   shadow-sm
                   transition hover:bg-green-800"
        >

            <i class="fa-solid fa-plus"></i>

            Tambah Pegawai

        </a>

    </div>


    <!-- Table -->

    <section
        class="overflow-hidden rounded-2xl
               bg-white shadow-sm
               ring-1 ring-slate-200"
    >

        <div class="overflow-x-auto">

            <table class="w-full text-left text-sm">

                <thead class="border-b bg-slate-50">

                    <tr>

                        <th class="px-6 py-4 font-semibold text-slate-600">
                            Pegawai
                        </th>

                        <th class="px-6 py-4 font-semibold text-slate-600">
                            Jabatan
                        </th>

                        <th class="px-6 py-4 font-semibold text-slate-600">
                            Unit
                        </th>

                        <th class="px-6 py-4 font-semibold text-slate-600">
                            NIP
                        </th>

                        <th class="px-6 py-4 font-semibold text-slate-600">
                            Status
                        </th>

                        <th class="px-6 py-4 text-right font-semibold text-slate-600">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-slate-100">

                    <?php if (!empty($pegawai)): ?>

                        <?php foreach ($pegawai as $item): ?>

                            <tr class="transition hover:bg-slate-50">

                                <!-- Pegawai -->

                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <?php if (!empty($item['foto'])): ?>

                                            <img
                                                src="/<?= e($item['foto']) ?>"
                                                alt="<?= e($item['nama']) ?>"
                                                class="h-12 w-12
                                                       rounded-full
                                                       object-cover
                                                       ring-2 ring-slate-100"
                                            >

                                        <?php else: ?>

                                            <div
                                                class="flex h-12 w-12
                                                       items-center
                                                       justify-center
                                                       rounded-full
                                                       bg-green-100
                                                       text-green-700"
                                            >

                                                <i class="fa-solid fa-user"></i>

                                            </div>

                                        <?php endif; ?>


                                        <div>

                                            <p class="font-semibold text-slate-800">
                                                <?= e($item['nama']) ?>
                                            </p>

                                            <p class="text-xs text-slate-500">
                                                <?= e($item['email'] ?? '-') ?>
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                <!-- Jabatan -->

                                <td class="px-6 py-4">

                                    <span class="text-slate-700">
                                        <?= e($item['jabatan'] ?? '-') ?>
                                    </span>

                                </td>


                                <!-- Unit -->

                                <td class="px-6 py-4">

                                    <div>

                                        <p class="font-medium text-slate-700">
                                            <?= e($item['unit_organisasi'] ?? '-') ?>
                                        </p>

                                        <?php if (!empty($item['tipe_unit'])): ?>

                                            <p class="text-xs text-slate-400">
                                                <?= e($item['tipe_unit']) ?>
                                            </p>

                                        <?php endif; ?>

                                    </div>

                                </td>


                                <!-- NIP -->

                                <td class="px-6 py-4 text-slate-600">

                                    <?= e($item['nip'] ?: '-') ?>

                                </td>


                                <!-- Status -->

                                <td class="px-6 py-4">

                                    <?php if ($item['status'] === 'aktif'): ?>

                                        <span
                                            class="inline-flex rounded-full
                                                   bg-green-100
                                                   px-3 py-1
                                                   text-xs font-semibold
                                                   text-green-700"
                                        >
                                            Aktif
                                        </span>

                                    <?php else: ?>

                                        <span
                                            class="inline-flex rounded-full
                                                   bg-slate-100
                                                   px-3 py-1
                                                   text-xs font-semibold
                                                   text-slate-600"
                                        >
                                            Nonaktif
                                        </span>

                                    <?php endif; ?>

                                </td>


                                <!-- Aksi -->

                                <td class="px-6 py-4">

                                    <div class="flex justify-end gap-2">

                                        <a
                                            href="/superadmin/pegawai/edit/<?= (int) $item['id'] ?>"
                                            class="inline-flex h-9 w-9
                                                   items-center justify-center
                                                   rounded-lg
                                                   bg-blue-50
                                                   text-blue-700
                                                   transition
                                                   hover:bg-blue-100"
                                            title="Edit"
                                        >

                                            <i class="fa-solid fa-pen"></i>

                                        </a>


                                        <form
                                            action="/superadmin/pegawai/delete/<?= (int) $item['id'] ?>"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus pegawai ini?')"
                                        >

                                            <button
                                                type="submit"
                                                class="inline-flex h-9 w-9
                                                       items-center justify-center
                                                       rounded-lg
                                                       bg-red-50
                                                       text-red-700
                                                       transition
                                                       hover:bg-red-100"
                                                title="Hapus"
                                            >

                                                <i class="fa-solid fa-trash"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td
                                colspan="6"
                                class="px-6 py-16 text-center"
                            >

                                <i
                                    class="fa-solid fa-users
                                           text-4xl text-slate-300"
                                ></i>

                                <p class="mt-4 text-sm text-slate-500">
                                    Belum ada data pegawai.
                                </p>

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </section>

</div>