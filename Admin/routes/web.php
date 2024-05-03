<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\MenuCategoryController;
use App\Http\Controllers\SubMenuCategoryController;
use App\Http\Controllers\CompanyRegistrationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(MenuItemController::class)->group(function(){
        Route::get('menu', 'index')->name('menu.items');
        Route::post('menu-store', 'store')->name('menu.item.store');
    });
    Route::controller(CompanyRegistrationController::class)->group(function(){
        Route::get('company-registration', 'create')->name('company.register');
        Route::post('company-store', 'store')->name('company.store');
    });
});
