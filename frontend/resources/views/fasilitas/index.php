<section class="mt-10 mb-12">

    <div class="mx-auto max-w-6xl px-4">

        <!-- Header -->
        <div class="mb-10 text-center">

            <h1 class="text-3xl font-bold tracking-tight text-green-800 sm:text-4xl">
                Fasilitas Kelurahan
            </h1>

            <p class="mx-auto mt-3 max-w-2xl text-slate-600">
                Berbagai fasilitas yang tersedia di lingkungan Kelurahan Riko
                untuk mendukung pelayanan dan kegiatan masyarakat.
            </p>

        </div>


        <?php if (!empty($fasilitas)): ?>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">

                <?php foreach ($fasilitas as $item): ?>

                    <article
                        class="overflow-hidden rounded-2xl bg-white shadow-md ring-1 ring-slate-200 transition duration-300 hover:-translate-y-1 hover:shadow-xl"
                    >

                        <!-- Foto -->
                        <?php if (!empty($item['foto'])): ?>

                            <?php
                            $fotoUtama = $item['foto'][0];
                            ?>

                            <div class="h-56 overflow-hidden">

                                <img
                                    src="<?= e($fotoUtama) ?>"
                                    alt="<?= e($item['nama']) ?>"
                                    class="h-full w-full object-cover transition duration-500 hover:scale-105"
                                >

                            </div>

                        <?php else: ?>

                            <div class="flex h-56 items-center justify-center bg-slate-100">

                                <i class="fa-solid fa-building text-5xl text-slate-400"></i>

                            </div>

                        <?php endif; ?>


                        <!-- Content -->
                        <div class="p-6">

                            <h2 class="text-xl font-bold text-slate-900">
                                <?= e($item['nama']) ?>
                            </h2>

                            <?php if (!empty($item['deskripsi'])): ?>

                                <p class="mt-3 text-sm leading-7 text-slate-600">
                                    <?= e($item['deskripsi']) ?>
                                </p>

                            <?php endif; ?>


                            <!-- Foto tambahan -->
                            <?php if (count($item['foto']) > 1): ?>

                                <div class="mt-5 flex gap-2 overflow-x-auto">

                                    <?php foreach ($item['foto'] as $foto): ?>

                                        <img
                                            src="<?= e($foto) ?>"
                                            alt="<?= e($item['nama']) ?>"
                                            class="h-16 w-20 shrink-0 rounded-lg object-cover"
                                        >

                                    <?php endforeach; ?>

                                </div>

                            <?php endif; ?>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>

        <?php else: ?>

            <div class="rounded-2xl bg-slate-50 py-16 text-center">

                <i class="fa-solid fa-building text-4xl text-slate-400"></i>

                <p class="mt-4 text-slate-500">
                    Belum ada data fasilitas.
                </p>

            </div>

        <?php endif; ?>

    </div>

</section>