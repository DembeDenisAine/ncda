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

//DEFAULT ROUTE
$routes->get('/', 'Home::index');

//DISTRICTS
    $routes->get('district-list', 'DistrictsController::index');
    $routes->get('create-district', 'DistrictsController::create');
    $routes->post('save-district', 'DistrictsController::store');
    $routes->get('edit-district/(:num)', 'DistrictsController::singleDistrict/$1');
    $routes->post('update-district', 'DistrictsController::update');
    $routes->get('delete-district/(:num)', 'DistrictsController::delete/$1');

//PROJECTS
    $routes->get('project-list', 'ProjectsController::index');
    $routes->get('create-project', 'ProjectsController::create');
    $routes->post('save-project', 'ProjectsController::store');
    $routes->get('edit-project/(:num)', 'ProjectsController::singleProject/$1');
    $routes->post('update-project', 'ProjectsController::update');
    $routes->get('delete-project/(:num)', 'ProjectsController::delete/$1');

//OBJECTIVES
    $routes->get('objective-list', 'ObjectivesController::index');
    $routes->get('create-objective/(:num)', 'ObjectivesController::create/$1');
    $routes->post('save-objective', 'ObjectivesController::store');
    $routes->get('edit-objective/(:num)', 'ObjectivesController::singleProject/$1');
    $routes->post('update-objective', 'ObjectivesController::update');
    $routes->get('delete-objective/(:num)', 'ObjectivesController::delete/$1');
    $routes->get('objective-list/(:num)', 'ObjectivesController::index/$1');

//ACTIVITIES
    $routes->get('activity-list', 'ActivitiesController::index');
    $routes->get('create-activity/(:num)', 'ActivitiesController::create/$1');
    $routes->post('save-activity', 'ActivitiesController::store');
    $routes->get('edit-activity/(:num)', 'ActivitiesController::singleProject/$1');
    $routes->post('update-activity', 'ActivitiesController::update');
    $routes->get('delete-activity/(:num)', 'ActivitiesController::delete/$1');
    $routes->get('activity-list/(:num)', 'ActivitiesController::index/$1');

//PARAMETERS
    $routes->get('parameter-list', 'ParameterController::index');
    $routes->get('create-parameter/(:num)', 'ParameterController::create/$1');
    $routes->post('save-parameter', 'ParameterController::store');
    $routes->get('edit-parameter/(:num)', 'ParameterController::singleParameter/$1');
    $routes->post('update-parameter', 'ParameterController::update');
    $routes->get('delete-parameter/(:num)', 'ParameterController::delete/$1');
    $routes->get('parameter-list/(:num)', 'ParameterController::index/$1');


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
