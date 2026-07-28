    <!-- Visi & Misi -->
    <section id="visi-misi" class="mb-12">
        <h2 class="mb-6 text-center text-3xl font-bold tracking-tight text-green-800 sm:text-4xl">Visi & Misi</h2>

        <div class="relative overflow-hidden rounded-3xl bg-white shadow-xl ring-1 ring-slate-200/80">
            <div class="absolute inset-0 bg-gradient-to-br from-green-50 via-white to-emerald-50 pointer-events-none"></div>
            <div class="relative p-6 sm:p-8 lg:p-10">
                <div class="space-y-5 text-slate-700">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-green-700">Visi</p>
                        <p class="mt-3 text-base leading-8 text-slate-700 sm:text-lg">&ldquo;<?= e($visi_misi['visi']) ?>&rdquo;</p>
                    </div>

                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-green-700">Misi</p>
                        <ul class="mt-3 space-y-3">
                            <?php foreach ($visi_misi['misi'] as $poin): ?>
                                <li class="flex gap-3 rounded-2xl bg-slate-50 px-4 py-3 leading-7">
                                    <span class="mt-1 h-2.5 w-2.5 shrink-0 rounded-full bg-green-600"></span>
                                    <span><?= e($poin) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
