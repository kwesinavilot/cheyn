<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Routings for expense
$route['expenses/insert_record'] = 'expenses/insert_record';
$route['expenses/edit/(:any)'] = 'expenses/edit/$1';
$route['expenses/view/(:any)'] = 'expenses/view/$1';
$route['expenses'] = 'expenses/index';

//Routings for income
$route['income/insert_record'] = 'income/insert_record';
$route['income/edit/(:any)'] = 'income/edit/$1';
$route['income/view/(:any)'] = 'income/view/$1';
$route['income'] = 'income/index';

// Routings for the bucket
$route['buckets/insert_record'] = 'buckets/insert_record';
$route['buckets/edit/(:any)'] = 'buckets/edit/$1';
$route['buckets/insights/(:any)'] = 'buckets/insights/$1';
$route['buckets'] = 'buckets/index';

//General routings
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;