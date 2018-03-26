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

Route::domain('www.icestorm-servers.com')->group(function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::prefix('report')->name('report.')->middleware('auth')->group(function () {
        Route::get('/', 'ReportController@index')->name('index');
        Route::post('/', 'ReportController@store')->name('store');
        Route::get('/view-{id}', 'ReportController@show')->name('show');
    });

    Route::prefix('profile')->name('profile.')->middleware('auth')->group(function () {
        Route::get('/', 'AuthController@profile')->name('index');
        Route::post('/member-{id}', 'AuthController@profile')->name('member');
    });

    Route::prefix('join')->name('whitelist.')->middleware('auth')->group(function () {
        Route::get('/', 'AuthController@WhitelistCreate')->name('index');
        Route::post('/', 'AuthController@WhitelistStore')->name('store');
    });

    Route::prefix('forum')->name('forum.')->middleware('auth')->group(function () {
        Route::get('/', 'HomeController@index')->name('index');
        Route::post('/topic/#{id}', 'HomeController@index')->name('show');
    });

    Route::prefix('events')->name('event.')->group(function () {
        Route::get('/', 'EventController@index')->name('index');
        Route::get('{event}', 'EventController@show')->name('show')->where('event','[a-z0-9\-]+');
    });

    Route::prefix('news')->name('posts.')->group(function () {
        Route::get('/', 'PostController@index')->name('index');
        Route::get('/{slug}', 'PostController@show')->name('show');
        Route::get('/author/{name}', 'PostController@author')->name('author');
        Route::get('/categories/{name}', 'PostController@category')->name('category');
        Route::post('comment/{slug}', 'PostController@addComment')->name('addComment');
    });

    Route::prefix('entreprise')->name('jobs.')->group(function () {
        Route::get('/', 'JobController@index')->name('index');
        Route::get('{name}', 'JobController@show')->name('show');
    });
});


Route::domain('manager.icestorm-servers.com')->namespace('Manager')->name('manager.')->middleware(['auth','isAdmin'])->group(function () {
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
});

Route::get('auth/steam', 'AuthController@redirectToSteam')->name('login');
Route::get('auth/steam/handle', 'AuthController@handle')->name('auth.steam.handle');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');