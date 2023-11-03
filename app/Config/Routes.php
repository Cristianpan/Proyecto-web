<?php

use App\Controllers\CtrlPayment;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Auth
$routes->get('/auth/login', 'CtrlAuth::index');
$routes->get('/auth/signup', 'CtrlAuth::signup');

//User
$routes->get('/user', 'CtrlUserProfile::index'); 
$routes->get('/user/edit', 'CtrlUserProfile::viewEdit'); 
$routes->get('/user/catalog', 'CtrlArtCatalog::index'); 
$routes->get('/user/catalog/item', 'CtrlArtCatalog::viewCreateItem'); 

//Shop
$routes->get('/', 'CtrlShop::index'); 
$routes->get('/item', 'CtrlShop::viewItem'); 
$routes->get('/cart', 'CtrlShop::viewCart'); 
$routes->get('/payment', 'CtrlShop::viewPayment'); 


