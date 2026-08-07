<?php

require dirname(__DIR__) . '/backend/config/app.php';

require dirname(__DIR__) . '/vendor/autoload.php';

use App\Core\Application;

$app = new Application();

$app->run();