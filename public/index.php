<?php

if (PHP_SAPI === 'cli-server' && $_SERVER['SCRIPT_FILENAME'] !== __FILE__) {
    return false;
}

require __DIR__ . '/../vendor/autoload.php';


$settings = require __DIR__ . '/../src/config/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ .  '/../src/config/dependencies.php';

// Register middleware
require  __DIR__ . '/../src/config/middleware.php';

// Register DB configs
require  __DIR__ . '/../src/config/db.php';

// Register routes
require  __DIR__ . '/../src/routes/routes.php';


$app->run();





