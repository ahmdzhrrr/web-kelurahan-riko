<div>

    <div class="mb-8 flex flex-col gap-4 sm:flex-row
                sm:items-center sm:justify-between">

        <div>

            <h1 class="text-2xl font-bold text-slate-800">
                Pelayanan
            </h1>

            <p class="mt-2 text-sm text-slate-500">
                Kelola layanan administrasi Kelurahan Riko.
            </p>

        </div>

        <a
            href="/superadmin/pelayanan/create"
            class="inline-flex items-center justify-center
                   rounded-xl bg-green-900
                   px-5 py-3
                   text-sm font-semibold text-white
                   transition hover:bg-green-800"
        >
            <i class="fa-solid fa-plus mr-2"></i>
            Tambah Pelayanan
        </a>

    </div>


    <?php if (!empty($pelayanan)): ?>

        <div
            class="overflow-hidden rounded-2xl bg-white
                   shadow-sm ring-1 ring-slate-200"
        >

            <div class="overflow-x-auto">

                <table class="min-w-full text-sm">

                    <thead class="bg-slate-50">

                        <tr>

                            <th class="px-5 py-4 text-left font-semibold text-slate-600">
                                #
                            </th>

                            <th class="px-5 py-4 text-left font-semibold text-slate-600">
                                Pelayanan
                            </th>

                            <th class="px-5 py-4 text-left font-semibold text-slate-600">
                                Slug
                            </th>

                            <th class="px-5 py-4 text-left font-semibold text-slate-600">
                                Link GForm
                            </th>

                            <th class="px-5 py-4 text-right font-semibold text-slate-600">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-slate-100">

                        <?php foreach ($pelayanan as $index => $item): ?>

                            <tr class="hover:bg-slate-50">

                                <td class="px-5 py-4 text-slate-500">
                                    <?= $index + 1 ?>
                                </td>

                                <td class="px-5 py-4">

                                    <p class="font-semibold text-slate-800">
                                        <?= e($item['nama']) ?>
                                    </p>

                                    <?php if (!empty($item['jam_pelayanan'])): ?>

                                        <p class="mt-1 text-xs text-slate-500">
                                            <?= e($item['jam_pelayanan']) ?>
                                        </p>

                                    <?php endif; ?>

                                </td>

                                <td class="px-5 py-4 text-slate-500">
                                    <?= e($item['slug']) ?>
                                </td>

                                <td class="px-5 py-4">

                                    <?php if (!empty($item['link'])): ?>

                                        <a
                                            href="<?= e($item['link']) ?>"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="inline-flex items-center
                                                   gap-2 text-green-700
                                                   hover:text-green-900"
                                        >
                                            <i class="fa-solid fa-link"></i>
                                            Tersedia
                                        </a>

                                    <?php else: ?>

                                        <span class="text-slate-400">
                                            Belum ada
                                        </span>

                                    <?php endif; ?>

                                </td>

                                <td class="px-5 py-4">

                                    <div class="flex justify-end gap-2">

                                        <a
                                            href="/superadmin/pelayanan/edit/<?= (int) $item['id'] ?>"
                                            class="rounded-lg bg-blue-50
                                                   px-3 py-2
                                                   text-blue-700
                                                   transition
                                                   hover:bg-blue-100"
                                            title="Edit"
                                        >
                                            <i class="fa-solid fa-pen"></i>
                                        </a>


                                        <form
                                            action="/superadmin/pelayanan/delete/<?= (int) $item['id'] ?>"
                                            method="POST"
                                            onsubmit="return confirm('Hapus pelayanan ini?');"
                                        >

                                            <button
                                                type="submit"
                                                class="rounded-lg bg-red-50
                                                       px-3 py-2
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

                    </tbody>

                </table>

            </div>

        </div>

    <?php else: ?>

        <div class="rounded-2xl bg-white py-16 text-center
                    shadow-sm ring-1 ring-slate-200">

            <i class="fa-solid fa-hand-holding-heart
                      text-5xl text-slate-300"></i>

            <p class="mt-4 text-slate-500">
                Belum ada data pelayanan.
            </p>

            <a
                href="/superadmin/pelayanan/create"
                class="mt-5 inline-flex rounded-xl
                       bg-green-900 px-5 py-3
                       text-sm font-semibold text-white"
            >
                Tambah Pelayanan
            </a>

        </div>

    <?php endif; ?>

</div>