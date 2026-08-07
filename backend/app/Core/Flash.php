<?php

namespace App\Core;

class Flash
{
    public static function set(
        string $key,
        string $message
    ): void
    {
        Session::set(
            "flash_{$key}",
            $message
        );
    }

    public static function get(string $key): ?string
    {
        $message = Session::get("flash_{$key}");

        Session::remove("flash_{$key}");

        return $message;
    }

    public static function has(string $key): bool
    {
        return Session::has("flash_{$key}");
    }

    public static function success(string $message): void
    {
        self::set('success', $message);
    }

    public static function error(string $message): void
    {
        self::set('error', $message);
    }

    public static function warning(string $message): void
    {
        self::set('warning', $message);
    }

    public static function info(string $message): void
    {
        self::set('info', $message);
    }
}