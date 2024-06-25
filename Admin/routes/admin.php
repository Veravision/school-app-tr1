<?php
use App\Http\Controllers\AdminController;

Route::prefix('admin')->group(function(){
    Route::get('/login', [AdminController::class, 'DisplayLoginForm'])->name('admin.login');
    Route::get('/', function(){
        return redirect()->route('admin.login');
    });
    Route::post('/login', [AdminController::class, 'ProcessLogin'])->name('admin.login');
    Route::get('/register', [AdminController::class, 'DisplayRegisterForm'])->name('admin.register');
    Route::post('/register', [AdminController::class, 'CreateNewAdmin'])->name('admin.register');
    Route::post('/student-logout', [AdminController::class, 'logout'])->name('admin.logout');
});

Route::middleware([
    'auth:admin',
    // config('jetstream.auth_session'),
    // 'verified'
])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    
});