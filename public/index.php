<?php

declare(strict_types=1);

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Application;

try {

    ini_set('log_errors', 'true');
    ini_set('error_log', __DIR__ . '/var/logs/error.log');

    $rootPath = realpath('..');
    require_once $rootPath . '/vendor/autoload.php';

    /**
     * Init Phalcon Dependency Injection
     */
    $di = new FactoryDefault();
    $di->offsetSet('rootPath', function () use ($rootPath) {
        return $rootPath;
    });

    /**
     * Register Service Providers
     */
    $providers = $rootPath . '/config/providers.php';
    if (!file_exists($providers) || !is_readable($providers)) {
        throw new Exception('File providers.php does not exist or is not readable.');
    }

    /** @var array $providers */
    $providers = include_once $providers;
    foreach ($providers as $provider) {
        $di->register(new $provider());
    }

    /**
     * Init MVC Application and send output to client
     */
    (new Application($di))->handle($_SERVER['REQUEST_URI'])->send();

} catch (Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}