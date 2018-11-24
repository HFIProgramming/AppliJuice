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

Route::get('/', function () {
    return view('vuetrial');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'applicant'], function () {
        Route::get('/create', 'ApplicationController@newApplicationForm')->name('newApplicationForm');
        Route::post('/create', 'ApplicationController@createApplication');
    });

    Route::get('/hfiverify', 'UserController@HFIVerifyForm');
    Route::post('/hfiverify', 'UserController@HFIVerify');

    Route::group(['prefix' => 'essay'], function () {
        Route::group(['middleware' => 'applicant'], function () {
            Route::get('/create', 'EssayController@essayForm');
            Route::post('/create', 'EssayController@submitEssay');
        });
    });
});