<?php

use Psr\Container\ContainerInterface;

return [
    PDO::class => static function (ContainerInterface $container) {
        /**
         * @var array $confuguration
         * @psalm-suppress MixedArrayAccess
         * @psalm-suppress MixedArgument
         */
        $confuguration = $container->get('configurations')['mariadb'];
        $dsn = $confuguration['driver'] . ':dbname=' . $confuguration['dbname'] . ';host=' . $confuguration['host']  .
            ';port=' . $confuguration['port'];
        return new PDO(
            $dsn,
            $confuguration['user'],
            $confuguration['password'],
            $confuguration['constants']
        );
    },
    'configurations' => [
        'mariadb' => [
            'driver' => 'mysql',
            'dbname' => getenv('PHINX_DB_NAME'),
            'host' => getenv('PHINX_DB_HOST'),
            'port' => getenv('PHINX_DB_PORT'),
            'user' => getenv('PHINX_DB_USER'),
            'password' => getenv('PHINX_DB_PASSWORD'),
            'constants' => [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
        ],
    ],
];
