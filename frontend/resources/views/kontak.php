    <!-- Kontak
    <section id="kontak" class="mb-12">
        <h2 class="text-2xl font-bold mb-4 text-green-800">Hubungi Kami</h2>
        <div class="bg-white rounded-lg shadow-md p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="text-gray-700"><i class="fa-solid fa-location-dot mr-2 text-green-700"></i><?= e($site['alamat']) ?></p>
                <p class="text-gray-700 mt-2"><i class="fa-solid fa-envelope mr-2 text-green-700"></i><?= e($site['email']) ?></p>
                <p class="text-gray-700 mt-2"><i class="fa-solid fa-phone mr-2 text-green-700"></i><?= e($site['telepon']) ?></p>

                <h3 class="text-lg font-semibold mt-4 mb-2">Ikuti Kami</h3>
                <div class="flex gap-4">
                    <?php foreach ($social_media as $platform => $link): ?>
                        <a href="<?= e($link) ?>" class="text-green-700 hover:underline"><?= e($platform) ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section> -->
