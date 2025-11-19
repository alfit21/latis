<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'siswa';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// admin
$route['admin'] = 'admin/index';
$route['admin/create'] = 'admin/create';
$route['admin/save'] = 'admin/save';
$route['admin/edit/(:num)'] = 'admin/edit/$1';
$route['admin/editSave/(:num)'] = 'admin/editSave/$1';
$route['admin/delete/(:num)'] = 'admin/delete/$1';


// siswa
$route['siswa'] = 'siswa/index';          // list siswa
$route['siswa/create'] = 'siswa/create';  // tambah siswa
$route['siswa/createSave'] = 'siswa/save';  // tambah save
$route['siswa/edit/(:num)'] = 'siswa/edit/$1'; // edit siswa berdasarkan ID
$route['siswa/editSave/(:num)'] = 'siswa/editSave/$1'; // edit save siswa berdasarkan ID
$route['siswa/delete/(:num)'] = 'siswa/delete/$1'; // hapus
$route['siswa/export'] = 'siswa/exportExcel';



// profile
$route['profile'] = 'profile/index';          // list profile
$route['profile/show'] = 'profile/show'; //detail profile

// auth
$route['logout'] = 'auth/logout';
$route['login'] = 'auth/index';
$route['auth/check'] = 'auth/check';