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

/*User routes*/
Route::get('home','HomeController@index')->name('home');


/*miscellaneous Routes*/
//Route::get('');
/*miscellaneous Routes*/


Route::group(['middleware' => ['admin']], function () {
    Route::get('assets','AssetController@index')->name('assets');



Route::get('assets/to-pdf','AssetController@streamPdf')->name('to-pdf');
Route::get('assets/create-new-asset','AssetController@create')->name('create-new-asset');
Route::post('assets/save-new-asset','AssetController@store')->name('save-new-asset');
Route::get('assets/in-possession','AssetController@inPossession')->name('in-possession');
Route::post('assets/update/{id}','AssetController@update')->name('update-asset');
Route::delete('assets/delete/{id}','AssetController@destroy')->name('delete-asset');

Route::get('resources','AssetController@allResources')->name('all-resources');
Route::get('resources/{id}','AssetController@show')->name('show-resource');
Route::post('resources/reserve','AssetController@reserveResource')->name('reserve-resource');


Route::get('reservations','AssetController@getReservations')->name('reservations');
Route::get('reservations/approve/{id}','AssetController@approveRequest')->name('approve-reservation');

/*categories*/
Route::get('categories','CategoryController@index')->name('categories');
Route::get('categories/create-new-category','CategoryController@create')->name('create-new-category');
Route::post('categories/save-new-category','CategoryController@store')->name('save-new-category');
Route::post('categories/update/{id}','CategoryController@update')->name('update-category');
/*categories*/



/*Departments*/
Route::get('departments','DepartmentController@index')->name('departments');
Route::post('departments/save-new-department','DepartmentController@store')->name('save-new-department');

// Registration
Route::get('register', ['as' => 'auth.register.form', 'uses' => 'Auth\RegistrationController@getRegister']);
Route::post('register', ['as' => 'auth.register.attempt', 'uses' => 'Auth\RegistrationController@postRegister']);

// Activation
Route::get('activate/{code}', ['as' => 'auth.activation.attempt', 'uses' => 'Auth\RegistrationController@getActivate']);
Route::get('resend', ['as' => 'auth.activation.request', 'uses' => 'Auth\RegistrationController@getResend']);
Route::post('resend', ['as' => 'auth.activation.resend', 'uses' => 'Auth\RegistrationController@postResend']);

// Password Reset
Route::get('password/reset/{code}', ['as' => 'auth.password.reset.form', 'uses' => 'Auth\PasswordController@getReset']);
Route::post('password/reset/{code}', ['as' => 'auth.password.reset.attempt', 'uses' => 'Auth\PasswordController@postReset']);
Route::get('password/reset', ['as' => 'auth.password.request.form', 'uses' => 'Auth\PasswordController@getRequest']);
Route::post('password/reset', ['as' => 'auth.password.request.attempt', 'uses' => 'Auth\PasswordController@postRequest']);

// Users
Route::resource('users', 'UserController');

// Roles
Route::resource('roles', 'RoleController');

// Dashboard
Route::get('dashboard', ['as' => 'dashboard', 'uses' => function() {
    $availble_assets = \App\Asset::where('available',1)->count();
    $booked_assets = \App\Asset::where('available',0)->count();
    $data = [
        'available_assets'=>$availble_assets,
        'booked_assets'=>$booked_assets,
    ];
    return view('centaur.dashboard',$data);
}]);



});


// Authorization
Route::get('/login', ['as' => 'auth.login.form', 'uses' => 'Auth\SessionController@getLogin']);
Route::post('/login', ['as' => 'auth.login.attempt', 'uses' => 'Auth\SessionController@postLogin']);
Route::get('/logout', ['as' => 'auth.logout', 'uses' => 'Auth\SessionController@getLogout']);
