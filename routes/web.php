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

Route::resource('categories', 'CategoriesController');
Route::post('/categories/{category}/edit');
Route::resource('products', 'ProductsController');
Route::resource('cart','CartsController');

Route::get('/products/{product}/purchase', 'ProductsController@getAddToCart')->name('cart.add');
Route::post('/products/{product}/edit')->middleware('auth');

Route::get('cart', 'ProductsController@getCart')->name('cart');
Route::get('/cart/{id}/remove', 'CartsController@getRemoveCartItem');
Route::get('/reduce/{id}','ProductsController@getReduceItemByOne')->name('reduce');
Route::get('/increment/{id}','ProductsController@getIncrementItemByOne')->name('increment');
Route::get('/remove-all/{id}','ProductsController@getRemoveAllItems')->name('remove-all');

// Route::get('/cart/checkout', 'ProductsController@getCheckout')->name('cart.checkout');
Route::get('checkout', 'ProductsController@getCheckout')->name('checkout')->middleware('auth');
Route::post('checkout', 'CartsController@postCheckout')->middleware('auth');
Route::get('/checkout/success', 'CartsController@getCheckoutSuccess')->name('checkout.success');
