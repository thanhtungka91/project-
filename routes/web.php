<?php

Route::auth();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'tasks'], function () {
        Route::get('/', ['as' => 'tasks.index', 'uses' => 'TasksController@index']);
        Route::post('/',['as' => 'tasks.create', 'uses' => 'TasksController@create']);
        Route::delete('/task/{id}',['as' => 'tasks.delete', 'uses' => 'TasksController@index']);
    });
    Route::group(['prefix' => 'admin'], function () {
        Route::group(['prefix' => 'course'], function () {
            Route::get('/', ['as' => 'course.list', 'uses' => 'CourseController@index']);
            Route::get('/add',['as' => 'course.add', 'uses' => 'CourseController@add']);
            Route::post('/add',['as' => 'course.create', 'uses' => 'CourseController@create']);
            Route::get('/{id}/done',['as' => 'course.done', 'uses' => 'CourseController@doneRegister']);
            Route::delete('/{id}',['as' => 'course.delete', 'uses' => 'CourseController@index']);
        });
        Route::group(['prefix' => 'test'], function () {
            Route::get('/', ['as' => 'test.list', 'uses' => 'TestController@index']);
            Route::get('/add',['as' => 'test.add', 'uses' => 'TestController@add']);
            Route::post('/add',['as' => 'test.create', 'uses' => 'TestController@create']);
            Route::get('/{id}/done',['as' => 'test.done', 'uses' => 'TestController@doneRegister']);
            Route::delete('/{id}',['as' => 'test.delete', 'uses' => 'TestController@index']);
        });
    });
});
