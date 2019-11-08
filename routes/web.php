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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'TimeEntriesController@index');

Route::get('/login', 'LoginController@index')->name('login');

Route::get('/check-username', 'LoginController@select');

Route::get('/check-password', 'LoginController@checkPassword');

Route::get('/logout', 'LoginController@logout');

Route::post('/reports', 'TimeEntriesController@show');

Route::get('/timein', 'TimeEntriesController@store');

Route::get('/report', 'TimeEntriesController@reports');

