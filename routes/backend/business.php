<?php

use App\Http\Controllers\Backend\Business\DashboardController;
use App\Http\Controllers\Backend\Business\WindowController;

Route::group(['namespace' => 'Business', 'as' => 'business.'], function () {
    Route::group(['middleware' => ['auth', 'role:business']], function () {
        Route::get('business/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('business/window', [WindowController::class, 'list'])->name('window');
        Route::get('business/window/create', [WindowController::class, 'create'])->name('window.create');
        Route::post('business/window/store', [WindowController::class, 'store'])->name('window.store');
        Route::get('business/window/edit/{id}', [WindowController::class, 'edit'])->name('window.edit');
        Route::post('business/window/update', [WindowController::class, 'update'])->name('window.update');
    });
});
