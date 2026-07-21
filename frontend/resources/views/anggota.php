    <!-- Profil Anggota -->
    <section id="anggota" class="mb-12">
        <h2 class="text-2xl font-bold mb-4 text-green-800">Profil Anggota Kelurahan Riko</h2>
        <p class="text-gray-700 mb-6">Kelurahan Riko didukung oleh para staf dan pejabat yang berdedikasi untuk melayani masyarakat dengan integritas dan semangat.</p>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-6">
            <?php foreach ($anggota as $member): ?>
                <div class="flex flex-col items-center text-center">
                    <?php if ($member['foto']): ?>
                        <img src="<?= e($member['foto']) ?>" alt="<?= e($member['name']) ?>"
                             class="w-24 h-24 rounded-full object-cover border-2 border-green-700 mb-2">
                    <?php else: ?>
                        <div class="w-24 h-24 rounded-full bg-gray-300 flex items-center justify-center mb-2 border-2 border-green-700">
                            <i class="fa-solid fa-user text-gray-500 text-2xl"></i>
                        </div>
                    <?php endif; ?>
                    <div class="bg-green-700 text-white text-xs font-semibold px-2 py-1 rounded-full mb-1"><?= e($member['role']) ?></div>
                    <div class="text-sm text-gray-700"><?= e($member['name']) ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
