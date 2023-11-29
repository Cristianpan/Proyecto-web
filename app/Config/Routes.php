<?php

use App\Controllers\CtrlApiFiles;
use App\Controllers\CtrlArtCatalog;
use App\Controllers\CtrlAuth;
use App\Controllers\CtrlPersonalBlock;
use App\Controllers\CtrlUserProfile;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Auth
$routes->get('/login', [CtrlAuth::class, 'index'], ['as' => 'login']);
$routes->post('/login', [CtrlAuth::class, 'login'], ['as' => 'login']);
$routes->get('/signup', [CtrlAuth::class, 'signupView'], ['as' => 'signup']);
$routes->post('/signup', [CtrlAuth::class, 'signup'], ['as' => 'signup']);
$routes->get('/logout', [CtrlAuth::class, 'logout'], ['as' => 'logout']);

//User
$routes->get("/(:segment)", [CtrlUserProfile::class, 'index/$1'], ['as' => 'user']);
$routes->get("/profile/(:segment)", [CtrlUserProfile::class, 'viewEdit/$1'], ['as' => 'user-edit']);
$routes->post("/profile/(:segment)", [CtrlUserProfile::class, 'edit/$1'], ['as' => 'user-edit']);


//Personal blocks
$routes->post('/profile/(:segment)/personalBlock', [CtrlPersonalBlock::class, 'create/$1'], ['as' => 'personal-block']);
$routes->put('/profile/(:segment)/personalBlock/(:segment)', [CtrlPersonalBlock::class, 'update/$1/$2'], ['as' => 'personal-block']);
$routes->delete('/profile/(:segment)/personalBlock/(:segment)', [CtrlPersonalBlock::class, 'delete/$1/$2'], ['as' => 'personal-block']);


//items
$routes->get('/profile/(:segment)/item', [CtrlArtCatalog::class, 'viewCreate'], ['as' => 'item-create']);
$routes->post('/profile/(:segment)/item', [CtrlArtCatalog::class, 'create/$1'], ['as' => 'item-create']);


//Catalog
$routes->get('/user/(:segment)/catalog', 'CtrlArtCatalog::index'); 
$routes->get('/user/(:segment)/catalog/create', 'CtrlArtCatalog::viewCreate'); 
$routes->post('/user/(:segment)/catalog/create', 'CtrlArtCatalog::create/$1'); 


$routes->get('/user/(:segment)/catalog/edit/(:segment)', 'CtrlArtCatalog::viewCreate'); 
$routes->post('/user/(:segment)/catalog/edit/(:segment)', 'CtrlArtCatalog::edit/$1/$2'); 
$routes->post('/user/(:segment)/catalog/delete/(:segment)', 'CtrlArtCatalog::delete/$1/$2'); 


//Shop
$routes->get('/', 'CtrlShop::index'); 
$routes->get('/item', 'CtrlShop::viewItem'); 
$routes->get('/cart', 'CtrlShop::viewCart'); 
$routes->get('/payment', 'CtrlShop::viewPayment'); 
$routes->post('/payment', 'CtrlShop::viewPayment'); 


//Api files
$routes->group('api/files', static function ($routes) {
    /** @var \CodeIgniter\Router\RouteCollection $routes */
    $routes->post('process', [CtrlApiFiles::class, 'processTemporalFile']);
    $routes->patch('process', [CtrlApiFiles::class, 'processTemporalFileByChunks']);
    $routes->get('restore', [CtrlApiFiles::class, 'restoreTemporalFile']);
    $routes->get('load', [CtrlApiFiles::class, 'getFileFromServer']);
    $routes->delete('delete', [CtrlApiFiles::class, 'deleteTemporalFile']);
});
