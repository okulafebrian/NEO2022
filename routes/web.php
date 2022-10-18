<?php

use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('', [HomeController::class, 'index'])->name('home');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('competitions', CompetitionController::class);
Route::resource('participants', ParticipantController::class);

// Registration
Route::prefix('registrations')->name('registrations.')->group(function () {
    Route::post('create', [RegistrationController::class, 'create'])->name('create');
    Route::get('manage', [RegistrationController::class, 'manage'])->name('manage');
});
Route::resource('registrations', RegistrationController::class)->except('create');

// Payment
Route::prefix('payments')->name('payments.')->group(function () {
    Route::get('{registration}/create', [PaymentController::class, 'create'])->name('create');
    Route::put('{payment}/accept', [PaymentController::class, 'accept'])->name('accept');
});
Route::resource('payments', PaymentController::class)->except('create');

// Promotion
Route::prefix('promotions')->name('promotions.')->group(function () {
    Route::put('{promotion}/terminate', [PromotionController::class, 'terminate'])->name('terminate');
});
Route::resource('promotions', PromotionController::class);





