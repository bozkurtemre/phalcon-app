<?php

use App\Providers;

return [
    Providers\ConfigProvider::class,
    Providers\DatabaseProvider::class,
    Providers\DispatcherProvider::class,
    Providers\FlashProvider::class,
    Providers\LoggerProvider::class,
    Providers\RouterProvider::class,
    Providers\SessionProvider::class,
    Providers\SessionBagProvider::class,
    Providers\SecurityProvider::class,
    Providers\UrlProvider::class,
    Providers\ViewProvider::class,
    Providers\VoltProvider::class,
    Providers\ModelsCacheProvider::class,
];