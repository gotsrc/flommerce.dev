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

Route::get('/', function () {
    return view('welcome');
});


/* 
 * This collection of Routes handles the Category functionality.
 */
Route::get('cats', 'CatsController@index'); // Call the index method, display parent and child cats
Route::get('cats/all','CatsController@all'); // Read the Cat
Route::post('cats/create','CatsController@create'); // Create a Cat
Route::patch('cats/{cat}/update', 'CatsController@update'); // Update a Cat
Route::delete('cats/{cat}/remove', 'CatsController@remove'); // Kill the Cat.
