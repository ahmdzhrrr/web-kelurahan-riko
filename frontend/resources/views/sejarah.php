<!-- Halaman Sejarah Kelurahan -->

<section class="mt-10 mb-16">
    <div class="mx-auto max-w-6xl px-4">

        <!-- Header -->
        <div class="mb-10 text-center">

            <h1 class="text-3xl font-bold tracking-tight text-green-900 sm:text-4xl">
                <?= e($sejarah['judul'] ?? 'Sejarah Kelurahan Riko') ?>
            </h1>

            <p class="mx-auto mt-4 max-w-2xl leading-7 text-slate-600">
                Sejarah dan perkembangan Kelurahan Riko dari masa ke masa.
            </p>

        </div>


        <!-- Kontainer Sejarah -->
        <article
            class="rounded-3xl bg-white p-6 shadow-lg
                   ring-1 ring-slate-200
                   sm:p-8 lg:p-10"
        >

            <?php if (!empty($sejarah)): ?>

                <div class="text-justify leading-8 text-slate-700">

                    <?php
                    /*
                    |--------------------------------------------------------------------------
                    | Pecah isi menjadi paragraf
                    |--------------------------------------------------------------------------
                    | Isi dari database dipisahkan berdasarkan baris kosong.
                    */
                    $paragraf = preg_split(
                        "/\R\s*\R/",
                        trim($sejarah['isi'] ?? '')
                    );
                    ?>


                    <!-- ==========================================================
                         BAGIAN 1 — FOTO KIRI
                         ========================================================== -->

                    <?php if (!empty($sejarah['foto_1'])): ?>

                        <img
                            src="/<?= e(ltrim($sejarah['foto_1'], '/')) ?>"
                            alt="<?= e($sejarah['judul'] ?? 'Sejarah Kelurahan Riko') ?>"
                            class="float-left mb-5 mr-7 h-52 w-72
                                   rounded-2xl object-cover shadow-md
                                   ring-1 ring-slate-200"
                        >

                    <?php endif; ?>


                    <!-- Paragraf awal -->

                    <?php if (!empty($paragraf[0])): ?>

                        <p class="mb-5">
                            <?= nl2br(e(trim($paragraf[0]))) ?>
                        </p>

                    <?php endif; ?>


                    <?php if (!empty($paragraf[1])): ?>

                        <p class="mb-5">
                            <?= nl2br(e(trim($paragraf[1]))) ?>
                        </p>

                    <?php endif; ?>


                    <?php if (!empty($paragraf[2])): ?>

                        <p class="mb-5">
                            <?= nl2br(e(trim($paragraf[2]))) ?>
                        </p>

                    <?php endif; ?>


                    <!-- Bersihkan float foto 1 -->
                    <div class="clear-both"></div>


                    <!-- ==========================================================
                         BAGIAN 2 — FOTO KANAN
                         ========================================================== -->

                    <?php if (!empty($sejarah['foto_2'])): ?>

                        <img
                            src="/<?= e(ltrim($sejarah['foto_2'], '/')) ?>"
                            alt="<?= e($sejarah['judul'] ?? 'Perkembangan Kelurahan Riko') ?>"
                            class="float-right mb-5 ml-7 mt-4 h-52 w-72
                                   rounded-2xl object-cover shadow-md
                                   ring-1 ring-slate-200"
                        >

                    <?php endif; ?>


                    <!-- Paragraf berikutnya -->

                    <?php if (!empty($paragraf[3])): ?>

                        <p class="mb-5">
                            <?= nl2br(e(trim($paragraf[3]))) ?>
                        </p>

                    <?php endif; ?>


                    <?php if (!empty($paragraf[4])): ?>

                        <p class="mb-5">
                            <?= nl2br(e(trim($paragraf[4]))) ?>
                        </p>

                    <?php endif; ?>


                    <?php if (!empty($paragraf[5])): ?>

                        <p class="mb-5">
                            <?= nl2br(e(trim($paragraf[5]))) ?>
                        </p>

                    <?php endif; ?>


                    <!-- Bersihkan float foto 2 -->
                    <div class="clear-both"></div>


                    <!-- ==========================================================
                         FALLBACK
                         ========================================================== -->

                    <?php if (empty($sejarah['isi'])): ?>

                        <div class="py-8 text-center text-slate-500">
                            Belum ada informasi sejarah Kelurahan Riko.
                        </div>

                    <?php endif; ?>

                </div>

            <?php else: ?>

                <!-- Data sejarah tidak ditemukan -->

                <div class="py-12 text-center">

                    <i class="fa-solid fa-book-open text-4xl text-slate-300"></i>

                    <p class="mt-4 text-slate-500">
                        Informasi sejarah Kelurahan Riko belum tersedia.
                    </p>

                </div>

            <?php endif; ?>

        </article>

    </div>
</section>