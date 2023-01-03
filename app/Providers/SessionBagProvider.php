<?php

declare(strict_types=1);

namespace App\Providers;

use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;
use Phalcon\Session\Bag;

class SessionBagProvider implements ServiceProviderInterface
{
    public function register(DiInterface $di): void
    {
        $session = $di->getShared('session');
        $di->setShared('sessionBag', function () use ($session) {
            return new Bag($session, 'bag');
        });
    }
}
