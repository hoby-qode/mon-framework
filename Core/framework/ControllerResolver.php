<?php

namespace Core\Framework;

class ControllerResolver
{
    public function getController($route)
    {
        $controller = substr($route['target'],0,strpos($route['target'],'@'));

        $method = substr($route['target'],strpos($route['target'],'@') + 1);

        return [new $controller, $method];
    }
}