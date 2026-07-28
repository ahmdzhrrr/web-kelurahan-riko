    <!-- Fasilitas -->
    <section id="fasilitas" class="mb-12">
        <div class="mx-auto max-w-6xl">
            <div class="mb-6 text-center">
                <h2 class="text-3xl font-bold tracking-tight text-green-800 sm:text-4xl">Fasilitas Kelurahan</h2>
                <!-- <p class="mx-auto mt-3 max-w-2xl text-sm leading-7 text-slate-600 sm:text-base">
                    Sarana dan prasarana pendukung untuk menunjang kenyamanan serta pelayanan bagi masyarakat Kelurahan Riko.
                </p> -->
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-3">
                <?php foreach ($fasilitas as $fas): ?>
                    <article class="group overflow-hidden rounded-2xl bg-gradient-to-br from-green-50 via-white to-emerald-50 shadow-lg ring-1 ring-slate-200/80 transition-transform duration-200 hover:-translate-y-1 hover:shadow-xl">
                        <div class="overflow-hidden">
                            <img src="<?= e($fas['foto']) ?>" alt="<?= e($fas['nama']) ?>" class="h-44 w-full object-cover transition-transform duration-300 group-hover:scale-105">
                        </div>
                        <div class="px-5 py-4 text-center">
                            <p class="text-sm font-medium tracking-wide text-slate-800"><?= e($fas['nama']) ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
