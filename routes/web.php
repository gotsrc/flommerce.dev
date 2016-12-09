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
Route::get('/', 'CategoriesController@index');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/logout' , 'Auth\LoginController@logout')->middleware('auth');
Route::resource('products', 'ProductsController');
Route::resource('cart','CartsController');
Route::resource('categories', 'CategoriesController');
// Route::resource('cart', 'CartsController');

Route::get('/products/{product}/purchase', 'ProductsController@getAddToCart')->middleware('auth')->name('cart.add');
Route::post('/products/{product}/edit')->middleware('auth');
Route::post('/categories/{category}/edit')->middleware('auth');

Route::get('/cart/{id}/remove', 'CartsController@getRemoveCartItem');
Route::get('/cart/checkout', 'CartsController@getCheckout')->name('cart.checkout');
Route::post('checkout', 'CartsController@postCheckout');
Route::get('/checkout/success', 'CartsController@getCheckoutSuccess')->name('checkout.success');
