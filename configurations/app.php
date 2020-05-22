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
    $app->get('/tree1', IndexController::class. ':tree1');
    $app->get('/tree2', IndexController::class. ':tree2');
    $app->get('/tree/list', ApiTreeController::class. ':list');
    $app->get('/tree/create', ApiTreeController::class. ':create');

    return $app;
};