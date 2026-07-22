<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($site['nama']) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="bg-slate-100 font-sans text-gray-800">

    <!-- Header -->
    <header class="bg-gradient-to-r from-green-800 via-green-700 to-green-900 text-white shadow-lg border-b border-white/10">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-2 py-6 flex flex-col md:flex-row items-center md:justify-between gap-10">
            <div class="flex items-center gap-4">
                <img src="<?= e($site['logo']) ?>" alt="Logo <?= e($site['nama']) ?>"
                     class="h-16 w-16 rounded-full border border-white/80 shadow-lg object-cover ring-2 ring-white/15">
                <div class="text-center md:text-left">
                    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold tracking-tight"><?= e($site['nama']) ?></h1>
                    <p class="text-sm text-white/85 mt-1"><?= e($site['tagline']) ?></p>
                </div>
            </div>
            <p class="text-sm max-w-md text-center md:text-right text-white/85 leading-6"><?= e($site['salam']) ?></p>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="sticky top-0 z-20 bg-green-950/95 text-white shadow-lg backdrop-blur border-b border-white/10">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <ul class="flex flex-wrap justify-center gap-x-10 gap-y-2 py-3 text-sm font-semibold">
                <?php foreach ($menu as $item): ?>
                    <li>
                        <a href="<?= e($item['href']) ?>" class="inline-flex items-center rounded-full px-4 py-2 transition-colors duration-200 hover:bg-white/10 hover:text-yellow-300">
                            <?= e($item['label']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </nav>

    <main class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-8">
