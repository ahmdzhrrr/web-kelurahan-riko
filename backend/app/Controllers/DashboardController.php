<?php

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Controller;

class DashboardController extends Controller
{
    public function index(): void
    {
        $this->adminView('dashboard', [
            'user' => Auth::user(),
        ]);
    }
}