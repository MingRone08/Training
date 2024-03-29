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
$router->add('home', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');
//$router->add('posts/index', ['controller' => 'Posts', 'action' => 'index']);
$router->add('add', ['controller' => 'Home', 'action' => 'add']);
$router->add('{controller}/{action}');

$router->add('delete', ['controller' => 'Home', 'action' => 'delete']);
$router->add('{controller}/{action}');

$router->add('filter', ['controller' => 'Home', 'action' => 'filter']);
$router->add('{controller}/{action}');

$router->add('edit', ['controller' => 'Home', 'action' => 'edit']);
$router->add('{controller}/{action}');


$router->dispatch($_SERVER['QUERY_STRING']);

