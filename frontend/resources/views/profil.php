    <!-- Profil Kelurahan -->
    <section id="profil" class="mb-12">
        <div class="rounded-lg overflow-hidden shadow-md bg-white">
            <img src="<?= e($profil['foto']) ?>" alt="Kantor <?= e($site['nama']) ?>" class="w-full h-64 object-cover">
            <div class="p-6">
                <h2 class="text-2xl font-bold mb-4 text-green-800"><?= e($profil['judul']) ?></h2>
                <p class="text-gray-700 leading-relaxed"><?= e($profil['isi']) ?></p>
            </div>
        </div>
    </section>
