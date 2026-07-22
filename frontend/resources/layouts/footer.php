    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-b from-green-900 to-green-950 text-white mt-10 px-6 sm:px-10 lg:px-16 py-14">
        <div class="container mx-auto max-w-7xl grid grid-cols-1 md:grid-cols-4 gap-10 text-sm">
            <div class="space-y-4">
                <img src="<?= e($site['logo']) ?>" alt="Logo <?= e($site['nama']) ?>" class="w-20 rounded-md shadow-lg ring-1 ring-white/10">
                <p class="leading-6 text-white/90"><?= e($site['salam']) ?></p>
            </div>

            <div class="space-y-4">
                <h4 class="text-yellow-300 font-bold text-base tracking-wide">Tentang Kami</h4>
                <ul class="space-y-2 text-white/90">
                    <?php foreach ($menu as $item): ?>
                        <li><a href="<?= e($item['href']) ?>" class="transition-colors duration-200 hover:text-yellow-300 hover:underline underline-offset-4"><?= e($item['label']) ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <h4 class="text-yellow-300 font-bold text-base tracking-wide pt-2">Ikuti Kami</h4>
                <ul class="space-y-2 text-white/90">
                    <?php foreach ($social_media as $platform => $link): ?>
                        <li><a href="<?= e($link) ?>" class="transition-colors duration-200 hover:text-yellow-300 hover:underline underline-offset-4"><?= e($platform) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="space-y-4">
                <h4 class="text-yellow-300 font-bold text-base tracking-wide">Hubungi Kami</h4>
                <div class="space-y-2 leading-6 text-white/90">
                    <p><?= e($site['alamat']) ?></p>
                    <p>Email: <a href="mailto:<?= e($site['email']) ?>" class="transition-colors duration-200 hover:text-yellow-300"><?= e($site['email']) ?></a></p>
                    <p>Telepon: <a href="tel:<?= e($site['telepon']) ?>" class="transition-colors duration-200 hover:text-yellow-300"><?= e($site['telepon']) ?></a></p>
                </div>
            </div>

            <div class="space-y-4">
                <h4 class="text-yellow-300 font-bold text-base tracking-wide">Lokasi Map</h4>
                <div class="overflow-hidden rounded-xl border border-white/10 shadow-lg bg-white/5">
                    <iframe src="<?= e($peta_embed) ?>" width="100%" height="180"
                            style="border:0;" allowfullscreen loading="lazy"></iframe>
                </div>
            </div>
        </div>
        <div class="mt-10 border-t border-white/10 pt-6 text-center text-xs text-blue-200/90">
            &copy; <?= date('Y') ?> <?= e($site['nama']) ?>. All rights reserved.
        </div>
    </footer>
</body>
</html>
