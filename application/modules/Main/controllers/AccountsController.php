<?php

namespace Main\controllers;

use \GF\Core\AbstractRestController as AbstractRestController;

class AccountsController extends AbstractRestController
{
    public function __construct()
    {
        $this->modelName = '\Account';
    }
}