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

Route::get('/register', function () {
    return view('register');
})->middleware('guest');

Route::get('/newbook', function () {
    return view('newbook');
})->middleware('auth');


/*         User Controller              */ 
Route::get('/users', 'UserController@index');
Route::get('/user/{id}', 'UserController@show');
Route::post('/user/create', 'UserController@store');
Route::put('/user/update/{id}', 'UserController@update');
Route::delete('/user/delete/{id}','UserController@destroy');
Route::post('login', 'UserController@login');
Route::get('/register', 'UserController@vistaCrearUsuario');
Route::post('/logout', 'UserController@logout');

/*         Book Controller              */ 
Route::get('/store', 'BookController@index')->middleware('auth');
Route::get('/book/{id}', 'BookController@show');
Route::post('/book/create', 'BookController@store');
Route::put('/book/update/{id}', 'BookController@update');
Route::delete('/book/delete/{id}','BookController@destroy');

/*         Region_Book Controller              */ 
Route::get('/region_books', 'Region_BookController@index');
Route::get('/region_book/{id}', 'Region_BookController@show');
Route::post('/region_book/create', 'Region_BookController@store');
Route::put('/region_book/update/{id}', 'Region_BookController@update');
Route::delete('/region_book/delete/{id}','Region_BookController@destroy');

/*         User_Book Controller              */ 
Route::get('/my_library', 'User_BookController@index');
Route::get('/user_book/{id}', 'User_BookController@show');
Route::post('/user_book/create', 'User_BookController@store');
Route::put('/user_book/update/{id}', 'User_BookController@update');
Route::delete('/user_book/delete/{id}','User_BookController@destroy');

/*         Category_Book Controller              */ 
Route::get('/category_books', 'Category_BookController@index');
Route::get('/category_book/{id}', 'Category_BookController@show');
Route::post('/category_book/create', 'Category_BookController@store');
Route::put('/category_book/update/{id}', 'Category_BookController@update');
Route::delete('/category_book/delete/{id}','Category_BookController@destroy');

/*         Region Controller              */ 
Route::get('/regions', 'RegionController@index');
Route::get('/region/{id}', 'RegionController@show');
Route::post('/region/create', 'RegionController@store');
Route::put('/region/update/{id}', 'RegionController@update');
Route::delete('/region/delete/{id}','RegionController@destroy');

/*         Clasification Controller              */ 
Route::get('/clasifications', 'ClasificationController@index');
Route::get('/clasification/{id}', 'ClasificationController@show');
Route::post('/clasification/create', 'ClasificationController@store');
Route::put('/clasification/update/{id}', 'ClasificationController@update');
Route::delete('/clasification/delete/{id}','ClasificationController@destroy');

/*         Category Controller              */ 
Route::get('/categories', 'CategoryController@index');
Route::get('/category/{id}', 'CategoryController@show');
Route::post('/category/create', 'CategoryController@store');
Route::put('/category/update/{id}', 'CategoryController@update');
Route::delete('/category/delete/{id}','CategoryController@destroy');

/*         Country Controller              */ 
Route::get('/countries', 'CountryController@index');
Route::get('/country/{id}', 'CountryController@show');
Route::post('/country/create', 'CountryController@store');
Route::put('/country/update/{id}', 'CountryController@update');
Route::delete('/country/delete/{id}','CountryController@destroy');

/*         Role Controller              */ 
Route::get('/roles', 'RoleController@index');
Route::get('/role/{id}', 'RoleController@show');
Route::post('/role/create', 'RoleController@store');
Route::put('/role/update/{id}', 'RoleController@update');
Route::delete('/role/delete/{id}','RoleController@destroy');