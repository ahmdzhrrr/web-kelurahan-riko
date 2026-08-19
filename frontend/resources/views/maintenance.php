<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Website Sedang Dalam Pemeliharaan
    </title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

</head>

<body class="flex min-h-screen items-center justify-center bg-slate-100 px-6">

    <div class="w-full max-w-lg text-center">

        <div
            class="rounded-3xl bg-white p-8 shadow-xl
                   ring-1 ring-slate-200 sm:p-12"
        >

            <div
                class="mx-auto flex h-20 w-20 items-center
                       justify-center rounded-full
                       bg-green-100 text-green-800"
            >
                <i class="fa-solid fa-screwdriver-wrench text-3xl"></i>
            </div>


            <h1 class="mt-6 text-3xl font-bold text-green-900">
                Website Sedang Dalam Pemeliharaan
            </h1>


            <p class="mt-4 leading-7 text-slate-600">
                Kami sedang melakukan pembaruan dan pemeliharaan
                website Kelurahan Riko.
            </p>


            <p class="mt-2 text-sm text-slate-500">
                Silakan kembali beberapa saat lagi.
            </p>

        </div>

        <p class="mt-6 text-xs text-slate-400">
            © <?= date('Y') ?> Kelurahan Riko
        </p>

    </div>

</body>

</html>