<?php

use App\Http\Controllers\AccessControlController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DebateTeamController;
use App\Http\Controllers\EnvironmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParticipantAuthController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\RefundController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ReRegistrationController;
use App\Http\Controllers\RoundController;
use App\Http\Controllers\SubmissionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('', [HomeController::class, 'index'])->name('home');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('competitions', CompetitionController::class);
Route::resource('environments', EnvironmentController::class);
Route::resource('access-controls', AccessControlController::class);
Route::resource('rounds', RoundController::class);
Route::resource('attendances', AttendanceController::class);


// Participant Login
Route::prefix('participant')->name('participant.')->group(function () {
    Route::get('login', [LoginController::class, 'showParticipantLoginForm'])->name('login');
    Route::post('login/auth', [LoginController::class, 'participantLogin'])->name('login-auth');
    Route::get('dashboard', ParticipantController::class)->name('dashboard');
});

// Participant
Route::prefix('participants')->name('participants.')->group(function () {
    Route::get('export', [ParticipantController::class, 'export'])->name('export');
});
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
    Route::put('{payment}/reject', [PaymentController::class, 'reject'])->name('reject');
    Route::get('{payment}/download-invoice', [PaymentController::class, 'downloadInvoice'])->name('download-invoice');
    Route::get('{payment}/resend-invoice', [PaymentController::class, 'resendInvoice'])->name('resend-invoice');
});
Route::resource('payments', PaymentController::class)->except('create');


// Refund
Route::prefix('refunds')->name('refunds.')->group(function () {
    Route::get('{registration}/create', [RefundController::class, 'create'])->name('create');
    Route::put('{refund}/accept', [RefundController::class, 'accept'])->name('accept');
    Route::put('{refund}/reject', [RefundController::class, 'reject'])->name('reject');
});
Route::resource('refunds', RefundController::class)->except('create');

// Debate Team Name
Route::prefix('debate-teams')->name('debate-teams.')->group(function () {
    Route::put('{debateTeam}/accept', [DebateTeamController::class, 'accept'])->name('accept');
    Route::put('{debateTeam}/reject', [DebateTeamController::class, 'reject'])->name('reject');

});
Route::resource('debate-teams', DebateTeamController::class);


// Re Registration
Route::prefix('qualifications')->name('qualifications.')->group(function () {
    Route::get('{round}/create/{competition}', [QualificationController::class, 'create'])->name('create');
});
Route::resource('qualifications', QualificationController::class)->except('create');

// Submission
Route::prefix('submissions')->name('submissions.')->group(function () {
    Route::get('{submission}/download', [SubmissionController::class, 'download'])->name('download');
});
Route::resource('submissions', SubmissionController::class);



Route::resource('re-registrations', ReRegistrationController::class);




