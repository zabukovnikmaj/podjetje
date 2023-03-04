<?php

namespace Services;

class Router
{
    /**
     * @var array
     */
    private array $routes;

    /**
     * Method loads router configuration
     *
     * @return void
     */
    public function loadConfig(): void
    {
        $this->routes = require __DIR__ . '/../config/routes.php';
    }

    /**
     * Method handles server request
     *
     * @return void
     */
    public function handle(): void
    {
        $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
        if (!array_key_exists($uri, $this->routes)) {
            http_response_code(404);
            die("404 Not Found");
        }

//        $requestMethod = $_SERVER['REQUEST_METHOD'];

        $routes = $this->routes[$uri];
//        if (!array_key_exists($requestMethod, $routes)) {
//            http_response_code(403);
//            die("Request method not allowed");
//        }

//        $route = $routes[$requestMethod];

        $controller = new $routes[0];
        call_user_func_array([$controller, $routes[1]], [$_REQUEST]);
    }
}