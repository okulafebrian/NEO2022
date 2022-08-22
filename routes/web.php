<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Payment;
use App\Http\Controllers\PaymentController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/payments', [App\Http\Controllers\PaymentController::class, 'index']);

Route::get('/payments1', [PaymentController::class, 'index1']);

Route::get('/payment-pending', [PaymentController::class, 'pending']);

Route::get('/payment-pending1', [PaymentController::class, 'pending1']);

Route::get('/payment-completed', [PaymentController::class, 'completed']);

Route::get('/payment-completed1', [PaymentController::class, 'completed1']);

Route::get('/payment-expired', [PaymentController::class, 'expired']);

Route::get('/payment-expired1', [PaymentController::class, 'expired1']);

Route::get('/payment-method', [PaymentController::class, 'paymentMethod']);

Route::get('/payment-confirmation', [PaymentController::class, 'paymentConfirmation']);

Route::post('save_payment', [PaymentController::class, 'save_payment']);

Route::group(['middleware' =>['web']], function(){

    Route::get('myroute',[PaymentContoller::class, 'index']);
   
});

Route::get('/Registration', function () {
    return view('participants.registration');
});

Auth::routes(['verify' => true]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
