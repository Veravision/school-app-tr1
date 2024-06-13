<?php
use App\Http\Controllers\AdminController;

Route::prefix('admin')->group(function(){
    Route::get('/login', [AdminController::class, 'DisplayLoginForm'])->name('admin.login');
    Route::get('/', function(){
        return redirect()->route('admin.login');
    });
    Route::post('/login', [AdminController::class, 'AdminLoginProcess'])->name('admin.login');
    Route::get('/register', [AdminController::class, 'DisplayRegisterForm'])->name('admin.register');
    Route::post('/register', [AdminController::class, 'CreateNewAdmin'])->name('admin.register');
});

Route::middleware([
    'auth',
    config('jetstream.auth_session'),
    'verified'
])->prefix("admin")->group(function() {
    Route::get('/dashboard', function () {
            return "Welcome Admin";
    })->name('admin.dashboard');
});