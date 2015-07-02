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


    Route::get('/',[
        'as'    =>  'homePage',
        'uses'  =>  'HomeController@getIndex'
    ]);

    Route::get('/facebook-login', [
        'as'    =>  'facebookLogin',
        'uses'  =>  'Auth\AuthController@redirectToProvider'
    ]);

    Route::get('/facebook-auth', [
        'as'    =>  'facebookRedirect',
        'uses'  =>  'Auth\AuthController@handleProviderCallback'
    ]);

    Route::get('/logout',[
        'as'    =>  'logout',
        'uses'  =>  'Auth\AuthController@getLogout'
    ]);

    Route::get('/su-kien/{slug}',[
        'as'    =>  'eventDetail',
        'uses'  =>  'EventController@getDetail'
    ]);

    Route::post('/su-kien/tham-gia/{slug}',[
        'as'    =>  'eventJoin',
        'uses'  =>  'EventController@postJoin'
    ]);

});


Route::get('/', function () {
    return redirect( 'http://news.'.\Illuminate\Support\Facades\Config::get('app.domain') );
});