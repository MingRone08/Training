<?php

/**
 * Front controller
 *
 * PHP version 7.0
 */

/**
 * Composer
 */
require dirname(__DIR__) . '/vendor/autoload.php';


/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('Home', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');
//$router->add('posts/index', ['controller' => 'Posts', 'action' => 'index']);
$router->add('Add', ['controller' => 'Home', 'action' => 'add']);
$router->add('{controller}/{action}');

$router->add('Delete', ['controller' => 'Home', 'action' => 'delete']);
$router->add('{controller}/{action}');

$router->add('Filter', ['controller' => 'Home', 'action' => 'filter']);
$router->add('{controller}/{action}');

$router->add('Edit', ['controller' => 'Home', 'action' => 'edit']);
$router->add('{controller}/{action}');


$router->dispatch($_SERVER['QUERY_STRING']);

