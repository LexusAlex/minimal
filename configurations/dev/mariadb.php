<?php

use Psr\Container\ContainerInterface;

return [
    PDO::class => static function(ContainerInterface $container) {
        $confuguration = $container->get('configurations')['mariadb'];
        return new PDO($confuguration['driver'].':dbname=' . $confuguration['dbname'] . ';host=' . $confuguration['host']  . ';port=' . $confuguration['port'] ,
            $confuguration['user'] , $confuguration['password'] , $confuguration['constants']);
    },
    'configurations' => [
        'mariadb' => [
            'driver' => 'mysql',
            'dbname' => getenv('DB_NAME'),
            'host' => getenv('DB_HOST'),
            'port' => getenv('DB_PORT'),
            'user' => getenv('DB_USER'),
            'password' => getenv('DB_PASSWORD'),
            'constants' => [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
        ],
    ],
];