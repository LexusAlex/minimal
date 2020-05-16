<?php

declare(strict_types=1);

use App\Controllers\ApiTreeController;
use App\Controllers\IndexController;
use Psr\Container\ContainerInterface;
use Slim\App;
use Slim\Factory\AppFactory;

return static function (ContainerInterface $container): App {

    $app = AppFactory::createFromContainer($container);

    $errorMiddleware = $app->addErrorMiddleware(true, true, true);

    $app->get('/', IndexController::class. ':index');
    $app->get('/test', IndexController::class. ':test');
    $app->get('/tree', IndexController::class. ':tree');
    $app->get('/tree/list', ApiTreeController::class. ':list');

    return $app;
};