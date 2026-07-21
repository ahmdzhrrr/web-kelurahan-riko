    <!-- Berita Terbaru -->
    <section id="berita" class="mb-12">
        <h2 class="text-2xl font-bold mb-4 text-green-800">Berita Terbaru</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($berita as $item): ?>
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold text-green-700"><?= e($item['title']) ?></h3>
                    <p class="text-gray-600 mt-1"><?= e($item['desc']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
