    </main>

    <!-- Footer -->
    <footer class="bg-blue-900 text-white py-12 mt-10">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8 text-sm">
            <div>
                <img src="<?= e($site['logo']) ?>" alt="Logo <?= e($site['nama']) ?>" class="w-20 mb-4 rounded">
                <p><?= e($site['salam']) ?></p>
            </div>

            <div>
                <h4 class="text-yellow-400 font-bold mb-3">Tentang Kami</h4>
                <ul class="space-y-1">
                    <?php foreach ($menu as $item): ?>
                        <li><a href="<?= e($item['href']) ?>" class="hover:underline"><?= e($item['label']) ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <h4 class="text-yellow-400 font-bold mt-4 mb-2">Ikuti Kami</h4>
                <ul class="space-y-1">
                    <?php foreach ($social_media as $platform => $link): ?>
                        <li><a href="<?= e($link) ?>" class="hover:underline"><?= e($platform) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div>
                <h4 class="text-yellow-400 font-bold mb-3">Hubungi Kami</h4>
                <p><?= e($site['alamat']) ?></p>
                <p class="mt-2">Email: <?= e($site['email']) ?></p>
                <p>Telepon: <?= e($site['telepon']) ?></p>
            </div>

            <div>
                <h4 class="text-yellow-400 font-bold mb-3">Lokasi Map</h4>
                <iframe src="<?= e($peta_embed) ?>" width="100%" height="150"
                        style="border:0;" allowfullscreen loading="lazy"></iframe>
            </div>
        </div>
        <div class="text-center text-xs text-blue-200 mt-8">
            &copy; <?= date('Y') ?> <?= e($site['nama']) ?>. All rights reserved.
        </div>
    </footer>
</body>
</html>
