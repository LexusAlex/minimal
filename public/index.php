<?php

declare(strict_types=1);

use DI\ContainerBuilder;
use Laminas\ConfigAggregator\ConfigAggregator;
use Laminas\ConfigAggregator\PhpFileProvider;

http_response_code(500);

require __DIR__ . '/../vendor/autoload.php';

$builder = new ContainerBuilder();

// агрегируем все настройки
$aggregator = new ConfigAggregator([
    new PhpFileProvider(__DIR__ . '/../configurations/*.php')
]);


$builder->addDefinitions($aggregator->getMergedConfig());

try {
    $container = $builder->build();
} catch (Exception $e) {
}

var_dump($container->get('connection'));