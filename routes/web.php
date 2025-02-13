<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('user/search', [UserController::class, 'search']);
Route::resource('user', UserController::class);

