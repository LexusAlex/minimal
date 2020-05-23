<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Slim\App;

http_response_code(500);

require __DIR__ . '/../vendor/autoload.php';

/** @var ContainerInterface $container */
$container = require __DIR__ . '/../configurations/container.php';

/** @var App $app */
$app = (require __DIR__ . '/../configurations/app.php')($container);

$app->run();
