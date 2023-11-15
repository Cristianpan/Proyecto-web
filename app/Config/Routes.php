<?php

use App\Controllers\CtrlPayment;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Auth
$routes->get('/auth/login', 'CtrlAuth::index');
$routes->post('/auth/login', 'CtrlAuth::login');
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


$routes->post('/user/(:segment)/personalBlock/create', 'CtrlPersonalBlock::create/$1'); 
$routes->put('/user/(:segment)/personalBlock/edit/(:segment)', 'CtrlPersonalBlock::update/$1/$2'); 
$routes->delete('/user/(:segment)/personalBlock/delete/(:segment)', 'CtrlPersonalBlock::delete/$1/$2'); 
