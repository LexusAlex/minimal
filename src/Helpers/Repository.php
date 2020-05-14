<?php

namespace App\Helpers;

use DI\Container;
use Slim\Views\PhpRenderer;

class Repository{

    protected Container $container;
    protected \PDO $mariadb;

    public function __construct(Container $container) {
        $this->container = $container;
        $this->mariadb = $container->get(\PDO::class);
    }

}