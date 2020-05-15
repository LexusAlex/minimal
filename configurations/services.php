<?php

declare(strict_types=1);

use App\Service\TreeService;
use Psr\Container\ContainerInterface;

return [
    TreeService::class => static function(ContainerInterface $container) {
       return new TreeService($container);
    }
];