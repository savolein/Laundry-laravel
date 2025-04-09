<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\PaymentController;
use App\Http\Middleware\CustomerMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ReservationController; 
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/test', function() {
    echo "test";
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get("/admin/dashboard", [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin', [AdminController::class, 'store'])->name('admin.reservation.store');

    Route::get('/admin/transactions', [TransactionController::class, 'index'])->name('admin.transactions');
    Route::get('/admin/transactions/create', [TransactionController::class, 'create'])->name('admin.transactions.create');
    Route::post('/admin/transactions', [TransactionController::class, 'store'])->name('admin.transactions.store');
    Route::get('/admin/transactions/{transaction}', [TransactionController::class, 'show'])->name('admin.transactions.show');
    Route::get('/admin/transactions/{transaction}/edit', [TransactionController::class, 'edit'])->name('admin.transactions.edit');
    Route::put('/admin/transactions/{transaction}', [TransactionController::class, 'update'])->name('admin.transactions.update');
    Route::delete('/admin/transactions/{transaction}', [TransactionController::class, 'destroy'])->name('admin.transactions.destroy');

    // taruh ini paling bawa. kalo ada route yang makek {} contohnya {id} -> /admin/{id} taruh aja paling bawah (Owke sur)
    Route::get('/admin/{id}', [AdminController::class, 'show'])->name('admin.show');
    Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::patch('/admin/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
});

Route::middleware([CustomerMiddleware::class])->group(function () {
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.page');
    Route::get('/customer/reservation', [CustomerController::class, 'reservationForm'])->name('customer.reservation.form');
    Route::post('/customer/reservation', [ReservationController::class, 'store'])->name('customer.reservation.store');
    Route::get('/customer/laundry-types', [CustomerController::class, 'laundryTypes'])->name('customer.laundry.types');
    Route::get('/customer/orders/history', [ReservationController::class, 'history'])->name('customer.orders.history');

    Route::get('/customer/orders/{id}', [ReservationController::class, 'show'])->name('customer.orders.show');
});

Route::get('/payment/{order}', [PaymentController::class, 'showForm'])->name('payment.form');
Route::post('/payment', [PaymentController::class, 'submitForm'])->name('payment.submit');

// the err
// Laravel membaca route pertama (/admin/{id}).

// {id} adalah parameter dinamis, jadi Laravel menangkap apa pun setelah /admin/ sebagai nilai {id}.

// Saat kamu mengakses /admin/transactions, Laravel menganggap "transactions" sebagai nilai {id}.

// Akibatnya, route /admin/transactions tidak pernah dieksekusi, karena sudah ditangkap oleh route /admin/{id}.