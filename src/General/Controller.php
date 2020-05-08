<?php

namespace App\General;

use DI\Container;

class Controller {

    protected Container $container;

    public function __construct(Container $container) {
        $this->container = $container;
    }

}
