<?php

use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Payment;
use App\Http\Controllers\PaymentController;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Registration', function () {
    return view('participants.registration');
});

Auth::routes(['verify' => true]);


