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
 

// Auth::routes();
Auth::routes(['register' => false]);

// Route::post('customers', 'CustomersController@store')->name('customers.store');
// Route::get('customers', 'CustomersController@index')->name('customers.list');
// Route::get('customers/create', 'CustomersController@create')->name('customers.create'); 
// Route::get('customers/{customer}', 'CustomersController@show')->name('customers.show');   
// // Route::get('customers/{customer}', 'CustomersController@show')->name('customers.show')->middleware('can:view,Customer');   
// Route::get('customers/{customer}/edit', 'CustomersController@edit')->name('customers.edit'); 
// Route::patch('customers/{customer}', 'CustomersController@update')->name('customers.update'); 
// Route::delete('customers/{customer}', 'CustomersController@destroy')->name('customers.delete'); 

Route::get('side', function () {
    return view('proside');
});


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','UserController@index')->name('index');

Route::get('/users','UserController@index')->name('users.index');
Route::get('/users/create','UserController@create')->name('users.create');
Route::get('/users/{user}','UserController@show')->name('users.show');
Route::get('/users/{user}/edit','UserController@edit')->name('users.edit');
Route::patch('/users/{user}','UserController@update')->name('users.update');
Route::delete('/users/{user}','UserController@destroy')->name('users.destroy');


Route::get('/company','CompanyController@index')->name('company.index');
Route::get('/test','CompanyController@test')->name('company.test');


 


Route::get('/company/create','CompanyController@create')->name('company.create');
Route::post('/company','CompanyController@store')->name('company.store');
Route::get('/company/{company}/edit','CompanyController@edit')->name('company.edit'); 
Route::patch('/company/{company}','CompanyController@update')->name('company.update'); 



Route::get('/booking/create','BookingController@create')->name('booking.create');
Route::post('/booking','BookingController@store')->name('booking.store'); 
Route::get('/booking','BookingController@index')->name('booking.index');  
Route::get('/booking/history','BookingController@history')->name('booking.history');  
Route::get('/booking/{booking}/edit','BookingController@edit')->name('booking.edit');
Route::patch('/booking/{booking}','BookingController@update')->name('booking.update'); 

// this is for update status whether reject tbd or done
Route::patch('/bookingStatus/{booking}','BookingController@updateStatus')->name('status.update');  

