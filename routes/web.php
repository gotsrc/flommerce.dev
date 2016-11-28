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

// Setup the Categories
Route::get('/cats', function () {
	/* 
	List all of the child categories and display them. 
	*/
	return view('cats');
});
Route::post('cats/create', function () {
	/* 
	Create a new category, self explainatory. 
	*/
	return view('cats.form');
});
Route::patch('cats/update', function () {
    /* 
	Send a weird Patch request to update any category name,
	or description 
	*/
	return view('cats.form');
});
Route::delete('cats/remove', function() {
    /* 
	Delete a category and trickle down. Removing all Children
	beneath it.
	*/
	return view('cats');
});


