<?php

namespace Main\controllers;

use \GF\Core\AbstractRestController as AbstractRestController;

class RolesController extends AbstractRestController
{
    public function __construct()
    {
        $this->modelName = '\Role';
    }
}