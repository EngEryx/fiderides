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
   Route::get('{booking}/approve', 'BookingController@approve')->name('approve');
   Route::post('table', 'BookingController@table')->name('table');
});

Route::group(['prefix' => 'payment', 'as' => 'payment.'], function (){
   Route::view('/', 'backend.payment.index')->name('index');
   Route::post('table', 'PaymentsController@table')->name('table');
});