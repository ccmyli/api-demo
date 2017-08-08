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


$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->post('/auth/login', 'App\Http\Controllers\Api\Auth\LoginController@login');
    $api->post('auth/register', 'App\Http\Controllers\Api\Auth\RegisterController@register');
    $api->group(['middleware' => 'api.auth'], function ($api) {
        $api->get('user', 'App\Http\Controllers\Api\UsersController@index');
    });
    $api->get('token', 'App\Http\Controllers\Api\UsersController@token');
});

