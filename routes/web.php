<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaundryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\OrderanLaundryController;
use App\Http\Controllers\TransaksiController;
use App\Http\Middleware\CustomerMiddleware;

Route::get('/test', function() {
    echo "tset";
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Route::middleware([CustomerMiddleware::class . 'customer'])->group(function () {
//     Route::get('/customer', function () {
//         return view('customer.customer');
//     })->name('customer.page');
// });

Route::middleware(['auth'])->group(function () {
    Route::resource('laundries', LaundryController::class);
    Route::resource('orderan_laundry', OrderanLaundryController::class);
    Route::resource('transaksi', TransaksiController::class);

    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::get('/admin/roles', [RoleController::class, 'index'])->name('roles.index');
        Route::put('/admin/roles/{user}', [RoleController::class, 'changeRole'])->name('roles.change');
    });

    Route::middleware([CustomerMiddleware::class])->group(function () {
        Route::get('/customer', function () {
            return view('customer.customer');
        })->name('customer.page');
    });
});

// require __DIR__.'/auth.php';