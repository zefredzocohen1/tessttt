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
|	https://codeigniter.com/user_guide/general/routing.html
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
//$route['(.*)'] = 'site/default_home';
$route['404_override'] = 'errors/pageNotFound';
$route['default_controller'] = 'site/home';
$route['translate_uri_dashes'] = FALSE;
$route['admin'] = "admin/login";
//site
$route['room'] = 'site/room';
$route['room/(:any)'] = 'site/room/$1';
$route['room/(:any)/(:any)'] = 'site/room/$1/$2';
$route['home/(:any)'] = 'site/home/$1';
$route['home'] = 'site/home';
$route['user/(:any)'] = 'site/user/$1';
$route['payments/(:any)/(:any)'] = 'site/payments/$1/$2';
$route['payments'] = 'site/payments';
$route['spaces/prices/(:any)'] = 'site/spaces/prices/$1';
$route['language'] = 'site/language';
//$route['site'] = "site/home";
