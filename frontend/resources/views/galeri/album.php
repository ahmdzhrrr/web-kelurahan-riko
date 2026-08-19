<!-- Isi Album Galeri -->

<section class="mb-16">

    <div class="mx-auto max-w-6xl">

        <!-- Header -->

        <div class="mb-10">

            <h1
                class="text-3xl font-bold tracking-tight
                       text-green-800 sm:text-4xl"
            >
                <?= e($album['nama']) ?>
            </h1>


            <?php if (!empty($album['deskripsi'])): ?>

                <p class="mt-4 max-w-3xl leading-7 text-slate-600">
                    <?= e($album['deskripsi']) ?>
                </p>

            <?php endif; ?>

        </div>

          <!-- Kembali -->

          <div class="mb-6">

                <a
                    href="/galeri"
                    class="inline-flex items-center
                        font-semibold text-green-700
                        transition hover:text-green-900"
                >

                    ← Kembali ke Galeri

                </a>

            </div>


        <?php if (!empty($galeri)): ?>

            <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4">

                <?php foreach ($galeri as $item): ?>

                    <article
                        class="group overflow-hidden rounded-2xl
                               bg-white shadow-lg
                               ring-1 ring-slate-200"
                    >

                        <?php if (!empty($item['gambar'])): ?>

                            <div class="aspect-[4/3] overflow-hidden">

                                <img
                                    src="/<?= e(ltrim($item['gambar'], '/')) ?>"
                                    alt="<?= e(
                                        $item['judul']
                                        ?? $album['nama']
                                    ) ?>"
                                    class="h-full w-full object-cover
                                           transition duration-500
                                           group-hover:scale-105"
                                >

                            </div>

                        <?php endif; ?>


                        <?php if (!empty($item['judul'])): ?>

                            <div class="p-4">

                                <h2 class="font-semibold text-slate-800">
                                    <?= e($item['judul']) ?>
                                </h2>

                            </div>

                        <?php endif; ?>

                    </article>

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
                    Belum ada foto dalam album ini.
                </p>

            </div>

        <?php endif; ?>

    </div>

</section>