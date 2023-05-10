<?php

use App\Models\Map;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UiElementController;
use App\Http\Controllers\SocialHandleController;
use App\Http\Controllers\Backend\Map\MapController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Info\InfoController;
use App\Http\Controllers\Backend\Hero\BannerController;
use App\Http\Controllers\Backend\UserProfileController;
use App\Http\Controllers\Backend\Product\ProductController;
use App\Http\Controllers\Backend\Appointment\AppointmentController;
use App\Http\Controllers\Backend\Product\ProductCategoryController;
use App\Http\Controllers\Backend\Testimonial\TestimonialController;
use App\Http\Controllers\Backend\Product\ProductSubCategoryController;

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
    Route::resource('product-subcategory', ProductSubCategoryController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('info', InfoController::class);
    Route::resource('appointment', AppointmentController::class);
    Route::resource('testimonial', TestimonialController::class);
    Route::resource('social-handle', SocialHandleController::class);
    Route::resource('ui-element', UiElementController::class);
    Route::resource('map',MapController::class);
    Route::resource('role', RoleController::class);

    Route::POST('/get-sub-categories/{categoryId}', [ProductController::class, 'getSubCategories'])->name('getSubcategory');
    Route::POST('/get-info-section-title/{sectionId}', [InfoController::class, 'getInfoSectionTitle'])->name('getInfoSectionTitle');
    Route::post('user-profile/1/edited', [UserProfileController::class, 'changePassword'])->name('user-profile.changePassword');//Change password on admin panle

});
