    <!-- Profil Anggota -->
    <section id="anggota" class="mb-12">
        <div class="mx-auto max-w-6xl">
            <div class="mb-6 text-center">
                <h2 class="text-3xl font-bold tracking-tight text-green-800 sm:text-4xl">Profil Anggota Kelurahan Riko</h2>
                <!-- <p class="mx-auto mt-3 max-w-2xl text-sm leading-7 text-slate-600 sm:text-base">
                    Kelurahan Riko didukung oleh para staf dan pejabat yang berdedikasi untuk melayani masyarakat dengan integritas dan semangat.
                </p> -->
            </div>

            <div class="grid grid-cols-2 gap-5 sm:grid-cols-3 md:grid-cols-5 lg:gap-6">
                <?php foreach ($anggota as $member): ?>
                    <div class="flex flex-col items-center text-center">
                        <?php if ($member['foto']): ?>
                            <img src="<?= e($member['foto']) ?>" alt="<?= e($member['name']) ?>"
                                 class="mx-auto mt-3 h-28 w-28 rounded-full object-cover border-4 border-green-900 shadow-md ring-2 ring-green-900/10">
                        <?php else: ?>
                            <div class="mx-auto mt-3 flex h-28 w-28 items-center justify-center rounded-full bg-slate-200 border-4 border-green-900 shadow-md ring-2 ring-green-900/10">
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
