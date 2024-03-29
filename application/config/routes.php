<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['find-id/(:any)']			= 'welcome/get_nbm/$1';
$route['statistik'] 				= 'welcome/statistik';
$route['statistik-aum']				= 'welcome/statistik_aum';
$route['statistik-status']			= 'welcome/statistik_status';
$route['statistik-daily']			= 'welcome/statistik_daily';
$route['login'] 					= 'Auth';
$route['registrasi'] 				= 'Auth/registrasi';
$route['forget'] 					= 'Auth/forget';
$route['loginmuh'] 					= 'Auth/muh';
$route['submit'] 					= 'Auth/submitmuh';
$route['reg'] 						= 'Auth/regmuh';
$route['loginmuh/forget'] 			= 'Auth/forgetmuh';
$route['loginumum'] 				= 'Auth/umum';
$route['loginumum/submit'] 			= 'Auth/submitmuh';
$route['logout'] 					= 'Auth/logout';
$route['dashboard'] 				= 'Dashboard';
$route['complaint'] 				= 'Komplain';
$route['complaint/(:any)']			= 'Komplain/$1';
$route['complaint/(:any)/(:num)'] 	= 'Komplain/$1/$2';

$route['diagram'] 					= 'Diagram';
$route['diagram/statistik-aum']		= 'Diagram/statistik_aum';
$route['diagram/statistik-status']	= 'Diagram/statistik_status';
$route['diagram/statistik-daily']	= 'Diagram/statistik_daily';
$route['diagram/excel']						= 'Diagram/excel_diagram';
$route['diagram/statistik-aum/excel']		= 'Diagram/excel_aum';
$route['diagram/statistik-status/excel']	= 'Diagram/excel_status';
$route['diagram/statistik-daily/excel']		= 'Diagram/excel_daily';

$route['form'] 						= 'Form';
$route['form/(:any)']				= 'Form/$1';
$route['list']						= 'Form/complain_list';
$route['detail/(:any)']					= 'Form/complain_detail/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
