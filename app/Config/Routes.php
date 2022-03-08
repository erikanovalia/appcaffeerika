<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/dashboard','Home::Dashboard',['filters'=>'auth']);

$routes->get('/', 'Home::coba');
$routes->get('/menu','menucontroller::tampil');
$routes->add('/menus','menucontroller::create');
$routes->get('/menucontroller/delete/(:segment)','menucontroller::delete/$1');
$routes->add('/menu/edit/(:segment)','menucontroller::edit/$1');

$routes->get('/pesanan','pesanancontroller::tampil');
$routes->get('/user','usercontroller::tampil');
$routes->get('/detailpesanan','DetailpesananController::tampil');

$routes->get('/user','usercontroller::tampil');
$routes->add('/users','usercontroller::create');
$routes->get('/user/delete/(:segment)','usercontroller::delete/$1');
$routes->add('/user/edit/(:segment)','usercontroller::edit/$1');

$routes->get('/pesanan','pesanancontroller::index');
$routes->add('/pesan','pesanancontroller::addCart');
$routes->add('/pesanans','pesanancontroller::simpan');
$routes->get('/pesan/delete/(:segment)','pesanancontroller::hapusCart::/$1');

$routes->get('/login','usercontroller::tlogin');
$routes->add('login','usercontroller::login');
$routes->get('/logout','usercontroller::logout');

$routes->get('/laporan','laporanController::tampil');
$routes->get('/laporan/delete/(:segment)','LaporanController::delete/$1');



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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
