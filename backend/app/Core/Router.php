<?php

namespace App\Core;

use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;
use App\Middleware\SuperadminMiddleware;
use App\middleware\MaintenanceMiddleware;

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

    $route = null;
    $params = [];

    if (isset($this->routes[$method][$uri])) {

        // Route tanpa parameter
        $route = $this->routes[$method][$uri];

    } else {


        foreach ($this->routes[$method] ?? [] as $routeUri => $routeData) {

            if (!str_contains($routeUri, '{')) {
                continue;
            }

            // Ubah {slug} menjadi bagian regex
            $pattern = preg_replace(
                '/\{([^}]+)\}/',
                '([^/]+)',
                $routeUri
            );

            $pattern = '#^' . $pattern . '$#';

            if (preg_match($pattern, $uri, $matches)) {

                $route = $routeData;

                // Ambil nama parameter
                preg_match_all(
                    '/\{([^}]+)\}/',
                    $routeUri,
                    $paramNames
                );

                foreach ($paramNames[1] as $index => $name) {

                    $params[$name] = $matches[$index + 1];

                }

                break;
            }
        }
    }

    if ($route === null) {

        Response::notFound();

        return;
    }

    foreach ($route['middleware'] as $middleware) {

        switch ($middleware) {
    
            case 'auth':
    
                (new AuthMiddleware())->handle();
    
                break;
    
            case 'guest':
    
                (new GuestMiddleware())->handle();
    
                break;
    
            case 'superadmin':
    
                (new SuperadminMiddleware())->handle();
    
                break;

            case 'maintenance':

                (new MaintenanceMiddleware())->handle();
        
                break;
        }
    }

    [$controller, $action] = $route['action'];

    $controller = new $controller();

    call_user_func_array(
        [$controller, $action],
        array_values($params)
    );
}

    public function routes(): array
    {
        return $this->routes;
    }
}