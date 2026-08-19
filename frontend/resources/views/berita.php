<!-- Berita Terbaru -->

<style>
    #berita .reveal-item {
        opacity: 0;
        transform: translateY(28px) scale(.98);
        transition: opacity .7s ease, transform .7s ease;
        will-change: opacity, transform;
    }

    #berita .reveal-item.is-visible {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

    #berita .reveal-item .news-card {
        transition: transform .7s ease;
    }

    #berita .reveal-item.is-visible .news-card {
        transform: translateY(0);
    }

    #berita img {
        transition: transform .3s ease;
    }

    #berita article:hover img {
        transform: scale(1.05);
    }
</style>


<section id="berita" class="mb-12">

    <div class="mx-auto max-w-6xl">

        <!-- Judul -->
        <div
            class="mb-8 flex flex-col items-center justify-between gap-4 sm:flex-row reveal-item"
            data-reveal
        >
            <div class="text-center sm:text-left">
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-green-700">
                    Informasi Terkini
                </p>

                <h2 class="mt-1 text-3xl font-bold tracking-tight text-green-800 sm:text-4xl">
                    Berita Terbaru
                </h2>
            </div>

            <a
                href="/berita"
                class="inline-flex items-center rounded-full border border-green-700 px-5 py-2.5 text-sm font-semibold text-green-700 transition hover:bg-green-700 hover:text-white"
            >
                Lihat Semua Berita
                <i class="fa-solid fa-arrow-right ml-2"></i>
            </a>
        </div>


        <?php if (!empty($berita)): ?>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">

                <?php foreach ($berita as $index => $item): ?>

                    <article
                        class="reveal-item group overflow-hidden rounded-2xl bg-white shadow-lg ring-1 ring-slate-200 transition hover:-translate-y-1 hover:shadow-xl"
                        data-reveal
                        style="transition-delay: <?= (int) ($index * 120) ?>ms;"
                    >

                        <!-- Thumbnail -->
                        <?php if (!empty($item['thumbnail'])): ?>

                            <div class="overflow-hidden">

                                <img
                                    src="/<?= e(ltrim($item['thumbnail'], '/')) ?>"
                                    alt="<?= e($item['thumbnail_alt'] ?? $item['judul']) ?>"
                                    class="h-52 w-full object-cover"
                                >

                            </div>

                        <?php endif; ?>


                        <!-- Content -->
                        <div class="news-card p-6">

                            <!-- Tanggal -->
                            <?php if (!empty($item['published_at'])): ?>

                                <p class="mb-2 text-sm text-gray-500">
                                    <?= date(
                                        'd M Y',
                                        strtotime($item['published_at'])
                                    ) ?>
                                </p>

                            <?php endif; ?>


                            <!-- Judul -->
                            <h3 class="text-xl font-semibold text-slate-900 group-hover:text-green-800">
                                <?= e($item['judul']) ?>
                            </h3>


                            <!-- Excerpt -->
                            <?php if (!empty($item['excerpt'])): ?>

                                <p class="mt-3 text-sm leading-7 text-slate-600">
                                    <?= e($item['excerpt']) ?>
                                </p>

                            <?php elseif (!empty($item['isi'])): ?>

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


                            <!-- Detail -->
                            <?php if (!empty($item['slug'])): ?>

                                <a
                                    href="/berita/<?= e($item['slug']) ?>"
                                    class="mt-5 inline-flex font-semibold text-green-700 hover:text-green-900"
                                >
                                    Baca Selengkapnya →
                                </a>

                            <?php endif; ?>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>

        <?php else: ?>

            <div class="py-10 text-center text-gray-500">
                Belum ada berita.
            </div>

        <?php endif; ?>

    </div>

</section>


<script>
(function () {

    const items = document.querySelectorAll(
        '#berita [data-reveal]'
    );

    if (!items.length) {
        return;
    }

    const reveal = (element) => {
        element.classList.add('is-visible');
    };

    if ('IntersectionObserver' in window) {

        const observer = new IntersectionObserver(
            (entries, currentObserver) => {

                entries.forEach((entry) => {

                    if (entry.isIntersecting) {

                        reveal(entry.target);

                        currentObserver.unobserve(
                            entry.target
                        );

                    }

                });

            },
            {
                threshold: 0.15,
                rootMargin: '0px 0px -60px 0px',
            }
        );

        items.forEach((item) => {
            observer.observe(item);
        });

    } else {

        items.forEach(reveal);

    }

})();
</script>