<?php

declare(strict_types=1);

namespace App\Providers;

use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;
use Phalcon\Mvc\Url;

class UrlProvider implements ServiceProviderInterface
{
    public function register(DiInterface $di): void
    {
        $baseUri = $di->getShared('config')->application->baseUri;
        $di->setShared('url', function () use ($baseUri) {
            $url = new Url();
            $url->setBaseUri($baseUri);
            return $url;
        });
    }
}
