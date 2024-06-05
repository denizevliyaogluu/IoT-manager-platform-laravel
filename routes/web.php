<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'App\Http\Controllers\DashboardController@index')->name('index');
    Route::get('/devices', 'App\Http\Controllers\DevicesController@index')->name('devices');
    Route::get('/data', 'App\Http\Controllers\DevicesController@data')->name('data');
    Route::get('/profiles', 'App\Http\Controllers\ProfileController@index')->name('profiles');
    Route::put('/profileupdate','App\Http\Controllers\ProfileController@update')->name('profileupdate');
    Route::get('/users','App\Http\Controllers\UsersController@index')->name('users');
    Route::get('/devices/{uniqid}/data', 'App\Http\Controllers\DevicesController@showDeviceData')->name('device.data');


    Route::prefix('admin')->name('admin.')->group(function () {
        Route::prefix('devices')->name('devices.')->group(function () {
            Route::get('/', 'App\Http\Controllers\DevicesController@index')->name('index');
            Route::get('/show/{uniqid}', 'App\Http\Controllers\DevicesController@show')->name('show');
            Route::get('/create', 'App\Http\Controllers\DevicesController@create')->name('create');
            Route::post('/createPost', 'App\Http\Controllers\DevicesController@createPost')->name('createPost');
            Route::post('/update/{uniqid}', 'App\Http\Controllers\DevicesController@updatePost')->name('updatePost');
            Route::get('/update/{uniqid}', 'App\Http\Controllers\DevicesController@update')->name('update');
            Route::get('/delete/{uniqid}', 'App\Http\Controllers\DevicesController@delete')->name('delete');
        });
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/create', 'App\Http\Controllers\UsersController@create')->name('create');
            Route::post('/createPost', 'App\Http\Controllers\UsersController@createPost')->name('createPost');
            Route::put('/{id}/update-status', 'App\Http\Controllers\UsersController@updateStatus')->name('updateStatus');

        });
    });
});
Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register');
