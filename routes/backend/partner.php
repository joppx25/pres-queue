<?php

use App\Http\Controllers\Backend\Partner\PartnerController;

// Route::get('partner/login', [PartnerController::class, 'login'])->name('login');
Route::group(['namespace' => 'Partner', 'as' => 'partner.'], function() {
    Route::group(['middleware' => ['auth', 'role:partner']], function () {
        Route::get('company/services', [PartnerController::class, 'serviceList'])->name('services');
        
        Route::get('company/service/create', [PartnerController::class, 'createService'])->name('service.create');
        Route::post('company/service/store', [PartnerController::class, 'storeService'])->name('service.store');
        
        Route::get('company/service/edit/{id}', [PartnerController::class, 'editService'])->name('service.edit');
        Route::post('company/service/update', [PartnerController::class, 'updateService'])->name('service.update');
    });
});
