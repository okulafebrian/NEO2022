<?php

use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::resource('competitions', CompetitionController::class);
Route::resource('participants', ParticipantController::class);
Route::resource('payments', PaymentController::class);
Route::resource('registration', RegistrationController::class);



Auth::routes(['verify' => true]);


