<?php

declare(strict_types=1);

namespace App\Providers;

use Exception;
use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;

class ConfigProvider implements ServiceProviderInterface
{
    public function register(DiInterface $di): void
    {
        $configPath = $di->offsetGet('rootPath') . '/config/config.php';
        if (!file_exists($configPath) || !is_readable($configPath)) {
            throw new Exception('Config file does not exist: ' . $configPath);
        }
        $di->setShared('config', function () use ($configPath) {
            return require_once $configPath;
        });
    }
}