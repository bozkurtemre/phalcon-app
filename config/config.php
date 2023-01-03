<?php

declare(strict_types=1);

use Phalcon\Config\Config;

$config['application'] = [
    'controllersDir' => 'app/Controllers/',
    'modelsDir' => 'app/Models/',
    'pluginsDir' => 'app/Plugins/',
    'viewsDir' => 'app/Views/',
    'cacheDir' => 'var/cache/',
    'sessionSavePath' => 'var/cache/session/',
    'baseUri' => '/',
];

$config['database'] = [
    'adapter' => 'Mysql',
    'host' => 'mysql',
    'username' => 'root',
    'password' => '',
    'dbname' => 'phalcon_app',
    'charset' => 'utf8',
];

$config['mail'] = [
    'fromName' => '',
    'fromEmail' => '',
    'smtp' => [
        'server' => '',
        'port' => '',
        'security' => '',
        'username' => '',
        'password' => '',
    ],
];

$config['cache'] = [
    'defaultSerializer' => 'Json',
    'lifetime' => 7200,
    'host' => 'redis',
    'port' => 6379,
    'index' => 1,
];

return new Config($config);
