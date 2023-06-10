<?php

use App\Models\Map;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UiElementController;
use App\Http\Controllers\SocialHandleController;
use App\Http\Controllers\Backend\Map\MapController;
use App\Http\Controllers\Backend\Book\BookController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Info\InfoController;
use App\Http\Controllers\Backend\Role\RoleController;
use App\Http\Controllers\Backend\Hero\BannerController;
use App\Http\Controllers\Backend\UserProfileController;
use App\Http\Controllers\Backend\Client\ClientController;
use App\Http\Controllers\Frontend\User\UserDocController;
use App\Http\Controllers\Backend\Invoice\InvoiceController;
use App\Http\Controllers\Backend\Product\ProductController;
use App\Http\Controllers\Backend\Calendar\CalendarController;
use App\Http\Controllers\Backend\CkEditor\CkEditorController;
use App\Http\Controllers\Backend\Training\TrainingController;
use App\Http\Controllers\Backend\Invoice\InvoiceItemController;
use App\Http\Controllers\Backend\PromoCode\PromoCodeController;
use App\Http\Controllers\Backend\UserDoc\DocumentTypeController;
use App\Http\Controllers\Backend\Appointment\AppointmentController;
use App\Http\Controllers\Backend\Product\ProductCategoryController;
use App\Http\Controllers\Backend\Service\ServiceCategoryController;
use App\Http\Controllers\Backend\Testimonial\TestimonialController;
use App\Http\Controllers\Backend\Product\ProductSubCategoryController;
use App\Http\Controllers\Backend\Service\ServiceSubCategoryController;
use App\Http\Controllers\Backend\VideoController;

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
    Route::resource('promo-code', PromoCodeController::class);
    Route::resource('user-doc', UserDocController::class);
    Route::resource('map', MapController::class);
    Route::resource('user-doc', UserDocController::class);
    Route::resource('document-type', DocumentTypeController::class);
    Route::resource('map', MapController::class);
    Route::resource('role', RoleController::class);
    Route::resource('invoice', InvoiceController::class);
    Route::resource('invoice-item', InvoiceItemController::class);
    Route::resource('training', TrainingController::class);
    Route::resource('video', VideoController::class);


    //service related routes
    Route::resource('service-subcategory', ServiceSubCategoryController::class);
    // custom routes for service only for spacial purpose
    Route::prefix('service')->name('service.')->group(function () {
        Route::get('category/{categoryId}', [ServiceSubCategoryController::class, 'showAll'])->name('subs.view');
        Route::get('sub/create/{categoryId}', [ServiceSubCategoryController::class, 'create'])->name('subs.create');
        Route::get('create/{subCategoryId}', [ServiceController::class, 'create'])->name('create');
        Route::get('view/{subCategoryId}', [ServiceController::class, 'index'])->name('index');
        Route::POST('store/', [ServiceController::class, 'store'])->name('store');
        Route::get('edit/{service}', [ServiceController::class, 'edit'])->name('edit');
        Route::PUT('update/{id}', [ServiceController::class, 'update'])->name('update');
        Route::DELETE('destroy/{service}', [ServiceController::class, 'destroy'])->name('destroy');
    });

    //custom routes
    Route::POST('/get-sub-categories/{categoryId}', [ProductController::class, 'getSubCategories'])->name('getSubcategory');
    Route::POST('/get-users', [PromoCodeController::class, 'getUsers'])->name('getUsers');
    Route::POST('/get-info-section-title/{sectionId}', [InfoController::class, 'getInfoSectionTitle'])->name('getInfoSectionTitle');
    Route::post('user-profile/1/edited', [UserProfileController::class, 'changePassword'])->name('user-profile.changePassword'); //Change password on admin panel
    Route::resource('calendar', CalendarController::class);
    Route::get('fetch-events', [CalendarController::class, 'fetchEvents'])->name('event.fetch');
    Route::patch('drag-update/{calendar}', [CalendarController::class, 'dragUpdate'])->name('event.dragUpdate');
    Route::PUT('user-to-become-partner/{id}', [UserProfileController::class, 'userToBecomePartner'])->name('user-profile.update.become');//User profile to become a partner update
    Route::resource('client', ClientController::class);
    Route::resource('book', BookController::class);
});


//test routes
Route::post('upload-image', [CkEditorController::class, 'uploadImage'])->name('upload.image');
