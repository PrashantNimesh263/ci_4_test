<?php

namespace Config;

use App\Controllers\ProductsController;
use App\Controllers\UsersController;
use App\Controllers\Api\ProductsController as ApiProductsController;
use CodeIgniter\Router\RouterCollection;

/** @var RouterCollection $routes */

// Default route - Redirects to products page by default
$routes->get('/', function() {
    return redirect()->to('/login');  // Redirect to products page by default
});

// Products Routes
$routes->get('/products', [ProductsController::class, 'index'], ['filter' => 'auth']);  
// Route to view all products, handled by index method of ProductsController

$routes->get('/products/create', [ProductsController::class, 'create'], ['filter' => 'auth']);
// Route to show the form to create a new product, handled by create method of ProductsController

$routes->post('/products/store', [ProductsController::class, 'store'], ['filter' => 'auth']);
// Route to store a new product in the database (after form submission), handled by store method of ProductsController

$routes->get('/products/edit/(:num)', [ProductsController::class, 'edit'], ['filter' => 'auth']);
// Route to edit a specific product (passed product ID as a parameter), handled by edit method of ProductsController

$routes->put('/products/update/(:num)', [ProductsController::class, 'update'], ['filter' => 'auth']);
// Route to update the product details, handled by update method of ProductsController

$routes->get('/products/delete/(:num)', [ProductsController::class, 'delete'], ['filter' => 'auth']);
// Route to delete a specific product, handled by delete method of ProductsController

// User Routes
$routes->get('/register', [UsersController::class, 'register']);
// Route to show the user registration form, handled by register method of UsersController

$routes->post('/users/store', [UsersController::class, 'store']);
// Route to store the newly registered user, handled by store method of UsersController

$routes->get('/login', [UsersController::class, 'login']);
// Route to show the login form, handled by login method of UsersController

$routes->post('/users/authenticate', [UsersController::class, 'authenticate']);
// Route to authenticate a user (login), handled by authenticate method of UsersController

$routes->get('/logout', [UsersController::class, 'logout']);
// Route to log the user out, handled by logout method of UsersController

// API Routes (For Products module)
$routes->group('api', function($routes) {
    // Route to fetch all products in API format
    $routes->get('products', [ApiProductsController::class, 'index']);

    // Route to fetch a specific product by ID in API format
    $routes->get('products/(:num)', [ApiProductsController::class, 'show']);

    // Route to create a new product in API format
    $routes->post('products', [ApiProductsController::class, 'create']);

    // Route to update a specific product by ID in API format
    $routes->put('products/(:num)', [ApiProductsController::class, 'update']);

    // Route to delete a specific product by ID in API format
    $routes->delete('products/(:num)', [ApiProductsController::class, 'delete']);
});
