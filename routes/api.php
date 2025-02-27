<?php

use App\Http\Controllers\PaymentGateway\BillPlz\CollectionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::controller(CollectionController::class)->prefix('/collections')->group(function() {
    Route::post('/', 'create');
});
