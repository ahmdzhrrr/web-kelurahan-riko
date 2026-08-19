<?php

namespace App\Core;

class Controller
{
    /**
     * Render view frontend
     */
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

    protected function guestView(string $view, array $data = [])
    {
        extract($data);

        $viewFile = FRONTEND_PATH . "/resources/views/{$view}.php";

        if (!file_exists($viewFile)) {
            throw new \Exception("View {$view} tidak ditemukan.");
        }

        require $viewFile;
    }

    /**
     * Render view admin
     */
    protected function adminView(string $view, array $data = [])
    {
        $viewFile = FRONTEND_PATH . "/resources/views/admin/{$view}.php";
    
        if (!file_exists($viewFile)) {
            throw new \Exception("Admin view {$view} tidak ditemukan.");
        }
    
        $settingModel = new \App\Models\SettingModel();
    
        $data['setting'] = $data['setting']
            ?? $settingModel->getSetting();
    
        extract($data);
    
        require FRONTEND_PATH . "/resources/views/admin/layout.php";
    }


    /**
     * Redirect
     */
    protected function redirect(string $url)
    {
        header("Location: {$url}");

        exit;
    }


    /**
     * JSON response
     */
    protected function json(array $data, int $status = 200)
    {
        http_response_code($status);

        header('Content-Type: application/json');

        echo json_encode($data);

        exit;
    }
}