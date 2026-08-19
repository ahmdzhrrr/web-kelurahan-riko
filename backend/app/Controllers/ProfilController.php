<?php

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Controller;
use App\Core\Flash;
use App\Core\Request;
use App\Core\Response;
use App\Models\UserModel;

class ProfilController extends Controller
{
    protected UserModel $user;

    public function __construct()
    {
        $this->user = new UserModel();
    }

    /**
     * Halaman profil superadmin
     */
    public function index(): void
    {
        $user = $this->user->find(Auth::id());

        if (!$user) {
            Flash::error('Data akun tidak ditemukan.');
            Response::redirect('/superadmin/dashboard');
        }

        $this->adminView('profil', [
            'user' => $user,
        ]);
    }


    /**
     * Update profil dasar:
     * nama, username, email
     */
    public function update(): void
    {
        $userId = Auth::id();

        $nama = trim(
            (string) Request::input('nama')
        );

        $username = trim(
            (string) Request::input('username')
        );

        $email = trim(
            (string) Request::input('email')
        );


        /*
        |--------------------------------------------------------------------------
        | Validasi
        |--------------------------------------------------------------------------
        */

        if ($nama === '') {
            Flash::error('Nama wajib diisi.');
            Response::redirect('/superadmin/profil');
        }

        if ($username === '') {
            Flash::error('Username wajib diisi.');
            Response::redirect('/superadmin/profil');
        }

        if ($email === '') {
            Flash::error('Email wajib diisi.');
            Response::redirect('/superadmin/profil');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Flash::error('Format email tidak valid.');
            Response::redirect('/superadmin/profil');
        }


        /*
        |--------------------------------------------------------------------------
        | Cek username unik
        |--------------------------------------------------------------------------
        */

        $existingUsername = $this->user->findByUsername($username);

        if (
            $existingUsername &&
            (int) $existingUsername['id'] !== (int) $userId
        ) {
            Flash::error('Username sudah digunakan.');
            Response::redirect('/superadmin/profil');
        }


        /*
        |--------------------------------------------------------------------------
        | Cek email unik
        |--------------------------------------------------------------------------
        */

        $existingEmail = $this->user->findByEmail($email);

        if (
            $existingEmail &&
            (int) $existingEmail['id'] !== (int) $userId
        ) {
            Flash::error('Email sudah digunakan.');
            Response::redirect('/superadmin/profil');
        }


        /*
        |--------------------------------------------------------------------------
        | Update data
        |--------------------------------------------------------------------------
        */

        $success = $this->user->update(
            $userId,
            [
                'nama'     => $nama,
                'username' => $username,
                'email'    => $email,
            ]
        );

        if (!$success) {
            Flash::error('Gagal memperbarui profil.');
            Response::redirect('/superadmin/profil');
        }


        /*
        |--------------------------------------------------------------------------
        | Perbarui session
        |--------------------------------------------------------------------------
        */

        $sessionUser = Auth::user();

        $sessionUser['nama'] = $nama;
        $sessionUser['username'] = $username;

        \App\Core\Session::set(
            'user',
            $sessionUser
        );


        Flash::success(
            'Profil berhasil diperbarui.'
        );

        Response::redirect('/superadmin/profil');
    }


    /**
     * Ganti password
     */
    public function updatePassword(): void
    {
        $userId = Auth::id();

        $passwordLama = (string) Request::input(
            'password_lama'
        );

        $passwordBaru = (string) Request::input(
            'password_baru'
        );

        $passwordKonfirmasi = (string) Request::input(
            'password_konfirmasi'
        );


        /*
        |--------------------------------------------------------------------------
        | Ambil user
        |--------------------------------------------------------------------------
        */

        $user = $this->user->find($userId);

        if (!$user) {
            Flash::error('Data akun tidak ditemukan.');
            Response::redirect('/superadmin/profil');
        }


        /*
        |--------------------------------------------------------------------------
        | Validasi password lama
        |--------------------------------------------------------------------------
        */

        if (
            $passwordLama === '' ||
            !password_verify(
                $passwordLama,
                $user['password']
            )
        ) {
            Flash::error('Password lama salah.');
            Response::redirect('/superadmin/profil');
        }


        /*
        |--------------------------------------------------------------------------
        | Validasi password baru
        |--------------------------------------------------------------------------
        */

        if (strlen($passwordBaru) < 8) {
            Flash::error(
                'Password baru minimal 8 karakter.'
            );

            Response::redirect('/superadmin/profil');
        }


        if ($passwordBaru !== $passwordKonfirmasi) {
            Flash::error(
                'Konfirmasi password tidak sesuai.'
            );

            Response::redirect('/superadmin/profil');
        }


        /*
        |--------------------------------------------------------------------------
        | Hash password
        |--------------------------------------------------------------------------
        */

        $passwordHash = password_hash(
            $passwordBaru,
            PASSWORD_DEFAULT
        );


        /*
        |--------------------------------------------------------------------------
        | Update langsung karena password
        |--------------------------------------------------------------------------
        */

        $stmt = $this->user->getDatabase()->prepare("
            UPDATE users
            SET password = ?
            WHERE id = ?
        ");

        $stmt->bind_param(
            'si',
            $passwordHash,
            $userId
        );

        if (!$stmt->execute()) {
            Flash::error(
                'Gagal mengubah password.'
            );

            Response::redirect('/superadmin/profil');
        }


        Flash::success(
            'Password berhasil diubah.'
        );

        Response::redirect('/superadmin/profil');
    }
}