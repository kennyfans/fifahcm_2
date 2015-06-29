<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



//dd('dudoan.'.\Illuminate\Support\Facades\Config::get('app.domain'));


Route::group(['domain' => 'dudoan.'.\Illuminate\Support\Facades\Config::get('app.domain')], function () {

    Route::get('/facebook-login', function () {
        return \Laravel\Socialite\Facades\Socialite::driver('facebook')->redirect();
    });

    Route::get('/', function () {
//        $user = \Laravel\Socialite\Facades\Socialite::driver('facebook')->user();
//        dd($user);

    });




});

Route::get('/', function () {

});