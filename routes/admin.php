<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    AuthController,
    DashboardController,
    PropertiesController
};
//authenticate admin
Route::get('/admin', [AuthController::class, 'showLoginForm'])->name('admin');
Route::post('/submit-login', [AuthController::class, 'submitLogin'])->name('submit-login');
Route::post('logout', [AuthController::class, 'logout'])->name('submit-logout');

//forgot password
Route::get('/admin/forgot-password', [AuthController::class, 'showForgotForm'])->name('admin-forgot-password');
Route::post('/submit-forgot-password', [AuthController::class, 'submitForgotPassword'])->name('submit-forgot-password');

//Reset password
Route::get('reset-password/{token}', [AuthController::class, 'resetPassword'])->name('reset-password');
Route::post('reset-password', [AuthController::class, 'resetPasswordStore'])->name('submit-reset-password');

// Group for admin routes
Route::group(['prefix' => 'admin', 'middleware' => ['admin-auth']], function () {
    // Dashboard routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Property routes
    Route::get('/properties/ajax/table', [PropertiesController::class, 'ajaxTable'])->name('properties.ajaxTable');
    Route::post('/properties/change-status', [PropertiesController::class, 'changeStatus'])->name('properties.changeStatus');
    Route::post('/properties/change-status/home', [PropertiesController::class, 'changeHome'])->name('properties.homeStatus');
    Route::resource('/properties', PropertiesController::class);
});
