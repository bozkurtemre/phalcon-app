<?php

declare(strict_types=1);

namespace App\Providers;

use Phalcon\Cache\Adapter\Redis;
use Phalcon\Cache\Cache;
use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;
use Phalcon\Storage\SerializerFactory;

class ModelsCacheProvider implements ServiceProviderInterface
{
    public function register(DiInterface $di): void
    {
        $config = $di->getShared('config');
        $di->set('modelsCache', function () use ($config) {
            $serializerFactory = new SerializerFactory();
            $options = [
                'defaultSerializer' => $config['cache']['defaultSerializer'],
                'lifetime' => $config['cache']['lifetime'],
                'host' => $config['cache']['host'],
                'port' => $config['cache']['port'],
                'index' => $config['cache']['index'],
            ];
            $adapter = new Redis($serializerFactory, $options);
            return new Cache($adapter);
        });
    }
}
