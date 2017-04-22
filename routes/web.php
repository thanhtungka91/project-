<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
  We can learn for short time with big issue
  if you have people support alles sind simple
|
*/

Route::get('/', function () {
    $name = "Vo Thanh Tung2";
    $age = "12222";
    return view('welcome',compact('name','age'));
});

Route::get('/login', array () );

Auth::routes();

Route::get('/home', 'HomeController@index');
