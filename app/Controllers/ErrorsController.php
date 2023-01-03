<?php

namespace App\Controllers;

/**
 * ErrorsController
 *
 * Manage errors
 */
class ErrorsController extends Controller
{
    public function initialize()
    {
        parent::initialize();
    }

    public function show404Action(): void
    {
        $this->response->setStatusCode(404);
    }

    public function show401Action(): void
    {
        $this->response->setStatusCode(401);
    }

    public function show500Action(): void
    {
        $this->response->setStatusCode(500);
    }
}
