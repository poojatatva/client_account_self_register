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

Route::post('login','App\Http\Controllers\AuthController@login');
Route::post('register','App\Http\Controllers\AuthController@register');

Route::get('user','App\Http\Controllers\AuthController@user')->middleware('auth:api');
Route::post('logout','App\Http\Controllers\AuthController@logout')->middleware('auth:api');
