<?php

namespace App\Controllers;

use Phalcon\Logger\Logger;
use Phalcon\Mvc\Controller as BaseController;

class Controller extends BaseController
{
    public Logger $logger;

    protected function initialize()
    {
        // Logger
        $this->logger = $this->di->getShared('logger');
    }
}