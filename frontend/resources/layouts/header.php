<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($site['nama']) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans text-gray-800">

    <!-- Header -->
    <header class="bg-green-700 text-white shadow">
        <div class="container mx-auto px-4 py-6 flex flex-col md:flex-row items-center md:justify-between gap-4">
            <div class="flex items-center gap-4">
                <img src="<?= e($site['logo']) ?>" alt="Logo <?= e($site['nama']) ?>"
                     class="h-16 w-16 rounded-full border border-white shadow object-cover">
                <div class="text-center md:text-left">
                    <h1 class="text-3xl font-bold"><?= e($site['nama']) ?></h1>
                    <p class="text-sm"><?= e($site['tagline']) ?></p>
                </div>
            </div>
            <p class="text-sm max-w-xs text-center md:text-right"><?= e($site['salam']) ?></p>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="bg-green-800 text-white sticky top-0 z-10 shadow">
        <div class="container mx-auto px-4">
            <ul class="flex flex-wrap justify-center gap-x-6 gap-y-2 py-3 text-sm font-semibold">
                <?php foreach ($menu as $item): ?>
                    <li><a href="<?= e($item['href']) ?>" class="hover:underline"><?= e($item['label']) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-8">
