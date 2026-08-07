<?php

namespace App\Middleware;

use App\Core\Auth;

class AuthMiddleware extends Middleware
{
    public function handle(): void
    {
        Auth::requireLogin();
    }
}