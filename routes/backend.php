<?php

use App\Models\Course;
use App\Models\TaxSetting;
use App\Models\TaxCalculator;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UiElementController;
use App\Http\Controllers\SocialHandleController;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\ExpertProfileController;
use App\Http\Controllers\Review\ReviewController;
use App\Http\Controllers\TaxCalculatorController;
use App\Http\Controllers\Backend\Map\MapController;
use App\Http\Controllers\CaseStudyPackageController;
use App\Http\Controllers\Backend\Book\BookController;
use App\Http\Controllers\Backend\CaseStudyController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Info\InfoController;
use App\Http\Controllers\Backend\Role\RoleController;
use App\Http\Controllers\Backend\User\UserController;
use App\Http\Controllers\Backend\Hero\BannerController;
use App\Http\Controllers\Backend\Pages\AboutController;
use App\Http\Controllers\Backend\Role\MemberController;
use App\Http\Controllers\Backend\UserProfileController;
use App\Http\Controllers\Backend\Chalan\ChalanController;
use App\Http\Controllers\Backend\Client\ClientController;
use App\Http\Controllers\Backend\Course\CourseController;
use App\Http\Controllers\Frontend\User\UserDocController;
use App\Http\Controllers\Backend\Invoice\InvoiceController;
use App\Http\Controllers\Backend\Product\ProductController;
use App\Http\Controllers\Backend\UserAppointmentController;
use App\Http\Controllers\Backend\Book\BookCategoryController;
use App\Http\Controllers\Backend\Calendar\CalendarController;
use App\Http\Controllers\Backend\CkEditor\CkEditorController;
use App\Http\Controllers\Backend\Progress\ProgressController;
use App\Http\Controllers\Backend\Return\ReturnFormController;
use App\Http\Controllers\Backend\Training\TrainingController;
use App\Http\Controllers\Backend\Invoice\InvoiceItemController;
use App\Http\Controllers\Backend\PromoCode\PromoCodeController;
use App\Http\Controllers\Backend\Project\ProjectController;
use App\Http\Controllers\Backend\Appointment\AppointmentController;
use App\Http\Controllers\Backend\Product\ProductCategoryController;
use App\Http\Controllers\Backend\Testimonial\TestimonialController;
use App\Http\Controllers\Backend\TaxCalculator\TaxSettingController;
use App\Http\Controllers\Backend\ClientStudio\ClientStudioController;
use App\Http\Controllers\Backend\Product\ProductSubCategoryController;
use App\Http\Controllers\Backend\Service\ServiceSubCategoryController;
use App\Http\Controllers\Backend\CaseStudy\CaseStudyCategoryController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PartnerSection\PartnerSectionController;

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
    Route::resource('users', UserController::class);
    Route::resource('product', ProductController::class);
    Route::resource('book-category', BookCategoryController::class);
    Route::resource('case-study-category', CaseStudyCategoryController::class);
    Route::resource('product-category', ProductCategoryController::class);
    Route::resource('product-subcategory', ProductSubCategoryController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('info', InfoController::class);
    Route::resource('appointment', AppointmentController::class);
    Route::resource('testimonial', TestimonialController::class);
    Route::resource('social-handle', SocialHandleController::class);
    Route::resource('ui-element', UiElementController::class);
    Route::resource('promo-code', PromoCodeController::class);
    Route::resource('user-docs', UserDocController::class);
    Route::resource('map', MapController::class);
    Route::resource('map', MapController::class);
    Route::resource('role', RoleController::class);
    Route::resource('invoice', InvoiceController::class);
    Route::get('filtered-invoices', [InvoiceController::class, 'filterInvoices'])->name('invoice.filter');
    Route::patch('invoice/{invoice}/markAs/{status}', [InvoiceController::class, 'markAs'])->name('invoice.markAs');
    Route::resource('invoice-item', InvoiceItemController::class);
    Route::resource('training', TrainingController::class);
    Route::resource('video', VideoController::class);
    Route::get('course/{course}/videos', [VideoController::class, 'videosByCourse'])->name('video.byCourse');
    Route::resource('partner-section', PartnerSectionController::class);
    Route::resource('about', AboutController::class);
    Route::resource('client-studio', ClientStudioController::class);
    Route::resource('expert-profile', ExpertProfileController::class);
    Route::resource('exams', ExamController::class);
    Route::resource('questions', QuestionController::class);
    Route::resource('taxCalculator', TaxCalculatorController::class);
    Route::resource('course', CourseController::class)->names([
        'index' => 'course.backend.index',
        'show' => 'course.backend.show',
    ]);
    Route::post('send-invoice-mail/{id}', [InvoiceController::class, 'sendInvoiceMail'])->name('send_invoice_mail');
    Route::prefix('case-study-package-backend')
        ->name('case.study.package.backend.')
        ->controller(CaseStudyPackageController::class)
        ->group(function () {
            Route::get('', 'create')->name('index');
            Route::post('store', 'store')->name('store');
            Route::get('show-all', 'showAll')->name('show.all');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::delete('destroy/{id}', 'destroy')->name('delete');
            Route::PUT('update/{id}', 'update')->name('update');
            Route::get('user/{id}', 'user')->name('user');
        });
        Route::prefix('project')
        ->name('project.')
        ->controller(ProjectController::class)
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::PUT('update/{id}', 'update')->name('update');
            Route::delete('destroy/{id}', 'destroy')->name('destroy');
            // Route::post('store', 'store')->name('store');
            // Route::get('show-all', 'showAll')->name('show.all');
            // Route::get('user/{id}', 'user')->name('user');
        });

    Route::resource('case-study', CaseStudyController::class);

    Route::get('order', [OrderController::class, 'index'])->name('order.index');
    Route::get('order/status/{id}', [OrderController::class, 'status'])->name('order.status');
    Route::delete('order/destroy/{id}', [OrderController::class, 'destroy'])->name('order.destroy');

    Route::get('delete-event/{id}', [CalendarController::class, 'delete'])->name('delete.event');
    Route::resource('industry', IndustryController::class);

    Route::resource('chalan', ChalanController::class);
    Route::resource('return-form', ReturnFormController::class);
    Route::resource('tax-setting', TaxSettingController::class);
    Route::resource('member', MemberController::class);

    Route::get('chalan/clintes/{id}',[ChalanController::class,'user'])->name('admin.chalan.client');
    //Review backend 
    Route::prefix('/review')->name('backend.review.')->controller(ReviewController::class)->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::delete('{id}/destroy', 'destroy')->name('destroy');
    });

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
    Route::prefix('user-appointments')
        ->name('user-appointments.')
        ->controller(UserAppointmentController::class)
        ->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('approved', 'approvedList')->name('approved');
            Route::get('completed/', 'completedList')->name('completed');
            Route::patch('approve/{id}', 'approve')->name('approve');
            Route::patch('complete/{id}', 'complete')->name('complete');
            Route::delete('destroy/{id}', 'destroy')->name('destroy');
        });

    //custom routes
    Route::get('get-invoice-data/{id}', [InvoiceController::class, 'getInvoiceData']);
    Route::delete('/invoice-item/delete/{id}', [InvoiceController::class, 'deleteInvoiceItem']);
    Route::POST('/get-sub-categories/{categoryId}', [ProductController::class, 'getSubCategories'])->name('getSubcategory');
    Route::POST('/get-users', [PromoCodeController::class, 'getUsers'])->name('getUsers');
    Route::POST('/get-info-section-title/{sectionId}', [InfoController::class, 'getInfoSectionTitle'])->name('getInfoSectionTitle');
    Route::post('user-profile/1/edited', [UserProfileController::class, 'changePassword'])->name('user-profile.changePassword'); //Change password on admin panel
    Route::resource('calendar', CalendarController::class);
    Route::get('fetch-events', [CalendarController::class, 'fetchEvents'])->name('event.fetch');
    Route::patch('drag-update/{calendar}', [CalendarController::class, 'dragUpdate'])->name('event.dragUpdate');
    Route::PUT('user-to-become-partner/{id}', [UserProfileController::class, 'userToBecomePartner'])->name('user-profile.update.become'); //User profile to become a partner update
    Route::resource('client', ClientController::class);
    Route::resource('book', BookController::class);
    Route::POST('upload-large-video', [VideoController::class, 'videoUpload'])->name('video.upload'); //Uploading Video file
});


//test routes
Route::post('upload-image', [CkEditorController::class, 'uploadImage'])->name('upload.image');
