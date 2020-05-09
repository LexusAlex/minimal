<?php

use Psr\Container\ContainerInterface;
use Slim\Views\PhpRenderer;

return [
    PhpRenderer::class => static function(ContainerInterface $container) {
        $view = new PhpRenderer($container->get('configurations')['view']['TemplatePath']);
        $view->setLayout($container->get('configurations')['view']['Layout']);
        return $view;
    },

    'configurations' => [
        'view' => [
            'TemplatePath' => __DIR__ . '/../../templates',
            'Layout' => '/layouts/html.php',
        ]
    ]
];
