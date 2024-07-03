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


Route::resource('/event', App\Http\Controllers\EventController::class);

Route::resource('/picture', App\Http\Controllers\PictureController::class);

Route::resource('/run', App\Http\Controllers\RunsController::class);

Route::resource('/picture', App\Http\Controllers\PictureController::class);

Route::prefix('user')->name('user.')->group(function ($test) {

    Route::resource('account', App\Http\Controllers\UserController::class);
    Route::resource('order', App\Http\Controllers\OrderController::class);

})->middleware('auth:sanctum');

