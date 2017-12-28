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

Route::get('login', 'AuthController@login')->name('login');
Route::get('login/steam', 'AuthController@redirectToSteam')->name('login.steam');
Route::get('auth/steam/handle', 'AuthController@handle')->name('auth.steam.handle');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');




Route::get('home', 'DashboardController@index')->middleware(['auth'])->name('home');

Route::prefix('tracker')->name('bugsTraker.')->middleware(['auth'])->group(function () {
    Route::get('/', 'BugTrackerController@index')->name('index');
    Route::get('{categories}/{id}', 'BugTrackerController@show')->name('show')->where('categories', '[a-z]+')->where('id', '[0-9]+');
    Route::post('{categories}/{id}', 'BugTrackerController@comment')->name('comment')->where('categories', '[a-z]+')->where('id', '[0-9]+');
    Route::get('create', 'BugTrackerController@create')->name('create');
    Route::post('create', 'BugTrackerController@confirm')->name('confirm');
    Route::get('{type}', 'BugTrackerController@order')->name('type')->where('type', '[a-z]+');
});

Route::middleware(['auth'])->name('whitelist.')->group(function () {
    Route::get('joins', 'WhitelistController@create')->name('create');
    Route::post('joins', 'WhitelistController@valide')->name('validate');
});

/////////////////// Admin Section ////////////////////////////////


Route::prefix('members')->middleware(['auth','isAdmin'])->name('members.')->group(function () {
    Route::get('/', 'MembersController@index')->name('index');
    Route::get('profile/{id}', 'MembersController@profile')->name('profile')->where('id', '[0-9]+');
});

Route::prefix('whitelist')->middleware(['auth','isAdmin'])->name('whitelist.')->group(function () {
    Route::get('/', 'WhitelistController@index')->name('index');
    Route::get('/candidature-{id}', 'WhitelistController@show')->name('show')->where('id', '[0-9]+');
});



