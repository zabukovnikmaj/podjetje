<?php

namespace Services;

class Router
{
    /**
     * @var array
     */
    private array $routes;

    /**
     * Function loads router configuration
     *
     * @return void
     */
    public function loadConfig(): void
    {
        $this->routes = require __DIR__ . '/../config/routes.php';
    }

    /**
     * Function handles server request
     *
     * @return void
     */
    public function handle(): void
    {
        if (isset($_POST['_method'])) {
            $_SERVER['REQUEST_METHOD'] = $_POST['_method'];
        }

        $uri = parse_url($_SERVER['REQUEST_URI'])['path'];

        $seperatedUri = explode('/', $uri);
        $uri = '/';
        for ($i = 0; $i < sizeof($seperatedUri); $i++) {
            if (strpos($seperatedUri[$i], '!') !== false) {
                //params are passed as !uuid...
                $params = substr($seperatedUri[$i], 1);
            } else if ($seperatedUri[$i] !== "") {
                $uri .= $seperatedUri[$i] . '/';
            }
        }

        if (!isset($this->routes[$uri])) {
            http_response_code(404);
            die("404 stran ni bila najdena!");
        }

        $requestMethod = $_SERVER['REQUEST_METHOD'];

        $routes = $this->routes[$uri];

        if (!isset($routes[$requestMethod])) {
            http_response_code(403);
            die("404 stran ni bila najdena :(");
        }

        $route = $routes[$requestMethod];
        $controller = new $route[0];

        call_user_func_array([$controller, $route[1]], [$params]);
    }
}