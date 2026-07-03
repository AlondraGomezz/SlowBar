<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\ClientApiController;
use App\Http\Controllers\Api\OrderApiController;
use App\Http\Controllers\Api\PromotionApiController;

Route::apiResource('products', ProductApiController::class)->names('api.products');
Route::apiResource('clients', ClientApiController::class)->names('api.clients');
Route::apiResource('orders', OrderApiController::class)->names('api.orders');
Route::apiResource('promotions', PromotionApiController::class)->names('api.promotions');