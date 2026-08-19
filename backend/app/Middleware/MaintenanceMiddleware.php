<?php

namespace App\Middleware;

use App\Core\Auth;
use App\Models\SettingModel;

class MaintenanceMiddleware extends Middleware
{
    public function handle(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Superadmin tetap bisa mengakses website
        |--------------------------------------------------------------------------
        */
        if (Auth::check() && Auth::hasRole('superadmin')) {
            return;
        }

        /*
        |--------------------------------------------------------------------------
        | Ambil status maintenance
        |--------------------------------------------------------------------------
        */
        $settingModel = new SettingModel();

        $setting = $settingModel->getSetting();

        /*
        |--------------------------------------------------------------------------
        | Website sedang maintenance
        |--------------------------------------------------------------------------
        */
        if (!empty($setting['maintenance_mode'])) {

            require FRONTEND_PATH .
                '/resources/views/maintenance.php';

            exit;
        }
    }
}