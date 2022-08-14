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
$routes->setDefaultController('');
$routes->setDefaultMethod('');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//USER ROUTES
$routes->get('/', 'Pages::index');
$routes->get('/about', 'Pages::about');
$routes->match(['get', 'post'], '/register', 'Auth::register', ['filter' => 'noauth']); //match does get and post requests both on the same route
$routes->match(['get', 'post'], '/login', 'Auth::login', ['filter' => 'noauth']);
$routes->match(['get', 'post'],'/profile', 'Auth::userprofile', ['filter' => 'auth']);
$routes->get('/dashboard', 'Auth::dashboard', ['filter' => 'auth']);
$routes->get('logout', 'Auth::logout');
$routes->match(['get', 'post'], '/enquiries', 'Contact::enquiry');
$routes->match(['get', 'post'], '/book_appointment', 'Auth::bookAppointment', ['filter' => 'auth']);
$routes->get('/my_appointments', 'Auth::listappointments', ['filter' => 'auth']);
$routes->get('/edit_appointment/(:num)', 'Auth::editappointment/$1', ['filter' => 'auth']);
$routes->post('update/(:num)', 'Auth::update/$1', ['filter' => 'auth']);
$routes->get('delete/(:num)', 'Auth::delete/$1', ['filter' => 'auth']);

//ADMIN ROUTES
$routes->get('/admindash', 'Admin::admindashboard', ['filter' => 'auth']);
$routes->match(['get', 'post'],'/adminlogin', 'Admin::adminlogin', ['filter' => 'noauth']);
$routes->get('logout', 'Admin::logout');
$routes->get('/listpatients', 'Admin::listpatients', ['filter' => 'auth']);
$routes->delete('delete/(:num)', 'Admin::deletept/$1', ['filter' => 'auth']); //delete patient
$routes->match(['get', 'post'],'addpatient', 'Admin::addpatient', ['filter' => 'auth']); //Add new patient
$routes->get('/editpatient/(:num)', 'Admin::editpt/$1', ['filter' => 'auth']); //edit patient
$routes->put('update/(:num)', 'Admin::update/$1', ['filter' => 'auth']); //update
$routes->get('/listappointments', 'Admin::listptappointments', ['filter' => 'auth']);
$routes->get('/editappt_admin/(:num)', 'Admin::editappt/$1', ['filter' => 'auth']);
$routes->put('update/(:num)', 'Admin::updateappt/$1', ['filter' => 'auth']); 
$routes->delete('delete/(:num)', 'Admin::deleteappt/$1', ['filter' => 'auth']); 
$routes->get('/listenquiries', 'Contact::listenquiries', ['filter' => 'auth']);
$routes->get('/edit_enquiry/(:num)', 'Contact::editenquiry/$1', ['filter' => 'auth']);
$routes->put('update/(:num)', 'Contact::updateenquiry/$1', ['filter' => 'auth']); 
$routes->delete('delete/(:num)', 'Contact::deleteenquiry/$1', ['filter' => 'auth']); 
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
