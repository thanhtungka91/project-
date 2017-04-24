<?php

Route::auth();

Route::get('/', function () {
    $name = "Vo Thanh Tung2";
    $age = "12222";
    return view('welcome',compact('name','age'));
});



Route::get('/home', 'HomeController@index')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'tasks'], function () {
        Route::get('/', ['as' => 'tasks.index', 'uses' => 'TasksController@index']);
        Route::post('/',['as' => 'tasks.create', 'uses' => 'TasksController@create']);
        Route::delete('/task/{id}',['as' => 'tasks.delete', 'uses' => 'TasksController@index']);
        });
});
