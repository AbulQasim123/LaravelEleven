<?php

use App\Http\Controllers\PostController;
use App\Http\Middleware\IsAdminExample;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [PostController::class, 'index'])
->middleware('is_admin:admin')->name('test');
