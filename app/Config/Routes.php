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
$routes->get('/user/profile', 'CtrlUserProfile::index'); 
$routes->get('/user/profile/edit', 'CtrlUserProfile::viewEdit'); 
$routes->get('/user/catalog', 'CtrlArtCatalog::index'); 
$routes->get('/user/catalog/item', 'CtrlArtCatalog::viewCreateItem'); 

//artworks
$routes->get('/art/item', 'CtrlArtItem::index'); 

//Shop
$routes->get('/shop/cart', 'CtrlShop::viewCart'); 
$routes->get('/shop/cart/pay', 'CtrlArtItem::index'); 

