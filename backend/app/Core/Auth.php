<?php

namespace App\Core;

class Auth
{
    public static function login(array $user): void
    {
        Session::regenerate();

        Session::set('user', [
            'id'       => $user['id'],
            'nama'     => $user['nama'],
            'username' => $user['username'],
            'role'     => $user['role'],
        ]);
    }

    public static function logout(): void
    {
        Session::destroy();
    }

    public static function user(): ?array
    {
        return Session::get('user');
    }

    public static function check(): bool
    {
        return Session::has('user');
    }

    public static function id(): ?int
    {
        return self::user()['id'] ?? null;
    }

    public static function name(): ?string
    {
        return self::user()['nama'] ?? null;
    }

    public static function username(): ?string
    {
        return self::user()['username'] ?? null;
    }

    public static function role(): ?string
    {
        return self::user()['role'] ?? null;
    }

    public static function hasRole(string $role): bool
    {
        return self::role() === $role;
    }

    public static function requireLogin(): void
    {
        if (!self::check()) {
            Response::redirect('/superadmin/login');
        }
    }

    public static function guest(): void
    {
        if (self::check()) {
            Response::redirect('/superadmin/dashboard');
        }
    }
}