<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 
    [
        'message' => 'Welcome to the API',
        'documentation' => '/documentation',
        'issues' => '/issues',
        'api' => '/api',
    ];
});
