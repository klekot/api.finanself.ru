<?php

namespace Main\controllers;

use \GF\Core\AbstractRestController as AbstractRestController;

class UsersController extends AbstractRestController
{
    public function __construct()
    {
        $this->modelName = '\User';
    }
}