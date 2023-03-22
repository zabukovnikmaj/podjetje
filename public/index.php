<?php

use Services\Router;

const BASE_PATH = __DIR__ . '/../';

require_once base_path() . 'Services/Functions.php';

// Autoloader function
spl_autoload_register(function ($class) {
    require_once __DIR__ . '/../' . str_replace("\\", "/", $class) . '.php';
});

// Router should handle request
$router = new Router();
$router->loadConfig();
$router->handle();