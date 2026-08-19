<?php
$user = \App\Core\Auth::user();
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Login Superadmin | Kelurahan Riko
    </title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

</head>

<body class="min-h-screen bg-slate-100">

    <div class="flex min-h-screen items-center justify-center px-4">

        <div class="w-full max-w-md">

            <!-- Card -->

            <div
                class="overflow-hidden rounded-3xl
                       bg-white shadow-xl
                       ring-1 ring-slate-200"
            >

                <!-- Header -->

                <div class="bg-green-900 px-8 py-10 text-center">

                    <div
                        class="mx-auto flex h-20 w-20
                               items-center justify-center
                               rounded-full bg-white
                               shadow-lg"
                    >

                        <i
                            class="fa-solid fa-building-columns
                                   text-3xl text-green-900"
                        ></i>

                    </div>

                    <h1
                        class="mt-5 text-2xl font-bold text-white"
                    >
                        Kelurahan Riko
                    </h1>

                    <p
                        class="mt-2 text-sm text-green-100"
                    >
                        Sistem Informasi Kelurahan
                    </p>

                </div>


                <!-- Form -->

                <div class="px-8 py-8">

                    <div class="mb-6">

                        <h2
                            class="text-xl font-bold text-slate-900"
                        >
                            Login Superadmin
                        </h2>

                        <p
                            class="mt-1 text-sm text-slate-500"
                        >
                            Masuk untuk mengelola konten website.
                        </p>

                    </div>


                    <!-- Flash Message -->

                    <?php if (\App\Core\Flash::has('error')): ?>

                        <div
                            class="mb-5 flex items-start gap-3
                                   rounded-xl border border-red-200
                                   bg-red-50 p-4 text-sm text-red-700"
                        >

                            <i
                                class="fa-solid fa-circle-exclamation mt-0.5"
                            ></i>

                            <span>
                                <?= e(\App\Core\Flash::get('error')) ?>
                            </span>

                        </div>

                    <?php endif; ?>


                    <?php if (\App\Core\Flash::has('success')): ?>

                        <div
                            class="mb-5 flex items-start gap-3
                                   rounded-xl border border-green-200
                                   bg-green-50 p-4 text-sm text-green-700"
                        >

                            <i
                                class="fa-solid fa-circle-check mt-0.5"
                            ></i>

                            <span>
                                <?= e(\App\Core\Flash::get('success')) ?>
                            </span>

                        </div>

                    <?php endif; ?>


                    <form
                        action="/superadmin/login"
                        method="POST"
                        class="space-y-5"
                    >

                        <!-- Username -->

                        <div>

                            <label
                                for="username"
                                class="mb-2 block text-sm
                                       font-semibold text-slate-700"
                            >
                                Username
                            </label>

                            <div class="relative">

                                <div
                                    class="pointer-events-none
                                           absolute inset-y-0 left-0
                                           flex items-center pl-4"
                                >

                                    <i
                                        class="fa-solid fa-user
                                               text-slate-400"
                                    ></i>

                                </div>

                                <input
                                    type="text"
                                    id="username"
                                    name="username"
                                    value="<?= e($_POST['username'] ?? '') ?>"
                                    autocomplete="username"
                                    placeholder="Masukkan username"
                                    required
                                    class="w-full rounded-xl
                                           border border-slate-300
                                           bg-white py-3 pl-11 pr-4
                                           text-sm text-slate-900
                                           outline-none
                                           transition
                                           focus:border-green-700
                                           focus:ring-2
                                           focus:ring-green-100"
                                >

                            </div>

                        </div>


                        <!-- Password -->

                        <div>

                            <label
                                for="password"
                                class="mb-2 block text-sm
                                       font-semibold text-slate-700"
                            >
                                Password
                            </label>

                            <div class="relative">

                                <div
                                    class="pointer-events-none
                                           absolute inset-y-0 left-0
                                           flex items-center pl-4"
                                >

                                    <i
                                        class="fa-solid fa-lock
                                               text-slate-400"
                                    ></i>

                                </div>

                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    autocomplete="current-password"
                                    placeholder="Masukkan password"
                                    required
                                    class="w-full rounded-xl
                                           border border-slate-300
                                           bg-white py-3 pl-11 pr-12
                                           text-sm text-slate-900
                                           outline-none
                                           transition
                                           focus:border-green-700
                                           focus:ring-2
                                           focus:ring-green-100"
                                >

                                <button
                                    type="button"
                                    onclick="togglePassword()"
                                    class="absolute inset-y-0 right-0
                                           flex items-center pr-4
                                           text-slate-400
                                           hover:text-slate-600"
                                >

                                    <i
                                        id="passwordIcon"
                                        class="fa-solid fa-eye"
                                    ></i>

                                </button>

                            </div>

                        </div>


                        <!-- Submit -->

                        <button
                            type="submit"
                            class="flex w-full items-center
                                   justify-center gap-2
                                   rounded-xl bg-green-900
                                   px-4 py-3
                                   text-sm font-semibold text-white
                                   shadow-md
                                   transition
                                   hover:bg-green-800
                                   hover:shadow-lg
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-green-700
                                   focus:ring-offset-2"
                        >

                            <i class="fa-solid fa-right-to-bracket"></i>

                            Masuk

                        </button>

                    </form>

                </div>


                <!-- Footer -->

                <div
                    class="border-t border-slate-100
                           bg-slate-50 px-8 py-4 text-center"
                >

                    <p class="text-xs text-slate-500">

                        © <?= date('Y') ?> Kelurahan Riko

                    </p>

                </div>

            </div>

        </div>

    </div>


    <script>

        function togglePassword() {

            const password =
                document.getElementById('password');

            const icon =
                document.getElementById('passwordIcon');

            if (password.type === 'password') {

                password.type = 'text';

                icon.classList.remove('fa-eye');

                icon.classList.add('fa-eye-slash');

            } else {

                password.type = 'password';

                icon.classList.remove('fa-eye-slash');

                icon.classList.add('fa-eye');

            }

        }

    </script>

</body>

</html>