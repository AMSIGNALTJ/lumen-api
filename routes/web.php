<?php
/**
 * @var \Laravel\Lumen\Routing\Router $router
 *
 */

// import
use App\Plugin\ResRoutes;

// new
$Route = new ResRoutes($router);

// Route
$Route->apiResource('user', 'UserController');


