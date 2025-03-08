<?php

use App\Http\Controllers\Menu\MenuCategoryController;
use App\Http\Controllers\Menu\MenuController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Order\OrderTypeController;
use App\Http\Controllers\Order\OrderTypeRuleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentGateway\BillPlz\CollectionController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::controller(CollectionController::class)->prefix('/collections')->group(function () {
    Route::get('/', 'get');
    Route::post('/', 'create');
});

Route::controller(PaymentController::class)->prefix('/payments')->group(function () {
    Route::get('/', 'get');
    Route::post('/{id}', 'create');
    Route::prefix('/callback')->group(function () {
        Route::get('/redirect', 'redirectUrl');
        Route::post('/', 'callbackUrl');
    });
});

Route::prefix('/orders')->group(function () {
    Route::prefix('/types')->group(function () {
        Route::controller(OrderTypeRuleController::class)->prefix('/rules')->group(function () {
            Route::post('/', 'create');
        });
        Route::controller(OrderTypeController::class)->group(function () {
            Route::get('/', 'get');
            Route::post('/', 'create');
        });
    });
    Route::controller(OrderController::class)->group(function () {
        Route::get('/', 'get');
        Route::post('/{id}', 'create');
    });
});

Route::prefix('/menus')->group(function () {
    Route::controller(MenuCategoryController::class)->prefix('/categories')->group(function () {
        Route::get('/', 'get');
        Route::post('/', 'create');
    });
    Route::controller(MenuController::class)->group(function () {
        Route::get('/', 'get');
        Route::get('/{id}', 'find');
        Route::post('/', 'create');
    });
});
