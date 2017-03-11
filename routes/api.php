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



//====== Order Operations ======

Route::post('/order/schedule', 'OrderController@getSchedule');

Route::post('/order/sureties', 'OrderController@getSureties');

Route::post('/order/realestate/show', 'RealEstateController@showGuarantee');

Route::post('/order/realestate/update', 'RealEstateController@updateGuarantee');

Route::post('/order/car/show', 'CarGuaranteeController@showGuarantee');

Route::post('/order', 'OrderController@show');

Route::post('/order/guarantee', 'OrderController@getGuarantee');

//====== Order Operations ======















//====== User Operations ======

// User Search
Route::post('/user/orders', 'UserController@getUserOrders');

// User Search
Route::post('/user/search', 'UserController@search');

// Update User
Route::post('/user/update', 'UserController@update');

// Add User
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