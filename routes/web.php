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

Auth::routes();

Route::post('/login-by-role', 'CustomLoginController@login')->name('custom.login');

Route::get('/dashboard', 'CustomLoginController@dashboard')->name('dashboard');

Route::get('/login-student', function(){

	return view('auth.login-student');
})->name('login.student');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
