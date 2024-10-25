<?php

use App\Http\Controllers\Customer\CustomerCartController;
use App\Http\Controllers\Customer\CustomerCheckoutController;
use App\Http\Controllers\Customer\CustomerMainController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Vendor\VendorKantinController;
use App\Http\Controllers\Vendor\VendorMainController;
use App\Http\Controllers\Vendor\VendorProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'verified','rolemanager:customer'])->group(function () {
    Route::prefix(('user'))->group(function () {
        Route::get('/detailkantin/{slug}', [HomeController::class, 'detailkantin'])->name('detailkantin');
        Route::controller(CustomerMainController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('dashboard');
            Route::get('/profile', 'profile')->name('profile');
        });
        Route::controller(CustomerCartController::class)->group(function () {
            Route::get('/cart', 'index')->name('cart');
        });
        Route::controller(CustomerCheckoutController::class)->group(function () {
            Route::get('/checkout', 'index')->name('checkout');
            Route::get('/status', 'status')->name('status');
            Route::get('/riwayat', 'riwayat')->name('riwayat');
        });
    });
});

// seller route
Route::middleware(['auth', 'verified','rolemanager:vendor'])->group(function () {
    Route::prefix(('vendor'))->group(function () {
        Route::controller(VendorMainController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('vendor');
            Route::get('/antrian', 'antrian')->name('antrian');
            Route::put('/statuskantin/{id}', 'statuskantin')->name('statuskantin');
        });

        Route::controller(VendorKantinController::class)->group(function () {
            Route::get('/profile', 'index')->name('kantin.profile');
            Route::post('/profile/store', 'store')->name('kantin.profile.store');
            Route::put('/profile/update/{id}', 'update')->name('kantin.profile.update');
        });

        Route::controller(VendorProductController::class)->group(function () {
            Route::get('/product', 'index')->name('kantin.product');
            Route::get('/product/create', 'create')->name('kantin.product.create');
            Route::post('/product/store', 'store')->name('kantin.product.store');
            Route::get('/product/edit/{id}', 'edit')->name('kantin.product.edit');
            Route::put('/product/update/{id}', 'update')->name('kantin.product.update');
            Route::get('/product/destroy/{id}', 'destroy')->name('kantin.product.destroy');
        });

    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
