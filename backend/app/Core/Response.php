<?php

namespace App\Core;

class Response
{
    public static function redirect(string $url): void
    {
        header("Location: {$url}");
        exit;
    }

    public static function json(
        array $data,
        int $status = 200
    ): void
    {
        http_response_code($status);

        header('Content-Type: application/json');

        echo json_encode(
            $data,
            JSON_UNESCAPED_UNICODE |
            JSON_PRETTY_PRINT
        );

        exit;
    }

    public static function status(int $code): void
    {
        http_response_code($code);
    }

    public static function notFound(): void
    {
        self::status(404);

        echo "404 - Page Not Found";

        exit;
    }

    public static function forbidden(): void
    {
        self::status(403);

        echo "403 - Forbidden";

        exit;
    }

    public static function serverError(): void
    {
        self::status(500);

        echo "500 - Internal Server Error";

        exit;
    }
}