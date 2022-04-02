<?php 

namespace Core\router;

use AltoRouter;
use App\Controller\Errors;

class Router {  
    public static function run() {
        // Get all routes from routes.php
        $routes = require FOLDER_CORE.'router/routes.php';

        if ($routes->match()) {
            // Get route current if route is matched
            $route = $routes->match();

            $frontendClassName = "App\\Controller\\Frontend\\". substr($route['target'],0,strpos($route['target'],'@'));
            $backendClassName  = "App\\Controller\\Backend\\". substr($route['target'],0,strpos($route['target'],'@'));

            $method = substr($route['target'],strpos($route['target'],'@') + 1);
            
            // Il faut changé le request par le request de symfony
            $request = $route;
            if (is_callable([new $frontendClassName, $method ])) {
                call_user_func([new $frontendClassName, $method ], $request);
            }else {
                call_user_func([new $backendClassName, $method ], $request);
            }
        }else {
            $errors = new Errors();
            $errors->error404();
        }
        
    }
}