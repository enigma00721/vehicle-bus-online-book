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

Route::get('/','FrontController@index')->name('front');

Route::get('/contact','FrontController@contact')->name('contact');
Route::post('/contact','FrontController@contactSubmit')->name('contact.submit');

Route::get('/about','FrontController@about')->name('about');
Route::get('/listing','FrontController@listing')->name('listing');
Route::get('/schedules','FrontController@schedules')->name('schedules');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/reserve/{id}','FrontController@reserve')->name('reserve');
    Route::post('/reserve','FrontController@reserveSubmit')->name('reserve.submit');
});


Auth::routes();


// -------- admin routes ----------------
Route::group(['middleware'=>['auth','admin']], function(){

    Route::get('/home', 'HomeController@index')->name('home');

    // Operator Routes
    Route::Resource('operator', 'OperatorController');

    //  Bus Route
    Route::Resource('bus','BusController');

    //  Region Route
    Route::Resource('region','RegionController');

    //  Bus Schedule Route
    Route::Resource('bus-schedule','BusScheduleController');

    // Profile
    Route::get('/profile/{id}','ProfileController@index')->name('profile');
    Route::post('/profile/{id}','ProfileController@update')->name('profile.update');

    
    // contact messages
    Route::get('/messages/','MessageController@messages')->name('messages');
    Route::delete('/messages/{id}','MessageController@destroy')->name('message.destroy');
    
    // Booking
    Route::get('/booking','BookingController@index')->name('booking.index');
    Route::post('/booking/{id}','BookingController@update')->name('booking.update');
});
Route::delete('/booking/{id}','BookingController@destroy')->name('booking.destroy');


// customer dashbaord
Route::group(['prefix'=>'customer'], function(){
    
    Route::get('/','CustomerController@index')->name('customer.index');
    Route::post('/{id}','CustomerController@update')->name('customer.update');
    Route::get('/history','CustomerController@bookingHistory')->name('customer.history');
    
});


