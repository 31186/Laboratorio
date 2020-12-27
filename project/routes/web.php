<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Company\PageController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('locale/{locale}', function ($locale) {
//     Session::put('locale', $locale);

//     return redirect()->back();
// });

Route::middleware(['guest:company', 'guest:web'])->group(function () {
    Route::view('/', 'landing');
});

Route::prefix('company')->group(function () {
    Route::middleware(['guest:company'])->group(function () {
        Route::redirect('/', 'company/login');
        Route::get('login', [Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::class, 'create'])->name('company.login');
        Route::post('login', [Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::class, 'store']);
        Route::get('register', [Laravel\Fortify\Http\Controllers\RegisteredUserController::class, 'create'])->name('company.register');
        Route::post('register', [Laravel\Fortify\Http\Controllers\RegisteredUserController::class, 'store']);
        Route::get('forgot-password', [Laravel\Fortify\Http\Controllers\PasswordResetLinkController::class, 'create'])->name('company.password.request');
        Route::post('forgot-password', [Laravel\Fortify\Http\Controllers\PasswordResetLinkController::class, 'store'])->name('company.password.email');
        Route::post('reset-password', [Laravel\Fortify\Http\Controllers\NewPasswordController::class, 'store'])->name('company.password.update');
        Route::get('reset-password/{token}', [Laravel\Fortify\Http\Controllers\NewPasswordController::class, 'create'])->name('company.password.reset');
        Route::put('user/password', [Laravel\Fortify\Http\Controllers\PasswordController::class, 'update'])->name('company.user-password.update');
    });
    Route::post('email/verification-notification', [Laravel\Fortify\Http\Controllers\EmailVerificationNotificationController::class, 'store'])->middleware(['auth:company', 'throttle:6,1'])->name('company.verification.send');
    Route::get('email/verify', [Laravel\Fortify\Http\Controllers\EmailVerificationPromptController::class, '__invoke'])->middleware(['auth:company'])->name('company.verification.notice');
    Route::get('email/verify/{id}/{hash}', [Laravel\Fortify\Http\Controllers\VerifyEmailController::class, '__invoke'])->middleware(['auth:company', 'signed'])->name('company.verification.verify');

    Route::middleware(['auth:company', 'verified'])->group(function () {
        Route::post('logout', [Laravel\Fortify\Http\Controllers\AuthenticatedSessionController::class, 'destroy'])->name('company.logout');
        Route::get('home', [App\Http\Controllers\Company\HomeController::class, 'index'])->name('company.home');
        Route::view('profile/password', 'company.profile.password')->name('company.edit-password');
        Route::resource('/page', PageController::class);
    });
});

Route::middleware(['auth:web', 'verified'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::view('/profile/password', 'profile.password')->name('edit-password');
    Route::resource('/profile', ProfileController::class);
    Route::resource('/search', SearchController::class);
    Route::get('/search', [SearchController::class, 'getSearch'])->name('search');
});

// Route::get('/page/{id}', [App\Http\Controllers\Company\Page::class, 'show']);
