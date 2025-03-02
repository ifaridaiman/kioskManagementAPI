<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Order\OrderTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentGateway\BillPlz\CollectionController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::controller(CollectionController::class)->prefix('/collections')->group(function () {
    Route::post('/', 'create');
});

Route::controller(PaymentController::class)->prefix('/payments')->group(function () {
    Route::post('/{id}', 'create');
    Route::prefix('/callback')->group(function () {
        Route::get('/redirect', 'redirectUrl');
        Route::post('/', 'callbackUrl');
    });
});

Route::prefix('/orders')->group(function () {
    Route::controller(OrderTypeController::class)->prefix('/types')->group(function () {
        Route::post('/', 'create');
    });
    Route::controller(OrderController::class)->group(function () {
        Route::post('/{id}', 'create');
    });
});

Route::controller(MenuController::class)->prefix('/menus')->group(function () {
    Route::post('/', 'create');
});