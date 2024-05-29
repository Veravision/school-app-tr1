<?php

use App\Http\Controllers\AdminController;

Route::prefix('admin')->group(function(){
    Route::get('/login', [AdminController::class, 'DisplayLoginForm'])->name('admin.login');
    Route::get('/', function(){
        return redirect()->route('admin.login');
    });
    Route::get('/register', [AdminController::class, 'DisplayRegisterForm'])->name('admin.register');
});

Route::middleware([
    'auth:admin',
    config('jetstream.auth_session'),
    'verified',
])->prefix("admin")->group(function() {
    
});