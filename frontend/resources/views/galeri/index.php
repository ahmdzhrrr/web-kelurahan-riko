<!-- Semua Album Galeri -->

<section class="mt-10 mb-16">

    <div class="mx-auto max-w-6xl">

        <!-- Header -->
        <div class="mb-10 text-center">

            <h1 class="text-3xl font-bold tracking-tight text-green-800 sm:text-4xl">
                Galeri Kelurahan Riko
            </h1>

            <p class="mx-auto mt-4 max-w-2xl text-slate-600">
                Dokumentasi kegiatan dan berbagai aktivitas
                di Kelurahan Riko.
            </p>

        </div>


        <?php if (!empty($album)): ?>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">

                <?php foreach ($album as $item): ?>

                    <a
                        href="/galeri/<?= e($item['slug']) ?>"
                        class="group overflow-hidden rounded-2xl
                               bg-white shadow-lg
                               ring-1 ring-slate-200
                               transition duration-300
                               hover:-translate-y-1 hover:shadow-xl"
                    >

                        <!-- Cover Album -->

                        <?php if (!empty($item['cover'])): ?>

                            <div class="aspect-[4/3] overflow-hidden">

                                <img
                                    src="/<?= e(ltrim($item['cover'], '/')) ?>"
                                    alt="<?= e($item['nama']) ?>"
                                    class="h-full w-full object-cover
                                           transition duration-500
                                           group-hover:scale-105"
                                >

                            </div>

                        <?php else: ?>

                            <div
                                class="flex aspect-[4/3] items-center
                                       justify-center bg-green-50"
                            >

                                <i
                                    class="fa-solid fa-images
                                           text-5xl text-green-300"
                                ></i>

                            </div>

                        <?php endif; ?>


                        <!-- Informasi Album -->

                        <div class="p-5">

                            <h2
                                class="text-xl font-bold text-slate-900
                                       transition group-hover:text-green-800"
                            >
                                <?= e($item['nama']) ?>
                            </h2>


                            <?php if (!empty($item['deskripsi'])): ?>

                                <p class="mt-2 text-sm leading-6 text-slate-600">

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


                            <div
                                class="mt-4 flex items-center
                                       justify-between text-sm"
                            >

                                <span class="text-slate-500">

                                    <i class="fa-solid fa-images mr-1"></i>

                                    <?= (int) $item['jumlah_foto'] ?>
                                    Foto

                                </span>


                                <span
                                    class="font-semibold text-green-700
                                           transition
                                           group-hover:text-green-900"
                                >
                                    Lihat Album →
                                </span>

                            </div>

                        </div>

                    </a>

                <?php endforeach; ?>

            </div>

        <?php else: ?>

            <div
                class="rounded-2xl bg-white py-12 text-center
                       shadow ring-1 ring-slate-200"
            >

                <i
                    class="fa-solid fa-images
                           text-4xl text-slate-300"
                ></i>

                <p class="mt-4 text-slate-500">
                    Belum ada album galeri.
                </p>

            </div>

        <?php endif; ?>

    </div>

</section>