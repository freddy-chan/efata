<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\GroupController;
use App\Http\Controllers\API\SubGroupController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/groups/{id}', 'API\GroupController@show');
Route::get('/subgroups/{id}', 'API\SubGroupController@show');
Route::post('/transaction', 'API\TransactionController@store');
Route::get('/accounts/{id}', 'API\AccountController@show');
Route::post('/accounts/', 'API\AccountController@store');
