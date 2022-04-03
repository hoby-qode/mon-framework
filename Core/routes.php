<?php 

$router = new \AltoRouter();

$namespaceFront = "App\\Controller\\Frontend\\";
$namespaceBack = "App\\Controller\\Backend\\";

// Route Frontend
$router->map('GET', '/', $namespaceFront.'PagesController@home', 'home');
$router->map('GET', '/contact', $namespaceFront.'PagesController@contact', 'contact');
$router->map('GET', '/about', $namespaceFront.'PagesController@about', 'about');
$router->map('GET', '/services', $namespaceFront.'ServiceController-disable@index', 'services');
$router->map('GET', '/services/[*:slug]', $namespaceFront.'ServiceController@single', 'single-service');

// Route Backend
$router->map('GET', '/admin/services', $namespaceBack.'ServiceController@lists', 'lists-services');
$router->map('GET', '/admin/services/add', $namespaceBack.'ServiceController-disable@add', 'add-service');
$router->map('GET', '/admin/services/edit/[i:id]', $namespaceBack.'ServiceController-disable@edit', 'edit-service');

return $router;