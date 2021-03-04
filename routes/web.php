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

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/singlehouse/{idProp}', ['uses' => 'PropertiesController@singlehouse']);
Route::get('/listhouse', 'PropertiesController@listhouse');
Route::get('/', 'PropertiesController@welcomeHouse');
Route::get('/detail/create/{id}', ['uses' => 'DetailsController@createDetail']);
Route::get('/property/detail/{idP}', ['uses' => 'PropertiesController@showFull']);
Route::get('/listhouse', ['uses'=>'PropertiesController@search']);

Route::get('/users/report', 'UsersController@adminList');
Route::post('users/{users}', 'UsersController@update');
Route::post('properties/{prop}', ['uses' => 'PropertiesController@update']);
Route::resource('users', 'UsersController');
Route::resource('properties', 'PropertiesController');
Route::resource('reports', 'ReportsController');
Route::resource("details",'DetailsController');