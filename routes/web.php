<?php

Route::auth();

Route::get('/', function () {
    $name = "Vo Thanh Tung2";
    $age = "12222";
    return view('welcome',compact('name','age'));
});


//Auth::routes();
//Route::get('/login','HomeController@index');


Route::get('/home', 'HomeController@index');
Route::get('/tasks', 'TasksController@index');
Route::post('/task', function(Request $request){
    // here is call back like nodejs

});
