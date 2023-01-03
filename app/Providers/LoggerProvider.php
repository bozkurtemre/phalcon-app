<?php

declare(strict_types=1);

namespace App\Providers;

use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;
use Phalcon\Logger\Adapter\Stream;
use Phalcon\Logger\Formatter\Line;
use Phalcon\Logger\Logger;

class LoggerProvider implements ServiceProviderInterface
{
    public function register(DiInterface $di): void
    {
        $basePath = $di->offsetGet('rootPath');
        $di->set('logger', function () use ($basePath) {
            $formatter = new Line();
            $formatter->setDateFormat('Y-m-d H:i:s');
            $adapter = new Stream($basePath . '/var/logs/web.log');
            $adapter->setFormatter($formatter);
            return new Logger('messages', ['web' => $adapter]);
        });
    }
}
