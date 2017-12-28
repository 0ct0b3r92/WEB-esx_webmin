<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/getOnlinePlayers','ApiController@getOnlinePlayers');



Route::prefix('whitelist')->group(function () {
    Route::post('refuse', 'WhitelistController@refuse');
    Route::post('accepte', 'WhitelistController@accepted');
});