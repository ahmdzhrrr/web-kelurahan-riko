<section class="py-12">
    <div class="mx-auto max-w-5xl px-4">

        <!-- Breadcrumb -->
        <div class="mb-6 text-sm text-gray-500">
            <a href="/pelayanan" class="hover:text-green-700">
                Pelayanan
            </a>
            <span class="mx-2">/</span>
            <span><?= e($pelayanan['nama']) ?></span>
        </div>

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-green-800 sm:text-4xl">
                <?= e($pelayanan['nama']) ?>
            </h1>

            <?php if (!empty($pelayanan['deskripsi'])): ?>
                <p class="mt-4 leading-7 text-gray-600">
                    <?= nl2br(e($pelayanan['deskripsi'])) ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Informasi Pelayanan -->
        <div class="mb-8 rounded-2xl bg-white p-6 shadow-lg ring-1 ring-slate-200">

            <h2 class="mb-5 text-xl font-bold text-green-800">
                Informasi Pelayanan
            </h2>

            <?php if (!empty($pelayanan['jam_pelayanan'])): ?>

                <div class="flex gap-3">
                    <div class="font-semibold text-gray-700">
                        Jam Pelayanan:
                    </div>

                    <div class="text-gray-600">
                        <?= nl2br(e($pelayanan['jam_pelayanan'])) ?>
                    </div>
                </div>

            <?php endif; ?>

        </div>

        <!-- Dokumen / Formulir -->
        <?php if (!empty($pelayanan['link'])): ?>

        <div class="mb-8 rounded-2xl bg-white p-6 shadow-lg ring-1 ring-slate-200">

        <h2 class="mb-3 text-xl font-bold text-green-800">
            Akses Formulir Pengajuan
        </h2>

        <p class="mb-5 text-gray-600">
            Silakan akses formulir online berikut untuk mengajukan
            <?= e($pelayanan['nama']) ?> secara online.
        </p>

            <a
                href="<?= e($pelayanan['link']) ?>"
                target="_blank"
                rel="noopener noreferrer"
                class="inline-flex items-center gap-2 rounded-xl
                    bg-green-700 px-5 py-3
                    font-semibold text-white
                    transition hover:bg-green-800"
            >
                Form Pelayanan
                <i class="fa-solid fa-arrow-up-right-from-square text-sm"></i>
            </a>

        </div>

        <?php endif; ?>

        <!-- Persyaratan -->
        <div class="rounded-2xl bg-white p-6 shadow-lg ring-1 ring-slate-200">

            <h2 class="mb-5 text-xl font-bold text-green-800">
                Persyaratan
            </h2>

            <?php if (!empty($persyaratan)): ?>

                <ol class="space-y-3">

                    <?php foreach ($persyaratan as $index => $item): ?>

                        <li class="flex gap-3 rounded-xl bg-slate-50 p-4">

                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-green-700 text-sm font-bold text-white">
                                <?= $index + 1 ?>
                            </span>

                            <span class="leading-7 text-gray-700">
                                <?= e($item['persyaratan']) ?>
                            </span>

                        </li>

                    <?php endforeach; ?>

                </ol>

            <?php else: ?>

                <p class="text-gray-500">
                    Belum ada persyaratan untuk pelayanan ini.
                </p>

            <?php endif; ?>

        </div>

        <!-- Tombol kembali -->
        <div class="mt-8">

            <a
                href="/pelayanan"
                class="inline-flex items-center rounded-xl bg-green-700 px-5 py-3 font-semibold text-white transition hover:bg-green-800"
            >
                ← Kembali ke Pelayanan
            </a>

        </div>

    </div>
</section>