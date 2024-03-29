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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/parse/onliner_catalog','ParserController@getCatalog');
Route::get('/parse','ParserController@getAll');
Route::get('parse/category/{id}','ParserController@getOne');
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
