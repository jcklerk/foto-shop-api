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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', 'App\Http\Controllers\LoginController@login');
