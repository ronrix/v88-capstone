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
$route['default_controller'] = 'dashboards';
// authentication route
$route['admin'] = 'users/admin';
$route['login'] = 'users/login';
$route['register'] = 'users/register';
$route['profile'] = 'users/profile';
$route['process_login'] = 'users/process_login';
$route['process_register'] = 'users/process_register';
$route['logout'] = 'users/logout';

// main
$route["home"] = 'dashboards/index';
$route["cart"] = 'dashboards/cart';
$route["catalog"] = 'dashboards/catalog';
$route["dashboard/orders"] = 'dashboards';
$route["dashboard/products"] = 'dashboards/products';
$route["get_carts"] = "dashboards/get_carts";
$route["cart_count_update"] = "dashboards/cart_count_update";

// products
$route["product/show/(:any)"] = "products/show/$1";
$route["categories"] = "products/categories";
$route["products"] = "products/products";
$route["checkout"] = "products/checkout";
$route["delete_cart"] = "products/delete_cart";
$route["update_cart"] = "products/update_cart";
$route["add_to_cart"] = "products/add_to_cart";
$route["orders/show/(:any)"] = "products/show_order/$1";
$route["get_total_price"] = "products/get_total_price";
$route["delete_product"] = "products/delete_product";
$route["update_product"] = "products/update_product";

// categories
$route["category/(:any)"] = "categories/category/$1";

// orders 
$route["update_order"] = "orders/update_order";
$route["filter_orders"] = "orders/filter_orders";


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
