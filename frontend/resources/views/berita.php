    <!-- Berita Terbaru -->
    <style>
        #berita .reveal-item {
            opacity: 0;
            transform: translateY(28px) scale(0.98);
            transition: opacity 700ms ease, transform 700ms ease;
            will-change: opacity, transform;
        }

        #berita .reveal-item.is-visible {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        #berita .reveal-item .news-card {
            transition: transform 700ms ease;
        }

        #berita .reveal-item.is-visible .news-card {
            transform: translateY(0);
        }
    </style>

        <section id="berita" class="mb-12">
            <div class="mx-auto max-w-6xl">
                <div class="mb-6 text-center reveal-item" data-reveal>
                    <h2 class="text-3xl font-bold tracking-tight text-green-800 sm:text-4xl">Berita Terbaru</h2>
                </div>

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
                    <?php foreach ($berita as $index => $item): ?>
                        <article class="reveal-item group overflow-hidden rounded-2xl bg-gradient-to-br from-green-50 via-white to-emerald-50 shadow-lg ring-1 ring-slate-200/80 transition-transform duration-200 hover:-translate-y-1 hover:shadow-xl"
                                 data-reveal
                                 style="transition-delay: <?= (int) ($index * 120) ?>ms;">
                            <div class="news-card p-6">
                                <h3 class="text-xl font-semibold tracking-tight text-slate-900 group-hover:text-green-800"><?= e($item['title']) ?></h3>
                                <p class="mt-3 text-sm leading-7 text-slate-600">
                                    <?= e($item['desc']) ?>
                                </p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

    <script>
        (function () {
            const items = document.querySelectorAll('#berita [data-reveal]');

            if (!items.length) {
                return;
            }

            const reveal = (element) => {
                element.classList.add('is-visible');
            };

            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver((entries, currentObserver) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            reveal(entry.target);
                            currentObserver.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.15,
                    rootMargin: '0px 0px -60px 0px',
                });

                items.forEach((item) => observer.observe(item));
                return;
            }

            items.forEach(reveal);
        })();
    </script>
