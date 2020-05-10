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

    Route::patch('account/profile', \App\Http\Handlers\Account\EditProfileHandler::class);
    Route::patch('account/password', \App\Http\Handlers\Account\EditPasswordHandler::class);
});

Route::group(['middleware' => 'guest:api'], function () {
    Route::post('auth/login', \App\Http\Handlers\Auth\LoginController::class.'@login');
    Route::post('auth/register', \App\Http\Handlers\Auth\RegisterController::class . '@register');

    Route::post('password/email', \App\Http\Handlers\Auth\ForgotPasswordController::class . '@sendResetLinkEmail');
    Route::post('password/reset', \App\Http\Handlers\Auth\ResetPasswordController::class . '@reset');
});
