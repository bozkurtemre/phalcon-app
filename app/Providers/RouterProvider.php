<?php

declare(strict_types=1);

namespace App\Providers;

use Exception;
use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;

class RouterProvider implements ServiceProviderInterface
{
    public function register(DiInterface $di): void
    {
        $basePath = $di->offsetGet('rootPath');
        $di->set('router', function () use ($basePath) {
            $routes = $basePath . '/config/routes.php';
            if (!file_exists($routes) || !is_readable($routes)) {
                throw new Exception($routes . ' file does not exist or is not readable.');
            }
            return require_once $routes;
        });
    }
}
