<?php
$baseDir = dirname(dirname(__FILE__));

return [
    'plugins' => [
        'Authentication' => $baseDir . '/vendor/cakephp/authentication/',
        'Josegonzalez/Upload' => $baseDir . '/vendor/josegonzalez/cakephp-upload/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
    ],
];
