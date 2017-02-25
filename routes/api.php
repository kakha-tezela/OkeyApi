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

// User Search
Route::post('/user/search', 'UserController@search');



// Update User
Route::post('/user/update', 'UserController@update');

Route::post('/user/add', 'UserController@add')->middleware("Cors");


// Get All Users
Route::post('/users', 'UserController@index');

// Show One User
Route::post('/user/show', 'UserController@show');


// Check User With PID
Route::post('/checkuser', 'UserController@checkUser');


// User Authorization
Route::post('/login', 'UserController@login');

//====== End OF User Operations ======









// Get invoice Information
Route::post('/invoice', 'InvoiceController@getInvoiceInfo');

Route::post('/invoiceproducts', 'InvoiceController@getInvoiceProducts');

Route::post('/plogin', 'PersonalController@login');

Route::post('/cities', 'UserController@getCities');

Route::post('/countries', 'UserController@getCountries');

Route::post('/socialstatuses', 'UserController@getSocialStatuses');

Route::post('/salaryranges', 'UserController@getSalaryRanges');

Route::post('/companies', 'UserController@getCompanies');














Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');