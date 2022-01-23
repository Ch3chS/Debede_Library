<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/', function () {
    return view('login');
})->middleware('guest');




/*         User Controller              */ 
Route::get('/users', 'UserController@index');
Route::get('/user/{id}', 'UserController@show');
Route::post('/user/create', 'UserController@store');
Route::put('/user/update/{id}', 'UserController@update');
Route::delete('/user/delete/{id}','UserController@destroy');
Route::post('login', 'UserController@login');
