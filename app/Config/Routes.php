<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'HomeController::index');
$routes->get('/logout', 'Auth\AuthController::logout');

$routes->group('',['filter' => 'LoginCheck'],function($routes){
    $routes->match(['post','get'],'register','Auth\AuthController::register');
    $routes->match(['post','get'],'login','Auth\AuthController::login');
});


$routes->group('',['filter' => 'CheckAuth'],function($routes){
    $routes->get('/dashboard', 'DashboardController::index');
    $routes->get('/people', 'People\PeopleController::index');
    //addPerson
    $routes->post('/people/addPerson', 'People\PeopleController::addPerson');
    $routes->get('/people/deletePerson/(:any)', 'People\PeopleController::deletePerson/$1');
});
