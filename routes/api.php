<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    return 
    [
        'message' => 'Welcome to the API',
        'version' => '1.0.0',
        'author' => 'jcklerk',
        'documentation' => '/documentation',
    ];
});


Route::post('/login', 'App\Http\Controllers\LoginController@login');


Route::apiResource('/event', App\Http\Controllers\EventController::class);

Route::apiResource('/organization', App\Http\Controllers\OrganizationController::class);

Route::apiResource('/picture', App\Http\Controllers\PictureController::class);

Route::apiResource('/run', App\Http\Controllers\RunsController::class);

Route::apiResource('/picture', App\Http\Controllers\PictureController::class);

Route::prefix('user')->name('user.')->group(function ($test) {

    Route::apiResource('account', App\Http\Controllers\UserController::class);
    Route::apiResource('order', App\Http\Controllers\OrderController::class);

})->middleware('auth:sanctum');


Route::prefix("checkout")->name("checkout.")->group(function () {
    Route::post('create', 'App\Http\Controllers\PaymentController@createCheckout')->name('create');
    Route::post('webhook', 'App\Http\Controllers\PaymentController@handleWebhookNotification')->name('webhooks');
});

Route::prefix("processPicture")->name("processPicture.")->group(function () {
    Route::get('', 'App\Http\Controllers\PictureProcessController@index')->name('index');
    Route::post('', 'App\Http\Controllers\PictureProcessController@store')->name('store');
});