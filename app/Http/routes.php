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


Route::get('/result', function(){


    // $event = 1;
    // $results = DB::table('event_1')->get();
    // $result = array_shift($results);

    // foreach( $results as &$item ){
    //     $score = 0;
    //     for( $i = 1; $i<=45; $i++ ){
        
    //         if( $item->{'m'.$i} != 0 ){
    //             $score += 2;

    //             if( $item->{'m'.$i} == $result->{'m'.$i} ){
    //                 $score += 10;
    //             }else{
    //                 $score -= 1;
    //             }

    //         }
            
    //         DB::table('event_1')
    //         ->where('id', $item->id)
    //         ->update(['score' => $score]);

    //     }

    // }

});




Route::group(['domain' => 'dudoan.'.\Illuminate\Support\Facades\Config::get('app.domain')], function () {


    Route::get('/',[
        'as'    =>  'homePage',
        'uses'  =>  'HomeController@getIndex'
    ]);

    Route::get('the-le',[
        'as'    =>  'rulePage',
        'uses'  =>  'HomeController@getRule'
    ]);

    Route::get('ket-qua-du-doan/{id}',[
        'as'    =>  'resultPage',
        'uses'  =>  'HomeController@getResult'
    ]);


    Route::group(['prefix'  =>  'su-kien'], function(){
        Route::get('/{slug}',[
            'as'    =>  'eventDetail',
            'uses'  =>  'EventController@getDetail'
        ]);

        Route::post('/tham-gia/{slug}',[
            'as'    =>  'eventJoin',
            'uses'  =>  'EventController@postJoin'
        ]);
    });

    Route::group(['prefix'  =>  'thanh-vien'], function(){

        Route::get('cap-nhat-thong-tin',[
            'as'    =>  'userInfo',
            'uses'  =>  'UserController@getInfo'
        ]);

        Route::post('cap-nhat-thong-tin',[
            'as'    =>  'userInfo',
            'uses'  =>  'UserController@postInfo'
        ]);

        Route::get('dang-nhap-facebook', [
            'as'    =>  'facebookLogin',
            'uses'  =>  'Auth\AuthController@redirectToProvider'
        ]);

        Route::get('dang-nhap-facebook-xac-thuc', [
            'as'    =>  'facebookRedirect',
            'uses'  =>  'Auth\AuthController@handleProviderCallback'
        ]);

        Route::get('dang-xuat',[
            'as'    =>  'logout',
            'uses'  =>  'Auth\AuthController@getLogout'
        ]);

    });

});


Route::get('/', function () {
    return redirect( 'http://news.'.\Illuminate\Support\Facades\Config::get('app.domain') );
});