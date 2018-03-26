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

Route::prefix('whitelist')->name('api.whitelist')->group(function () {
    Route::post('refuse', 'ApiController@refuse')->name('.refuse');
    Route::post('accepte', 'ApiController@accepted')->name('.accpete');
});


Route::prefix('comment')->name('api.comment')->group(function () {
    Route::post('delete', 'ApiController@commentDelete')->name('.delete');
    Route::get('{id}', 'ApiController@commentShow')->name('edit');
});


Route::post('whitelist/activate','ApiController@ActivateWhitelist');
Route::post('webhook/activate','ApiController@ActivateWebhook');
Route::get('discord/bot/start','ApiController@StartBot');
Route::get('charts/players','ApiController@GetPlayersCharts');
