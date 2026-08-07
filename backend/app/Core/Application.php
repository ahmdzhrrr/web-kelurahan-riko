<?php

namespace App\Core;

class Application
{
    private Router $router;

    public function __construct()
    {
        $this->router = new Router();

        $routes = require BACKEND_PATH . '/routes/web.php';

        $routes($this->router);
    }

    public function run()
    {
        $this->router->dispatch();
    }

    public function router()
    {
        return $this->router;
    }
}