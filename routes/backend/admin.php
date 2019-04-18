<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::group(['prefix' => 'ride', 'as' => 'ride.'], function (){
   Route::view('/', 'backend.ride.index')->name('index');
   Route::post('table', 'RideController@table')->name('table');
});

Route::group(['prefix' => 'booking', 'as' => 'booking.'], function (){
   Route::view('/', 'backend.booking.index')->name('index');
   Route::post('table', 'BookingController@table')->name('table');
});