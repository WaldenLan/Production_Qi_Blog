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
//$route['translate_uri_dashes'] = FALSE;
$route['default_controller'] = 'home';    //Always in the front!
$route['404_override'] = '';

// About Module:
$route['about'] = 'about';

// Coding Module:
$route['coding'] = 'coding';
$route['coding/(:any)'] = 'coding';
$route['coding/view/(:any)'] = 'coding/view/$1';
$route['coding/comment/(:any)'] = 'coding/comment/$1';

// Geek Module:
$route['geek'] = 'geek';
$route['geek/(:any)'] = 'geek';
$route['geek/view/(:any)'] = 'geek/view/$1';
$route['geek/comment/(:any)'] = 'geek/comment/$1';

// Life Module:
$route['life'] = 'life';
$route['life/(:any)'] = 'life';
$route['life/view/(:any)'] = 'life/view/$1';
$route['life/comment/(:any)'] = 'life/comment/$1';

// Home Module:
$route['home/(:any)'] = 'home';

// Message Module:
$route['message'] = 'message';
$route['message/comment'] = 'message/comment';
$route['message/(:any)'] = 'message';       // 此处有优先级问题！！！url是按顺序搜索的，所以(:any)尽量放在最后！！！

// Edit Module:
$route['edit'] = 'edit';
$route['create'] = 'edit/create';