<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Auth
$routes->get('/auth/login', 'CtrlAuth::index');
$routes->get('/auth/signup', 'CtrlAuth::signup');

//User
$routes->get('/user/profile', 'CtrlUserProfile::index'); 

$routes->get('/art/item', 'CtrlArtItem::index'); 

