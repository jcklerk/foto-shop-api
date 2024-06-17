<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    return 
    [
        'message' => 'Welcome to the API',
        'links' => [
            'login' => '/api/login',
            'user' => '/api/user',
        ]
    ];
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', 'App\Http\Controllers\account\LoginController@sendLink');
