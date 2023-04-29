<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Hero\BannerController;
use App\Http\Controllers\Backend\UserProfileController;
use App\Http\Controllers\Backend\Product\ProductController;
use App\Http\Controllers\Backend\Product\ProductCategoryController;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register backend routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('admin')->group(function () {

    //General Routes
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('dashboard');
    });

    //Routes for backend CRUD operation
    Route::resource('user-profile', UserProfileController::class);
    Route::resource('product', ProductController::class);
    Route::resource('product-category', ProductCategoryController::class);
    Route::resource('hero', BannerController::class);
});
