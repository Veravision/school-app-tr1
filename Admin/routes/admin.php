<?php

use App\Http\Controllers\AdminController;

Route::prefix('admin')->group(function(){
    Route::get('/login', [AdminController::class, 'DisplayLoginForm'])->name('admin.login');
    Route::get('/', function(){
        return redirect()->route('admin.login');
    });
});