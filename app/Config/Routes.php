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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/index', 'Home::index');
$routes->get('/redaksi', 'Home::redaksi');
$routes->get('/blog', 'Home::blog');
$routes->get('/categori', 'Home::categori');
$routes->get('/categori/(:any)', 'Home::categori');
$routes->get('/contact_process', 'Home::contact_process');
$routes->get('/contact', 'Home::contact');
$routes->get('/details', 'Home::details');
$routes->get('/elements', 'Home::elements');
$routes->get('/latest_news', 'Home::latest_news');
$routes->get('/latest_news/searchresult/', 'Home::searchResult');
$routes->get('/Mag_NewsDoc', 'Home::MagNewsDoc');
$routes->get('/(:segment)', 'Home::news/$1');
// $routes->get('/(:segment)/(:segment)', 'Home::news/$1/$2');
$routes->get('/news/savecomment', 'Home::saveComment');
$routes->get('/page', 'Home::page');
$routes->get('/termofuse/pedomanCyberMedia', 'Home::cyberMedia');
$routes->get('/termofuse/kodeEtik', 'Home::kodeEtik');

// Profile Setting (All Users)
$routes->get('/author/dashboard', 'Author::dashboard', ['filter' => 'role:author,admin']);
$routes->get('/author/profile_user', 'Author::profile_user', ['filter' => 'role:author,admin']);
$routes->get('/author/profile_setting', 'Author::profile_setting', ['filter' => 'role:author,admin']);
$routes->post('/saveprofile', 'Author::save_profile', ['filter' => 'role:author,admin']);

// $routes->get('/author/create_artikel', 'Author::create_artikel', ['filter' => 'role:author,admin']);
// $routes->get('/author/update_artikel/(:num)', 'Author::update_artikel/$1', ['filter' => 'role:author,admin']);
// $routes->get('/author/view_artikel', 'Author::view_artikel', ['filter' => 'role:author,admin']);
// $routes->get('/author/manageArtikel', 'Author::manage_artikel', ['filter' => 'role:author,admin']);
// $routes->post('/updateartikel', 'Author::update_data_artikel', ['filter' => 'role:author,admin']);
// $routes->get('/author/manageKomen', 'Author::manage_komen', ['filter' => 'role:author,admin']);
// $routes->get('/author/deleteArtikel/(:num)', 'Author::delete_artikel/$1', ['filter' => 'role:author,admin']);
// $routes->get('/author/deleteKomen/(:num)', 'Author::delete_komen/$1', ['filter' => 'role:author,admin']);
// $routes->get('/author/update_status_artikel/(:num)', 'Author::update_status_artikel/$1', ['filter' => 'role:author,admin']);
// $routes->get('/author/update_status_komen/(:num)', 'Author::update_status_komen/$1', ['filter' => 'role:author,admin']);

// Routes Management Setting Artikel (Author)
$routes->get('/author/create_artikel', 'Author::create_artikel_author', ['filter' => 'role:author']);
$routes->get('/author/manage_artikel', 'Author::manage_artikel_author', ['filter' => 'role:author']);
$routes->post('/author/save_create_artikel', 'Author::save_create_artikel_author', ['filter' => 'role:author']);
$routes->get('/author/update_status_artikel/(:num)', 'Author::update_status_artikel_author/$1', ['filter' => 'role:author']);
$routes->get('/author/update_artikel/(:num)', 'Author::update_artikel_author/$1', ['filter' => 'role:author']);
$routes->post('/author/save_update_artikel', 'Author::save_update_artikel', ['filter' => 'role:author']);
$routes->get('/author/delete_artikel/(:num)', 'Author::delete_artikel_author/$1', ['filter' => 'role:author']);

// Routes Management Setting Artikel (Admin)
$routes->get('/admin/manage_artikel', 'Admin::manage_artikel', ['filter' => 'role:admin']);
$routes->get('/admin/view_artikel', 'Admin::view_artikel', ['filter' => 'role:admin']);
$routes->get('/admin/create_artikel', 'Admin::create_artikel', ['filter' => 'role:admin']);
$routes->post('/admin/save_create_artikel', 'Admin::insert_data_artikel', ['filter' => 'role:admin']);
$routes->post('admin/save_update_artikel', 'Admin::update_data_artikel', ['filter' => 'role:admin']);
$routes->get('/admin/update_artikel/(:num)', 'Admin::update_artikel/$1', ['filter' => 'role:admin']);
$routes->get('/admin/update_status_artikel/(:num)', 'Admin::update_status_artikel/$1', ['filter' => 'role:admin']);
$routes->get('/admin/delete_artikel/(:num)', 'Admin::delete_artikel/$1', ['filter' => 'role:admin']);

// Routes Management Setting Komen (Admin)
$routes->get('/admin/manage_komen', 'Admin::manage_komen', ['filter' => 'role:admin']);
$routes->get('/admin/delete_komen/(:num)', 'Admin::delete_komen/$1', ['filter' => 'role:admin']);
$routes->get('/admin/update_status_komen/(:num)', 'Admin::update_status_komen/$1', ['filter' => 'role:admin']);

// Routes Management Setting User (Admin)
$routes->get('/admin/manage_users', 'Admin::manage_users', ['filter' => 'role:admin']);
$routes->get('/admin/update_status_user/(:any)', 'Admin::update_status_user/$1', ['filter' => 'role:admin']);
$routes->get('/admin/user_update/(:any)', 'Admin::user_update/$1', ['filter' => 'role:admin']);
$routes->post('/admin/save_user_update', 'Admin::save_user_update', ['filter' => 'role:admin']);

// Routes Management Setting Kategori (Admin)
$routes->get('/admin/manage_kategori', 'Admin::manage_kategori', ['filter' => 'role:admin']);
$routes->get('/admin/update_kategori/(:any)', 'Admin::update_kategori/$1', ['filter' => 'role:admin']);
$routes->post('/admin/save_update_kategori', 'Admin::save_update_kategori', ['filter' => 'role:admin']);
$routes->get('/admin/delete_kategori/(:any)', 'Admin::delete_kategori/$1', ['filter' => 'role:admin']);
$routes->get('/admin/create_kategori/', 'Admin::create_kategori/', ['filter' => 'role:admin']);
$routes->post('/admin/save_create_kategori/', 'Admin::save_create_kategori/', ['filter' => 'role:admin']);

// Routes Management Setting Iklan (Admin)
$routes->get('/admin/manage_iklan', 'Admin::iklan_manage', ['filter' => 'role:admin']);
$routes->get('/admin/add_iklan/(:any)', 'Admin::add_iklan/$1', ['filter' => 'role:admin']);
$routes->post('/admin/save_add_iklan', 'Admin::save_add_iklan', ['filter' => 'role:admin']);
$routes->get('/admin/delete_iklan/(:any)', 'Admin::delete_iklan/$1', ['filter' => 'role:admin']);

// Routes Management Setting Susunan Redaksi (Admin)
$routes->get('/admin/manage_susunan_redaksi', 'Admin::manage_susunan_redaksi', ['filter' => 'role:admin']);
$routes->post('/admin/save_manage_susunan_redaksi', 'Admin::save_manage_susunan_redaksi', ['filter' => 'role:admin']);

$routes->get('/getkategori/(:num)', 'Author::getKategoriNews/$1');

$routes->resource('apikategori');
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
