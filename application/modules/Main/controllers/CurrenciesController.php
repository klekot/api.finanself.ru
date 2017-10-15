<?php

namespace Main\controllers;

use \GF\Core\AbstractRestController as AbstractRestController;

class CurrenciesController extends AbstractRestController
{
    public function __construct()
    {
        $this->modelName = '\Currency';
    }
}