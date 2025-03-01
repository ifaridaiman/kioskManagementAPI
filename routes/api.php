<?php

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
});