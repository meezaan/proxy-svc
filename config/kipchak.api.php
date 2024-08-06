<?php

use function Mamluk\Kipchak\env;

return [
    'name' => 'proxy-svc', // Hyphen or underscore separated string
    'debug' => (bool) env('DEBUG', true),
    // If debug is enabled, loglevel is debug. Otherwise, it is info. Overwrite it by specifying it below.
    // 'loglevel' => \Monolog\Level::Debug
];