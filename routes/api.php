<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/sendReminder', 'API\ReminderController@serviceSchedule');

Route::get('/groups/{id}', 'API\GroupController@show');
Route::post('/group', 'API\GroupController@store');
Route::delete('/group/{id}', 'API\GroupController@destroy');

Route::get('/subgroups/{id}', 'API\SubGroupController@show');
Route::post('/subgroup', 'API\SubGroupController@store');
Route::delete('/subgroup/{id}', 'API\SubGroupController@destroy');

Route::post('/transaction', 'API\TransactionController@store');
Route::post('/transaction/{id}', 'API\TransactionController@update');
Route::get('/transactions/group/{id}', 'API\TransactionController@showBasedOnGroup');
Route::get('/transactions/{id}', 'API\TransactionController@show');
Route::get('/transactions/org/{id}', 'API\TransactionController@showBasedOnOrganization');
Route::get('/transactions/org/{id}/monthly', 'API\TransactionController@showMonthly');
Route::get('/transactions/org/{id}/weekly', 'API\TransactionController@showWeekly');

Route::get('/accounts/{id}', 'API\AccountController@show');
Route::post('/accounts/{id}', 'API\AccountController@update');
Route::post('/accounts/', 'API\AccountController@store');
Route::delete('/accounts/{id}', 'API\AccountController@destroy');
