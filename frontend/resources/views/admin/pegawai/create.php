<?php

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
            Tambah Pegawai
        </h1>

        <p class="mt-2 text-sm text-slate-500">
            Tambahkan data aparatur atau pegawai Kelurahan Riko.
        </p>

    </div>


    <form
        action="/superadmin/pegawai/store"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-6"
    >

        <!-- ================================================= -->
        <!-- DATA UTAMA -->
        <!-- ================================================= -->

        <section
            class="rounded-2xl bg-white p-6
                   shadow-sm ring-1 ring-slate-200"
        >

            <div class="mb-6">

                <h2 class="text-lg font-bold text-green-800">
                    Data Pegawai
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Informasi dasar pegawai.
                </p>

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
                               bg-white px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    >

                        <option value="">
                            -- Pilih Jabatan --
                        </option>

                        <?php foreach ($jabatan as $item): ?>

                            <option value="<?= (int) $item['id'] ?>">

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
                               bg-white px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    >

                        <option value="">
                            -- Pilih Unit Organisasi --
                        </option>

                        <?php foreach ($unit_organisasi as $item): ?>

                            <option value="<?= (int) $item['id'] ?>">

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
                        placeholder="Opsional"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
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
                        placeholder="nama@email.com"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
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
                        placeholder="08xxxxxxxxxx"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
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
                        placeholder="S1 Informatika"
                        class="w-full rounded-xl border border-slate-300
                               px-4 py-3 text-sm outline-none
                               focus:border-green-700
                               focus:ring-2 focus:ring-green-100"
                    >

                </div>

            </div>

        </section>


        <!-- ================================================= -->
        <!-- FOTO -->
        <!-- ================================================= -->

        <section
            class="rounded-2xl bg-white p-6
                   shadow-sm ring-1 ring-slate-200"
        >

            <div class="mb-6">

                <h2 class="text-lg font-bold text-green-800">
                    Foto Pegawai
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Gunakan foto formal dengan format JPG, PNG, atau WEBP.
                    Maksimal 2 MB.
                </p>

            </div>


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

        </section>


        <!-- ================================================= -->
        <!-- STATUS -->
        <!-- ================================================= -->

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
                       bg-white px-4 py-3 text-sm outline-none
                       focus:border-green-700
                       focus:ring-2 focus:ring-green-100"
            >

                <option value="aktif">
                    Aktif
                </option>

                <option value="nonaktif">
                    Nonaktif
                </option>

            </select>

        </section>


        <!-- SAVE -->

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

                Simpan Pegawai

            </button>

        </div>

    </form>

</div>