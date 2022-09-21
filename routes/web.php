<?php

use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Payment;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::resource('competitions', CompetitionController::class);
Route::resource('participants', ParticipantController::class);
Route::resource('registrations', RegistrationController::class);
Route::resource('users', UserController::class);
Route::resource('competitions', CompetitionController::class);

// Payment
Route::resource('payments', PaymentController::class)->except('create');
Route::prefix('payments')->name('payments.')->group(function () {
    Route::get('{registration}/create', [PaymentController::class, 'create'])->name('create');
});

Auth::routes(['verify' => true]);


