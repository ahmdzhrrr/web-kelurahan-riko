<?php

namespace App\Middleware;

use App\Core\Auth;

class GuestMiddleware extends Middleware
{
    public function handle(): void
    {
        Auth::guest();
    }
}