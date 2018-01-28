<?php

Route::auth();

Route::get('/', 'HomeController@index');
Route::get('/items', 'ItemsController@index');

Route::get('/home', 'HomeController@index')->middleware('auth');

Route::group(['middleware' => ['auth','admin']], function () {
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
            Route::get('/{id}/detail',['as' => 'course.detail', 'uses' => 'CourseController@detail']);
            Route::get('/{id}/done',['as' => 'course.done', 'uses' => 'CourseController@doneRegister']);
            Route::delete('/{id}',['as' => 'course.delete', 'uses' => 'CourseController@index']);
        });
        Route::group(['prefix' => 'question'], function () {
            Route::get('/', ['as' => 'question.list', 'uses' => 'QuestionController@index']);
            Route::get('/add',['as' => 'question.add', 'uses' => 'QuestionController@add']);
            Route::post('/add',['as' => 'question.create', 'uses' => 'QuestionController@create']);
            Route::get('/{id}/done',['as' => 'question.done', 'uses' => 'QuestionController@doneRegister']);
            Route::delete('/{id}',['as' => 'question.delete', 'uses' => 'QuestionController@index']);
        });
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', ['as' => 'user.list', 'uses' => 'AdminUsersController@index']);
            Route::get('/{id}', ['as' => 'user.detail', 'uses' => 'AdminUsersController@edit']);
            Route::get('/add',['as' => 'user.add', 'uses' => 'AdminUsersController@add']);
            Route::post('/add',['as' => 'user.create', 'uses' => 'AdminUsersController@create']);
            Route::get('/{id}/done',['as' => 'user.done', 'uses' => 'AdminUsersController@doneRegister']);
            Route::delete('/{id}/delete',['as' => 'user.delete', 'uses' => 'AdminUsersController@delete']);
        });
        Route::group(['prefix' => 'files'], function () {
            Route::post('/upload',['as' => 'files.uploadfile', 'uses' => 'FilesController@uploadfile']);
        });
    });
});
