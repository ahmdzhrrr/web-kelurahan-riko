    <!-- Berita Terbaru -->
    <section id="berita" class="mb-12">
        <div class="mx-auto max-w-6xl">
            <div class="mb-6 text-center">
                <h2 class="text-3xl font-bold tracking-tight text-green-800 sm:text-4xl">Berita Terbaru</h2>
            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
                <?php foreach ($berita as $item): ?>
                    <article class="group overflow-hidden rounded-2xl bg-gradient-to-br from-green-50 via-white to-emerald-50 shadow-lg ring-1 ring-slate-200/80 transition-transform duration-200 hover:-translate-y-1 hover:shadow-xl">
                        <div class="p-6">
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
