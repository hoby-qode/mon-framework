<?php 

$router = new \AltoRouter();

// Route Frontend
$router->map('GET', '/', 'PagesController@home', 'home');
$router->map('GET', '/contact', 'PagesController@contact', 'contact');
$router->map('GET', '/about', 'PagesController@about', 'about');
$router->map('GET', '/services', 'ServiceController@index', 'services');
$router->map('GET', '/services/[*:slug]', 'ServiceController@single', 'single-service');

// Route Backend
$router->map('GET', '/admin/services', 'ServiceController@lists', 'lists-services');
$router->map('GET', '/admin/services/add', 'ServiceController@add', 'add-service');
$router->map('GET', '/admin/services/edit/[i:id]', 'ServiceController@edit', 'edit-service');

return $router;