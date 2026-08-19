<!-- Footer -->
<footer class="mt-16 bg-gradient-to-b from-green-900 to-green-950 text-white">

    <!-- Konten Footer -->
    <div class="mx-auto max-w-7xl px-6 py-10 sm:px-10 lg:px-16">

        <!-- ======================================== -->
        <!-- GRID UTAMA FOOTER -->
        <!-- ======================================== -->
        <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-4 lg:gap-10">


            <!-- ======================================== -->
            <!-- IDENTITAS KELURAHAN -->
            <!-- ======================================== -->
            <div class="space-y-5">

                <!-- Logo + Nama -->
                <div class="flex items-center gap-4">

                    <?php if (!empty($setting['logo'])): ?>

                        <img
                            src="/<?= e(ltrim($setting['logo'], '/')) ?>"
                            alt="<?= e($setting['site_name'] ?? 'Kelurahan Riko') ?>"
                            class="h-20 w-20 shrink-0 object-contain"
                        >

                    <?php endif; ?>

                    <div>

                        <p class="text-xl font-bold uppercase leading-tight text-white">
                            <?= e($setting['site_name'] ?? 'Kelurahan Riko') ?>
                        </p>

                        <?php if (!empty($setting['tagline'])): ?>

                            <p class="mt-1 text-sm font-medium leading-5 text-white/75">
                                <?= e($setting['tagline']) ?>
                            </p>

                        <?php endif; ?>

                    </div>

                </div>


                <!-- Alamat -->
                <?php if (!empty($kontak['alamat'])): ?>

                    <div class="flex items-start gap-3 text-white/80">

                        <p class="text-sm leading-6">
                            <?= e($kontak['alamat']) ?>
                        </p>

                    </div>

                <?php endif; ?>

            </div>


            <!-- ======================================== -->
            <!-- MENU -->
            <!-- ======================================== -->
            <div>

                <h4 class="mb-5 text-base font-bold tracking-wide text-yellow-300">
                    Menu
                </h4>

                <ul class="space-y-3 text-sm text-white/85">

                    <li>
                        <a
                            href="/tentang/profil"
                            class="transition hover:text-yellow-300"
                        >
                            Tentang Kami
                        </a>
                    </li>

                    <li>
                        <a
                            href="/tentang/visi-misi"
                            class="transition hover:text-yellow-300"
                        >
                            Visi-Misi
                        </a>
                    </li>

                    <li>
                        <a
                            href="/pelayanan"
                            class="transition hover:text-yellow-300"
                        >
                            Pelayanan
                        </a>
                    </li>

                    <li>
                        <a
                            href="/berita"
                            class="transition hover:text-yellow-300"
                        >
                            Berita
                        </a>
                    </li>

                    <li>
                        <a
                            href="/fasilitas"
                            class="transition hover:text-yellow-300"
                        >
                            Fasilitas
                        </a>
                    </li>

                    <li>
                        <a
                            href="/pegawai"
                            class="transition hover:text-yellow-300"
                        >
                            Perangkat
                        </a>
                    </li>

                </ul>

            </div>


            <!-- ======================================== -->
            <!-- HUBUNGI KAMI -->
            <!-- ======================================== -->
            <div id="kontak">

                <h4 class="mb-5 text-base font-bold tracking-wide text-yellow-300">
                    Hubungi Kami
                </h4>

                <div class="space-y-4 text-sm text-white/85">

                    <!-- Email -->
                    <?php if (!empty($kontak['email'])): ?>

                        <p class="flex items-center gap-3">

                            <i class="fa-solid fa-envelope w-5 text-yellow-300"></i>

                            <a
                                href="mailto:<?= e($kontak['email']) ?>"
                                class="break-all transition hover:text-yellow-300"
                            >
                                <?= e($kontak['email']) ?>
                            </a>

                        </p>

                    <?php endif; ?>


                    <!-- Telepon -->
                    <?php if (!empty($kontak['telepon'])): ?>

                        <p class="flex items-center gap-3">

                            <i class="fa-solid fa-phone w-5 text-yellow-300"></i>

                            <a
                                href="tel:<?= e($kontak['telepon']) ?>"
                                class="transition hover:text-yellow-300"
                            >
                                <?= e($kontak['telepon']) ?>
                            </a>

                        </p>

                    <?php endif; ?>


                    <!-- WhatsApp -->
                    <?php if (!empty($kontak['whatsapp'])): ?>

                        <p class="flex items-center gap-3">

                            <i class="fa-brands fa-whatsapp w-5 text-yellow-300"></i>

                            <a
                                href="https://wa.me/<?= e(ltrim($kontak['whatsapp'], '+')) ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="transition hover:text-yellow-300"
                            >
                                <?= e($kontak['whatsapp']) ?>
                            </a>

                        </p>

                    <?php endif; ?>

                </div>

            </div>


            <!-- ======================================== -->
            <!-- PROFIL KELURAHAN -->
            <!-- ======================================== -->
            <div>

            <h4 class="mb-5 text-base font-bold tracking-wide text-yellow-300">
                Profil Kelurahan
            </h4>

            <div class="space-y-0 text-sm">

                <!-- Kecamatan -->
                <?php if (!empty($setting['kecamatan'])): ?>

                    <div class="flex items-start justify-between gap-4 border-b border-white/10 py-3">

                        <span class="shrink-0 font-semibold text-white/55">
                            Kecamatan
                        </span>

                        <span class="text-right font-bold text-white">
                            <?= e($setting['kecamatan']) ?>
                        </span>

                    </div>

                <?php endif; ?>


                <!-- Tipologi -->
                <?php if (!empty($setting['tipologi'])): ?>

                    <div class="flex items-start justify-between gap-4 border-b border-white/10 py-3">

                        <span class="shrink-0 font-semibold text-white/55">
                            Tipologi
                        </span>

                        <span class="max-w-[180px] text-right font-bold leading-6 text-white">
                            <?= e($setting['tipologi']) ?>
                        </span>

                    </div>

                <?php endif; ?>


                <!-- Luas Wilayah -->
                <?php if (!empty($setting['luas_wilayah'])): ?>

                    <div class="flex items-start justify-between gap-4 border-b border-white/10 py-3">

                        <span class="shrink-0 font-semibold text-white/55">
                            Luas Wilayah
                        </span>

                        <span class="text-right font-bold text-white">
                            <?= number_format(
                                (float) $setting['luas_wilayah'],
                                2,
                                ',',
                                '.'
                            ) ?>
                            Km²
                        </span>

                    </div>

                <?php endif; ?>

                <!-- Social Media -->
                <div class="pt-3">

                    <div class="flex items-center gap-4">

                        <?php if (!empty($kontak['facebook'])): ?>

                            <a
                                href="<?= e($kontak['facebook']) ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="transition hover:text-yellow-300"
                                title="Facebook"
                            >
                                <i class="fa-brands fa-facebook text-xl"></i>
                            </a>

                        <?php endif; ?>


                        <?php if (!empty($kontak['instagram'])): ?>

                            <a
                                href="<?= e($kontak['instagram']) ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="transition hover:text-yellow-300"
                                title="Instagram"
                            >
                                <i class="fa-brands fa-instagram text-xl"></i>
                            </a>

                        <?php endif; ?>


                        <?php if (!empty($kontak['youtube'])): ?>

                            <a
                                href="<?= e($kontak['youtube']) ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="transition hover:text-yellow-300"
                                title="YouTube"
                            >
                                <i class="fa-brands fa-youtube text-xl"></i>
                            </a>

                        <?php endif; ?>


                        <?php if (!empty($kontak['tiktok'])): ?>

                            <a
                                href="<?= e($kontak['tiktok']) ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="transition hover:text-yellow-300"
                                title="TikTok"
                            >
                                <i class="fa-brands fa-tiktok text-xl"></i>
                            </a>

                            <?php endif; ?>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- ======================================== -->
        <!-- COPYRIGHT -->
        <!-- ======================================== -->
        <div class="mt-10 border-t border-white/10 pt-6 text-center">

            <p class="text-sm text-white/60">

                &copy; <?= date('Y') ?>

                <?= e(
                    $setting['nama_website']
                    ?? $setting['site_name']
                    ?? 'Website Kelurahan Riko'
                ) ?>

                . All Rights Reserved.

            </p>

        </div>

    </div>

</footer>


</body>
</html>