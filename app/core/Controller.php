<?php

namespace app\core;

abstract class Controller
{
    public $route;

    public function __construct($route)
    {
        $this->route = $route;
        //var_dump($route);
        //echo '<p>Hi</p>';
    }
}