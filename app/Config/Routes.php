<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('testdb', 'TestDB::index');;
$routes->get('production/getData', 'Production::getData');
$routes->get('production/getDataComplex', 'Production::getDataComplex');
$routes->post('production/save', 'Production::save');
$routes->post('production/update/(:num)', 'Production::update/$1');
$routes->post('production/delete/(:num)', 'Production::delete/$1');
$routes->get('production', 'Production::index'); // Production Module
$routes->get('machines', 'Machine::index');      // Machine Module
$routes->get('maintenance', 'Maintenance::index'); // Maintenance Module
