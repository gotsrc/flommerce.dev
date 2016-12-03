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
Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/', 'CategoriesController@index');
Route::resource('products', 'ProductsController');
Route::resource('cart','CartsController');
Route::resource('categories', 'CategoriesController');

Route::post('/products/{product}/purchase', 'ProductsController@purchase');
Route::get('/cart/{id}/remove', 'CartsController@remove');
