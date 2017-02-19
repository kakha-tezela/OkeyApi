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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


//====== User Operations ======

// Get All Users
Route::post('/users', 'UserController@index');


// Check User With PID
Route::post('/checkuser', 'UserController@checkUser');


// User Authorization
Route::post('/login', 'UserController@login');



//====== End OF User Operations ======


