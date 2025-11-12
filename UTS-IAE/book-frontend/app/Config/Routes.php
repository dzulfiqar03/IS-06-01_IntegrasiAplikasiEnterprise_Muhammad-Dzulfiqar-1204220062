<?php

use App\Controllers\BookController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/book', 'BookController::index');

$routes->get('/', function () {
    return redirect()->to('/book');
});

$routes->post('/book-add', [BookController::class, 'store'], ['as' => 'admin.store']);
$routes->put('book-update/(:num)', 'BookController::update/$1', ['as' => 'admin.update']);

$routes->delete('book-destroy/(:num)', 'BookController::destroy/$1', ['as' => 'admin.destroy']);
