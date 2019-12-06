<?php

Route::group(['namespace'=>'hari\login\Http\Controllers'],function(){

    Route::group(['middleware'=>['web']],function(){

        Route::get('admin', function () {
            return view('login::auth/login');
        });
        Route::post('admin', ['as' => 'admin', 'uses' => 'AuthController@postlogin']);

        Route::group(['middleware' => ['adminlogin']], function () {


            Route::get('dashboard', function () {

                return view('login::admin/index');
            });

            Route::get('adminlogout', ['as' => 'adminlogout', 'uses' => 'AuthController@adminlogout']);
        });


    });




});





