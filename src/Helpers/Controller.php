<?php

namespace App\Helpers;

use DI\Container;
use Slim\Views\PhpRenderer;

class Controller {

    protected Container $container;
    protected PhpRenderer $view;
    protected \PDO $mariadb;

    public function __construct(Container $container) {
        $this->container = $container;
        $this->view = $container->get(PhpRenderer::class);
        $this->mariadb = $container->get(\PDO::class);
    }

}
