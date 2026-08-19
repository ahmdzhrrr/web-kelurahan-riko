<!-- ========================================
     INFOGRAFIS PENDUDUK
======================================== -->

<section class="bg-slate-50 py-16">

    <div class="mx-auto max-w-7xl px-6">

        <!-- Header -->
        <div class="mb-12 text-center">

            <h1 class="mt-2 text-3xl font-bold text-green-900 sm:text-4xl">
                Infografis Kelurahan Riko
            </h1>

            <p class="mx-auto mt-4 max-w-2xl text-slate-600">
                Informasi statistik penduduk Kelurahan Riko berdasarkan
                pekerjaan, pendidikan, umur, dan wilayah RT.
            </p>

        </div>


        <!-- ========================================
             STATISTIK UTAMA
        ======================================== -->

        <?php
        $totalPenduduk = 0;
        $totalLaki = 0;
        $totalPerempuan = 0;

        if (!empty($rekapitulasi)) {
            foreach ($rekapitulasi as $item) {

                if (
                    strtolower($item['keterangan']) === 'penduduk awal'
                ) {
                    $totalLaki = (int) $item['laki_laki'];
                    $totalPerempuan = (int) $item['perempuan'];
                    $totalPenduduk = (int) $item['jumlah'];

                    break;
                }
            }
        }

        $totalKK = (int) ($kepalaKeluarga['kk_bulan_ini'] ?? 0);
        ?>


        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">

            <!-- Total Penduduk -->
            <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">

                <div class="flex items-center justify-between">

                    <div>
                        <p class="text-sm font-medium text-slate-500">
                            Total Penduduk
                        </p>

                        <p class="mt-2 text-3xl font-bold text-green-800">
                            <?= number_format($totalPenduduk, 0, ',', '.') ?>
                        </p>

                        <p class="mt-1 text-xs text-slate-500">
                            Jiwa
                        </p>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 text-green-700">

                        <i class="fa-solid fa-users text-xl"></i>

                    </div>

                </div>

            </div>


            <!-- Kepala Keluarga -->
            <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Kepala Keluarga
                        </p>

                        <p class="mt-2 text-3xl font-bold text-green-800">
                            <?= number_format($totalKK, 0, ',', '.') ?>
                        </p>

                        <p class="mt-1 text-xs text-slate-500">
                            KK
                        </p>

                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 text-green-700">

                        <i class="fa-solid fa-house-user text-xl"></i>

                    </div>

                </div>

            </div>


            <!-- Laki-laki -->
            <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Laki-laki
                        </p>

                        <p class="mt-2 text-3xl font-bold text-green-800">
                            <?= number_format($totalLaki, 0, ',', '.') ?>
                        </p>

                        <p class="mt-1 text-xs text-slate-500">
                            Jiwa
                        </p>

                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 text-green-700">

                        <i class="fa-solid fa-person text-xl"></i>

                    </div>

                </div>

            </div>


            <!-- Perempuan -->
            <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Perempuan
                        </p>

                        <p class="mt-2 text-3xl font-bold text-green-800">
                            <?= number_format($totalPerempuan, 0, ',', '.') ?>
                        </p>

                        <p class="mt-1 text-xs text-slate-500">
                            Jiwa
                        </p>

                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 text-green-700">

                        <i class="fa-solid fa-person-dress text-xl"></i>

                    </div>

                </div>

            </div>

        </div>


        <!-- ========================================
             REKAPITULASI PENDUDUK
        ======================================== -->

        <div class="mt-10 rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">

            <div class="mb-6">

                <h2 class="text-xl font-bold text-green-900">
                    Rekapitulasi Jumlah Penduduk
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Perubahan jumlah penduduk pada bulan berjalan.
                </p>

            </div>


            <div class="overflow-x-auto">

                <table class="w-full text-sm">

                    <thead>

                        <tr class="border-b border-slate-200 text-left">

                            <th class="px-4 py-3 font-semibold text-slate-600">
                                Keterangan
                            </th>

                            <th class="px-4 py-3 text-center font-semibold text-slate-600">
                                Laki-laki
                            </th>

                            <th class="px-4 py-3 text-center font-semibold text-slate-600">
                                Perempuan
                            </th>

                            <th class="px-4 py-3 text-center font-semibold text-slate-600">
                                Jumlah
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach ($rekapitulasi as $item): ?>

                            <tr class="border-b border-slate-100">

                                <td class="px-4 py-3 font-medium text-slate-700">
                                    <?= e($item['keterangan']) ?>
                                </td>

                                <td class="px-4 py-3 text-center">
                                    <?= number_format((int) $item['laki_laki'], 0, ',', '.') ?>
                                </td>

                                <td class="px-4 py-3 text-center">
                                    <?= number_format((int) $item['perempuan'], 0, ',', '.') ?>
                                </td>

                                <td class="px-4 py-3 text-center font-semibold text-green-800">
                                    <?= number_format((int) $item['jumlah'], 0, ',', '.') ?>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>


        <!-- ========================================
             PEKERJAAN & PENDIDIKAN
        ======================================== -->

        <div class="mt-10 grid grid-cols-1 gap-8 lg:grid-cols-2">


            <!-- PEKERJAAN -->

            <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">

                <div class="mb-6">

                    <h2 class="text-xl font-bold text-green-900">
                        Penduduk Berdasarkan Pekerjaan
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Distribusi penduduk berdasarkan pekerjaan.
                    </p>

                </div>


                <div class="overflow-x-auto">

                    <table class="w-full text-sm">

                        <thead>

                            <tr class="border-b border-slate-200">

                                <th class="px-3 py-3 text-left">
                                    Pekerjaan
                                </th>

                                <th class="px-3 py-3 text-center">
                                    L
                                </th>

                                <th class="px-3 py-3 text-center">
                                    P
                                </th>

                                <th class="px-3 py-3 text-center">
                                    Jumlah
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php foreach ($pekerjaan as $item): ?>

                                <tr class="border-b border-slate-100">

                                    <td class="px-3 py-3">
                                        <?= e($item['pekerjaan']) ?>
                                    </td>

                                    <td class="px-3 py-3 text-center">
                                        <?= number_format((int) $item['laki_laki'], 0, ',', '.') ?>
                                    </td>

                                    <td class="px-3 py-3 text-center">
                                        <?= number_format((int) $item['perempuan'], 0, ',', '.') ?>
                                    </td>

                                    <td class="px-3 py-3 text-center font-semibold text-green-800">
                                        <?= number_format((int) $item['jumlah'], 0, ',', '.') ?>
                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            </div>


            <!-- PENDIDIKAN -->

            <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">

                <div class="mb-6">

                    <h2 class="text-xl font-bold text-green-900">
                        Penduduk Berdasarkan Pendidikan
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Tingkat pendidikan penduduk Kelurahan Riko.
                    </p>

                </div>


                <div class="overflow-x-auto">

                    <table class="w-full text-sm">

                        <thead>

                            <tr class="border-b border-slate-200">

                                <th class="px-3 py-3 text-left">
                                    Pendidikan
                                </th>

                                <th class="px-3 py-3 text-center">
                                    L
                                </th>

                                <th class="px-3 py-3 text-center">
                                    P
                                </th>

                                <th class="px-3 py-3 text-center">
                                    Jumlah
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php foreach ($pendidikan as $item): ?>

                                <tr class="border-b border-slate-100">

                                    <td class="px-3 py-3">
                                        <?= e($item['pendidikan']) ?>
                                    </td>

                                    <td class="px-3 py-3 text-center">
                                        <?= number_format((int) $item['laki_laki'], 0, ',', '.') ?>
                                    </td>

                                    <td class="px-3 py-3 text-center">
                                        <?= number_format((int) $item['perempuan'], 0, ',', '.') ?>
                                    </td>

                                    <td class="px-3 py-3 text-center font-semibold text-green-800">
                                        <?= number_format((int) $item['jumlah'], 0, ',', '.') ?>
                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>


        <!-- ========================================
             DATA RT
        ======================================== -->

        <div class="mt-10 grid grid-cols-1 gap-8 lg:grid-cols-2">


            <!-- KK PER RT -->

            <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">

                <h2 class="mb-6 text-xl font-bold text-green-900">
                    Jumlah Kepala Keluarga per RT
                </h2>

                <div class="overflow-x-auto">

                    <table class="w-full text-sm">

                        <thead>

                            <tr class="border-b border-slate-200">

                                <th class="px-4 py-3 text-left">
                                    RT
                                </th>

                                <th class="px-4 py-3 text-right">
                                    Jumlah KK
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php foreach ($kkPerRT as $item): ?>

                                <tr class="border-b border-slate-100">

                                    <td class="px-4 py-3 font-medium">
                                        RT <?= e($item['rt']) ?>
                                    </td>

                                    <td class="px-4 py-3 text-right font-semibold text-green-800">
                                        <?= number_format((int) $item['jumlah_kk'], 0, ',', '.') ?>
                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            </div>


            <!-- PENDUDUK PER RT -->

            <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">

                <h2 class="mb-6 text-xl font-bold text-green-900">
                    Jumlah Penduduk per RT
                </h2>

                <div class="overflow-x-auto">

                    <table class="w-full text-sm">

                        <thead>

                            <tr class="border-b border-slate-200">

                                <th class="px-3 py-3 text-left">
                                    RT
                                </th>

                                <th class="px-3 py-3 text-center">
                                    L
                                </th>

                                <th class="px-3 py-3 text-center">
                                    P
                                </th>

                                <th class="px-3 py-3 text-center">
                                    Jumlah
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php foreach ($pendudukPerRT as $item): ?>

                                <tr class="border-b border-slate-100">

                                    <td class="px-3 py-3 font-medium">
                                        RT <?= e($item['rt']) ?>
                                    </td>

                                    <td class="px-3 py-3 text-center">
                                        <?= number_format((int) $item['laki_laki'], 0, ',', '.') ?>
                                    </td>

                                    <td class="px-3 py-3 text-center">
                                        <?= number_format((int) $item['perempuan'], 0, ',', '.') ?>
                                    </td>

                                    <td class="px-3 py-3 text-center font-semibold text-green-800">
                                        <?= number_format((int) $item['jumlah'], 0, ',', '.') ?>
                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>


         <!-- ========================================
             KEPALA KELUARGA
        ======================================== -->

        <?php if (!empty($kepalaKeluarga)): ?>

            <div class="mt-10 rounded-2xl bg-green-900 p-8 text-white">

                <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">

                    <div>

                        <p class="text-sm font-medium text-green-200">
                            Jumlah Kepala Keluarga
                        </p>

                        <h2 class="mt-2 text-4xl font-bold">
                            <?= number_format(
                                (int) $kepalaKeluarga['kk_bulan_ini'],
                                0,
                                ',',
                                '.'
                            ) ?>
                            <span class="text-lg font-medium text-green-200">
                                KK
                            </span>
                        </h2>

                        <p class="mt-2 text-sm text-green-200">
                            Data KK bulan ini
                        </p>

                    </div>

                    <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-white/10">

                        <i class="fa-solid fa-house-user text-3xl"></i>

                    </div>

                </div>

            </div>

        <?php endif; ?>


        <!-- ========================================
             KELOMPOK UMUR
        ======================================== -->

        <div class="mt-10 rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">

            <div class="mb-6">

                <h2 class="text-xl font-bold text-green-900">
                    Penduduk Berdasarkan Kelompok Umur
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Distribusi penduduk berdasarkan kelompok usia.
                </p>

            </div>


            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-6">

                <?php foreach ($umur as $item): ?>

                    <div class="rounded-xl bg-green-50 p-5 text-center">

                        <div class="text-sm font-medium text-slate-600">
                            <?= e($item['kelompok_umur']) ?>
                        </div>

                        <div class="mt-3 text-2xl font-bold text-green-800">
                            <?= number_format((int) $item['jumlah'], 0, ',', '.') ?>
                        </div>

                        <div class="mt-1 text-xs text-slate-500">
                            Jiwa
                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>


        <section class="mt-16">

            <div class="mb-10 text-center">

                <h2 class="text-3xl font-bold text-green-900 sm:text-4xl">
                    Ketua RT Kelurahan Riko
                </h2>

                <p class="mx-auto mt-4 max-w-2xl text-slate-600">
                    Daftar Ketua RT yang berada di wilayah Kelurahan Riko.
                </p>

            </div>


            <?php if (!empty($rt)): ?>

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">

                    <?php foreach ($rt as $item): ?>

                        <article
                            class="overflow-hidden rounded-2xl bg-white
                                shadow-md ring-1 ring-slate-200
                                transition duration-300
                                hover:-translate-y-1 hover:shadow-xl"
                        >

                            <!-- Foto -->
                            <div class="aspect-[4/3] overflow-hidden bg-slate-100">

                                <?php if (!empty($item['foto'])): ?>

                                    <img
                                        src="/<?= e(ltrim($item['foto'], '/')) ?>"
                                        alt="Ketua RT <?= e($item['nomor_rt']) ?>"
                                        class="h-full w-full object-cover"
                                    >

                                <?php else: ?>

                                    <div class="flex h-full items-center justify-center">

                                        <i class="fa-solid fa-user text-6xl text-slate-300"></i>

                                    </div>

                                <?php endif; ?>

                            </div>


                            <!-- Informasi -->
                            <div class="p-5">

                                <p class="text-sm font-semibold text-green-700">
                                    RT <?= e($item['nomor_rt']) ?>
                                </p>

                                <h3 class="mt-1 text-xl font-bold text-slate-900">
                                    <?= e($item['nama_ketua']) ?>
                                </h3>


                                <div class="mt-4 grid grid-cols-2 gap-3">

                                    <div class="rounded-xl bg-green-50 p-3">

                                        <p class="text-xs text-slate-500">
                                            Kepala Keluarga
                                        </p>

                                        <p class="mt-1 font-bold text-green-800">
                                            <?= e($item['jumlah_kk']) ?>
                                        </p>

                                    </div>


                                    <div class="rounded-xl bg-green-50 p-3">

                                        <p class="text-xs text-slate-500">
                                            Penduduk
                                        </p>

                                        <p class="mt-1 font-bold text-green-800">
                                            <?= e($item['jumlah_penduduk']) ?>
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </article>

                    <?php endforeach; ?>

                </div>

            <?php else: ?>

                <div class="rounded-2xl bg-white p-10 text-center shadow ring-1 ring-slate-200">

                    <i class="fa-solid fa-users text-4xl text-slate-300"></i>

                    <p class="mt-4 text-slate-500">
                        Data Ketua RT belum tersedia.
                    </p>

                </div>

            <?php endif; ?>

        </section>

    </div>

</section>