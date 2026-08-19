<!-- Halaman Aparatur Kelurahan -->

<section class="mt-10 mb-16">

    <div class="mx-auto max-w-6xl">

        <!-- Header -->
        <div class="mb-10 text-center">

            <h1 class="mt-2 text-3xl font-bold tracking-tight text-green-900 sm:text-4xl">
                Aparatur Kelurahan Riko
            </h1>

            <p class="mx-auto mt-4 max-w-2xl leading-7 text-slate-600">
                Daftar aparatur dan pegawai yang bertugas dalam pelayanan
                pemerintahan di Kelurahan Riko.
            </p>

        </div>

        <?php if (!empty($pegawai)): ?>

            <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">

                <?php foreach ($pegawai as $member): ?>

                    <article
                        class="group flex flex-col items-center text-center
                               rounded-2xl bg-white p-5
                               shadow-md ring-1 ring-slate-200
                               transition duration-300
                               hover:-translate-y-1 hover:shadow-xl"
                    >

                        <!-- Foto -->
                        <?php if (!empty($member['foto'])): ?>

                            <img
                                src="/<?= e(ltrim($member['foto'], '/')) ?>"
                                alt="<?= e($member['nama']) ?>"
                                class="h-32 w-32 rounded-full object-cover
                                       border-4 border-green-900
                                       shadow-md
                                       transition duration-300
                                       group-hover:scale-105"
                            >

                        <?php else: ?>

                            <div
                                class="flex h-32 w-32 items-center justify-center
                                       rounded-full bg-slate-200
                                       border-4 border-green-900
                                       shadow-md
                                       transition duration-300
                                       group-hover:scale-105"
                            >
                                <i class="fa-solid fa-user text-4xl text-slate-500"></i>
                            </div>

                        <?php endif; ?>


                        <!-- Nama -->
                        <h2 class="mt-5 text-base font-bold leading-6 text-slate-900">
                            <?= e($member['nama']) ?>
                        </h2>


                        <!-- Jabatan -->
<?php if (!empty($member['jabatan'])): ?>

<div
    class="mt-3 inline-flex rounded-full
           bg-green-900 px-3 py-1
           text-xs font-semibold
           tracking-wide text-white"
>
    <?= e($member['jabatan']) ?>
</div>

<?php endif; ?>


<!-- Unit Organisasi -->
<?php if (!empty($member['unit_organisasi'])): ?>

<p class="mt-2 text-xs font-medium leading-5 text-slate-500">
    <?= e($member['unit_organisasi']) ?>
</p>

<?php endif; ?>


                        <!-- NIP -->
                        <?php if (!empty($member['nip'])): ?>

                            <p class="mt-3 text-xs text-slate-500">
                                NIP. <?= e($member['nip']) ?>
                            </p>

                        <?php endif; ?>

                    </article>

                <?php endforeach; ?>

            </div>

        <?php else: ?>

            <div
                class="rounded-2xl bg-white p-10 text-center
                       shadow ring-1 ring-slate-200"
            >

                <i class="fa-solid fa-users text-4xl text-slate-300"></i>

                <p class="mt-4 text-slate-500">
                    Belum ada data aparatur kelurahan.
                </p>

            </div>

        <?php endif; ?>

    </div>

</section>