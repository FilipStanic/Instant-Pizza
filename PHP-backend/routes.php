<?php


$router->get('login', 'AuthController@login_form');
$router->post('login', 'AuthController@login');
$router->get('logout', 'AuthController@logout');


$router->get('', 'PagesController@home');
$router->get('orders', 'PagesController@orders');


$router->get('items', 'itemsController@index');
$router->get('items/create', 'itemsController@create');
$router->post('items/create', 'itemsController@store');
$router->get('items/show', 'itemsController@show');
$router->get('items/edit', 'itemsController@edit');
$router->post('items/edit', 'itemsController@update');
$router->get('items/destroy', 'itemsController@destroy');



$router->get('api/items', 'ApiItemsController@index');


$router->post('api/orders', 'ApiOrdersController@store');


$router->get('api/faq', 'ApiFaqController@index');



$router->get('users', 'UsersController@index');
$router->get('users/create', 'UsersController@create');
$router->post('users', 'UsersController@store');
$router->get('users/show', 'UsersController@show');
$router->get('users/edit', 'UsersController@edit');
$router->post('users/edit', 'UsersController@update');
$router->get('users/editPassword', 'UsersController@editPassword');
$router->post('users/editPassword', 'UsersController@updatePassword');
$router->get('users/destroy', 'UsersController@destroy');