<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Unprotected routes
Route::post('/login','UserLoginController');
Route::post('/user/create','UserStoreController@createUser');

// Protected routes
Route::middleware('auth:sanctum')->get('/users/get','UserReadController@getUsers');
Route::middleware('auth:sanctum')->get('/cards/get','CardReadController@getCards');
Route::middleware('auth:sanctum')->post('/cards/post','CardStoreController@storeCard');

