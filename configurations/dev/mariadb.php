<?php

return [
    'configurations' => [
        'mariadb' => [
            'connection' => new PDO('mysql:dbname=' . getenv('DB_NAME') . ';host=' . getenv('DB_HOST') . ';port=' . getenv('DB_PORT'),
                getenv('DB_USER'), getenv('DB_PASSWORD'), [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ])
        ],
    ],
];