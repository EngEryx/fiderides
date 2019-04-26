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

Route::group(['namespace'=>'Api','prefix'=>'v1'], function (){
    /*
     * Access Auth
     */
    Route::group(['namespace'=>'Auth'],function(){
        Route::post('/login', 'LoginController@postLogin');
        Route::post('/register', 'RegisterController@postRegister');
        //Route::post('forgot', 'ForgotPasswordController@postRegister');
    });

    /*
     * Authorized Routes.
     */
    Route::group(['middleware'=>['auth:api']],function (){
        /*
         * API - User profile.
         */
        Route::get('/user', function (Request $request) {
            return $request->user();
        });

        /*
         * Any other routes.
         */

        Route::group(['namespace'=>'Rides'], function(){
            Route::get('/rides','RidesController@getRides');
            Route::post('/rides/ride','RidesController@bookRide');
            Route::post('/rides/verify','RidesController@confirmRide');
        });

    });
});

