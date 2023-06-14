<?php

use Services\Router;

const BASE_PATH = __DIR__ . '/../';

$config = require BASE_PATH . 'config/config.php';
define("CONFIG", $config);

require_once BASE_PATH . 'Services/Functions.php';

// Autoloader function
spl_autoload_register(function ($class) {
    require_once __DIR__ . '/../' . str_replace("\\", "/", $class) . '.php';
});

createDirectory(base_path('data'));
\Services\Storage::changeDataFilesToCorrectFormat();

// Router should handle request
$router = new Router();
$router->loadConfig();
$router->handle();