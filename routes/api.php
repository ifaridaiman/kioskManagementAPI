<?php

use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Menu\MenuAssetController;
use App\Http\Controllers\Menu\MenuCategoryController;
use App\Http\Controllers\Menu\MenuController;
use App\Http\Controllers\Menu\MenuInventoryController;
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

Route::controller(CustomerController::class)->group(function () {
    Route::get('/customers', 'get');
});

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
            Route::patch('/{id}', 'update');
        });
    });
    Route::controller(OrderController::class)->group(function () {
        Route::prefix('/statuses')->group(function () {
            Route::patch('/{id}', 'updateStatus');
        });
        Route::get('/', 'get');
        Route::post('/{id}', 'create');
    });
});

Route::prefix('/menus')->group(function () {
    Route::controller(MenuCategoryController::class)->prefix('/categories')->group(function () {
        Route::get('/', 'get');
        Route::post('/', 'create');
        Route::patch('/{id}', 'update');
        Route::delete('/{id}', 'delete');
    });
    Route::controller(MenuInventoryController::class)->prefix('/inventories')->group(function () {
        Route::post('/{id}', 'create');
        Route::patch('/{id}', 'update');
        Route::delete('/{id}', 'delete');
    });
    Route::controller(MenuAssetController::class)->prefix('/assets')->group(function () {
        Route::post('/{id}', 'create');
        Route::delete('/{id}', 'delete');
    });
    Route::controller(MenuController::class)->group(function () {
        Route::get('/', 'get');
        Route::get('/{id}', 'find');
        Route::post('/', 'create');
        Route::patch('/{id}', 'update');
        Route::delete('/{id}', 'delete');
    });
});
