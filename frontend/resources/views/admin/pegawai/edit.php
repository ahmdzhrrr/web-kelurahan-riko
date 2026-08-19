<?php

$pegawai = $pegawai ?? [];

$jabatan = $jabatan ?? [];

$unit_organisasi = $unit_organisasi ?? [];

?>

<div class="max-w-5xl">

    <!-- Header -->

    <div class="mb-8">

        <a
            href="/superadmin/pegawai"
            class="mb-4 inline-flex items-center gap-2
                   text-sm text-slate-500
                   hover:text-green-800"
        >

            <i class="fa-solid fa-arrow-left"></i>

            Kembali ke Pegawai

        </a>


        <h1 class="text-2xl font-bold text-slate-800">
            Edit Pegawai
        </h1>

        <p class="mt-2 text-sm text-slate-500">
            Perbarui informasi pegawai.
        </p>

    </div>


    <form
        action="/superadmin/pegawai/update/<?= (int) $pegawai['id'] ?>"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-6"
    >

        <!-- DATA -->

        <section
            class="rounded-2xl bg-white p-6
                   shadow-sm ring-1 ring-slate-200"
        >

            <div class="mb-6">

                <h2 class="text-lg font-bold text-green-800">
                    Data Pegawai
                </h2>

            </div>


            <div class="grid gap-5 md:grid-cols-2">

                <!-- Nama -->

                <div class="md:col-span-2">

                    <label
                        for="nama"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        required
                        value="<?= e($pegawai['nama'] ?? '') ?>"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    >

                </div>


                <!-- Jabatan -->

                <div>

                    <label
                        for="jabatan_id"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Jabatan
                    </label>

                    <select
                        id="jabatan_id"
                        name="jabatan_id"
                        required
                        class="w-full rounded-xl border border-slate-300
                               bg-white px-4 py-3 text-sm"
                    >

                        <option value="">
                            -- Pilih Jabatan --
                        </option>

                        <?php foreach ($jabatan as $item): ?>

                            <option
                                value="<?= (int) $item['id'] ?>"
                                <?= (int) $pegawai['jabatan_id'] === (int) $item['id']
                                    ? 'selected'
                                    : ''
                                ?>
                            >

                                <?= e($item['nama']) ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>


                <!-- Unit -->

                <div>

                    <label
                        for="unit_organisasi_id"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Unit Organisasi
                    </label>

                    <select
                        id="unit_organisasi_id"
                        name="unit_organisasi_id"
                        required
                        class="w-full rounded-xl border border-slate-300
                               bg-white px-4 py-3 text-sm"
                    >

                        <option value="">
                            -- Pilih Unit Organisasi --
                        </option>

                        <?php foreach ($unit_organisasi as $item): ?>

                            <option
                                value="<?= (int) $item['id'] ?>"
                                <?= (int) $pegawai['unit_organisasi_id'] === (int) $item['id']
                                    ? 'selected'
                                    : ''
                                ?>
                            >

                                <?= e($item['nama']) ?>

                                <?php if (!empty($item['tipe'])): ?>
                                    (<?= e($item['tipe']) ?>)
                                <?php endif; ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>


                <!-- NIP -->

                <div>

                    <label
                        for="nip"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        NIP
                    </label>

                    <input
                        type="text"
                        id="nip"
                        name="nip"
                        value="<?= e($pegawai['nip'] ?? '') ?>"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm"
                    >

                </div>


                <!-- Email -->

                <div>

                    <label
                        for="email"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Email
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="<?= e($pegawai['email'] ?? '') ?>"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm"
                    >

                </div>


                <!-- Telepon -->

                <div>

                    <label
                        for="telepon"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Telepon
                    </label>

                    <input
                        type="text"
                        id="telepon"
                        name="telepon"
                        value="<?= e($pegawai['telepon'] ?? '') ?>"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm"
                    >

                </div>


                <!-- Pendidikan -->

                <div>

                    <label
                        for="riwayat_pendidikan"
                        class="mb-2 block text-sm font-semibold text-slate-700"
                    >
                        Riwayat Pendidikan
                    </label>

                    <input
                        type="text"
                        id="riwayat_pendidikan"
                        name="riwayat_pendidikan"
                        value="<?= e($pegawai['riwayat_pendidikan'] ?? '') ?>"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm"
                    >

                </div>

            </div>

        </section>


        <!-- FOTO -->

        <section
            class="rounded-2xl bg-white p-6
                   shadow-sm ring-1 ring-slate-200"
        >

            <div class="mb-6">

                <h2 class="text-lg font-bold text-green-800">
                    Foto Pegawai
                </h2>

            </div>


            <?php if (!empty($pegawai['foto'])): ?>

                <div class="mb-5">

                    <p class="mb-3 text-sm font-medium text-slate-700">
                        Foto saat ini
                    </p>

                    <img
                        src="/<?= e($pegawai['foto']) ?>"
                        alt="<?= e($pegawai['nama']) ?>"
                        class="h-40 w-40 rounded-2xl
                               object-cover
                               ring-1 ring-slate-200"
                    >

                </div>

            <?php endif; ?>


            <label
                for="foto"
                class="mb-2 block text-sm font-semibold text-slate-700"
            >
                Ganti Foto
            </label>

            <input
                type="file"
                id="foto"
                name="foto"
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
                Maksimal 2 MB.
            </p>

        </section>


        <!-- STATUS -->

        <section
            class="rounded-2xl bg-white p-6
                   shadow-sm ring-1 ring-slate-200"
        >

            <label
                for="status"
                class="mb-2 block text-sm font-semibold text-slate-700"
            >
                Status
            </label>

            <select
                id="status"
                name="status"
                class="w-full rounded-xl border border-slate-300
                       bg-white px-4 py-3 text-sm"
            >

                <option
                    value="aktif"
                    <?= ($pegawai['status'] ?? '') === 'aktif'
                        ? 'selected'
                        : ''
                    ?>
                >
                    Aktif
                </option>

                <option
                    value="nonaktif"
                    <?= ($pegawai['status'] ?? '') === 'nonaktif'
                        ? 'selected'
                        : ''
                    ?>
                >
                    Nonaktif
                </option>

            </select>

        </section>


        <!-- BUTTON -->

        <div class="flex justify-end gap-3">

            <a
                href="/superadmin/pegawai"
                class="rounded-xl border border-slate-300
                       bg-white px-6 py-3
                       text-sm font-semibold text-slate-700
                       hover:bg-slate-50"
            >
                Batal
            </a>


            <button
                type="submit"
                class="rounded-xl bg-green-900
                       px-7 py-3
                       text-sm font-semibold text-white
                       shadow-lg
                       hover:bg-green-800"
            >

                <i class="fa-solid fa-floppy-disk mr-2"></i>

                Simpan Perubahan

            </button>

        </div>

    </form>

</div>