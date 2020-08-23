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


Route::post('v1/register', 'Api\v1\AuthController@register');
Route::get('v1/auth', 'Api\v1\AuthController@auth');

Route::group([
    'prefix' => 'v1',
    'namespace' => 'Api\v1',
    'middleware' => ['auth:sanctum']
], function (){

    //Auth
    Route::get('me', 'AuthController@me');
    Route::get('logout', 'AuthController@logout');

    // Permissions
    Route::get('permissions/paginate/{per_page?}/{search?}', 'PermissionController@paginate');
    Route::resource('permissions', 'PermissionController')->except(['edit', 'create']);

    // Profiles
    Route::get('profiles/paginate/{per_page?}/{search?}', 'ProfileController@paginate');
    Route::resource('profiles', 'ProfileController')->except(['edit', 'create']);
});