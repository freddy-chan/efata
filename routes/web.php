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

Route::get('/attendance', 'AttendanceController@index')->name('attendance');
Route::get('/attendance/date', 'AttendanceController@viewByDate')->name('attendanceViewByDate');
Route::post('/attendance/date', 'AttendanceController@store')->name('storeAttendance');

Route::get('/member', 'MemberController@index')->name('member');
Route::get('/member/create', 'MemberController@create')->name('createNewMember');
Route::post('/member', 'MemberController@store')->name('storeNewMember');
Route::get('/member/{member}', 'MemberController@show')->name('showMember');
Route::get('/member/{member}/edit', 'MemberController@edit')->name('editMember');
Route::delete('/member/{member}', 'MemberController@delete')->name('deleteMember');
