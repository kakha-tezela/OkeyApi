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



//====== User Operations ======


Route::group(['middleware' => 'AddUpdate'], function () {

	// Update User
	Route::post('/user/update', 'UserController@update');

	// Add User
	Route::post('/user/add', 'UserController@add');

});


// Get All Users
Route::post('/users', 'UserController@index');

// Show One User
Route::post('/user/show', 'UserController@show');


// Check User With PID
Route::post('/checkuser', 'UserController@checkUser');


// User Authorization
Route::post('/login', 'UserController@login');



//====== End OF User Operations ======





Route::post('/cities', 'UserController@getCities');

Route::post('/countries', 'UserController@getCountries');














Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');