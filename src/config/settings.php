<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header


        // Renderer settings
        'renderer' => [
            'template_path' => '',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'SlimPHP-test',
            'path' =>  __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

    ],
];
