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

    #fasilitas .reveal-item img {
        transition: transform 700ms ease;
    }

    #fasilitas .reveal-item.is-visible img {
        transform: scale(1.04);
    }
</style>

<section id="fasilitas" class="mb-12">
    <div class="mx-auto max-w-6xl">
        <div class="mb-6 text-center reveal-item" data-reveal>
            <h2 class="text-3xl font-bold tracking-tight text-green-800 sm:text-4xl">Fasilitas Kelurahan</h2>
            <!-- <p class="mx-auto mt-3 max-w-2xl text-sm leading-7 text-slate-600 sm:text-base">
                Sarana dan prasarana pendukung untuk menunjang kenyamanan serta pelayanan bagi masyarakat Kelurahan Riko.
            </p> -->
        </div>

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-3">
            <?php foreach ($fasilitas as $index => $fas): ?>
                <article class="reveal-item overflow-hidden rounded-2xl bg-gradient-to-br from-green-50 via-white to-emerald-50 shadow-lg ring-1 ring-slate-200/80"
                         data-reveal
                         style="transition-delay: <?= (int) ($index * 120) ?>ms;">
                    <div class="overflow-hidden">
                        <img src="<?= e($fas['foto']) ?>" alt="<?= e($fas['nama']) ?>" class="h-44 w-full object-cover">
                    </div>
                    <div class="px-5 py-4 text-center">
                        <p class="text-sm font-medium tracking-wide text-slate-800"><?= e($fas['nama']) ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
    (function () {
        const items = document.querySelectorAll('#fasilitas [data-reveal]');

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