<?php

declare(strict_types=1);

use App\Repository\TreeRepository;
use Psr\Container\ContainerInterface;

return [
    TreeRepository::class => static function (ContainerInterface $container) {
        return new TreeRepository($container);
    }
];
