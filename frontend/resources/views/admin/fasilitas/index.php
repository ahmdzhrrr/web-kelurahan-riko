<div class="max-w-7xl">

    <div class="mb-8 flex items-center justify-between">

        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Fasilitas
            </h1>

            <p class="mt-2 text-sm text-slate-500">
                Kelola fasilitas yang ditampilkan pada website
                Kelurahan Riko.
            </p>
        </div>


        <a
            href="/superadmin/fasilitas/create"
            class="rounded-xl bg-green-900
                   px-5 py-3
                   text-sm font-semibold text-white
                   shadow-sm transition
                   hover:bg-green-800"
        >
            <i class="fa-solid fa-plus mr-2"></i>
            Tambah Fasilitas
        </a>

    </div>


    <?php if (!empty($_SESSION['success'])): ?>

        <div class="mb-6 rounded-xl bg-green-50 p-4
                    text-sm text-green-700">

            <?= e($_SESSION['success']) ?>

        </div>

        <?php unset($_SESSION['success']); ?>

    <?php endif; ?>


    <?php if (!empty($_SESSION['error'])): ?>

        <div class="mb-6 rounded-xl bg-red-50 p-4
                    text-sm text-red-700">

            <?= e($_SESSION['error']) ?>

        </div>

        <?php unset($_SESSION['error']); ?>

    <?php endif; ?>


    <div
        class="overflow-hidden rounded-2xl bg-white
               shadow-sm ring-1 ring-slate-200"
    >

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-slate-50">

                    <tr>

                        <th class="px-6 py-4 text-left">
                            No
                        </th>

                        <th class="px-6 py-4 text-left">
                            Nama
                        </th>

                        <th class="px-6 py-4 text-left">
                            Deskripsi
                        </th>

                        <th class="px-6 py-4 text-center">
                            Foto
                        </th>

                        <th class="px-6 py-4 text-right">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-slate-100">

                    <?php if (empty($fasilitas)): ?>

                        <tr>

                            <td
                                colspan="5"
                                class="px-6 py-12 text-center
                                       text-slate-500"
                            >
                                Belum ada fasilitas.
                            </td>

                        </tr>

                    <?php else: ?>

                        <?php foreach ($fasilitas as $index => $item): ?>

                            <tr class="hover:bg-slate-50">

                                <td class="px-6 py-4 text-slate-500">
                                    <?= $index + 1 ?>
                                </td>


                                <td class="px-6 py-4">

                                    <p class="font-semibold text-slate-800">
                                        <?= e($item['nama']) ?>
                                    </p>

                                </td>


                                <td class="max-w-md px-6 py-4">

                                    <p class="line-clamp-2 text-slate-500">
                                        <?= e($item['deskripsi']) ?>
                                    </p>

                                </td>


                                <td class="px-6 py-4 text-center">

                                    <span
                                        class="rounded-full bg-green-100
                                               px-3 py-1 text-xs font-semibold
                                               text-green-700"
                                    >
                                        <?= (int) $item['jumlah_foto'] ?>
                                        foto
                                    </span>

                                </td>


                                <td class="px-6 py-4">

                                    <div
                                        class="flex justify-end gap-2"
                                    >

                                        <a
                                            href="/superadmin/fasilitas/<?= (int) $item['id'] ?>/photos"
                                            class="rounded-lg bg-blue-50
                                                   px-3 py-2
                                                   text-xs font-semibold
                                                   text-blue-700
                                                   hover:bg-blue-100"
                                        >
                                            <i class="fa-solid fa-images"></i>
                                        </a>


                                        <a
                                            href="/superadmin/fasilitas/edit/<?= (int) $item['id'] ?>"
                                            class="rounded-lg bg-amber-50
                                                   px-3 py-2
                                                   text-xs font-semibold
                                                   text-amber-700
                                                   hover:bg-amber-100"
                                        >
                                            <i class="fa-solid fa-pen"></i>
                                        </a>


                                        <form
                                            action="/superadmin/fasilitas/delete/<?= (int) $item['id'] ?>"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus fasilitas ini?')"
                                        >

                                            <button
                                                type="submit"
                                                class="rounded-lg bg-red-50
                                                       px-3 py-2
                                                       text-xs font-semibold
                                                       text-red-700
                                                       hover:bg-red-100"
                                            >
                                                <i class="fa-solid fa-trash"></i>
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>