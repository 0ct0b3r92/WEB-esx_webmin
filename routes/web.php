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

Route::get('login', 'AuthController@redirectToSteam')->name('login');
Route::get('auth/steam/handle', 'AuthController@handle')->name('auth.steam.handle');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/home', 'DashboardController@index')->name('home');
Route::get('/members', 'PlayersController@index')->name('members');
