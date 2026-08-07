<?php

namespace App\Core;

class Controller
{
    protected function view(string $view, array $data = [])
    {
        extract($data);

        $viewFile = FRONTEND_PATH . "/resources/views/{$view}.php";

        if (!file_exists($viewFile)) {

            throw new \Exception("View {$view} tidak ditemukan.");

        }

        require FRONTEND_PATH . "/resources/layouts/header.php";

        require $viewFile;

        require FRONTEND_PATH . "/resources/layouts/footer.php";
    }

    protected function redirect(string $url)
    {
        header("Location: {$url}");

        exit;
    }

    protected function json(array $data, int $status = 200)
    {
        http_response_code($status);

        header('Content-Type: application/json');

        echo json_encode($data);

        exit;
    }
}