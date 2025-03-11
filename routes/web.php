<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(PaymentController::class)->prefix('/payments')->group(function () {
    Route::prefix('/callback')->group(function () {
        Route::get('/redirect', 'redirectUrl');
        Route::post('/', 'callbackUrl');
    });
});
