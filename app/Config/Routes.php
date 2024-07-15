<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// AUTH
$routes->post('/register','AdminController::register');
$routes->post('/login','AdminController::login');
$routes->get('/logout','AdminController::logout');

// ADMIN
$routes->get('/dashboard', 'AdminController::dashboard');
$routes->get('/register', 'AdminController::dashboard');
$routes->get('/guidline-admin', 'AdminController::guidline');

// Survey
$routes->get('/list-survey', 'AdminController\SuveryController::index');
// $routes->get('/form-survey', 'AdminController\SuveryController::formSurvey');
$routes->get('/form-survey', 'AdminController\SuveryController::showSurveyForm');
$routes->post('/survey/submitResponse', 'AdminController\SuveryController::submitResponse');
$routes->get('/generate-report', 'AdminController\SuveryController::generateReport');

$routes->get('/responses/memuaskan', 'AdminController\SuveryController::responsesByQuality/Memuaskan');
$routes->get('/responses/cukup-memuaskan', 'AdminController\SuveryController::responsesByQuality/Cukup Memuaskan');
$routes->get('/responses/belum-memuaskan', 'AdminController\SuveryController::responsesByQuality/Belum Memuaskan');


// Criteria
$routes->get('/list-criteria', 'AdminController\CriteriaController::index');
$routes->get('/form-criteria', 'AdminController\CriteriaController::formCriteria');
$routes->post('/criteria/store', 'AdminController\CriteriaController::store');
$routes->get('/criteria/edit/(:num)', 'AdminController\CriteriaController::edit/$1');
$routes->post('/criteria/update/(:num)', 'AdminController\CriteriaController::update/$1');
$routes->get('/criteria/delete/(:num)', 'AdminController\CriteriaController::delete/$1');

// User
$routes->get('/list-user', 'AdminController\UserController::index');
$routes->get('/user/delete/(:num)', 'AdminController\UserController::delete/$1');
$routes->get('/form-user', 'AdminController\UserController::createuser');
$routes->post('/post-user', 'AdminController::register');

// Sub Criteria
$routes->get('/list-sub-criteria', 'AdminController\SubCriteriaController::index');
$routes->get('/form-sub-criteria', 'AdminController\SubCriteriaController::create');
$routes->post('/sub-criteria/store', 'AdminController\SubCriteriaController::store');
$routes->get('/sub-criteria/edit/(:num)', 'AdminController\SubCriteriaController::edit/$1');
$routes->post('/sub-criteria/update/(:num)', 'AdminController\SubCriteriaController::update/$1');

// NON ADMIN
$routes->get('/home', 'NonAdminController::index');
$routes->get('/about', 'NonAdminController::about');
$routes->get('/thankyou', 'NonAdminController::thankyou');
$routes->get('/guidline', 'NonAdminController::guidline');

$routes->get('/about/edit', 'NonAdminController::editAbout');
$routes->post('/about/update', 'NonAdminController::updateAbout');
