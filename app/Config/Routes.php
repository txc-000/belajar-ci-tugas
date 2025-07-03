<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index', ['filter' => 'auth']);

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login', ['filter' => 'redirect']);
$routes->get('logout', 'AuthController::logout');

$routes->get('produk', 'ProdukController::index', ['filter' => 'auth']);
$routes->post('produk', 'ProdukController::create', ['filter' => 'auth']);
$routes->post('produk/edit/(:any)', 'ProdukController::edit/$1', ['filter' => 'auth']);
$routes->get('produk/delete/(:any)', 'ProdukController::delete/$1', ['filter' => 'auth']);
$routes->get('produk/download', 'ProdukController::download', ['filter' => 'auth']);


$routes->get('produk-kategori', 'ProdukkategoriController::index', ['filter' => 'auth']);
$routes->post('produk-kategori', 'ProdukkategoriController::create', ['filter' => 'auth']);
$routes->post('produk-kategori/edit/(:any)', 'ProdukkategoriController::edit/$1', ['filter' => 'auth']);
$routes->get('produk-kategori/delete/(:any)', 'ProdukkategoriController::delete/$1', ['filter' => 'auth']);


$routes->group('diskon', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'DiskonController::index');
    $routes->get('create', 'DiskonController::create');
    $routes->post('store', 'DiskonController::store');
    $routes->get('edit/(:num)', 'DiskonController::edit/$1');
    $routes->post('update/(:num)', 'DiskonController::update/$1');
    $routes->post('delete/(:num)', 'DiskonController::delete/$1');
});


$routes->group('keranjang', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'TransaksiController::index');
    $routes->post('', 'TransaksiController::cart_add');
    $routes->post('edit', 'TransaksiController::cart_edit');
    $routes->get('delete/(:any)', 'TransaksiController::cart_delete/$1');
    $routes->get('clear', 'TransaksiController::cart_clear');
    $routes->get('transaksi', 'TransaksiController::history');
});
$routes->get('api/transaksi', 'TransaksiController::apiTransaksi', ['filter' => 'auth']);

$routes->get('checkout', 'TransaksiController::checkout', ['filter' => 'auth']);
$routes->post('buy', 'TransaksiController::buy', ['filter' => 'auth']);

$routes->get('get-location', 'TransaksiController::getLocation', ['filter' => 'auth']);
$routes->get('get-cost', 'TransaksiController::getCost', ['filter' => 'auth']);

$routes->get('faq', 'Home::faq', ['filter' => 'auth']);
$routes->get('profile', 'Home::profile', ['filter' => 'auth']);
$routes->get('contact', 'Home::contact', ['filter' => 'auth']);

$routes->resource('api', ['controller' => 'apiController']);
