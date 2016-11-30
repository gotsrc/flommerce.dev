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

Route::get('/', 'CategoriesController@index');
/*
 * This collection of Routes handles the Category functionality.
 */
//
// // Show all categories
// Route::get('categories', 'CategoriesController@index');
// // Create a category
// Route::get('categories/create', 'CategoriesController@create');
// // Show a category by a given ID.
// Route::get('categories/{id}', 'CategoriesController@show');
// // Method for storing the data after input.
// Route::post('categories', 'CategoriesController@store');
Route::resource('categories', 'CategoriesController');

// // Show all products
// Route::get('products','ProductsController@index');
// // Create a products
// Route::get('products/create','ProductsController@create');
// // Show a Product by a Given ID.
// Route::get('products/{id}', 'ProductsController@show');
// // Store the data after input
// Route::post('products', 'ProductsController@store');
Route::resource('products', 'ProductsController');
