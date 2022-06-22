<?php

/**
 * Front controller
 *
 * PHP version 8.0
 */

/**
 * Composer
 */
require dirname(__DIR__) . '/vendor/autoload.php';


/**
 * Error and Exception handling
 */
// error_reporting(E_ALL);
// set_error_handler('Core\Error::errorHandler');
// set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('home', ['controller' => 'Home', 'action' => 'index']);
$router->add('contact', ['controller' => 'Contact', 'action' => 'index']);
$router->add('product_detail', ['controller' => 'Contact', 'action' => 'index']);
$router->add('about', ['controller' => 'About', 'action' => 'index']);
$router->add('login', ['controller' => 'Login', 'action' => 'new']);
$router->add('login/create', ['controller' => 'Login', 'action' => 'create']);
$router->add('shopping_cart', ['controller' => 'Shopping_Cart', 'action' => 'index']);
$router->add('signup/activate/{token:[\da-f]+}', ['controller' => 'SignUp', 'action' => 'activate']);

$router->add('admin/login', ['controller' => 'Admin\Login', 'action' => 'new']);
$router->add('admin/create', ['controller' => 'Admin\Login', 'action' => 'create']);
$router->add('admin_master', ['controller' => 'Admin\Admin_Ctrl', 'action' => 'index']);
$router->add('admin/list_products', ['controller' => 'Admin\List_Product', 'action' => 'products']);


$router->add('{controller}/{action}');
$router->add('{controller}/{action}/{id:\d+}');
$router->dispatch($_SERVER['QUERY_STRING']);

?>