<?php

use App\Http\Controllers\Backend\Business\DashboardController;
use App\Http\Controllers\Backend\Business\WindowController;
use App\Http\Controllers\Backend\Business\StaffController;

Route::group(['namespace' => 'Business', 'as' => 'business.'], function () {
    Route::group(['middleware' => ['auth', 'role:business']], function () {
        Route::get('business/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('business/window', [WindowController::class, 'list'])->name('window');
        Route::get('business/window/create', [WindowController::class, 'create'])->name('window.create');
        Route::post('business/window/store', [WindowController::class, 'store'])->name('window.store');
        Route::get('business/window/edit/{id}', [WindowController::class, 'edit'])->name('window.edit');
        Route::post('business/window/update', [WindowController::class, 'update'])->name('window.update');
        Route::get('business/staff', [StaffController::class, 'index'])->name('staff');
        Route::get('business/staff/create', [StaffController::class, 'create'])->name('staff.create');
        Route::post('business/staff/store', [StaffController::class, 'store'])->name('staff.store');
        Route::get('business/staff/edit/{id}', [StaffController::class, 'edit'])->name('staff.edit');
        Route::post('business/staff/update', [StaffController::class, 'update'])->name('staff.update');
    });
});
