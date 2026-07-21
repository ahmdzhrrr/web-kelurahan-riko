    <!-- Visi & Misi -->
    <section id="visi-misi" class="mb-12">
        <h2 class="text-2xl font-bold mb-4 text-green-800 text-center">Visi & Misi</h2>
        <p class="text-gray-700 mb-6 text-center">Visi dan misi Kelurahan Riko sebagai panduan dalam memberikan pelayanan terbaik kepada masyarakat.</p>
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-semibold text-green-700 text-center">Visi</h3>
            <p class="text-gray-700 mt-2 mb-4">&ldquo;<?= e($visi_misi['visi']) ?>&rdquo;</p>

            <h3 class="text-xl font-semibold text-green-700 text-center">Misi</h3>
            <ul class="list-disc pl-6 text-gray-700 mt-2 space-y-1">
                <?php foreach ($visi_misi['misi'] as $poin): ?>
                    <li><?= e($poin) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
