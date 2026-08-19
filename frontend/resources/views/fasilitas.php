<!-- Fasilitas -->
<style>
    #fasilitas .reveal-item {
        opacity: 0;
        transform: translateY(28px) scale(0.98);
        transition: opacity 700ms ease, transform 700ms ease;
        will-change: opacity, transform;
    }

    #fasilitas .reveal-item.is-visible {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

    #fasilitas article {
        transition: transform 300ms ease;
    }

    #fasilitas article:hover {
        transform: translateY(-6px);
    }

    #fasilitas article img {
        transition: transform 400ms ease;
    }

    #fasilitas article:hover img {
        transform: scale(1.05);
    }
</style>

<section id="fasilitas" class="mb-12">
    <div class="mx-auto max-w-6xl">

        <!-- Judul -->
        <div
            class="mb-8 flex flex-col items-center justify-between gap-4 sm:flex-row reveal-item"
            data-reveal
        >
            <div class="text-center sm:text-left">
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-green-700">
                    Sarana & Prasarana
                </p>

                <h2 class="mt-1 text-3xl font-bold tracking-tight text-green-800 sm:text-4xl">
                    Fasilitas Kelurahan
                </h2>
            </div>

            <a
                href="/fasilitas"
                class="inline-flex items-center rounded-full border border-green-700 px-5 py-2.5 text-sm font-semibold text-green-700 transition hover:bg-green-700 hover:text-white"
            >
                Lihat Semua Fasilitas
                <i class="fa-solid fa-arrow-right ml-2"></i>
            </a>
        </div>

        <?php if (!empty($fasilitas)): ?>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-3">

                <?php foreach ($fasilitas as $index => $fas): ?>

                    <article
                        class="reveal-item overflow-hidden rounded-2xl bg-gradient-to-br from-green-50 via-white to-emerald-50 shadow-lg ring-1 ring-slate-200/80"
                        data-reveal
                        style="transition-delay: <?= (int) ($index * 120) ?>ms;"
                    >

                        <!-- Gambar -->
                        <?php if (!empty($fas['gambar'])): ?>

                            <div class="overflow-hidden">
                                <img
                                    src="/<?= e($fas['gambar']) ?>"
                                    alt="<?= e($fas['nama']) ?>"
                                    class="h-52 w-full object-cover"
                                >
                            </div>

                        <?php else: ?>

                            <div class="flex h-52 w-full items-center justify-center bg-slate-100">
                                <div class="text-center text-slate-400">
                                    <i class="fa-solid fa-image text-4xl"></i>

                                    <p class="mt-2 text-sm">
                                        Tidak ada gambar
                                    </p>
                                </div>
                            </div>

                        <?php endif; ?>


                        <!-- Informasi -->
                        <div class="px-5 py-5 text-center">

                            <h3 class="text-lg font-semibold text-slate-800">
                                <?= e($fas['nama']) ?>
                            </h3>

                            <?php if (!empty($fas['deskripsi'])): ?>

                                <p class="mt-2 text-sm leading-6 text-slate-600">
                                    <?= e(
                                        mb_strimwidth(
                                            $fas['deskripsi'],
                                            0,
                                            120,
                                            '...'
                                        )
                                    ) ?>
                                </p>

                            <?php endif; ?>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>

        <?php else: ?>

            <div class="rounded-2xl bg-white py-10 text-center shadow ring-1 ring-slate-200">
                <i class="fa-solid fa-building text-4xl text-slate-300"></i>

                <p class="mt-3 text-sm text-slate-500">
                    Belum ada data fasilitas.
                </p>
            </div>

        <?php endif; ?>

    </div>
</section>


<script>
    (function () {

        const items = document.querySelectorAll(
            '#fasilitas [data-reveal]'
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