<?php

use App\Http\Controllers\Frontend\Business\BusinessController;

Route::group(['namespace' => 'Business', 'as' => 'business.'], function () {
    Route::get('business/register', [BusinessController::class, 'showRegistration'])->name('register');
    Route::post('business/submitRegistration', [BusinessController::class, 'submitRegistration'])->name('register.post');
});
