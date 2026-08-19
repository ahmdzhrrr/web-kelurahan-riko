<section class="mt-10 mb-12">

    <div class="mx-auto max-w-6xl px-4">

        <div class="mb-10 text-center">

            <h1 class="mt-3 text-3xl font-bold text-green-900 sm:text-4xl">
                Berita Kelurahan Riko
            </h1>

            <p class="mx-auto mt-4 max-w-2xl text-slate-600">
                Informasi dan kegiatan terbaru seputar Kelurahan Riko.
            </p>

        </div>


        <?php if (!empty($berita)): ?>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">

                <?php foreach ($berita as $item): ?>

                    <article
                        class="group overflow-hidden rounded-2xl bg-white shadow-md ring-1 ring-slate-200 transition hover:-translate-y-1 hover:shadow-xl"
                    >

                        <?php if (!empty($item['thumbnail'])): ?>

                            <div class="h-52 overflow-hidden">

                                <img
                                    src="/<?= e($item['thumbnail']) ?>"
                                    alt="<?= e($item['thumbnail_alt'] ?? $item['judul']) ?>"
                                    class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                >

                            </div>

                        <?php endif; ?>


                        <div class="p-6">

                            <?php if (!empty($item['kategori'])): ?>

                                <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-800">

                                    <?= e($item['kategori']) ?>

                                </span>

                            <?php endif; ?>


                            <p class="mt-3 text-sm text-slate-500">

                                <?= date(
                                    'd M Y',
                                    strtotime($item['published_at'] ?? $item['created_at'])
                                ) ?>

                            </p>


                            <h2 class="mt-2 text-xl font-bold text-slate-900">

                                <?= e($item['judul']) ?>

                            </h2>


                            <?php if (!empty($item['excerpt'])): ?>

                                <p class="mt-3 text-sm leading-7 text-slate-600">

                                    <?= e($item['excerpt']) ?>

                                </p>

                            <?php else: ?>

                                <p class="mt-3 text-sm leading-7 text-slate-600">

                                    <?= e(
                                        mb_strimwidth(
                                            strip_tags($item['isi']),
                                            0,
                                            150,
                                            '...'
                                        )
                                    ) ?>

                                </p>

                            <?php endif; ?>


                            <a
                                href="/berita/<?= e($item['slug']) ?>"
                                class="mt-5 inline-flex font-semibold text-green-700 transition hover:text-green-900"
                            >
                                Baca Selengkapnya →
                            </a>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>

        <?php else: ?>

            <div class="rounded-2xl bg-white p-10 text-center shadow">

                <p class="text-slate-500">
                    Belum ada berita yang diterbitkan.
                </p>

            </div>

        <?php endif; ?>

    </div>

</section>