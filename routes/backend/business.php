<?php

use App\Http\Controllers\Backend\Business\DashboardController;
use App\Http\Controllers\Backend\Business\WindowController;

Route::group(['namespace' => 'Business', 'as' => 'business.'], function () {
    Route::group(['middleware' => ['auth', 'role:business']], function () {
        Route::get('business/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('business/windows', [WindowController::class, 'list'])->name('window');
        Route::get('business/windows/create', [WindowController::class, 'create'])->name('window.create');
        Route::post('business/windows/store', [WindowController::class, 'store'])->name('window.store');
    });
});
