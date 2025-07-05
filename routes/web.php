<?php

use App\Models\Consultation;
use App\Http\Middleware\AdminOnly;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminOffersController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\AdminConsultationController;
use App\Http\Middleware\ClientOnly;

Route::resource('accueil' ,HomeController::class)->only(['index']);
// --------------------User--------------------------
Route::resource('user', UserController::class)->only(['create', 'store','update']);

// -----------------------Login---------------


Route::post('/SeConnecter',[LoginController::class,'login'])->name('login.login');
Route::get('/Connexion',[LoginController::class,'show'])->name('login');
Route::get('/verify_email/{token}', [VerificationController::class, 'verifyEmail'])->name('verify.email');

// -----------------------Forgot-password---------------

Route::get('/forgot-password', [PasswordResetController::class, 'showForm'])->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'sendNewPassword'])->name('password.email');





Route::middleware(['auth'])->group(function () {
    Route::get('/MonProfile',[UserController::class,'viewProfile'])->name('user.profile');
    Route::get('/Deconnexion',[LoginController::class,'logout'])->name('login.logout');
});


Route::middleware(['auth', ClientOnly::class])->group(function () {

Route::resource('user/consultation' , ConsultationController::class)
->only(['store' , 'index','update'])
->names([
        'index' => 'user.consultation.index',
        'store' => 'user.consultation.store',
        'update' => 'user.consultation.update',
    ]);;

Route::resource('user/offers' , OffersController::class)
->names([
        'index' => 'user.offers.index',
]);
Route::get('/offers/{offer}/download', [OffersController::class, 'download'])->name('offers.download');
Route::patch('/offers/{offer}/accept', [OffersController::class, 'accept'])->name('offers.accept');
Route::patch('/offers/{offer}/refuse', [OffersController::class, 'refuse'])->name('offers.refuse');

});

Route::middleware([AdminOnly::class])->group(function () {

    Route::resource('admin' , AdminController::class);
    Route::resource('service' , ServiceController::class);
    Route::resource('projects' , ProjectController::class);
    Route::resource('users' , AdminUserController::class);
    Route::resource('offers' , AdminOffersController::class);
    Route::resource('consultation' , AdminConsultationController::class)->only(['index','update','destroy']);

});
