<?php

namespace App\Helpers;

use App\Repository\TreeRepository;
use DI\Container;

class Service{

    protected Container $container;
    protected $tree;

    public function __construct(Container $container) {
        $this->container = $container;
        $this->tree = $container->get(TreeRepository::class);
    }
}
