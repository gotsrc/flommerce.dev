<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* RESTful Route Model Binding. */
Route::get('/', 'CategoriesController@index');
Route::get('/home', 'HomeController@index');
Route::resource('categories', 'CategoriesController');
Route::get('/products/{product}/purchase', 'ProductsController@purchase');
Route::resource('products', 'ProductsController');

Route::resource('orders','OrdersController');

Auth::routes();

Route::get('/home', 'HomeController@index');
