<?php

use App\Controllers\CtrlApiFiles;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Auth
$routes->get('/auth/login', 'CtrlAuth::index');
$routes->post('/auth/login', 'CtrlAuth::login');
$routes->get('/auth/signup', 'CtrlAuth::signupView');
$routes->post('/auth/signup', 'CtrlAuth::signup');
$routes->get('/auth/logout', 'CtrlAuth::logout');

//User
$routes->get('/user/(:segment)', 'CtrlUserProfile::index'); 
$routes->get('/user/(:segment)/catalog', 'CtrlArtCatalog::index'); 
$routes->get('/user/catalog/item', 'CtrlArtCatalog::viewCreateItem'); 

$routes->get('/user/(:segment)/edit', 'CtrlUserProfile::viewEdit/$1'); 
$routes->post('/user/(:segment)/edit', 'CtrlUserProfile::edit/$1');

//Shop
$routes->get('/', 'CtrlShop::index'); 
$routes->get('/item', 'CtrlShop::viewItem'); 
$routes->get('/cart', 'CtrlShop::viewCart'); 
$routes->get('/payment', 'CtrlShop::viewPayment'); 


$routes->post('/user/(:segment)/personalBlock/create', 'CtrlPersonalBlock::create/$1'); 
$routes->put('/user/(:segment)/personalBlock/edit/(:segment)', 'CtrlPersonalBlock::update/$1/$2'); 
$routes->delete('/user/(:segment)/personalBlock/delete/(:segment)', 'CtrlPersonalBlock::delete/$1/$2'); 

$routes->group('api/files', static function ($routes) {
    /** @var \CodeIgniter\Router\RouteCollection $routes */
    $routes->post('process', [CtrlApiFiles::class, 'processTemporalFile']);
    $routes->patch('process', [CtrlApiFiles::class, 'processTemporalFileByChunks']);
    $routes->get('restore', [CtrlApiFiles::class, 'restoreTemporalFile']);
    $routes->get('load', [CtrlApiFiles::class, 'getFileFromServer']);
    $routes->delete('delete', [CtrlApiFiles::class, 'deleteTemporalFile']);
});
