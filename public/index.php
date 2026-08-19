<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require dirname(__DIR__) . '/backend/config/app.php';
require __DIR__ . '/../backend/includes/functions.php';
require dirname(__DIR__) . '/vendor/autoload.php';

use App\Core\Application;

$app = new Application();
$app->run();