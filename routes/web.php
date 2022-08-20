<?php

use Illuminate\Support\Facades\Route;
use App\Models\Payment;
use App\Http\Controllers\PaymentController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/payments', [PaymentController::class, 'index']);

Route::get('/payments1', [PaymentController::class, 'index1']);

Route::get('/payment-pending', [PaymentController::class, 'pending']);

Route::get('/payment-pending1', [PaymentController::class, 'pending1']);

Route::get('/payment-completed', [PaymentController::class, 'completed']);

Route::get('/payment-completed1', [PaymentController::class, 'completed1']);

Route::get('/payment-expired', [PaymentController::class, 'expired']);

Route::get('/payment-expired1', [PaymentController::class, 'expired1']);
