<div class="max-w-3xl">

    <div class="mb-8">

        <h2 class="text-2xl font-bold text-slate-800">
            Profil Superadmin
        </h2>

        <p class="mt-2 text-sm text-slate-500">
            Kelola informasi akun superadmin.
        </p>

    </div>


    <!-- PROFIL DASAR -->

    <div class="mb-6 rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">

        <h3 class="text-lg font-bold text-green-800">
            Informasi Akun
        </h3>

        <p class="mt-1 text-sm text-slate-500">
            Ubah nama, username, dan email akun.
        </p>


        <form
            action="/superadmin/profil/update"
            method="POST"
            class="mt-6 space-y-5"
        >

            <div>

                <label
                    for="nama"
                    class="mb-2 block text-sm font-semibold text-slate-700"
                >
                    Nama
                </label>

                <input
                    type="text"
                    id="nama"
                    name="nama"
                    value="<?= e($user['nama']) ?>"
                    required
                    class="w-full rounded-xl border border-slate-300
                           px-4 py-3 outline-none
                           focus:border-green-700
                           focus:ring-2 focus:ring-green-100"
                >

            </div>


            <div>

                <label
                    for="username"
                    class="mb-2 block text-sm font-semibold text-slate-700"
                >
                    Username
                </label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    value="<?= e($user['username']) ?>"
                    required
                    class="w-full rounded-xl border border-slate-300
                           px-4 py-3 outline-none
                           focus:border-green-700
                           focus:ring-2 focus:ring-green-100"
                >

            </div>


            <div>

                <label
                    for="email"
                    class="mb-2 block text-sm font-semibold text-slate-700"
                >
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="<?= e($user['email'] ?? '') ?>"
                    required
                    class="w-full rounded-xl border border-slate-300
                           px-4 py-3 outline-none
                           focus:border-green-700
                           focus:ring-2 focus:ring-green-100"
                >

            </div>


            <div>

                <label
                    class="mb-2 block text-sm font-semibold text-slate-700"
                >
                    Role
                </label>

                <div
                    class="rounded-xl border border-slate-200
                           bg-slate-50 px-4 py-3
                           text-sm font-semibold text-slate-500"
                >
                    <?= e($user['role']) ?>
                </div>

            </div>


            <div class="flex justify-end">

                <button
                    type="submit"
                    class="rounded-xl bg-green-900
                           px-6 py-3
                           text-sm font-semibold text-white
                           transition hover:bg-green-800"
                >
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>


    <!-- PASSWORD -->

    <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">

        <h3 class="text-lg font-bold text-green-800">
            Ubah Password
        </h3>

        <p class="mt-1 text-sm text-slate-500">
            Gunakan password minimal 8 karakter.
        </p>


        <form
            action="/superadmin/profil/password"
            method="POST"
            class="mt-6 space-y-5"
        >

            <div>

                <label
                    for="password_lama"
                    class="mb-2 block text-sm font-semibold text-slate-700"
                >
                    Password Lama
                </label>

                <input
                    type="password"
                    id="password_lama"
                    name="password_lama"
                    required
                    class="w-full rounded-xl border border-slate-300
                           px-4 py-3 outline-none
                           focus:border-green-700
                           focus:ring-2 focus:ring-green-100"
                >

            </div>


            <div>

                <label
                    for="password_baru"
                    class="mb-2 block text-sm font-semibold text-slate-700"
                >
                    Password Baru
                </label>

                <input
                    type="password"
                    id="password_baru"
                    name="password_baru"
                    required
                    minlength="8"
                    class="w-full rounded-xl border border-slate-300
                           px-4 py-3 outline-none
                           focus:border-green-700
                           focus:ring-2 focus:ring-green-100"
                >

            </div>


            <div>

                <label
                    for="password_konfirmasi"
                    class="mb-2 block text-sm font-semibold text-slate-700"
                >
                    Konfirmasi Password Baru
                </label>

                <input
                    type="password"
                    id="password_konfirmasi"
                    name="password_konfirmasi"
                    required
                    minlength="8"
                    class="w-full rounded-xl border border-slate-300
                           px-4 py-3 outline-none
                           focus:border-green-700
                           focus:ring-2 focus:ring-green-100"
                >

            </div>


            <div class="flex justify-end">

                <button
                    type="submit"
                    class="rounded-xl bg-green-900
                           px-6 py-3
                           text-sm font-semibold text-white
                           transition hover:bg-green-800"
                >
                    Ubah Password
                </button>

            </div>

        </form>

    </div>

</div>