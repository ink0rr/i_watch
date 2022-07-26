<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

//movie
$routes->get('/movies/(:num)', 'Movies::index/$1');
$routes->post('/movies/get_start_time/', 'Movies::get_start_time');

//authentication
$routes->match(['get', 'post'], '/masuk', 'Auth::login', ['filter' => 'noauth']);
$routes->match(['get', 'post'], '/daftar', 'Auth::register', ['filter' => 'noauth']);
$routes->get('/lupa-password', 'Auth::forgetPassword', ['filter' => 'auth']);
$routes->get('/logout', 'Auth::logout');

//reservation
$routes->get('/reservasi/(:num)/(:num)', 'Reservations::index/$1/$2', ['filter' => 'auth']);
$routes->match(['get', 'post'], '/reservasi/pembayaran', 'Reservations::payment', ['filter' => 'auth']);
$routes->get('/reservasi/pembayaran/bayar/(:num)', 'Reservations::buy/$1', ['filter' => 'auth']);
$routes->get('/reservasi/pembayaran/batal/(:num)', 'Reservations::cancel/$1', ['filter' => 'auth']);
$routes->get('/tiket/', 'Reservations::ticket', ['filter' => 'auth']);
$routes->get('/riwayat/', 'Reservations::history', ['filter' => 'auth']);

//admin
$routes->get('/admin', 'admin::index');

//admin - movies
$routes->get('/admin/movies', 'Admin::movies', ['filter' => 'auth']);
$routes->get('/admin/movies/add', 'Movies::add_movie', ['filter' => 'auth']);
$routes->post('/admin/movies/add-movie', 'Movies::insert', ['filter' => 'auth']);
$routes->get('/admin/movies/delete/(:num)', 'Movies::delete/$1', ['filter' => 'auth']);
$routes->get('/admin/movies/edit/(:num)', 'Movies::edit_movie/$1', ['filter' => 'auth']);
$routes->post('/admin/movies/edit-movie/', 'Movies::update', ['filter' => 'auth']);

//admin - screenings
$routes->get('/admin/screenings', 'Admin::screenings', ['filter' => 'auth']);
$routes->get('/admin/screenings/add', 'Screenings::add_screening', ['filter' => 'auth']);
$routes->post('/admin/screenings/add-screening', 'Screenings::insert', ['filter' => 'auth']);
$routes->get('/admin/screenings/edit/(:num)', 'Screenings::edit_screening/$1', ['filter' => 'auth']);
$routes->post('/admin/screenings/edit-screening/', 'Screenings::update', ['filter' => 'auth']);
$routes->get('/admin/screenings/delete/(:num)', 'Screenings::delete/$1', ['filter' => 'auth']);

//admin - studios
$routes->get('/admin/studios', 'Admin::studios', ['filter' => 'auth']);
$routes->get('/admin/studios/add', 'Studios::add_studio', ['filter' => 'auth']);
$routes->post('/admin/studios/add-studio', 'Studios::insert', ['filter' => 'auth']);
$routes->get('/admin/studios/edit/(:num)', 'Studios::edit_studio/$1', ['filter' => 'auth']);
$routes->post('/admin/studios/edit-studio/', 'Studios::update', ['filter' => 'auth']);
$routes->get('/admin/studios/delete/(:num)', 'Studios::delete/$1', ['filter' => 'auth']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
