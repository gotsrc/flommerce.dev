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
Route::get('/', 'HomeController@index');
Route::get('/logout' , 'Auth\LoginController@logout');
Route::resource('products', 'ProductsController');
Route::resource('cart','CartsController');
Route::resource('categories', 'CategoriesController');

Route::post('/products/{product}/purchase', 'ProductsController@postPurchaseProduct')->middleware('auth');
Route::post('/products/{product}/edit')->middleware('auth');
Route::get('/categories/{category}/edit')->middleware('auth');

Route::get('/cart/{id}/remove', 'CartsController@getRemoveCartItem');
Route::get('/cart/checkout', 'CartsController@getCheckout')->middleware('auth');
Route::post('checkout', 'CartsController@postCheckout');
Route::get('/checkout/success', 'CartsController@getCheckoutSuccess');
