<?php

namespace App\Middleware;

use App\Core\Auth;
use App\Core\Response;

class SuperadminMiddleware extends Middleware
{
    public function handle(): void
    {
        if (!Auth::check()) {
            Response::redirect('/superadmin/login');
        }

        if (!Auth::hasRole('superadmin')) {
            Response::forbidden();
        }
    }
}