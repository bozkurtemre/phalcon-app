<?php

declare(strict_types=1);

namespace App\Providers;

use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;
use Phalcon\Flash\Direct as Flash;
use Phalcon\Html\Escaper;

class FlashProvider implements ServiceProviderInterface
{
    public function register(DiInterface $di): void
    {
        $di->set('flash', function () {
            $escaper = new Escaper();
            $flash = new Flash($escaper);
            $flash->setImplicitFlush(false);
            $flash->setCssClasses([
                'error' => 'alert alert-danger',
                'success' => 'alert alert-success',
                'notice' => 'alert alert-info',
                'warning' => 'alert alert-warning',
            ]);
            return $flash;
        });
    }
}
