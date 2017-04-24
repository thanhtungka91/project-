<?php

Route::auth();

Route::get('/', function () {
    $name = "Vo Thanh Tung2";
    $age = "12222";
    return view('welcome',compact('name','age'));
});



Route::get('/home', 'HomeController@index')->middleware('auth');
//Route::get('/tasks', 'TasksController@index')->middleware('auth');
// use 1 function or all middleware
Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'tasks'], function () {
        Route::get('/', ['as' => 'tasks.index', 'uses' => 'TasksController@index']);
        });
});
