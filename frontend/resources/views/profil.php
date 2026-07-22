    <!-- Profil Kelurahan -->
    <section id="profil" class="mb-12">
        <div class="relative overflow-hidden rounded-3xl bg-white shadow-xl ring-1 ring-slate-200/80">
            <div class="absolute inset-0 bg-gradient-to-br from-green-50 via-white to-emerald-50 pointer-events-none"></div>
            <div class="relative grid gap-0 md:grid-cols-5">
                <div class="md:col-span-2">
                    <img src="<?= e($profil['foto']) ?>" alt="Kantor <?= e($site['nama']) ?>" class="h-72 w-full object-cover md:h-full">
                </div>
                <div class="md:col-span-3 p-6 sm:p-8 lg:p-10">
                    <span class="inline-flex items-center rounded-full bg-green-100 px-4 py-1 text-xs font-semibold tracking-wide text-green-800">
                        Profil Kelurahan
                    </span>
                    <h2 class="mt-4 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl"><?= e($profil['judul']) ?></h2>
                    <div class="mt-5 h-1 w-20 rounded-full bg-gradient-to-r from-green-700 to-emerald-500"></div>
                    <p class="mt-6 text-base leading-8 text-slate-700 sm:text-lg">
                        <?= e($profil['isi']) ?>
                    </p>
                    <!-- <div class="mt-8 flex flex-wrap gap-3 text-sm text-slate-600">
                        <span class="rounded-full bg-slate-100 px-4 py-2">Pelayanan publik</span>
                        <span class="rounded-full bg-slate-100 px-4 py-2">Informasi wilayah</span>
                        <span class="rounded-full bg-slate-100 px-4 py-2">Profil resmi</span>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
