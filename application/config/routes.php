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
$route['default_controller'] = 'Auth';
$route['performance'] = 'performance/index';
$route['performance/(:any)'] = 'performance/$1';

$route['businessunit'] = 'businessunit/index';
$route['businessunit/(:any)'] = 'businessunit/$1';

$route['manual'] = 'manual/index';
$route['manual/(:any)'] = 'manual/$1';

$route['branch'] = 'branch/index';
$route['branch/(:any)'] = 'branch/$1';

$route['email'] = 'email/index';
$route['email/(:any)'] = 'email/$1';

$route['achievements'] = 'achievements/index';
$route['achievements/(:any)'] = 'achievements/$1';

$route['semester'] = 'semester/index';
$route['semester/(:any)'] = 'semester/$1';

$route['library'] = 'library/index';
$route['library/(:any)'] = 'library/$1';

$route['assessments'] = 'assessments/index';
$route['assessments/(:any)'] = 'assessments/$1';

$route['position'] = 'position/index';
$route['position/(:any)'] = 'position/$1';

$route['districts'] = 'districts/index';
$route['districts/(:any)'] = 'districts/$1';

$route['leaves/(:any)'] = 'leaves/$1';
$route['leaves'] = 'leaves/index';

$route['pmd_officials/(:any)'] = 'pmd_officials/$1';
$route['pmd_officials'] = 'pmd_officials/index';

$route['special/(:any)'] = 'special/$1';
$route['special'] = 'special/index';

$route['settings'] = 'settings/index';
$route['contracts'] = 'contracts/index';
$route['contracts/(:any)'] = 'contracts/$1';
$route['settings/(:any)'] = 'settings/$1';
$route['employees/(:any)'] = 'employees/$1';
$route['reports/(:any)'] = 'reports/$1';

$route['reports'] = 'reports/index';
$route['employees'] = 'employees/index';
$route['dashboard'] = 'dashboard/index';
$route['(:any)'] = 'pages/view.php/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
