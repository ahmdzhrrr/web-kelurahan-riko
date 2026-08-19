<?php

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Controller;
use App\Core\Flash;
use App\Core\Request;
use App\Core\Response;
use App\Core\Validator;
use App\Models\UserModel;

class LoginController extends Controller
{
    /**
     * Halaman login
     */
    public function index(): void
    {
        Auth::guest();

        $this->guestView('admin/auth/login');
    }

    /**
     * Proses login
     */
    public function login(): void
    {
        Auth::guest();

        $validator = Validator::make(
            Request::all(),
            [
                'username' => 'required',
                'password' => 'required'
            ]
        )->setAttributes([
            'username' => 'Username',
            'password' => 'Password'
        ]);

        if ($validator->fails()) {

            Flash::error(
                $validator->firstError()
            );

            Response::redirect('/superadmin/login');
        }

        $username = trim(
            Request::input('username')
        );

        $password = Request::input('password');

        $userModel = new UserModel();

        $user = $userModel->findByUsername($username);

        /*
        |--------------------------------------------------------------------------
        | User tidak ditemukan
        |--------------------------------------------------------------------------
        */

        if (!$user) {

            Flash::error(
                'Username atau password salah.'
            );

            Response::redirect('/superadmin/login');
        }

        /*
        |--------------------------------------------------------------------------
        | Pastikan akun aktif
        |--------------------------------------------------------------------------
        */

        if (!$user['is_active']) {

            Flash::error(
                'Akun Anda tidak aktif.'
            );

            Response::redirect('/superadmin/login');
        }

        /*
        |--------------------------------------------------------------------------
        | Hanya Superadmin
        |--------------------------------------------------------------------------
        */

        if ($user['role'] !== 'superadmin') {

            Flash::error(
                'Anda tidak memiliki akses ke halaman admin.'
            );

            Response::redirect('/superadmin/login');
        }

        /*
        |--------------------------------------------------------------------------
        | Verifikasi password
        |--------------------------------------------------------------------------
        */

        if (!password_verify($password, $user['password'])) {

            Flash::error(
                'Username atau password salah.'
            );

            Response::redirect('/superadmin/login');
        }

        /*
        |--------------------------------------------------------------------------
        | Update waktu login
        |--------------------------------------------------------------------------
        */

        $userModel->update(
            $user['id'],
            [
                'last_login' => date('Y-m-d H:i:s')
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | Simpan session
        |--------------------------------------------------------------------------
        */

        Auth::login($user);

        Flash::success(
            'Selamat datang, ' . $user['nama']
        );

        Response::redirect('/superadmin/dashboard');
    }

    /**
     * Logout
     */
    public function logout(): void
    {
        Auth::logout();

        Flash::success(
            'Anda berhasil logout.'
        );

        Response::redirect('/superadmin/login');
    }
}