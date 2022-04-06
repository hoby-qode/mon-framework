<?php 

namespace Core\Framework;

use App\Controller\Errors;
use Symfony\Component\HttpFoundation\Request;

class Router {  
    public static function run($container) {
        // Get all routes from routes.php
        $routes = require FOLDER_CORE . 'routes.php';

        if ($routes->match()) {
            // Get route current if route is matched
            $route = $routes->match();

            $request = Request::createFromGlobals();
            $request->attributes->add(['route' => $route]);

            $controllerResolver = new ControllerResolver();
            $controller = $controllerResolver->getController($route);

            call_user_func($controller, $request);
        }else {
            $errors = new Errors();
            $errors->error404();
        }
        
    }
}