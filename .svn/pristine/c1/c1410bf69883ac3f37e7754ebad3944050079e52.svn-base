<?php

namespace Config;
$routes = Services::routes();
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);


if (!session('logged_in')) return redirect()->to('login'); 

$routes->get('/', 'Login::index');
$routes->get('/khm', 'Login::index');

$routes->get('/Login/login', 'Login::index');
$routes->post('/Login/login', 'Login::index');
$routes->post('/dashboard/index', 'Dashboard::index');


if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

