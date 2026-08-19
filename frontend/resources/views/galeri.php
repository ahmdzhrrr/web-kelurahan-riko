<!-- Galeri -->

<style>
    #galeri .reveal-item {
        opacity: 0;
        transform: translateY(28px) scale(.98);
        transition:
            opacity .7s ease,
            transform .7s ease;
        will-change: opacity, transform;
    }

    #galeri .reveal-item.is-visible {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

    #galeri img {
        transition: transform .4s ease;
    }

    #galeri article:hover img {
        transform: scale(1.05);
    }
</style>

<section id="galeri" class="mb-12">

    <div class="mx-auto max-w-6xl">

       <!-- Header -->
        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

        <!-- Judul -->
        <div
            class="reveal-item text-center sm:text-left"
            data-reveal
        >

            <h2 class="text-3xl font-bold tracking-tight text-green-800 sm:text-4xl">
                Galeri Kelurahan Riko
            </h2>

            <p class="mx-auto mt-4 max-w-2xl text-slate-600 sm:mx-0">
                Dokumentasi kegiatan dan berbagai aktivitas di Kelurahan Riko.
            </p>

        </div>


        <!-- Lihat Semua -->
        <div class="shrink-0 text-center sm:text-right">

            <a
                href="/galeri"
                class="inline-flex items-center rounded-full
                    border border-green-700
                    px-6 py-3
                    text-sm font-semibold text-green-700
                    transition
                    hover:bg-green-700 hover:text-white"
            >
                Lihat Semua Galeri

                <span class="ml-2 transition-transform duration-300 group-hover:translate-x-1">
                    →
                </span>
            </a>

        </div>

        </div>
        <?php if (!empty($galeri)): ?>

            <div class="grid grid-cols-2 gap-4 md:grid-cols-3">

                <?php foreach ($galeri as $index => $item): ?>
                    

                    <article
                        class="reveal-item group overflow-hidden rounded-2xl
                               bg-white shadow-lg ring-1 ring-slate-200"
                        data-reveal
                        style="transition-delay: <?= (int) ($index * 100) ?>ms;"
                    >

                        <?php if (!empty($item['gambar'])): ?>

                            <div class="aspect-[4/3] overflow-hidden">

                                <img
                                    src="/<?= e(ltrim($item['gambar'], '/')) ?>"
                                    alt="<?= e($item['judul'] ?? 'Dokumentasi Kelurahan Riko') ?>"
                                    class="h-full w-full object-cover"
                                >

                            </div>

                        <?php endif; ?>


                        <?php if (!empty($item['judul'])): ?>

                            <div class="p-4">

                                <h3 class="font-semibold text-slate-800">
                                    <?= e($item['judul']) ?>
                                </h3>

                            </div>

                        <?php endif; ?>

                    </article>

                <?php endforeach; ?>

            </div>

        <?php else: ?>

            <div class="rounded-2xl bg-white py-10 text-center shadow ring-1 ring-slate-200">

                <i class="fa-solid fa-images text-4xl text-slate-300"></i>

                <p class="mt-3 text-sm text-slate-500">
                    Belum ada dokumentasi galeri.
                </p>

            </div>

        <?php endif; ?>

    </div>

</section>


<script>
(function () {

    const items = document.querySelectorAll(
        '#galeri [data-reveal]'
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