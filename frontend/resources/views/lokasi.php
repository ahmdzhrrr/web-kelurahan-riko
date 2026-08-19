<!-- Lokasi Kelurahan -->

<section id="lokasi" class="mb-12">

    <div class="mx-auto max-w-6xl">

        <!-- Header -->
        <div class="mb-8 text-center">

            <p class="text-sm font-semibold uppercase tracking-[0.3em] text-green-700">
                Lokasi
            </p>

            <h2 class="mt-2 text-3xl font-bold tracking-tight text-green-800 sm:text-4xl">
                Lokasi Kelurahan Riko
            </h2>

            <?php if (!empty($kontak['alamat'])): ?>

                <p class="mx-auto mt-4 max-w-2xl text-slate-600">
                    <?= e($kontak['alamat']) ?>
                </p>

            <?php endif; ?>

        </div>


        <?php if (!empty($kontak['maps'])): ?>

            <div
                class="overflow-hidden rounded-3xl bg-white shadow-xl ring-1 ring-slate-200"
            >

                <iframe
                    src="<?= e($kontak['maps']) ?>"
                    class="block h-[500px] w-full"
                    style="border: 0;"
                    loading="lazy"
                    allowfullscreen
                    referrerpolicy="no-referrer-when-downgrade"
                ></iframe>

            </div>

        <?php else: ?>

            <div class="rounded-2xl bg-white py-10 text-center shadow ring-1 ring-slate-200">

                <i class="fa-solid fa-location-dot text-4xl text-slate-300"></i>

                <p class="mt-3 text-sm text-slate-500">
                    Lokasi belum tersedia.
                </p>

            </div>

        <?php endif; ?>

    </div>

</section>