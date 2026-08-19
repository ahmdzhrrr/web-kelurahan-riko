<!-- Hero Kelurahan -->
<style>
    #hero {
        position: relative;
        overflow: hidden;
    }

    #hero .hero-bg {
        opacity: 0;
        transform: scale(1.08);
        transition:
            opacity 1.5s ease,
            transform 2s ease;
    }

    #hero.is-visible .hero-bg {
        opacity: 1;
        transform: scale(1);
    }

    #hero .hero-overlay {
        opacity: 0;
        transition: opacity 1.2s ease;
    }

    #hero.is-visible .hero-overlay {
        opacity: 1;
    }

    #hero .hero-content {
        opacity: 0;
        transform: translateY(35px);
        transition:
            opacity 1s ease,
            transform 1s ease;
    }

    #hero.is-visible .hero-content {
        opacity: 1;
        transform: translateY(0);
    }

    #hero .hero-subtitle {
        opacity: 0;
        transform: translateY(25px);
        transition:
            opacity 1s ease 300ms,
            transform 1s ease 300ms;
    }

    #hero.is-visible .hero-subtitle {
        opacity: 1;
        transform: translateY(0);
    }

    #hero .hero-description {
        opacity: 0;
        transform: translateY(25px);
        transition:
            opacity 1s ease 500ms,
            transform 1s ease 500ms;
    }

    #hero.is-visible .hero-description {
        opacity: 1;
        transform: translateY(0);
    }

    #hero .hero-button {
        opacity: 0;
        transform: translateY(20px);
        transition:
            opacity 1s ease 700ms,
            transform 1s ease 700ms;
    }

    #hero.is-visible .hero-button {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<section
    id="hero"
    class="relative min-h-[calc(100vh-80px)] w-full overflow-hidden"
>   

    <!-- Background -->
    <div class="absolute inset-0">
        <?php if (!empty($hero['gambar'])): ?>

            <img
                src="/<?= e($hero['gambar']) ?>"
                alt="<?= e($hero['judul']) ?>"
                class="hero-bg absolute inset-0 h-full w-full object-cover"
            >

        <?php else: ?>

            <div class="hero-bg absolute inset-0 h-full w-full bg-green-900"></div>

        <?php endif; ?>
    </div>

    <!-- Overlay -->
    <div
        class="hero-overlay absolute inset-0 bg-black/50"
    ></div>

    <!-- Content -->
    <div
        class="relative z-10 flex min-h-[calc(100vh-80px)] items-center justify-center px-6 py-20 text-center"
    >
        <div class="hero-content mx-auto max-w-5xl text-white">

            <h1
                class="text-4xl font-extrabold uppercase tracking-tight drop-shadow-lg sm:text-5xl md:text-6xl lg:text-7xl"
            >
                <?= e($hero['judul']) ?>
            </h1>

            <?php if (!empty($hero['deskripsi'])): ?>
                <p
                    class="hero-description mx-auto mt-6 max-w-3xl text-base leading-8 text-white/90 sm:text-lg md:text-xl"
                >
                    <?= e($hero['deskripsi']) ?>
                </p>
            <?php endif; ?>

        </div>
    </div>
</section>

<script>
(function () {
    const hero = document.getElementById('hero');

    if (!hero) {
        return;
    }

    /*
     * Animasi hero dijalankan setelah halaman selesai dimuat.
     */
    window.addEventListener('load', function () {
        setTimeout(function () {
            hero.classList.add('is-visible');
        }, 150);
    });
})();
</script>