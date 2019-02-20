<?php

use Illuminate\Http\Request;

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


Route::post('login', 'API\AuthController@login');
Route::middleware('jwtAuth')->post('me', 'API\AuthController@me');
Route::middleware('jwtAuth')->post('logout', 'API\AuthController@logout');
Route::middleware('jwtAuth')->post('refresh', 'API\AuthController@refresh');
Route::middleware('jwtAuth')->post('payload', 'API\AuthController@payload');

Route::middleware('jwtAuth')->resource('posts','API\postController');