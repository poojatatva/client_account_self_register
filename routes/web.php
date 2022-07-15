<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAuthUser;

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
Route::get('/register', 'App\Http\Controllers\Auth\LoginController@register');
Route::post('/register', 'App\Http\Controllers\Auth\LoginController@registered');
Route::get('auth/google', 'App\Http\Controllers\Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'App\Http\Controllers\Auth\LoginController@handleGoogleCallback');

Route::get('login', function(){
    if(session()->has('email'))
    {
       return redirect('/');
    }
    return view('auth.login');
});

Route::post('login_submit', 'App\Http\Controllers\Auth\LoginController@login');


Route::get('/home','App\Http\Controllers\HomeController@index')->middleware(CheckAuthUser::class);;
Route::get('logout','App\Http\Controllers\Auth\LoginController@logout');
