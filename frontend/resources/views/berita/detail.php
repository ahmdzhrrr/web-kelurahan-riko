<section class="bg-slate-50 py-12">

    <div class="mx-auto max-w-4xl px-4">

        <article class="overflow-hidden rounded-3xl bg-white shadow-lg">

            <?php if (!empty($berita['thumbnail'])): ?>

                <div class="aspect-video overflow-hidden">

                    <img
                        src="/<?= e($berita['thumbnail']) ?>"
                        alt="<?= e($berita['thumbnail_alt'] ?? $berita['judul']) ?>"
                        class="h-full w-full object-cover"
                    >

                </div>

            <?php endif; ?>


            <div class="p-6 sm:p-8 lg:p-10">

                <?php if (!empty($berita['kategori'])): ?>

                    <span
                        class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-800"
                    >
                        <?= e($berita['kategori']) ?>
                    </span>

                <?php endif; ?>


                <h1 class="mt-4 text-3xl font-bold leading-tight text-slate-900 sm:text-4xl">

                    <?= e($berita['judul']) ?>

                </h1>


                <div class="mt-4 flex flex-wrap gap-x-5 gap-y-2 text-sm text-slate-500">

                    <span>
                        <?= date(
                            'd M Y',
                            strtotime($berita['published_at'] ?? $berita['created_at'])
                        ) ?>
                    </span>

                    <?php if (!empty($berita['penulis'])): ?>

                        <span>
                            Oleh <?= e($berita['penulis']) ?>
                        </span>

                    <?php endif; ?>

                    <span>
                        <?= (int) $berita['views'] ?> kali dilihat
                    </span>

                </div>


                <?php if (!empty($berita['excerpt'])): ?>

                    <p class="mt-6 border-l-4 border-green-700 pl-4 text-lg leading-8 text-slate-600">

                        <?= e($berita['excerpt']) ?>

                    </p>

                <?php endif; ?>


                <div
                    class="prose prose-slate prose-lg mt-8 max-w-none"
                >

                    <?= $berita['isi'] ?>

                </div>


                <div class="mt-10 border-t border-slate-200 pt-6">

                    <a
                        href="/berita"
                        class="inline-flex items-center font-semibold text-green-700 hover:text-green-900"
                    >
                        ← Kembali ke Berita
                    </a>

                </div>

            </div>

        </article>

    </div>

</section>