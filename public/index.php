<?php

declare(strict_types=1);

http_response_code(500);

require __DIR__ . '/../vendor/autoload.php';

$container = require __DIR__ . '/../configurations/container.php';

var_dump($container->get('configuration')['mariadb']['connection']);