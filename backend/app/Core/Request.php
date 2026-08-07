<?php

namespace App\Core;

class Request
{
    public static function method(): string
    {
        return strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');
    }

    public static function isGet(): bool
    {
        return self::method() === 'GET';
    }

    public static function isPost(): bool
    {
        return self::method() === 'POST';
    }

    public static function all(): array
    {
        return $_POST;
    }

    public static function body(): array
    {
        return $_POST;
    }

    public static function input(string $key, mixed $default = null): mixed
    {
        return $_POST[$key] ?? $default;
    }

    public static function queries(): array
    {
        return $_GET;
    }

    public static function query(string $key, mixed $default = null): mixed
    {
        return $_GET[$key] ?? $default;
    }

    public static function only(array $keys): array
    {
        $result = [];

        foreach ($keys as $key) {
            $result[$key] = $_POST[$key] ?? null;
        }

        return $result;
    }

    public static function except(array $keys): array
    {
        $result = $_POST;

        foreach ($keys as $key) {
            unset($result[$key]);
        }

        return $result;
    }

    public static function has(string $key): bool
    {
        return isset($_POST[$key]);
    }

    public static function hasAny(array $keys): bool
    {
        foreach ($keys as $key) {
            if (isset($_POST[$key])) {
                return true;
            }
        }

        return false;
    }

    public static function hasAll(array $keys): bool
    {
        foreach ($keys as $key) {
            if (!isset($_POST[$key])) {
                return false;
            }
        }

        return true;
    }

    public static function file(string $key): ?array
    {
        return $_FILES[$key] ?? null;
    }

    public static function files(): array
    {
        return $_FILES;
    }

    public static function hasFile(string $key): bool
    {
        return isset($_FILES[$key]) &&
               $_FILES[$key]['error'] === UPLOAD_ERR_OK;
    }

    public static function url(): string
    {
        return strtok($_SERVER['REQUEST_URI'], '?');
    }

    public static function fullUrl(): string
    {
        return $_SERVER['REQUEST_URI'] ?? '/';
    }

    /**
     * IP client.
     */
    public static function ip(): string
    {
        return $_SERVER['REMOTE_ADDR'] ?? '';
    }

    public static function userAgent(): string
    {
        return $_SERVER['HTTP_USER_AGENT'] ?? '';
    }

    public static function ajax(): bool
    {
        return strtolower(
            $_SERVER['HTTP_X_REQUESTED_WITH'] ?? ''
        ) === 'xmlhttprequest';
    }

    public static function referer(): ?string
    {
        return $_SERVER['HTTP_REFERER'] ?? null;
    }

    public static function host(): string
    {
        return $_SERVER['HTTP_HOST'] ?? '';
    }

    public static function secure(): bool
    {
        return !empty($_SERVER['HTTPS']) &&
               $_SERVER['HTTPS'] !== 'off';
    }
}