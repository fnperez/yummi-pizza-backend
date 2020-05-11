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

Route::group(['prefix' => 'products'], function() {
    Route::get('/', \App\Http\Handlers\Product\BrowseHandler::class);
    Route::post('/', \App\Http\Handlers\Product\AddHandler::class)->middleware('auth:api');
});

Route::group(['prefix' => 'addresses'], function() {
    Route::post('/', \App\Http\Handlers\Address\AddHandler::class);
});

Route::group(['prefix' => 'carts'], function() {
    Route::post('/', \App\Http\Handlers\Cart\AddHandler::class);
    Route::get('{id}', \App\Http\Handlers\Cart\ReadHandler::class);
});

Route::group(['prefix' => 'cart_items'], function() {
    Route::post('/', \App\Http\Handlers\CartItem\AddHandler::class)->middleware('app.check-cart');
    Route::put('{id}', \App\Http\Handlers\CartItem\EditHandler::class)->middleware('app.check-cart-item');
});

Route::group(['prefix' => 'invoices'], function() {
    Route::post('/', \App\Http\Handlers\Invoice\AddHandler::class)->middleware('app.check-cart');
    Route::post('{id}/pay', \App\Http\Handlers\Invoice\PayHandler::class);
});