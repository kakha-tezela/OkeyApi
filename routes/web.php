
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

Auth::routes();


Route::get('/home', function () {
    return view('admin/index');

});

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('test',function(){
    dd(app('url'), app('url')->asset('assets/css/custom.css') );
});


Route::get('/', 'Admin\HomeController@index');
Route::get('signature',function(){
   return view('admin.includes.signature');
});
//'middleware' => ['role:Admin']
Route::group(['namespace' => 'Admin', ], function () {

    Route::resource('role', 'RoleController');

    Route::resource('permission', 'PermissionController');

    Route::resource('personal', 'PersonalsController');

    Route::get('{name?}', 'Admire2Controller@showView');

    Route::get('users', 'Admire2Controller@index');

    Route::post('users', 'Admire2Controller@store');
});


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


//Check Token
Route::post('/checktoken', 'UserController@getAuthenticatedUser');

// Get User Data
Route::post('/userdata', 'UserController@userData');

Route::post('/okeyapi', 'MerchantController@processinvoice');


