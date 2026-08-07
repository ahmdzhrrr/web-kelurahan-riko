<?php

namespace App\Core;

use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;

class Router
{
    private array $routes = [];

    private string $currentMethod = '';

    private string $currentUri = '';

    public function get(string $uri, array $action): self
    {
        return $this->addRoute('GET', $uri, $action);
    }

    public function post(string $uri, array $action): self
    {
        return $this->addRoute('POST', $uri, $action);
    }

    private function addRoute(
        string $method,
        string $uri,
        array $action
    ): self {

        $uri = rtrim($uri, '/');

        if ($uri === '') {
            $uri = '/';
        }

        $this->routes[$method][$uri] = [
            'action' => $action,
            'middleware' => []
        ];

        $this->currentMethod = $method;
        $this->currentUri = $uri;

        return $this;
    }

    public function middleware(string $middleware): self
    {
        $this->routes[$this->currentMethod][$this->currentUri]['middleware'][] = $middleware;

        return $this;
    }

    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];

        $uri = parse_url(
            $_SERVER['REQUEST_URI'],
            PHP_URL_PATH
        );

        $uri = rtrim($uri, '/');

        if ($uri === '') {
            $uri = '/';
        }

        if (!isset($this->routes[$method][$uri])) {

            Response::notFound();

        }

        $route = $this->routes[$method][$uri];

        foreach ($route['middleware'] as $middleware) {

            switch ($middleware) {

                case 'auth':
                    (new AuthMiddleware())->handle();
                    break;

                case 'guest':
                    (new GuestMiddleware())->handle();
                    break;

            }

        }

        [$controller, $action] = $route['action'];

        $controller = new $controller();

        call_user_func([$controller, $action]);
    }

    public function routes(): array
    {
        return $this->routes;
    }
}