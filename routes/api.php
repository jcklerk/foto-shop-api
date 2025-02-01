<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Middleware\admin;
use \App\Http\Controllers\EventController;
use \App\Http\Controllers\OrganizationController;
use \App\Http\Controllers\PictureController;
use \App\Http\Controllers\RunsController;
use App\Http\Middleware\serviceWorker;

Route::get('/', function (Request $request) {
    return 
    [
        'message' => 'Welcome to the API',
        'version' => '1.0.0',
        'author' => 'jcklerk',
        'documentation' => '/documentation',
    ];
});




Route::post('/login', 'App\Http\Controllers\AuthController@login');
Route::post('/logout', 'App\Http\Controllers\AuthController@logout')->middleware('auth:api');



// Public routes for index and show
Route::apiResource('/event', EventController::class)
    ->only(['index', 'show']);

Route::apiResource('/organization', OrganizationController::class)
    ->only(['index', 'show']);

Route::apiResource('/picture', PictureController::class)
    ->only(['index', 'show']);

Route::apiResource('/run', RunsController::class)
    ->only(['index', 'show']);

// Secured routes for other actions
Route::middleware(['auth:api', admin::class])
    ->group(function () {
        Route::apiResource('/event', EventController::class)
            ->except(['index', 'show']);
        Route::apiResource('/organization', OrganizationController::class)
            ->except(['index', 'show']);
        Route::apiResource('/picture', PictureController::class)
            ->except(['index', 'show']);
        Route::apiResource('/run', RunsController::class)
            ->except(['index', 'show']);
    });

Route::prefix('user')->name('user.')->middleware(['auth:api'])->group(function ($test) {

    Route::apiResource('account', App\Http\Controllers\UserController::class);
    Route::apiResource('order', App\Http\Controllers\OrderController::class);

});


Route::prefix("checkout")->name("checkout.")->group(function () {
    Route::post('create', 'App\Http\Controllers\PaymentController@createCheckout')->name('create');
    Route::post('webhook', 'App\Http\Controllers\PaymentController@handleWebhookNotification')->name('webhooks');
});

Route::prefix("processPicture")->name("processPicture.")->middleware(serviceWorker::class)->group(function () {
    Route::get('', 'App\Http\Controllers\PictureProcessController@index')->name('index');
    Route::post('', 'App\Http\Controllers\PictureProcessController@store')->name('store');
});