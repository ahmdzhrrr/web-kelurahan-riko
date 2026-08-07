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
    public function index(): void
    {
        Auth::guest();

        $this->view('admin/auth/login');
    }

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

            Response::redirect('/admin/login');
        }

        $userModel = new UserModel();

        $user = $userModel->findByUsername(
            Request::input('username')
        );

        if (!$user) {

            Flash::error(
                'Username atau password salah.'
            );

            Response::redirect('/admin/login');
        }

        if (!$user['is_active']) {

            Flash::error(
                'Akun Anda tidak aktif.'
            );

            Response::redirect('/admin/login');
        }

        if (!password_verify(
            Request::input('password'),
            $user['password']
        )) {

            Flash::error(
                'Username atau password salah.'
            );

            Response::redirect('/admin/login');
        }

        $userModel->update(
            $user['id'],
            [
                'last_login' => date('Y-m-d H:i:s')
            ]
        );

        Auth::login($user);

        Flash::success(
            'Selamat datang, ' . $user['nama']
        );

        Response::redirect('/admin/dashboard');
    }

    public function logout(): void
    {
        Auth::logout();

        Flash::success(
            'Anda berhasil logout.'
        );

        Response::redirect('/admin/login');
    }
}