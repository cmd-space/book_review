<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "welcomes";
$route['404_override'] = '';
$route['/welcomes/book/(:any)'] = '/welcomes/book/$1';
//end of routes.php
