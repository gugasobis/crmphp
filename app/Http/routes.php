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

Route::post('oauth/access_token', function(){
    return Response::json(Authorizer::issueAccessToken());
});

Route::group(['before' => 'oauth'], function(){

    Route::group(['prefix' => 'api'], function(){

        Route::get('/credentials-check', function(){
            return Response::json(['Credenciais válidas'], 200);
        });
        Route::group(['prefix' => 'user'], function(){
            Route::get('/listAll', 'UserController@index');
            Route::get('/listId/{id}', 'UserController@show');
            Route::post('/create', 'UserController@store');
            Route::post('/update/{id}', 'UserController@update');
            Route::post('/destroy', 'UserController@destroy');
        });

    });

});
