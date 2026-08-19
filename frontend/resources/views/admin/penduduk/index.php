<?php
/*
|--------------------------------------------------------------------------
| PENDUDUK ADMIN
|--------------------------------------------------------------------------
|
| View:
|   penduduk/index.php
|
| Data dari PendudukAdminController:
|   $pekerjaan
|   $pendidikan
|   $kepalaKeluarga
|   $rekapitulasi
|   $kkPerRT
|   $pendudukPerRT
|   $umur
|   $rt
|
*/

$baseUrl = '/superadmin/penduduk';

$kepalaKeluarga = $kepalaKeluarga ?? null;
$pekerjaan      = $pekerjaan ?? [];
$pendidikan     = $pendidikan ?? [];
$rekapitulasi   = $rekapitulasi ?? [];
$kkPerRT        = $kkPerRT ?? [];
$pendudukPerRT  = $pendudukPerRT ?? [];
$umur           = $umur ?? [];
$rt             = $rt ?? [];
?>


<!-- =========================================================
     HEADER
========================================================= -->

<div class="mb-8">

    <h1 class="text-2xl font-bold text-slate-800">
        Data Penduduk
    </h1>

    <p class="mt-1 text-sm text-slate-500">
        Kelola data infografis penduduk Kelurahan Riko.
    </p>

</div>



<!-- =========================================================
     REKAPITULASI
========================================================= -->

<div class="mb-8">

    <div class="mb-4 flex items-center justify-between">

        <div>

            <h2 class="text-lg font-bold text-slate-800">
                Rekapitulasi Penduduk
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Data jumlah penduduk berdasarkan kategori.
            </p>

        </div>


        <button
            type="button"
            onclick="openModal('modalTambahRekapitulasi')"
            class="rounded-xl bg-green-700 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-green-800"
        >
            + Tambah
        </button>

    </div>


    <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-4">

        <?php foreach ($rekapitulasi as $item): ?>

            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                <div class="flex items-start justify-between gap-3">

                    <div>

                        <p class="text-sm text-slate-500">
                            <?= e($item['keterangan'] ?? '') ?>
                        </p>

                        <p class="mt-2 text-3xl font-bold text-green-800">
                            <?= e($item['jumlah'] ?? 0) ?>
                        </p>

                    </div>

                </div>


                <div class="mt-4 grid grid-cols-2 gap-2">

                    <div class="rounded-xl bg-slate-50 p-3">

                        <p class="text-xs text-slate-500">
                            Laki-laki
                        </p>

                        <p class="mt-1 font-bold text-slate-800">
                            <?= e($item['laki_laki'] ?? 0) ?>
                        </p>

                    </div>


                    <div class="rounded-xl bg-slate-50 p-3">

                        <p class="text-xs text-slate-500">
                            Perempuan
                        </p>

                        <p class="mt-1 font-bold text-slate-800">
                            <?= e($item['perempuan'] ?? 0) ?>
                        </p>

                    </div>

                </div>


                <div class="mt-4 flex gap-2">

                    <button
                        type="button"
                        onclick='editRekapitulasi(<?= json_encode($item, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>)'
                        class="flex-1 rounded-lg bg-amber-100 px-3 py-2 text-xs font-semibold text-amber-700 transition hover:bg-amber-200"
                    >
                        Edit
                    </button>


                    <form
                        method="POST"
                        action="<?= $baseUrl ?>/rekapitulasi/delete/<?= (int) $item['id'] ?>"
                        class="flex-1"
                        onsubmit="return confirm('Hapus data rekapitulasi ini?')"
                    >

                        <button
                            type="submit"
                            class="w-full rounded-lg bg-red-100 px-3 py-2 text-xs font-semibold text-red-700 transition hover:bg-red-200"
                        >
                            Hapus
                        </button>

                    </form>

                </div>

            </div>

        <?php endforeach; ?>


        <?php if (empty($rekapitulasi)): ?>

            <div class="col-span-full rounded-2xl border border-dashed border-slate-300 bg-white p-8 text-center">

                <p class="text-sm text-slate-500">
                    Belum ada data rekapitulasi.
                </p>

            </div>

        <?php endif; ?>

    </div>

</div>



<!-- =========================================================
     DATA PEKERJAAN
========================================================= -->

<div class="mb-8 rounded-2xl border border-slate-200 bg-white shadow-sm">

    <div class="flex items-center justify-between border-b border-slate-200 px-6 py-5">

        <div>

            <h2 class="font-bold text-slate-800">
                Data Pekerjaan
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Jumlah penduduk berdasarkan pekerjaan.
            </p>

        </div>


        <button
            type="button"
            onclick="openModal('modalTambahPekerjaan')"
            class="rounded-xl bg-green-700 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-green-800"
        >
            + Tambah
        </button>

    </div>


    <div class="overflow-x-auto">

        <table class="w-full text-sm">

            <thead class="bg-slate-50">

                <tr class="text-left text-slate-600">

                    <th class="px-6 py-4">
                        No
                    </th>

                    <th class="px-6 py-4">
                        Pekerjaan
                    </th>

                    <th class="px-6 py-4">
                        Laki-laki
                    </th>

                    <th class="px-6 py-4">
                        Perempuan
                    </th>

                    <th class="px-6 py-4">
                        Jumlah
                    </th>

                    <th class="px-6 py-4 text-right">
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody class="divide-y divide-slate-100">

                <?php foreach ($pekerjaan as $index => $item): ?>

                    <tr class="hover:bg-slate-50">

                        <td class="px-6 py-4">
                            <?= $index + 1 ?>
                        </td>

                        <td class="px-6 py-4 font-medium text-slate-800">
                            <?= e($item['pekerjaan'] ?? '') ?>
                        </td>

                        <td class="px-6 py-4">
                            <?= e($item['laki_laki'] ?? 0) ?>
                        </td>

                        <td class="px-6 py-4">
                            <?= e($item['perempuan'] ?? 0) ?>
                        </td>

                        <td class="px-6 py-4 font-semibold">
                            <?= e($item['jumlah'] ?? 0) ?>
                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-end gap-2">

                                <button
                                    type="button"
                                    onclick='editPekerjaan(<?= json_encode($item, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>)'
                                    class="rounded-lg bg-amber-100 px-3 py-2 text-xs font-semibold text-amber-700 hover:bg-amber-200"
                                >
                                    Edit
                                </button>


                                <form
                                    method="POST"
                                    action="<?= $baseUrl ?>/pekerjaan/delete/<?= (int) $item['id'] ?>"
                                    onsubmit="return confirm('Hapus data pekerjaan ini?')"
                                >

                                    <button
                                        type="submit"
                                        class="rounded-lg bg-red-100 px-3 py-2 text-xs font-semibold text-red-700 hover:bg-red-200"
                                    >
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                <?php endforeach; ?>


                <?php if (empty($pekerjaan)): ?>

                    <tr>

                        <td
                            colspan="6"
                            class="px-6 py-8 text-center text-sm text-slate-500"
                        >
                            Belum ada data pekerjaan.
                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>



<!-- =========================================================
     DATA PENDIDIKAN
========================================================= -->

<div class="mb-8 rounded-2xl border border-slate-200 bg-white shadow-sm">

    <div class="flex items-center justify-between border-b border-slate-200 px-6 py-5">

        <div>

            <h2 class="font-bold text-slate-800">
                Data Pendidikan
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Jumlah penduduk berdasarkan tingkat pendidikan.
            </p>

        </div>


        <button
            type="button"
            onclick="openModal('modalTambahPendidikan')"
            class="rounded-xl bg-green-700 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-green-800"
        >
            + Tambah
        </button>

    </div>


    <div class="overflow-x-auto">

        <table class="w-full text-sm">

            <thead class="bg-slate-50">

                <tr class="text-left text-slate-600">

                    <th class="px-6 py-4">
                        No
                    </th>

                    <th class="px-6 py-4">
                        Pendidikan
                    </th>

                    <th class="px-6 py-4">
                        Laki-laki
                    </th>

                    <th class="px-6 py-4">
                        Perempuan
                    </th>

                    <th class="px-6 py-4">
                        Jumlah
                    </th>

                    <th class="px-6 py-4 text-right">
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody class="divide-y divide-slate-100">

                <?php foreach ($pendidikan as $index => $item): ?>

                    <tr class="hover:bg-slate-50">

                        <td class="px-6 py-4">
                            <?= $index + 1 ?>
                        </td>

                        <td class="px-6 py-4 font-medium text-slate-800">
                            <?= e($item['pendidikan'] ?? '') ?>
                        </td>

                        <td class="px-6 py-4">
                            <?= e($item['laki_laki'] ?? 0) ?>
                        </td>

                        <td class="px-6 py-4">
                            <?= e($item['perempuan'] ?? 0) ?>
                        </td>

                        <td class="px-6 py-4 font-semibold">
                            <?= e($item['jumlah'] ?? 0) ?>
                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-end gap-2">

                                <button
                                    type="button"
                                    onclick='editPendidikan(<?= json_encode($item, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>)'
                                    class="rounded-lg bg-amber-100 px-3 py-2 text-xs font-semibold text-amber-700 hover:bg-amber-200"
                                >
                                    Edit
                                </button>


                                <form
                                    method="POST"
                                    action="<?= $baseUrl ?>/pendidikan/delete/<?= (int) $item['id'] ?>"
                                    onsubmit="return confirm('Hapus data pendidikan ini?')"
                                >

                                    <button
                                        type="submit"
                                        class="rounded-lg bg-red-100 px-3 py-2 text-xs font-semibold text-red-700 hover:bg-red-200"
                                    >
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                <?php endforeach; ?>


                <?php if (empty($pendidikan)): ?>

                    <tr>

                        <td
                            colspan="6"
                            class="px-6 py-8 text-center text-sm text-slate-500"
                        >
                            Belum ada data pendidikan.
                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>



<!-- =========================================================
     KEPALA KELUARGA
========================================================= -->

<div class="mb-8 rounded-2xl border border-slate-200 bg-white shadow-sm">

    <div class="flex items-center justify-between border-b border-slate-200 px-6 py-5">

        <div>

            <h2 class="font-bold text-slate-800">
                Data Kepala Keluarga
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Rekapitulasi perubahan jumlah kepala keluarga.
            </p>

        </div>


        <button
            type="button"
            onclick='editKepalaKeluarga(<?= json_encode($kepalaKeluarga ?? [], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>)'
            class="rounded-xl bg-amber-500 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-amber-600"
        >
            Edit Data
        </button>

    </div>


    <div class="grid grid-cols-1 gap-5 p-6 md:grid-cols-4">

        <div class="rounded-2xl bg-slate-50 p-5">

            <p class="text-sm text-slate-500">
                KK Bulan Lalu
            </p>

            <p class="mt-2 text-3xl font-bold text-slate-800">
                <?= e($kepalaKeluarga['kk_bulan_lalu'] ?? 0) ?>
            </p>

        </div>


        <div class="rounded-2xl bg-green-50 p-5">

            <p class="text-sm text-green-700">
                Datang
            </p>

            <p class="mt-2 text-3xl font-bold text-green-800">
                <?= e($kepalaKeluarga['datang'] ?? 0) ?>
            </p>

        </div>


        <div class="rounded-2xl bg-red-50 p-5">

            <p class="text-sm text-red-700">
                Pindah
            </p>

            <p class="mt-2 text-3xl font-bold text-red-800">
                <?= e($kepalaKeluarga['pindah'] ?? 0) ?>
            </p>

        </div>


        <div class="rounded-2xl bg-blue-50 p-5">

            <p class="text-sm text-blue-700">
                KK Bulan Ini
            </p>

            <p class="mt-2 text-3xl font-bold text-blue-800">
                <?= e($kepalaKeluarga['kk_bulan_ini'] ?? 0) ?>
            </p>

        </div>

    </div>

</div>



<!-- =========================================================
     KK PER RT
========================================================= -->

<div class="mb-8 rounded-2xl border border-slate-200 bg-white shadow-sm">

    <div class="flex items-center justify-between border-b border-slate-200 px-6 py-5">

        <div>

            <h2 class="font-bold text-slate-800">
                Jumlah KK per RT
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Data jumlah kepala keluarga berdasarkan RT.
            </p>

        </div>


        <button
            type="button"
            onclick="openModal('modalTambahKKPerRT')"
            class="rounded-xl bg-green-700 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-green-800"
        >
            + Tambah
        </button>

    </div>


    <div class="overflow-x-auto">

        <table class="w-full text-sm">

            <thead class="bg-slate-50">

                <tr class="text-left text-slate-600">

                    <th class="px-6 py-4">
                        No
                    </th>

                    <th class="px-6 py-4">
                        RT
                    </th>

                    <th class="px-6 py-4">
                        Jumlah KK
                    </th>

                    <th class="px-6 py-4">
                        Urutan
                    </th>

                    <th class="px-6 py-4 text-right">
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody class="divide-y divide-slate-100">

                <?php foreach ($kkPerRT as $index => $item): ?>

                    <tr class="hover:bg-slate-50">

                        <td class="px-6 py-4">
                            <?= $index + 1 ?>
                        </td>

                        <td class="px-6 py-4 font-semibold text-slate-800">
                            <?= e($item['rt'] ?? '') ?>
                        </td>

                        <td class="px-6 py-4">
                            <?= e($item['jumlah_kk'] ?? 0) ?>
                        </td>

                        <td class="px-6 py-4">
                            <?= e($item['urutan'] ?? 0) ?>
                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-end gap-2">

                                <button
                                    type="button"
                                    onclick='editKKPerRT(<?= json_encode($item, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>)'
                                    class="rounded-lg bg-amber-100 px-3 py-2 text-xs font-semibold text-amber-700 hover:bg-amber-200"
                                >
                                    Edit
                                </button>


                                <form
                                    method="POST"
                                    action="<?= $baseUrl ?>/kk-per-rt/delete/<?= (int) $item['id'] ?>"
                                    onsubmit="return confirm('Hapus data KK per RT ini?')"
                                >

                                    <button
                                        type="submit"
                                        class="rounded-lg bg-red-100 px-3 py-2 text-xs font-semibold text-red-700 hover:bg-red-200"
                                    >
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                <?php endforeach; ?>


                <?php if (empty($kkPerRT)): ?>

                    <tr>

                        <td
                            colspan="5"
                            class="px-6 py-8 text-center text-sm text-slate-500"
                        >
                            Belum ada data KK per RT.
                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>



<!-- =========================================================
     PENDUDUK PER RT
========================================================= -->

<div class="mb-8 rounded-2xl border border-slate-200 bg-white shadow-sm">

    <div class="flex items-center justify-between border-b border-slate-200 px-6 py-5">

        <div>

            <h2 class="font-bold text-slate-800">
                Jumlah Penduduk per RT
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Data jumlah penduduk berdasarkan RT.
            </p>

        </div>


        <button
            type="button"
            onclick="openModal('modalTambahPendudukPerRT')"
            class="rounded-xl bg-green-700 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-green-800"
        >
            + Tambah
        </button>

    </div>


    <div class="overflow-x-auto">

        <table class="w-full text-sm">

            <thead class="bg-slate-50">

                <tr class="text-left text-slate-600">

                    <th class="px-6 py-4">
                        No
                    </th>

                    <th class="px-6 py-4">
                        RT
                    </th>

                    <th class="px-6 py-4">
                        Laki-laki
                    </th>

                    <th class="px-6 py-4">
                        Perempuan
                    </th>

                    <th class="px-6 py-4">
                        Jumlah
                    </th>

                    <th class="px-6 py-4 text-right">
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody class="divide-y divide-slate-100">

                <?php foreach ($pendudukPerRT as $index => $item): ?>

                    <tr class="hover:bg-slate-50">

                        <td class="px-6 py-4">
                            <?= $index + 1 ?>
                        </td>

                        <td class="px-6 py-4 font-semibold text-slate-800">
                            <?= e($item['rt'] ?? '') ?>
                        </td>

                        <td class="px-6 py-4">
                            <?= e($item['laki_laki'] ?? 0) ?>
                        </td>

                        <td class="px-6 py-4">
                            <?= e($item['perempuan'] ?? 0) ?>
                        </td>

                        <td class="px-6 py-4 font-semibold">
                            <?= e($item['jumlah'] ?? 0) ?>
                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-end gap-2">

                                <button
                                    type="button"
                                    onclick='editPendudukPerRT(<?= json_encode($item, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>)'
                                    class="rounded-lg bg-amber-100 px-3 py-2 text-xs font-semibold text-amber-700 hover:bg-amber-200"
                                >
                                    Edit
                                </button>


                                <form
                                    method="POST"
                                    action="<?= $baseUrl ?>/penduduk-per-rt/delete/<?= (int) $item['id'] ?>"
                                    onsubmit="return confirm('Hapus data penduduk per RT ini?')"
                                >

                                    <button
                                        type="submit"
                                        class="rounded-lg bg-red-100 px-3 py-2 text-xs font-semibold text-red-700 hover:bg-red-200"
                                    >
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                <?php endforeach; ?>


                <?php if (empty($pendudukPerRT)): ?>

                    <tr>

                        <td
                            colspan="6"
                            class="px-6 py-8 text-center text-sm text-slate-500"
                        >
                            Belum ada data penduduk per RT.
                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>



<!-- =========================================================
     KELOMPOK UMUR
========================================================= -->

<div class="mb-8 rounded-2xl border border-slate-200 bg-white shadow-sm">

    <div class="flex items-center justify-between border-b border-slate-200 px-6 py-5">

        <div>

            <h2 class="font-bold text-slate-800">
                Kelompok Umur
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Data jumlah penduduk berdasarkan kelompok umur.
            </p>

        </div>


        <button
            type="button"
            onclick="openModal('modalTambahUmur')"
            class="rounded-xl bg-green-700 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-green-800"
        >
            + Tambah
        </button>

    </div>


    <div class="overflow-x-auto">

        <table class="w-full text-sm">

            <thead class="bg-slate-50">

                <tr class="text-left text-slate-600">

                    <th class="px-6 py-4">
                        No
                    </th>

                    <th class="px-6 py-4">
                        Kelompok Umur
                    </th>

                    <th class="px-6 py-4">
                        Jumlah
                    </th>

                    <th class="px-6 py-4">
                        Urutan
                    </th>

                    <th class="px-6 py-4 text-right">
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody class="divide-y divide-slate-100">

                <?php foreach ($umur as $index => $item): ?>

                    <tr class="hover:bg-slate-50">

                        <td class="px-6 py-4">
                            <?= $index + 1 ?>
                        </td>

                        <td class="px-6 py-4 font-medium text-slate-800">
                            <?= e($item['kelompok_umur'] ?? '') ?>
                        </td>

                        <td class="px-6 py-4 font-semibold">
                            <?= e($item['jumlah'] ?? 0) ?>
                        </td>

                        <td class="px-6 py-4">
                            <?= e($item['urutan'] ?? 0) ?>
                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-end gap-2">

                                <button
                                    type="button"
                                    onclick='editUmur(<?= json_encode($item, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>)'
                                    class="rounded-lg bg-amber-100 px-3 py-2 text-xs font-semibold text-amber-700 hover:bg-amber-200"
                                >
                                    Edit
                                </button>


                                <form
                                    method="POST"
                                    action="<?= $baseUrl ?>/umur/delete/<?= (int) $item['id'] ?>"
                                    onsubmit="return confirm('Hapus data kelompok umur ini?')"
                                >

                                    <button
                                        type="submit"
                                        class="rounded-lg bg-red-100 px-3 py-2 text-xs font-semibold text-red-700 hover:bg-red-200"
                                    >
                                        Hapus
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                <?php endforeach; ?>


                <?php if (empty($umur)): ?>

                    <tr>

                        <td
                            colspan="5"
                            class="px-6 py-8 text-center text-sm text-slate-500"
                        >
                            Belum ada data kelompok umur.
                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>



<!-- =========================================================
     DATA RT
========================================================= -->

<div class="mb-8 rounded-2xl border border-slate-200 bg-white shadow-sm">

    <div class="border-b border-slate-200 px-6 py-5">

        <h2 class="font-bold text-slate-800">
            Data RT
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            Data ketua RT dan informasi jumlah penduduk setiap RT.
        </p>

    </div>


    <div class="grid grid-cols-1 gap-5 p-6 md:grid-cols-2 xl:grid-cols-3">

        <?php foreach ($rt as $item): ?>

            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white">

                <!-- FOTO -->

                <div class="aspect-[4/3] overflow-hidden bg-slate-100">

                    <?php if (!empty($item['foto'])): ?>

                        <img
                            src="/<?= e($item['foto']) ?>"
                            alt="Foto Ketua RT <?= e($item['nomor_rt'] ?? '') ?>"
                            class="h-full w-full object-cover"
                        >

                    <?php else: ?>

                        <div class="flex h-full items-center justify-center">

                            <div class="text-center">

                                <i class="fa-solid fa-user text-4xl text-slate-300"></i>

                                <p class="mt-2 text-sm text-slate-400">
                                    Belum ada foto
                                </p>

                            </div>

                        </div>

                    <?php endif; ?>

                </div>


                <!-- DATA RT -->

                <div class="p-5">

                    <div class="flex items-center justify-between">

                        <h3 class="text-lg font-bold text-slate-800">
                            RT <?= e($item['nomor_rt'] ?? '') ?>
                        </h3>


                        <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                            Aktif
                        </span>

                    </div>


                    <p class="mt-4 text-xs font-medium uppercase tracking-wide text-slate-400">
                        Ketua RT
                    </p>

                    <p class="mt-1 font-semibold text-slate-800">
                        <?= e($item['nama_ketua'] ?? '-') ?>
                    </p>


                    <div class="mt-4 grid grid-cols-2 gap-3">

                        <div class="rounded-xl bg-slate-50 p-3">

                            <p class="text-xs text-slate-500">
                                Jumlah KK
                            </p>

                            <p class="mt-1 text-lg font-bold text-slate-800">
                                <?= e($item['jumlah_kk'] ?? 0) ?>
                            </p>

                        </div>


                        <div class="rounded-xl bg-slate-50 p-3">

                            <p class="text-xs text-slate-500">
                                Penduduk
                            </p>

                            <p class="mt-1 text-lg font-bold text-slate-800">
                                <?= e($item['jumlah_penduduk'] ?? 0) ?>
                            </p>

                        </div>

                    </div>


                    <!--
                        Tombol edit RT akan kita aktifkan setelah
                        PendudukAdminController + RtModel mempunyai
                        method update RT dan upload foto.
                    -->

                    <button
                        type="button"
                        onclick='editRT(<?= json_encode($item, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>)'
                        class="mt-5 w-full rounded-xl bg-amber-100 px-4 py-2.5 text-sm font-semibold text-amber-700 transition hover:bg-amber-200"
                    >
                        Edit Data RT
                    </button>

                </div>

            </div>

        <?php endforeach; ?>


        <?php if (empty($rt)): ?>

            <div class="col-span-full rounded-2xl border border-dashed border-slate-300 p-8 text-center">

                <p class="text-sm text-slate-500">
                    Belum ada data RT aktif.
                </p>

            </div>

        <?php endif; ?>

    </div>

</div>



<!-- =========================================================
     MODAL TAMBAH REKAPITULASI
========================================================= -->

<div
    id="modalTambahRekapitulasi"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 p-4"
>

    <div class="w-full max-w-lg rounded-2xl bg-white shadow-xl">

        <div class="flex items-center justify-between border-b px-6 py-5">

            <div>

                <h3 class="font-bold text-slate-800">
                    Tambah Rekapitulasi
                </h3>

                <p class="mt-1 text-xs text-slate-500">
                    Tambahkan kategori rekapitulasi penduduk.
                </p>

            </div>


            <button
                type="button"
                onclick="closeModal('modalTambahRekapitulasi')"
                class="text-slate-400 hover:text-slate-700"
            >
                ✕
            </button>

        </div>


        <form
            method="POST"
            action="<?= $baseUrl ?>/rekapitulasi/store"
            class="space-y-5 p-6"
        >

            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Keterangan
                </label>

                <input
                    type="text"
                    name="keterangan"
                    required
                    placeholder="Contoh: Total Penduduk"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-green-600 focus:ring-2 focus:ring-green-100"
                >

            </div>


            <div class="grid grid-cols-2 gap-4">

                <div>

                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Laki-laki
                    </label>

                    <input
                        type="number"
                        name="laki_laki"
                        min="0"
                        value="0"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Perempuan
                    </label>

                    <input
                        type="number"
                        name="perempuan"
                        min="0"
                        value="0"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>

            </div>


            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Urutan
                </label>

                <input
                    type="number"
                    name="urutan"
                    min="0"
                    value="0"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

            </div>


            <div class="flex justify-end gap-3">

                <button
                    type="button"
                    onclick="closeModal('modalTambahRekapitulasi')"
                    class="rounded-xl border border-slate-300 px-5 py-2.5 text-sm font-semibold text-slate-600"
                >
                    Batal
                </button>


                <button
                    type="submit"
                    class="rounded-xl bg-green-700 px-5 py-2.5 text-sm font-semibold text-white hover:bg-green-800"
                >
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>



<!-- =========================================================
     MODAL EDIT REKAPITULASI
========================================================= -->

<div
    id="modalEditRekapitulasi"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 p-4"
>

    <div class="w-full max-w-lg rounded-2xl bg-white shadow-xl">

        <div class="flex items-center justify-between border-b px-6 py-5">

            <h3 class="font-bold text-slate-800">
                Edit Rekapitulasi
            </h3>


            <button
                type="button"
                onclick="closeModal('modalEditRekapitulasi')"
                class="text-slate-400 hover:text-slate-700"
            >
                ✕
            </button>

        </div>


        <form
            id="formEditRekapitulasi"
            method="POST"
            class="space-y-5 p-6"
        >

            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Keterangan
                </label>

                <input
                    type="text"
                    id="edit_rekap_keterangan"
                    name="keterangan"
                    required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

            </div>


            <div class="grid grid-cols-2 gap-4">

                <div>

                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Laki-laki
                    </label>

                    <input
                        type="number"
                        id="edit_rekap_laki"
                        name="laki_laki"
                        min="0"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Perempuan
                    </label>

                    <input
                        type="number"
                        id="edit_rekap_perempuan"
                        name="perempuan"
                        min="0"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>

            </div>


            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Urutan
                </label>

                <input
                    type="number"
                    id="edit_rekap_urutan"
                    name="urutan"
                    min="0"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

            </div>


            <div class="flex justify-end gap-3">

                <button
                    type="button"
                    onclick="closeModal('modalEditRekapitulasi')"
                    class="rounded-xl border border-slate-300 px-5 py-2.5 text-sm"
                >
                    Batal
                </button>


                <button
                    type="submit"
                    class="rounded-xl bg-green-700 px-5 py-2.5 text-sm font-semibold text-white"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>



<!-- =========================================================
     MODAL TAMBAH PEKERJAAN
========================================================= -->

<div
    id="modalTambahPekerjaan"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 p-4"
>

    <div class="w-full max-w-lg rounded-2xl bg-white shadow-xl">

        <div class="flex items-center justify-between border-b px-6 py-5">

            <h3 class="font-bold text-slate-800">
                Tambah Pekerjaan
            </h3>


            <button
                type="button"
                onclick="closeModal('modalTambahPekerjaan')"
                class="text-slate-400 hover:text-slate-700"
            >
                ✕
            </button>

        </div>


        <form
            method="POST"
            action="<?= $baseUrl ?>/pekerjaan/store"
            class="space-y-5 p-6"
        >

            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Pekerjaan
                </label>

                <input
                    type="text"
                    name="pekerjaan"
                    required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

            </div>


            <div class="grid grid-cols-2 gap-4">

                <div>

                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Laki-laki
                    </label>

                    <input
                        type="number"
                        name="laki_laki"
                        min="0"
                        value="0"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Perempuan
                    </label>

                    <input
                        type="number"
                        name="perempuan"
                        min="0"
                        value="0"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>

            </div>


            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Urutan
                </label>

                <input
                    type="number"
                    name="urutan"
                    min="0"
                    value="0"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

            </div>


            <div class="flex justify-end gap-3">

                <button
                    type="button"
                    onclick="closeModal('modalTambahPekerjaan')"
                    class="rounded-xl border border-slate-300 px-5 py-2.5"
                >
                    Batal
                </button>


                <button
                    type="submit"
                    class="rounded-xl bg-green-700 px-5 py-2.5 font-semibold text-white"
                >
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>



<!-- =========================================================
     MODAL EDIT PEKERJAAN
========================================================= -->

<div
    id="modalEditPekerjaan"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 p-4"
>

    <div class="w-full max-w-lg rounded-2xl bg-white shadow-xl">

        <div class="flex items-center justify-between border-b px-6 py-5">

            <h3 class="font-bold text-slate-800">
                Edit Pekerjaan
            </h3>


            <button
                type="button"
                onclick="closeModal('modalEditPekerjaan')"
                class="text-slate-400 hover:text-slate-700"
            >
                ✕
            </button>

        </div>


        <form
            id="formEditPekerjaan"
            method="POST"
            class="space-y-5 p-6"
        >

            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Pekerjaan
                </label>

                <input
                    type="text"
                    id="edit_pekerjaan"
                    name="pekerjaan"
                    required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

            </div>


            <div class="grid grid-cols-2 gap-4">

                <div>

                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Laki-laki
                    </label>

                    <input
                        type="number"
                        id="edit_pekerjaan_laki"
                        name="laki_laki"
                        min="0"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Perempuan
                    </label>

                    <input
                        type="number"
                        id="edit_pekerjaan_perempuan"
                        name="perempuan"
                        min="0"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>

            </div>


            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Urutan
                </label>

                <input
                    type="number"
                    id="edit_pekerjaan_urutan"
                    name="urutan"
                    min="0"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

            </div>


            <div class="flex justify-end gap-3">

                <button
                    type="button"
                    onclick="closeModal('modalEditPekerjaan')"
                    class="rounded-xl border border-slate-300 px-5 py-2.5"
                >
                    Batal
                </button>


                <button
                    type="submit"
                    class="rounded-xl bg-green-700 px-5 py-2.5 font-semibold text-white"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>



<!-- =========================================================
     MODAL TAMBAH PENDIDIKAN
========================================================= -->

<div
    id="modalTambahPendidikan"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 p-4"
>

    <div class="w-full max-w-lg rounded-2xl bg-white shadow-xl">

        <div class="flex items-center justify-between border-b px-6 py-5">

            <h3 class="font-bold text-slate-800">
                Tambah Pendidikan
            </h3>


            <button
                type="button"
                onclick="closeModal('modalTambahPendidikan')"
                class="text-slate-400 hover:text-slate-700"
            >
                ✕
            </button>

        </div>


        <form
            method="POST"
            action="<?= $baseUrl ?>/pendidikan/store"
            class="space-y-5 p-6"
        >

            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Pendidikan
                </label>

                <input
                    type="text"
                    name="pendidikan"
                    required
                    placeholder="Contoh: SMA / Sederajat"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

            </div>


            <div class="grid grid-cols-2 gap-4">

                <div>

                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Laki-laki
                    </label>

                    <input
                        type="number"
                        name="laki_laki"
                        min="0"
                        value="0"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Perempuan
                    </label>

                    <input
                        type="number"
                        name="perempuan"
                        min="0"
                        value="0"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>

            </div>


            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Urutan
                </label>

                <input
                    type="number"
                    name="urutan"
                    min="0"
                    value="0"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

            </div>


            <div class="flex justify-end gap-3">

                <button
                    type="button"
                    onclick="closeModal('modalTambahPendidikan')"
                    class="rounded-xl border border-slate-300 px-5 py-2.5"
                >
                    Batal
                </button>


                <button
                    type="submit"
                    class="rounded-xl bg-green-700 px-5 py-2.5 font-semibold text-white"
                >
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>



<!-- =========================================================
     MODAL EDIT PENDIDIKAN
========================================================= -->

<div
    id="modalEditPendidikan"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 p-4"
>

    <div class="w-full max-w-lg rounded-2xl bg-white shadow-xl">

        <div class="flex items-center justify-between border-b px-6 py-5">

            <h3 class="font-bold text-slate-800">
                Edit Pendidikan
            </h3>


            <button
                type="button"
                onclick="closeModal('modalEditPendidikan')"
                class="text-slate-400 hover:text-slate-700"
            >
                ✕
            </button>

        </div>


        <form
            id="formEditPendidikan"
            method="POST"
            class="space-y-5 p-6"
        >

            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Pendidikan
                </label>

                <input
                    type="text"
                    id="edit_pendidikan"
                    name="pendidikan"
                    required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

            </div>


            <div class="grid grid-cols-2 gap-4">

                <div>

                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Laki-laki
                    </label>

                    <input
                        type="number"
                        id="edit_pendidikan_laki"
                        name="laki_laki"
                        min="0"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Perempuan
                    </label>

                    <input
                        type="number"
                        id="edit_pendidikan_perempuan"
                        name="perempuan"
                        min="0"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>

            </div>


            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Urutan
                </label>

                <input
                    type="number"
                    id="edit_pendidikan_urutan"
                    name="urutan"
                    min="0"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

            </div>


            <div class="flex justify-end gap-3">

                <button
                    type="button"
                    onclick="closeModal('modalEditPendidikan')"
                    class="rounded-xl border border-slate-300 px-5 py-2.5"
                >
                    Batal
                </button>


                <button
                    type="submit"
                    class="rounded-xl bg-green-700 px-5 py-2.5 font-semibold text-white"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>



<!-- =========================================================
     MODAL KEPALA KELUARGA
========================================================= -->

<div
    id="modalKepalaKeluarga"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 p-4"
>

    <div class="w-full max-w-lg rounded-2xl bg-white shadow-xl">

        <div class="flex items-center justify-between border-b px-6 py-5">

            <h3 class="font-bold text-slate-800">
                Data Kepala Keluarga
            </h3>


            <button
                type="button"
                onclick="closeModal('modalKepalaKeluarga')"
                class="text-slate-400 hover:text-slate-700"
            >
                ✕
            </button>

        </div>


        <form
            method="POST"
            action="<?= $baseUrl ?>/kepala-keluarga/save"
            class="space-y-5 p-6"
        >

            <input
                type="hidden"
                id="kk_id"
                name="id"
                value=""
            >


            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    KK Bulan Lalu
                </label>

                <input
                    type="number"
                    id="kk_bulan_lalu"
                    name="kk_bulan_lalu"
                    min="0"
                    value="0"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

            </div>


            <div class="grid grid-cols-2 gap-4">

                <div>

                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Datang
                    </label>

                    <input
                        type="number"
                        id="kk_datang"
                        name="datang"
                        min="0"
                        value="0"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Pindah
                    </label>

                    <input
                        type="number"
                        id="kk_pindah"
                        name="pindah"
                        min="0"
                        value="0"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>

            </div>


            <div class="rounded-xl bg-slate-50 p-4">

                <p class="text-xs text-slate-500">
                    KK Bulan Ini
                </p>

                <p
                    id="previewKKBulanIni"
                    class="mt-1 text-2xl font-bold text-slate-800"
                >
                    0
                </p>

                <p class="mt-1 text-xs text-slate-400">
                    Otomatis dihitung: bulan lalu + datang - pindah.
                </p>

            </div>


            <div class="flex justify-end gap-3">

                <button
                    type="button"
                    onclick="closeModal('modalKepalaKeluarga')"
                    class="rounded-xl border border-slate-300 px-5 py-2.5"
                >
                    Batal
                </button>


                <button
                    type="submit"
                    class="rounded-xl bg-green-700 px-5 py-2.5 font-semibold text-white"
                >
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>



<!-- =========================================================
     MODAL TAMBAH KK PER RT
========================================================= -->

<div
    id="modalTambahKKPerRT"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 p-4"
>

    <div class="w-full max-w-lg rounded-2xl bg-white shadow-xl">

        <div class="flex items-center justify-between border-b px-6 py-5">

            <h3 class="font-bold text-slate-800">
                Tambah KK per RT
            </h3>


            <button
                type="button"
                onclick="closeModal('modalTambahKKPerRT')"
                class="text-slate-400 hover:text-slate-700"
            >
                ✕
            </button>

        </div>


        <form
            method="POST"
            action="<?= $baseUrl ?>/kk-per-rt/store"
            class="space-y-5 p-6"
        >

            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    RT
                </label>

                <select
                    name="rt"
                    required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

                    <option value="">
                        -- Pilih RT --
                    </option>

                    <?php foreach ($rt as $item): ?>

                        <option value="<?= e($item['nomor_rt'] ?? '') ?>">
                            RT <?= e($item['nomor_rt'] ?? '') ?>
                        </option>

                    <?php endforeach; ?>

                </select>

            </div>


            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Jumlah KK
                </label>

                <input
                    type="number"
                    name="jumlah_kk"
                    min="0"
                    value="0"
                    required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

            </div>


            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Urutan
                </label>

                <input
                    type="number"
                    name="urutan"
                    min="0"
                    value="0"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

            </div>


            <div class="flex justify-end gap-3">

                <button
                    type="button"
                    onclick="closeModal('modalTambahKKPerRT')"
                    class="rounded-xl border border-slate-300 px-5 py-2.5"
                >
                    Batal
                </button>


                <button
                    type="submit"
                    class="rounded-xl bg-green-700 px-5 py-2.5 font-semibold text-white"
                >
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>



<!-- =========================================================
     MODAL EDIT KK PER RT
========================================================= -->

<div
    id="modalEditKKPerRT"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 p-4"
>

    <div class="w-full max-w-lg rounded-2xl bg-white shadow-xl">

        <div class="flex items-center justify-between border-b px-6 py-5">

            <h3 class="font-bold text-slate-800">
                Edit KK per RT
            </h3>


            <button
                type="button"
                onclick="closeModal('modalEditKKPerRT')"
                class="text-slate-400 hover:text-slate-700"
            >
                ✕
            </button>

        </div>


        <form
            id="formEditKKPerRT"
            method="POST"
            class="space-y-5 p-6"
        >

            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    RT
                </label>

                <select
                    id="edit_kk_rt"
                    name="rt"
                    required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

                    <option value="">
                        -- Pilih RT --
                    </option>

                    <?php foreach ($rt as $item): ?>

                        <option value="<?= e($item['nomor_rt'] ?? '') ?>">
                            RT <?= e($item['nomor_rt'] ?? '') ?>
                        </option>

                    <?php endforeach; ?>

                </select>

            </div>


            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Jumlah KK
                </label>

                <input
                    type="number"
                    id="edit_kk_jumlah"
                    name="jumlah_kk"
                    min="0"
                    required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

            </div>


            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Urutan
                </label>

                <input
                    type="number"
                    id="edit_kk_urutan"
                    name="urutan"
                    min="0"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

            </div>


            <div class="flex justify-end gap-3">

                <button
                    type="button"
                    onclick="closeModal('modalEditKKPerRT')"
                    class="rounded-xl border border-slate-300 px-5 py-2.5"
                >
                    Batal
                </button>


                <button
                    type="submit"
                    class="rounded-xl bg-green-700 px-5 py-2.5 font-semibold text-white"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>



<!-- =========================================================
     MODAL TAMBAH PENDUDUK PER RT
========================================================= -->

<div
    id="modalTambahPendudukPerRT"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 p-4"
>

    <div class="w-full max-w-lg rounded-2xl bg-white shadow-xl">

        <div class="flex items-center justify-between border-b px-6 py-5">

            <h3 class="font-bold text-slate-800">
                Tambah Penduduk per RT
            </h3>


            <button
                type="button"
                onclick="closeModal('modalTambahPendudukPerRT')"
                class="text-slate-400 hover:text-slate-700"
            >
                ✕
            </button>

        </div>


        <form
            method="POST"
            action="<?= $baseUrl ?>/penduduk-per-rt/store"
            class="space-y-5 p-6"
        >

            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    RT
                </label>

                <select
                    name="rt"
                    required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

                    <option value="">
                        -- Pilih RT --
                    </option>

                    <?php foreach ($rt as $item): ?>

                        <option value="<?= e($item['nomor_rt'] ?? '') ?>">
                            RT <?= e($item['nomor_rt'] ?? '') ?>
                        </option>

                    <?php endforeach; ?>

                </select>

            </div>


            <div class="grid grid-cols-2 gap-4">

                <div>

                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Laki-laki
                    </label>

                    <input
                        type="number"
                        name="laki_laki"
                        min="0"
                        value="0"
                        required
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Perempuan
                    </label>

                    <input
                        type="number"
                        name="perempuan"
                        min="0"
                        value="0"
                        required
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>

            </div>


            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Urutan
                </label>

                <input
                    type="number"
                    name="urutan"
                    min="0"
                    value="0"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

            </div>


            <div class="flex justify-end gap-3">

                <button
                    type="button"
                    onclick="closeModal('modalTambahPendudukPerRT')"
                    class="rounded-xl border border-slate-300 px-5 py-2.5"
                >
                    Batal
                </button>


                <button
                    type="submit"
                    class="rounded-xl bg-green-700 px-5 py-2.5 font-semibold text-white"
                >
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>



<!-- =========================================================
     MODAL EDIT PENDUDUK PER RT
========================================================= -->

<div
    id="modalEditPendudukPerRT"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 p-4"
>

    <div class="w-full max-w-lg rounded-2xl bg-white shadow-xl">

        <div class="flex items-center justify-between border-b px-6 py-5">

            <h3 class="font-bold text-slate-800">
                Edit Penduduk per RT
            </h3>


            <button
                type="button"
                onclick="closeModal('modalEditPendudukPerRT')"
                class="text-slate-400 hover:text-slate-700"
            >
                ✕
            </button>

        </div>


        <form
            id="formEditPendudukPerRT"
            method="POST"
            class="space-y-5 p-6"
        >

            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    RT
                </label>

                <select
                    id="edit_penduduk_rt"
                    name="rt"
                    required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

                    <option value="">
                        -- Pilih RT --
                    </option>

                    <?php foreach ($rt as $item): ?>

                        <option value="<?= e($item['nomor_rt'] ?? '') ?>">
                            RT <?= e($item['nomor_rt'] ?? '') ?>
                        </option>

                    <?php endforeach; ?>

                </select>

            </div>


            <div class="grid grid-cols-2 gap-4">

                <div>

                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Laki-laki
                    </label>

                    <input
                        type="number"
                        id="edit_penduduk_laki"
                        name="laki_laki"
                        min="0"
                        required
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Perempuan
                    </label>

                    <input
                        type="number"
                        id="edit_penduduk_perempuan"
                        name="perempuan"
                        min="0"
                        required
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>

            </div>


            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Urutan
                </label>

                <input
                    type="number"
                    id="edit_penduduk_urutan"
                    name="urutan"
                    min="0"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

            </div>


            <div class="flex justify-end gap-3">

                <button
                    type="button"
                    onclick="closeModal('modalEditPendudukPerRT')"
                    class="rounded-xl border border-slate-300 px-5 py-2.5"
                >
                    Batal
                </button>


                <button
                    type="submit"
                    class="rounded-xl bg-green-700 px-5 py-2.5 font-semibold text-white"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>



<!-- =========================================================
     MODAL TAMBAH UMUR
========================================================= -->

<div
    id="modalTambahUmur"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 p-4"
>

    <div class="w-full max-w-lg rounded-2xl bg-white shadow-xl">

        <div class="flex items-center justify-between border-b px-6 py-5">

            <h3 class="font-bold text-slate-800">
                Tambah Kelompok Umur
            </h3>


            <button
                type="button"
                onclick="closeModal('modalTambahUmur')"
                class="text-slate-400 hover:text-slate-700"
            >
                ✕
            </button>

        </div>


        <form
            method="POST"
            action="<?= $baseUrl ?>/umur/store"
            class="space-y-5 p-6"
        >

            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Kelompok Umur
                </label>

                <input
                    type="text"
                    name="kelompok_umur"
                    required
                    placeholder="Contoh: 0 - 5 Tahun"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

            </div>


            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Jumlah
                </label>

                <input
                    type="number"
                    name="jumlah"
                    min="0"
                    value="0"
                    required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

            </div>


            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Urutan
                </label>

                <input
                    type="number"
                    name="urutan"
                    min="0"
                    value="0"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

            </div>


            <div class="flex justify-end gap-3">

                <button
                    type="button"
                    onclick="closeModal('modalTambahUmur')"
                    class="rounded-xl border border-slate-300 px-5 py-2.5"
                >
                    Batal
                </button>


                <button
                    type="submit"
                    class="rounded-xl bg-green-700 px-5 py-2.5 font-semibold text-white"
                >
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>



<!-- =========================================================
     MODAL EDIT UMUR
========================================================= -->

<div
    id="modalEditUmur"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 p-4"
>

    <div class="w-full max-w-lg rounded-2xl bg-white shadow-xl">

        <div class="flex items-center justify-between border-b px-6 py-5">

            <h3 class="font-bold text-slate-800">
                Edit Kelompok Umur
            </h3>


            <button
                type="button"
                onclick="closeModal('modalEditUmur')"
                class="text-slate-400 hover:text-slate-700"
            >
                ✕
            </button>

        </div>


        <form
            id="formEditUmur"
            method="POST"
            class="space-y-5 p-6"
        >

            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Kelompok Umur
                </label>

                <input
                    type="text"
                    id="edit_umur_kelompok"
                    name="kelompok_umur"
                    required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

            </div>


            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Jumlah
                </label>

                <input
                    type="number"
                    id="edit_umur_jumlah"
                    name="jumlah"
                    min="0"
                    required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

            </div>


            <div>

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Urutan
                </label>

                <input
                    type="number"
                    id="edit_umur_urutan"
                    name="urutan"
                    min="0"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

            </div>


            <div class="flex justify-end gap-3">

                <button
                    type="button"
                    onclick="closeModal('modalEditUmur')"
                    class="rounded-xl border border-slate-300 px-5 py-2.5"
                >
                    Batal
                </button>


                <button
                    type="submit"
                    class="rounded-xl bg-green-700 px-5 py-2.5 font-semibold text-white"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

<!-- MODAL EDIT DATA RT -->
<div
    id="modalEditRT"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 p-4"
>
    <div class="w-full max-w-lg rounded-2xl bg-white shadow-xl">

        <div class="flex items-center justify-between border-b px-6 py-5">
            <div>
                <h3 class="font-bold text-slate-800">
                    Edit Data RT
                </h3>

                <p class="mt-1 text-xs text-slate-500">
                    Ubah data Ketua RT.
                </p>
            </div>

            <button
                type="button"
                onclick="closeModal('modalEditRT')"
                class="text-slate-400 hover:text-slate-700"
            >
                ✕
            </button>
        </div>


        <form
            id="formEditRT"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-5 p-6"
        >

            <div>
                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Nomor RT
                </label>

                <input
                    type="text"
                    id="edit_rt_nomor"
                    name="nomor_rt"
                    readonly
                    class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3"
                >
            </div>


            <div>
                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Nama Ketua RT
                </label>

                <input
                    type="text"
                    id="edit_rt_ketua"
                    name="nama_ketua"
                    required
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    placeholder="Masukkan nama Ketua RT"
                >
            </div>


            <div>
                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Foto Ketua RT
                </label>

                <input
                    type="file"
                    id="foto_1"
                    name="foto_1"
                    accept=".jpg,.jpeg,.png,.webp"
                    class="block w-full rounded-xl
                            border border-slate-300
                            bg-white text-sm text-slate-600
                            file:mr-4 file:border-0
                            file:bg-green-900
                            file:px-4 file:py-3
                            file:text-sm
                            file:font-semibold
                            file:text-white
                            hover:file:bg-green-800"
                >

                <p class="mt-2 text-xs text-slate-400">
                    Kosongkan jika tidak ingin mengganti foto.
                </p>
            </div>


            <div class="flex justify-end gap-3 pt-2">

                <button
                    type="button"
                    onclick="closeModal('modalEditRT')"
                    class="rounded-xl border border-slate-300 px-4 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-50"
                >
                    Batal
                </button>

                <button
                    type="submit"
                    class="rounded-xl bg-green-700 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-green-800"
                >
                    Simpan
                </button>

            </div>

        </form>

    </div>
</div>



<!-- =========================================================
     JAVASCRIPT
========================================================= -->

<script>

function openModal(id)
{
    const modal = document.getElementById(id);

    if (!modal) {
        return;
    }

    modal.classList.remove('hidden');
    modal.classList.add('flex');

    document.body.classList.add('overflow-hidden');
}


function closeModal(id)
{
    const modal = document.getElementById(id);

    if (!modal) {
        return;
    }

    modal.classList.add('hidden');
    modal.classList.remove('flex');

    document.body.classList.remove('overflow-hidden');
}


/*
|--------------------------------------------------------------------------
| TUTUP MODAL KLIK BACKDROP
|--------------------------------------------------------------------------
*/

document.addEventListener('click', function (event)
{
    if (!event.target.classList.contains('fixed')) {
        return;
    }

    if (!event.target.classList.contains('inset-0')) {
        return;
    }

    if (!event.target.classList.contains('bg-black/50')) {
        return;
    }

    event.target.classList.add('hidden');
    event.target.classList.remove('flex');

    document.body.classList.remove('overflow-hidden');
});


/*
|--------------------------------------------------------------------------
| REKAPITULASI
|--------------------------------------------------------------------------
*/

function editRekapitulasi(data)
{
    document.getElementById('edit_rekap_keterangan').value =
        data.keterangan ?? '';

    document.getElementById('edit_rekap_laki').value =
        data.laki_laki ?? 0;

    document.getElementById('edit_rekap_perempuan').value =
        data.perempuan ?? 0;

    document.getElementById('edit_rekap_urutan').value =
        data.urutan ?? 0;

    document.getElementById('formEditRekapitulasi').action =
        '<?= $baseUrl ?>/rekapitulasi/update/' + data.id;

    openModal('modalEditRekapitulasi');
}


/*
|--------------------------------------------------------------------------
| PEKERJAAN
|--------------------------------------------------------------------------
*/

function editPekerjaan(data)
{
    document.getElementById('edit_pekerjaan').value =
        data.pekerjaan ?? '';

    document.getElementById('edit_pekerjaan_laki').value =
        data.laki_laki ?? 0;

    document.getElementById('edit_pekerjaan_perempuan').value =
        data.perempuan ?? 0;

    document.getElementById('edit_pekerjaan_urutan').value =
        data.urutan ?? 0;

    document.getElementById('formEditPekerjaan').action =
        '<?= $baseUrl ?>/pekerjaan/update/' + data.id;

    openModal('modalEditPekerjaan');
}


/*
|--------------------------------------------------------------------------
| PENDIDIKAN
|--------------------------------------------------------------------------
*/

function editPendidikan(data)
{
    document.getElementById('edit_pendidikan').value =
        data.pendidikan ?? '';

    document.getElementById('edit_pendidikan_laki').value =
        data.laki_laki ?? 0;

    document.getElementById('edit_pendidikan_perempuan').value =
        data.perempuan ?? 0;

    document.getElementById('edit_pendidikan_urutan').value =
        data.urutan ?? 0;

    document.getElementById('formEditPendidikan').action =
        '<?= $baseUrl ?>/pendidikan/update/' + data.id;

    openModal('modalEditPendidikan');
}


/*
|--------------------------------------------------------------------------
| KEPALA KELUARGA
|--------------------------------------------------------------------------
*/

function editKepalaKeluarga(data)
{
    data = data || {};

    document.getElementById('kk_id').value =
        data.id ?? '';

    document.getElementById('kk_bulan_lalu').value =
        data.kk_bulan_lalu ?? 0;

    document.getElementById('kk_datang').value =
        data.datang ?? 0;

    document.getElementById('kk_pindah').value =
        data.pindah ?? 0;

    updatePreviewKK();

    openModal('modalKepalaKeluarga');
}


function updatePreviewKK()
{
    const bulanLalu =
        parseInt(
            document.getElementById('kk_bulan_lalu').value
        ) || 0;

    const datang =
        parseInt(
            document.getElementById('kk_datang').value
        ) || 0;

    const pindah =
        parseInt(
            document.getElementById('kk_pindah').value
        ) || 0;

    let hasil = bulanLalu + datang - pindah;

    if (hasil < 0) {
        hasil = 0;
    }

    document.getElementById('previewKKBulanIni').textContent =
        hasil;
}


document
    .getElementById('kk_bulan_lalu')
    ?.addEventListener(
        'input',
        updatePreviewKK
    );

document
    .getElementById('kk_datang')
    ?.addEventListener(
        'input',
        updatePreviewKK
    );

document
    .getElementById('kk_pindah')
    ?.addEventListener(
        'input',
        updatePreviewKK
    );


/*
|--------------------------------------------------------------------------
| KK PER RT
|--------------------------------------------------------------------------
*/

function editKKPerRT(data)
{
    document.getElementById('edit_kk_rt').value =
        data.rt ?? '';

    document.getElementById('edit_kk_jumlah').value =
        data.jumlah_kk ?? 0;

    document.getElementById('edit_kk_urutan').value =
        data.urutan ?? 0;

    document.getElementById('formEditKKPerRT').action =
        '<?= $baseUrl ?>/kk-per-rt/update/' + data.id;

    openModal('modalEditKKPerRT');
}


/*
|--------------------------------------------------------------------------
| PENDUDUK PER RT
|--------------------------------------------------------------------------
*/

function editPendudukPerRT(data)
{
    document.getElementById('edit_penduduk_rt').value =
        data.rt ?? '';

    document.getElementById('edit_penduduk_laki').value =
        data.laki_laki ?? 0;

    document.getElementById('edit_penduduk_perempuan').value =
        data.perempuan ?? 0;

    document.getElementById('edit_penduduk_urutan').value =
        data.urutan ?? 0;

    document.getElementById('formEditPendudukPerRT').action =
        '<?= $baseUrl ?>/penduduk-per-rt/update/' + data.id;

    openModal('modalEditPendudukPerRT');
}


/*
|--------------------------------------------------------------------------
| UMUR
|--------------------------------------------------------------------------
*/

function editUmur(data)
{
    document.getElementById('edit_umur_kelompok').value =
        data.kelompok_umur ?? '';

    document.getElementById('edit_umur_jumlah').value =
        data.jumlah ?? 0;

    document.getElementById('edit_umur_urutan').value =
        data.urutan ?? 0;

    document.getElementById('formEditUmur').action =
        '<?= $baseUrl ?>/umur/update/' + data.id;

    openModal('modalEditUmur');
}


/*
|--------------------------------------------------------------------------
| DATA RT
|--------------------------------------------------------------------------
*/

function editRT(data)
{
    document.getElementById('edit_rt_nomor').value =
        data.nomor_rt ?? '';

    document.getElementById('edit_rt_ketua').value =
        data.nama_ketua ?? '';

    document.getElementById('formEditRT').action =
        '<?= $baseUrl ?>/rt/update/' + data.id;

    openModal('modalEditRT');
}


/*
|--------------------------------------------------------------------------
| ESC UNTUK TUTUP MODAL
|--------------------------------------------------------------------------
*/

document.addEventListener('keydown', function (event)
{
    if (event.key !== 'Escape') {
        return;
    }

    document
        .querySelectorAll('[id^="modal"]')
        .forEach(function (modal)
        {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });

    document.body.classList.remove('overflow-hidden');
});

</script>