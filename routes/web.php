<?php

use Illuminate\Support\Facades\Route;

use App\Models\Product;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PromotionController;

Route::get('/', function () {
    $products = Product::latest()->take(6)->get();
    return view('welcome', compact('products'));

});

Route::get('/menu', function () {
    return view('menu');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/promotions-public', [PromotionController::class, 'publicIndex'])
    ->name('promotions.public');

Route::post('/make-order/{id}', [OrderController::class, 'makeOrder'])
    ->middleware('auth')
    ->name('make.order');

Route::get('/my-orders',
    [OrderController::class, 'myOrders'])
    ->middleware('auth')
    ->name('my.orders');

Route::put('/orders/{id}/status',
    [OrderController::class, 'updateStatus'])
    ->middleware(['auth', 'admin'])
    ->name('orders.status');

Route::get('/weather', function () {
    return view('weather');
})->name('weather');

Route::view('/privacy', 'privacy')->name('privacy');

// rutas admin

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [ProductController::class, 'dashboard'])->name('dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('promotions', PromotionController::class);

});

require __DIR__.'/auth.php';