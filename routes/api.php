<?php

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

Route::get('/', function () {
    return [
        'app' => config('app.name'),
        'version' => '1.0.0',
    ];
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('auth/me', \App\Http\Handlers\Auth\MeHandler::class);

    Route::put('account/profile', \App\Http\Handlers\Account\EditProfileHandler::class);
    Route::patch('account/password', \App\Http\Handlers\Account\EditPasswordHandler::class);
});

/** Auth routes */
Route::post('auth/login', \App\Http\Handlers\Auth\LoginHandler::class.'@login');
Route::post('auth/register', \App\Http\Handlers\Auth\RegisterHandler::class);

Route::group(['prefix' => 'pizzas'], function() {
    Route::get('/', \App\Http\Handlers\Pizza\BrowseHandler::class);
    Route::post('/', \App\Http\Handlers\Pizza\AddHandler::class)->middleware('auth:api');
});

Route::group(['prefix' => 'addresses'], function() {
    Route::post('/', \App\Http\Handlers\Address\AddHandler::class);
});
