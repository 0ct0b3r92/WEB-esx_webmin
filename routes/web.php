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

$slugPattern = '[a-z0-9\-]+';

Route::get('/', 'DashboardController@index')->name('index');

Route::get('/settings', 'DashboardController@settings')->name('settings');
Route::post('/settings', 'DashboardController@saveSettings');

Route::prefix('members')->name('members.')->group(function () {
    Route::get('/', 'MemberController@index')->name('index');
    Route::get('{id}', 'MemberController@show')->name('show');
});

Route::prefix('applications')->name('whitelist.')->group(function () {
    Route::get('/', 'WhitelistController@index')->name('index');
    Route::get('candid-{id}', 'WhitelistController@show')->name('show');
});

Route::prefix('entreprise')->name('jobs.')->group(function () {
    Route::get('/', 'JobController@index')->name('index');
    Route::get('{slug}', 'JobController@show')->name('show');
});

Route::get('auth/steam', 'AuthController@redirectToSteam')->name('login');
Route::get('auth/steam/handle', 'AuthController@handle')->name('auth.steam.handle');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
