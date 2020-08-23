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


Route::post('register', 'Api\AuthController@register');
Route::get('auth', 'Api\AuthController@auth');

Route::group([
    'middleware' => ['auth:sanctum']
], function (){
    Route::get('me', 'Api\AuthController@me');
    Route::get('logout', 'Api\AuthController@logout');
});