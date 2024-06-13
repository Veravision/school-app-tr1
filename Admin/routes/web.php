<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\MenuCategoryController;
use App\Http\Controllers\SubMenuCategoryController;
use App\Http\Controllers\CompanyRegistrationController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
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
    'auth:web',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(MenuItemController::class)->group(function(){
        Route::get('menu', 'index')->name('menu.items');
        Route::post('menu-store', 'store')->name('menu.item.store');
        Route::post('menu-update', 'update')->name('menu.item.update');
        Route::get('menu-item/{id}', 'show')->name('menu.item');
        Route::get('menu-item-delete/{id}', 'destroy')->name('menu.item.delete');
    });
    Route::controller(CompanyRegistrationController::class)->group(function(){
        Route::get('company-registration', 'create')->name('company.register');
        Route::post('company-store', 'store')->name('company.store');
    });
    Route::controller(MenuCategoryController::class)->group(function(){
        Route::get('menu-category', 'index')->name('menu.category');
        Route::post('menu_category-store', 'store')->name('menu.category.store');
        Route::post('menu_category-update', 'update')->name('menu.category.update');
        Route::get('menu-category-delete/{id}', 'destroy')->name('menu.category.delete');
    });
    Route::controller(SubMenuCategoryController::class)->group(function(){
        Route::get('sub-menu', 'create')->name('sub.menu');
        // Route::get('sub-menu-item/{id}', 'show')->name('sub.menu.item');
        Route::post('get-category', 'get_category')->name('fetch.category');
        Route::post('get-category_submenu', 'get_category_2')->name('fetch.category.submenu');
        Route::post('sub-menu-store', 'store')->name('sub.menu.store');
    });
    Route::controller(TagController::class)->group(function(){
        Route::get('blog-post-tag', 'create')->name('post.tag');
        Route::post('tag-store', 'store')->name('post.tag.store');
    });
    Route::controller(CategoryController::class)->group(function(){
        Route::get('blog-post-category', 'create')->name('post.category');
        Route::post('category-store', 'store')->name('post.category.store');
    });
    Route::controller(PostController::class)->group(function(){
        Route::get('blog-post', 'create')->name('post');
    });
});

// add route
require "admin.php";