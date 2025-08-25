<?php
class App
{
    private array $routes;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function run(): void
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
        // Remove BASE_PATH prefix
        if (str_starts_with($uri, BASE_PATH)) {
            $uri = substr($uri, strlen(BASE_PATH) - 1);
        }
        // Ensure leading slash
        $uri = '/' . ltrim($uri, '/');

        // Strip query strings already by parse_url
        $routesForMethod = $this->routes[$method] ?? [];
        if (!isset($routesForMethod[$uri])) {
            http_response_code(404);
            echo '404 Not Found';
            return;
        }
        [$controller, $action] = $routesForMethod[$uri];
        $controllerClass = $controller;
        $controllerFile = __DIR__ . '/../controllers/' . $controllerClass . '.php';
        if (!is_file($controllerFile)) {
            http_response_code(404);
            echo '404 Not Found';
            return;
        }
        require_once $controllerFile;
        if (!class_exists($controllerClass)) {
            http_response_code(404);
            echo '404 Not Found';
            return;
        }
        $instance = new $controllerClass();
        if (!method_exists($instance, $action)) {
            http_response_code(404);
            echo '404 Not Found';
            return;
        }
        $instance->$action();
    }
}
