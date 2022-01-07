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


// Route to VueJs application
Route::get('/', 'VueInstanceController@render');

Route::get('/{any}', function ($any) {
	return redirect('/');
})->where('any', 'login');
Auth::routes();
