<!-- Pelayanan Kelurahan -->

<section id="pelayanan" class="mt-10 mb-16">

    <div class="mx-auto max-w-6xl">

       <!-- Header -->
        <div class="mb-8 flex flex-col items-center justify-between gap-4 sm:flex-row">

        <div class="text-center sm:text-left">

            <h2 class="mt-1 text-3xl font-bold tracking-tight text-green-900 sm:text-4xl">
                Layanan Kelurahan Riko
            </h2>

            <p class="mt-3 max-w-2xl leading-7 text-slate-600">
                Informasi layanan administrasi yang tersedia bagi masyarakat
                Kelurahan Riko.
            </p>

        </div>


        <!-- Lihat Semua -->
        <a
            href="/pelayanan"
            class="inline-flex shrink-0 items-center rounded-full
                border border-green-700 px-5 py-2.5
                text-sm font-semibold text-green-700
                transition hover:bg-green-700 hover:text-white"
        >
            Lihat Semua Layanan

            <i class="fa-solid fa-arrow-right ml-2"></i>
        </a>

        </div>
        
        <?php if (!empty($pelayanan)): ?>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">

                <?php foreach ($pelayanan as $item): ?>

                    <article
                        class="group rounded-2xl bg-white p-6 shadow-md
                               ring-1 ring-slate-200
                               transition duration-300
                               hover:-translate-y-1 hover:shadow-xl"
                    >

                        <!-- Icon -->
                        <div
                            class="flex h-14 w-14 items-center justify-center
                                   rounded-2xl bg-green-100
                                   text-green-700
                                   transition duration-300
                                   group-hover:bg-green-800
                                   group-hover:text-white"
                        >

                            <?php if (!empty($item['icon'])): ?>

                                <i
                                    class="fa-solid <?= e($item['icon']) ?> text-2xl"
                                ></i>

                            <?php else: ?>

                                <i class="fa-solid fa-file-lines text-2xl"></i>

                            <?php endif; ?>

                        </div>

                        <!-- Nama -->
                        <h3
                            class="mt-5 text-xl font-bold text-slate-900
                                   transition group-hover:text-green-800"
                        >
                            <?= e($item['nama']) ?>
                        </h3>

                        <!-- Deskripsi -->
                        <?php if (!empty($item['deskripsi'])): ?>

                            <p class="mt-3 text-sm leading-7 text-slate-600">
                                <?= e(
                                    mb_strimwidth(
                                        strip_tags($item['deskripsi']),
                                        0,
                                        120,
                                        '...'
                                    )
                                ) ?>
                            </p>

                        <?php endif; ?>

                        <!-- Jam -->
                        <?php if (!empty($item['jam_pelayanan'])): ?>

                            <div class="mt-4 flex items-start gap-2 text-sm text-slate-500">

                                <i class="fa-regular fa-clock mt-1 text-green-700"></i>

                                <span>
                                    <?= e($item['jam_pelayanan']) ?>
                                </span>

                            </div>

                        <?php endif; ?>

                        <!-- Detail -->
                        <?php if (!empty($item['slug'])): ?>

                            <a
                                href="/pelayanan/<?= e($item['slug']) ?>"
                                class="mt-5 inline-flex items-center font-semibold text-green-700 transition hover:text-green-900"
                            >
                                Lihat Detail

                                <span class="ml-2 transition group-hover:translate-x-1">
                                    →
                                </span>
                            </a>

                        <?php endif; ?>

                    </article>

                <?php endforeach; ?>

            </div>

        <?php else: ?>

            <div class="rounded-2xl bg-white p-10 text-center shadow ring-1 ring-slate-200">

                <i class="fa-solid fa-file-circle-question text-4xl text-slate-300"></i>

                <p class="mt-4 text-slate-500">
                    Belum ada layanan yang tersedia.
                </p>

            </div>

        <?php endif; ?>

    </div>

</section>