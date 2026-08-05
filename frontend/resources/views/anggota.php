    <!-- Profil Anggota -->
    <style>
        #anggota .reveal-item {
            opacity: 0;
            transform: translateY(28px) scale(0.98);
            transition: opacity 700ms ease, transform 700ms ease;
            will-change: opacity, transform;
        }

        #anggota .reveal-item.is-visible {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        #anggota .reveal-item img,
        #anggota .reveal-item .avatar-placeholder {
            transition: transform 700ms ease;
        }

        #anggota .reveal-item.is-visible img,
        #anggota .reveal-item.is-visible .avatar-placeholder {
            transform: scale(1.03);
        }
    </style>

        <section id="anggota" class="mb-12">
            <div class="mx-auto max-w-6xl">
                <div class="mb-6 text-center reveal-item" data-reveal>
                    <h2 class="text-3xl font-bold tracking-tight text-green-800 sm:text-4xl">Profil Anggota Kelurahan Riko</h2>
                    <!-- <p class="mx-auto mt-3 max-w-2xl text-sm leading-7 text-slate-600 sm:text-base">
                        Kelurahan Riko didukung oleh para staf dan pejabat yang berdedikasi untuk melayani masyarakat dengan integritas dan semangat.
                    </p> -->
                </div>

                <div class="grid grid-cols-2 gap-5 sm:grid-cols-3 md:grid-cols-5 lg:gap-6">
                    <?php foreach ($anggota as $index => $member): ?>
                        <div class="reveal-item flex flex-col items-center text-center"
                             data-reveal
                             style="transition-delay: <?= (int) ($index * 110) ?>ms;">
                            <?php if ($member['foto']): ?>
                                <img src="<?= e($member['foto']) ?>" alt="<?= e($member['name']) ?>"
                                     class="mx-auto mt-3 h-28 w-28 rounded-full object-cover border-4 border-green-900 shadow-md ring-2 ring-green-900/10">
                            <?php else: ?>
                                <div class="avatar-placeholder mx-auto mt-3 flex h-28 w-28 items-center justify-center rounded-full bg-slate-200 border-4 border-green-900 shadow-md ring-2 ring-green-900/10">
                                    <i class="fa-solid fa-user text-3xl text-slate-500"></i>
                                </div>
                            <?php endif; ?>

                            <p class="mt-3 text-sm font-semibold leading-6 text-slate-800">
                                <?= e($member['name']) ?>
                            </p>

                            <div class="mt-4 inline-flex rounded-full bg-green-900 px-3 py-1 text-xs font-semibold tracking-wide text-white">
                                <?= e($member['role']) ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

    <script>
        (function () {
            const items = document.querySelectorAll('#anggota [data-reveal]');

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
