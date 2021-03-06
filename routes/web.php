
<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Account Check
Route::post('/test', 'UserController@test');

// Account Check
Route::post('/check', 'AccountingController@accountSeederCheck');

// Account Income
Route::post('/account', 'AccountingController@emulator');

// Create Schedule For User
Route::post('/order/success', 'OrderController@createSchedule');

// Create Annuity Schedule For User
Route::post('annuity/order/success', 'OrderController@createAnnuitySchedule');

Route::post('/orderstatus', 'OrderController@orderStatus');

// Get invoice Information
Route::post('/invoice', 'InvoiceController@getInvoiceInfo');

// Check User With PID
Route::post('/checkuser', 'UserController@checkUser');

// User Registration
Route::post('/register', 'UserController@register')->middleware('registration');

// User Authorization
Route::post('/login', 'UserController@login');

//Check Token
Route::post('/checktoken', 'UserController@getAuthenticatedUser');

// Get User Data
Route::post('/userdata', 'UserController@userData');

Route::post('/okeyapi', 'MerchantController@processinvoice');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
