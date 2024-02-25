<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('HomeController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// route home
$routes->get('/', 'HomeController::index');

// route login
$routes->get('/login', 'HomeController::login');
$routes->post('/login/proses', 'HomeController::proses_login');

// route logout
$routes->get('/logout', 'HomeController::login');
$routes->get('/logout/admin', 'HomeController::login');

// route dashboard user
$routes->group('', ['filter' => 'authFilter'], function ($routes) {
    $routes->get('/dashboard', 'DashboardController::index');
    $routes->get('/dashboard/user', 'DashboardController::dashboard_user');
    $routes->get('/profile/user', 'DashboardController::profile_user');
    $routes->get('/dashboard/tambah_data', 'DashboardController::tambah_data');
    $routes->get('dashboard/data_dbd', 'DashboardController::data_balita');
    $routes->post('/dashboard/tambah_data/proses', 'DashboardController::proses_tambah_data');
    $routes->get('/dashboard/edit_data/(:num)', 'DashboardController::edit_data/$1');
    $routes->post('/dashboard/edit_data/proses', 'DashboardController::proses_edit_data');
    $routes->get('/dashboard/hapus_data/(:num)', 'DashboardController::hapus_data/$1');
    $routes->post('/dashboard/cluster', 'DashboardController::cluster');
    $routes->get('/dashboard/identifikasi', 'DashboardController::identifikasi_user');
    $routes->get('/dashboard/klasifikasi', 'DashboardController::klasifikasi_user');
    $routes->get('/dashboard/peta/sebaran', 'DashboardController::peta_sebaran_user');
    $routes->get('/dashboard/view/file/bulan', 'DashboardController::view_file1');
});

//  route dashboar admin
$routes->group('admin', ['filter' => 'authFilter'], function ($routes) {

    $routes->get('dashboard', 'DashboardControllerAdmin::dashboard_admin');
    $routes->get('profile', 'DashboardControllerAdmin::profile_admin');

    $routes->get('data/pengguna', 'DashboardControllerAdmin::data_pengguna');
    $routes->get('dashboard/add_user', 'DashboardControllerAdmin::add_user');
    $routes->post('dashboard/add_user/proses', 'DashboardControllerAdmin::proses_add_user');
    $routes->get('dashboard/edit_data/user/(:num)', 'DashboardControllerAdmin::edit_data_admin/$1');
    $routes->post('dashboard/edit_data/proses', 'DashboardControllerAdmin::proses_edit_data_admin');
    $routes->get('dashboard/delete/(:num)', 'DashboardControllerAdmin::delete/$1');

    $routes->get('data/kecamatan', 'DashboardControllerAdmin::data_kecamatan');
    $routes->get('dashboard/add_kecamatan', 'DashboardControllerAdmin::add_kecamatan');
    $routes->post('dashboard/add_kecamatan/proses', 'DashboardControllerAdmin::proses_add_kecamatan');
    $routes->get('dashboard/edit_data/kecamatan/(:num)', 'DashboardControllerAdmin::edit_data_kecamatan/$1');
    $routes->post('dashboard/edit_data/kecamatan/proses', 'DashboardControllerAdmin::proses_edit_data_kecamatan');
    $routes->get('dashboard/delete/kecamatan/(:num)', 'DashboardControllerAdmin::delete_kecamatan/$1');
    
    $routes->get('data/puskesmas', 'DashboardControllerAdmin::data_puskesmas');
    $routes->get('dashboard/add_puskesmas', 'DashboardControllerAdmin::add_puskesmas');
    $routes->post('dashboard/add_puskesmas/proses', 'DashboardControllerAdmin::proses_add_puskesmas');
    $routes->get('dashboard/edit_data/puskesmas/(:num)', 'DashboardControllerAdmin::edit_data_puskesmas/$1');
    $routes->post('dashboard/edit_data/puskesmas/proses', 'DashboardControllerAdmin::proses_edit_data_puskesmas');
    $routes->get('dashboard/delete/puskesmas/(:num)', 'DashboardControllerAdmin::delete_puskesmas/$1');
    
    $routes->get('data/kelurahan', 'DashboardControllerAdmin::data_kelurahan');
    $routes->get('dashboard/add_kelurahan', 'DashboardControllerAdmin::add_kelurahan');
    $routes->post('dashboard/add_kelurahan/proses', 'DashboardControllerAdmin::proses_add_kelurahan');
    $routes->get('dashboard/edit_data/kelurahan/(:num)', 'DashboardControllerAdmin::edit_data_kelurahan/$1');
    $routes->post('dashboard/edit_data/kelurahan/proses', 'DashboardControllerAdmin::proses_edit_data_kelurahan');
    $routes->get('dashboard/delete/kelurahan/(:num)', 'DashboardControllerAdmin::delete_kelurahan/$1');

    $routes->get('dashboard/hasil/cluster', 'DashboardControllerAdmin::hasil_cluster');
    $routes->get('peta/balita', 'DashboardControllerAdmin::peta_balita');
    $routes->get('dashboard/view/file', 'DashboardControllerAdmin::view_file_admin');
});

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
