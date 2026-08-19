<?php
/**
 * Halaman Profil Kelurahan
 */
?>

<style>
    #profil-page .profil-reveal {
        opacity: 0;
        transform: translateY(30px);
        transition:
            opacity 900ms ease,
            transform 900ms ease;
    }

    #profil-page .profil-reveal.is-visible {
        opacity: 1;
        transform: translateY(0);
    }

    #profil-page .cover-image {
        transition: transform 1.2s ease;
    }

    #profil-page .cover-wrapper:hover .cover-image {
        transform: scale(1.03);
    }

    #profil-page .video-wrapper {
        transition:
            transform 400ms ease,
            box-shadow 400ms ease;
    }

    #profil-page .video-wrapper:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 35px rgba(0, 0, 0, 0.12);
    }
</style>


<div id="profil-page">

    <!-- =========================================
         SAMPUL PROFIL
    ========================================== -->
    <section class="relative w-full overflow-hidden">

        <?php if (!empty($profil['gambar'])): ?>

            <div class="cover-wrapper relative h-[180px] sm:h-[250px] md:h-[320px] overflow-hidden">

                <img
                    src="/<?= e($profil['gambar']) ?>"
                    alt="<?= e($profil['judul'] ?? 'Profil Kelurahan Riko') ?>"
                    class="cover-image absolute inset-0 h-full w-full object-cover"
                >

                <!-- Overlay -->
                <div class="absolute inset-0 bg-black/45"></div>

                <!-- Judul -->
                <div class="relative z-10 flex h-full items-center justify-center px-6 text-center">

                    <div class="profil-reveal" data-reveal>

                    <p class="mt-4 text-3xl font-bold uppercase tracking-tight text-white sm:text-4xl">
                        Tentang Kami
                    </p>

                    </div>

                </div>

            </div>

        <?php endif; ?>

    </section>


    <!-- =========================================
         INFORMASI PROFIL + VIDEO
    ========================================== -->
    <section class="bg-slate-100 px-4 py-12 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-7xl">

            <div class="grid gap-10 lg:grid-cols-2 lg:items-center">


                <!-- INFORMASI PROFIL -->
                <div
                    class="profil-reveal"
                    data-reveal
                >

                    <span class="inline-flex rounded-full bg-green-100 px-4 py-1.5 text-xs font-bold uppercase tracking-wider text-green-800">
                        Profil Kelurahan
                    </span>

                    <h2 class="mt-4 text-3xl font-bold uppercase tracking-tight text-green-900 sm:text-4xl">
                        <?= e($profil['judul']) ?>
                    </h2>

                    <div class="mt-4 h-1 w-20 rounded-full bg-green-700"></div>

                    <div class="mt-6 space-y-4 text-base leading-8 text-slate-700">

                        <?php
                        $isi = trim($profil['isi'] ?? '');
                        $paragraf = preg_split('/\R\s*\R/', $isi);
                        ?>

                        <?php foreach ($paragraf as $text): ?>

                            <?php if (trim($text) !== ''): ?>

                                <p>
                                    <?= nl2br(e(trim($text))) ?>
                                </p>

                            <?php endif; ?>

                        <?php endforeach; ?>

                    </div>

                </div>


                <!-- VIDEO PROFIL -->
                <div
                    class="profil-reveal"
                    data-reveal
                    style="transition-delay: 180ms;"
                >

                    <?php if (!empty($profil['video_url'])): ?>

                        <div class="video-wrapper overflow-hidden rounded-2xl bg-white shadow-xl ring-1 ring-slate-200">

                            <div class="aspect-video w-full">

                                <iframe
                                    src="<?= e($profil['video_url']) ?>"
                                    title="Video Profil Kelurahan Riko"
                                    class="h-full w-full"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen>
                                </iframe>

                            </div>

                        </div>

                    <?php else: ?>

                        <div class="flex aspect-video items-center justify-center rounded-2xl bg-slate-200 text-center text-slate-500 shadow-inner">

                            <div>
                                <i class="fa-solid fa-video-slash mb-3 text-3xl"></i>

                                <p class="text-sm">
                                    Video profil belum tersedia.
                                </p>
                            </div>

                        </div>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </section>

                <!-- LOKASI KELURAHAN -->
    <section class="bg-slate-100 px-4 py-12 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-7xl">

            <div class="grid gap-10 lg:grid-cols-2 lg:items-center">

                <div
                    class="profil-reveal"
                    data-reveal
                >

                    <span class="inline-flex rounded-full bg-green-100 px-4 py-1.5 text-xs font-bold uppercase tracking-wider text-green-800">
                        Lokasi
                    </span>

                    <h2 class="mt-4 text-3xl font-bold uppercase tracking-tight text-green-900 sm:text-4xl">
                        <?= e($profil['judul']) ?>
                    </h2>


                        <p class="mx-auto mt-4 max-w-2xl text-slate-600">
                            Peta lokasi kantor kelurahan dan informasi kontak yang tersimpan pada sistem.
                        </p>

                        <div class="mt-4 h-1 w-20 rounded-full bg-green-700"></div>

                        <div class="mt-6 space-y-4 text-base leading-8 text-slate-700">
                    </div>

                </div>


    

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


<!-- =========================================
     ANIMASI REVEAL
========================================== -->
<script>
(function () {

    const items = document.querySelectorAll(
        '#profil-page [data-reveal]'
    );

    if (!items.length) {
        return;
    }

    const reveal = (element) => {
        element.classList.add('is-visible');
    };

    if ('IntersectionObserver' in window) {

        const observer = new IntersectionObserver(
            (entries, currentObserver) => {

                entries.forEach((entry) => {

                    if (entry.isIntersecting) {

                        reveal(entry.target);

                        currentObserver.unobserve(entry.target);

                    }

                });

            },
            {
                threshold: 0.15,
                rootMargin: '0px 0px -60px 0px'
            }
        );

        items.forEach((item) => {
            observer.observe(item);
        });

    } else {

        items.forEach(reveal);

    }

})();
</script>