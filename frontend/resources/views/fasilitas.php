    <!-- Fasilitas -->
    <section id="fasilitas" class="mb-12">
        <h2 class="text-2xl font-bold mb-4 text-green-800 text-center">Fasilitas Kelurahan</h2>
        <p class="text-gray-700 mb-6 text-center">Sarana dan prasarana pendukung untuk menunjang kenyamanan serta pelayanan bagi masyarakat Kelurahan Riko.</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            <?php foreach ($fasilitas as $fas): ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="<?= e($fas['foto']) ?>" alt="<?= e($fas['nama']) ?>" class="w-full h-40 object-cover">
                    <p class="text-gray-700 text-center py-2 text-sm"><?= e($fas['nama']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
