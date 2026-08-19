<!-- Visi & Misi -->

<style>
    #visi-misi .reveal-item {
        opacity: 0;
        transform: translateY(28px) scale(.98);
        transition:
            opacity .7s ease,
            transform .7s ease;
        will-change: opacity, transform;
    }

    #visi-misi .reveal-item.is-visible {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

    #visi-misi .vision-card {
        transition: transform .7s ease;
    }

    #visi-misi .reveal-item.is-visible .vision-card {
        transform: translateY(0);
    }
</style>

<section id="visi-misi" class="mb-12 pt-10">

    <h2
        class="mb-6 text-center text-3xl font-bold tracking-tight text-green-800 sm:text-4xl reveal-item"
        data-reveal
    >
        Visi & Misi
    </h2>
    

    <?php if (!empty($visi) || !empty($misi)): ?>

        <div
            class="reveal-item relative mx-auto max-w-7xl overflow-hidden rounded-3xl bg-white shadow-xl ring-1 ring-slate-200"
            data-reveal
            style="transition-delay:120ms;"
        >

            <div
                class="absolute inset-0 bg-gradient-to-br from-green-50 via-white to-emerald-50 pointer-events-none">
            </div>

            <div class="vision-card relative p-6 sm:p-8 lg:p-10">

                <div class="space-y-8">

                    <!-- VISI -->
                    <?php if (!empty($visi)): ?>

                        <div>

                            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-green-700">
                                Visi
                            </p>

                            <p class="mt-4 text-base leading-8 text-slate-700 sm:text-lg">
                                "<?= e($visi['isi']) ?>"
                            </p>

                        </div>

                    <?php endif; ?>


                    <!-- MISI -->
                    <?php if (!empty($misi)): ?>

                        <div>

                            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-green-700">
                                Misi
                            </p>

                            <ul class="mt-4 space-y-3">

                                <?php foreach ($misi as $index => $item): ?>

                                    <li
                                        class="reveal-item flex gap-3 rounded-2xl bg-slate-50 px-4 py-3 leading-7"
                                        data-reveal
                                        style="transition-delay: <?= 220 + ($index * 90) ?>ms;"
                                    >

                                        <span
                                            class="mt-2 h-2.5 w-2.5 shrink-0 rounded-full bg-green-600">
                                        </span>

                                        <span>
                                            <?= e($item['isi']) ?>
                                        </span>

                                    </li>

                                <?php endforeach; ?>

                            </ul>

                        </div>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    <?php else: ?>

        <div class="rounded-2xl bg-white p-10 text-center shadow">

            <p class="text-gray-500">
                Data visi dan misi belum tersedia.
            </p>

        </div>

    <?php endif; ?>

</section>


<script>
(function () {

    const items = document.querySelectorAll(
        '#visi-misi [data-reveal]'
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

        return;
    }

    items.forEach(reveal);

})();
</script>