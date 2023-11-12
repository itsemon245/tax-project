<?php

use App\Http\Controllers\Backend\Service\CustomServiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\IncomeSourceController;
use App\Http\Controllers\SocialHandleController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\ExpertProfileController;
use App\Http\Controllers\Review\ReviewController;
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
use App\Http\Controllers\Backend\Tax\ResultsController;
use App\Http\Controllers\Backend\UserProfileController;
use App\Http\Controllers\Backend\Chalan\ChalanController;
use App\Http\Controllers\Backend\Client\ClientController;
use App\Http\Controllers\Backend\Course\CourseController;
use App\Http\Controllers\Backend\Invoice\ReportController;
use App\Http\Controllers\Backend\Expense\ExpenseController;
use App\Http\Controllers\Backend\Invoice\InvoiceController;
use App\Http\Controllers\Backend\Product\ProductController;
use App\Http\Controllers\Backend\Project\ProjectController;
use App\Http\Controllers\Backend\UserAppointmentController;
use App\Http\Controllers\Backend\UserDoc\UserDocController;
use App\Http\Controllers\Backend\Settings\SettingController;
use App\Http\Controllers\Backend\Book\BookCategoryController;
use App\Http\Controllers\Backend\Calendar\CalendarController;
use App\Http\Controllers\Backend\CkEditor\CkEditorController;
use App\Http\Controllers\Backend\Training\TrainingController;
use App\Http\Controllers\Backend\Invoice\InvoiceItemController;
use App\Http\Controllers\Backend\PromoCode\PromoCodeController;
use App\Http\Controllers\Backend\ReturnForm\ReturnFormController;
use App\Http\Controllers\Backend\Withdrawal\WithdrawalController;
use App\Http\Controllers\Backend\Appointment\AppointmentController;
use App\Http\Controllers\Backend\Product\ProductCategoryController;
use App\Http\Controllers\Backend\Testimonial\TestimonialController;
use App\Http\Controllers\Backend\TaxCalculator\TaxSettingController;
use App\Http\Controllers\Backend\ClientStudio\ClientStudioController;
use App\Http\Controllers\Backend\Product\ProductSubCategoryController;
use App\Http\Controllers\Backend\Service\ServiceSubCategoryController;
use App\Http\Controllers\Backend\CaseStudy\CaseStudyCategoryController;
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



Route::prefix('admin')
    ->middleware(['auth', 'can:visit admin panel'])
    ->group(function () {

        // test
        Route::get('test', function () {
            return view('test');
        });


        //General Routes
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/', 'index')->name('dashboard');
            Route::get('/get-chart-data', 'getChartData')->name('get.chart.data');
        });

        //Routes for backend CRUD operation
        Route::resource('user-profile', UserProfileController::class);
        Route::resource('users', UserController::class); // middlewares are in constructor

        Route::resource('product', ProductController::class)
            ->except('index')
            ->middleware('can:manage product');
        Route::resource('product', ProductController::class)
            ->only('index')
            ->middleware('can:read product');

        Route::resource('income-source', IncomeSourceController::class)
            ->except('index')
            ->middleware('can:manage product');
        Route::resource('income-source', IncomeSourceController::class)
            ->only('index')
            ->middleware('can:read product');


        Route::resource('book', BookController::class)
            ->except('index')
            ->middleware('can:manage book');
        Route::resource('book', BookController::class)
            ->only('index')
            ->middleware('can:read book');


        Route::resource('book-category', BookCategoryController::class)
            ->except('index')
            ->middleware('can:manage book');
        Route::resource('book-category', BookCategoryController::class)
            ->only('index')
            ->middleware('can:read book');

        Route::resource('case-study-category', CaseStudyCategoryController::class)
            ->except('index')
            ->middleware('can:manage case study');
        Route::resource('case-study-category', CaseStudyCategoryController::class)
            ->only('index')
            ->middleware('can:read case study');

        Route::resource('product-category', ProductCategoryController::class)
            ->except('index')
            ->middleware('can:manage product');
        Route::resource('product-category', ProductCategoryController::class)
            ->only('index')
            ->middleware('can:read product');

        Route::resource('product-sub-category', ProductSubCategoryController::class)
            ->except('index')
            ->middleware('can:manage product');
        Route::resource('product-sub-category', ProductSubCategoryController::class)
            ->only('index')
            ->middleware('can:read product');

        Route::resource('banner', BannerController::class)
            ->except('index')
            ->middleware('can:manage banner');
        Route::resource('banner', BannerController::class)
            ->only('index')
            ->middleware('can:read banner');

        Route::resource('info', InfoController::class)
            ->only('index')
            ->middleware('can:read info section');
        Route::resource('info', InfoController::class)
            ->except('index')
            ->middleware('can:manage info section');

        Route::resource('appointment', AppointmentController::class)
            ->only('index')
            ->middleware('can:read appointment section');
        Route::resource('appointment', AppointmentController::class)
            ->except('index')
            ->middleware('can:manage appointment section');

        Route::resource('social-handle', SocialHandleController::class)
            ->only('index')
            ->middleware('can:read social media');
        Route::resource('social-handle', SocialHandleController::class)
            ->except('index')
            ->middleware('can:manage social media');

        Route::resource('promo-code', PromoCodeController::class)
            ->only('index')
            ->middleware('can:read promo code');
        Route::resource('promo-code', PromoCodeController::class)
            ->except('index')
            ->middleware('can:manage promo code');

        // Route and middlewares for map
        Route::resource('map', MapController::class)
            ->only(['index'])
            ->middleware('can:read map');
        Route::resource('map', MapController::class)
            ->only(['create', 'store'])
            ->middleware('can:create map');
        Route::resource('map', MapController::class)
            ->only(['edit', 'update'])
            ->middleware('can:update map');
        Route::resource('map', MapController::class)
            ->only(['destroy'])
            ->middleware('can:delete map');


        // Route and middlewares for role
        Route::resource('role', RoleController::class)
            ->only(['index'])
            ->middleware('can:read role');
        Route::resource('role', RoleController::class)
            ->only(['create', 'store'])
            ->middleware('can:create role');
        Route::resource('role', RoleController::class)
            ->only(['edit', 'update'])
            ->middleware('can:update role');
        Route::resource('role', RoleController::class)
            ->only(['destroy'])
            ->middleware('can:delete role');


        // Route and middlewares for invoice
        Route::resource('invoice', InvoiceController::class);
        Route::post('send-invoice-mail/{id}', [InvoiceController::class, 'sendInvoiceMail'])->name('send_invoice_mail')->middleware('can:send invoice');
        Route::get('filtered-invoices', [InvoiceController::class, 'filterInvoices'])->name('invoice.filter')->middleware('can:read invoice');
        Route::patch('invoice/{invoice}/markAs/{status}', [InvoiceController::class, 'markAs'])->name('invoice.markAs')->middleware('can:update invoice');

        Route::prefix('report')
            ->controller(ReportController::class)
            ->name('report.')
            ->group(function () {
                Route::get('/{type}/index', 'index')->name('index');
                Route::get('/ledger', 'ledger')->name('ledger');
            });
        // Route and middlewares for invoice item
        Route::resource('invoice-item', InvoiceItemController::class)
            ->only(['index'])
            ->middleware('can:read invoice');
        Route::resource('invoice-item', InvoiceItemController::class)
            ->only(['create', 'store'])
            ->middleware('can:create invoice');
        Route::resource('invoice-item', InvoiceItemController::class)
            ->only(['edit', 'update'])
            ->middleware('can:update invoice');
        Route::resource('invoice-item', InvoiceItemController::class)
            ->only(['destroy'])
            ->middleware('can:delete invoice');

        Route::resource('video', VideoController::class)
            ->only(['index'])
            ->middleware('can:read course');
        Route::resource('video', VideoController::class)
            ->except(['index'])
            ->middleware('can:manage course');
        Route::get('course/{course}/videos', [VideoController::class, 'videosByCourse'])
            ->name('video.byCourse')
            ->middleware('can:read course');

        Route::resource('partner-section', PartnerSectionController::class)
            ->only(['index'])
            ->middleware('can:read partner');
        Route::resource('partner-section', PartnerSectionController::class)
            ->except(['index'])
            ->middleware('can:manage partner');

        Route::resource('about', AboutController::class)
            ->only(['index'])
            ->middleware('can:read about');
        Route::resource('about', AboutController::class)
            ->except(['index'])
            ->middleware('can:manage about');

        Route::resource('client-studio', ClientStudioController::class)
            ->only(['index'])
            ->middleware('can:read client studio');
        Route::resource('client-studio', ClientStudioController::class)
            ->except(['index'])
            ->middleware('can:manage client studio');
        Route::post('import-clients', [ClientController::class, 'createFromCsv'])->name('client.createFromCsv');

        // Route and middlewares for expert
        Route::resource('expert-profile', ExpertProfileController::class)
            ->only(['index'])
            ->middleware('can:read expert');
        Route::resource('expert-profile', ExpertProfileController::class)
            ->only(['create', 'store'])
            ->middleware('can:create expert');
        Route::resource('expert-profile', ExpertProfileController::class)
            ->only(['edit', 'update'])
            ->middleware('can:update expert');
        Route::resource('expert-profile', ExpertProfileController::class)
            ->only(['destroy'])
            ->middleware('can:delete expert');

        // routes for exam & questions
        Route::resource('exams', ExamController::class)
            ->only(['index'])
            ->middleware('can:read exam');
        Route::resource('exams', ExamController::class)
            ->except(['index'])
            ->middleware('can:manage exam');
        Route::get('exams-results', [ExamController::class, 'results'])->name('exams.results')->middleware('can:read exam');
        Route::resource('questions', QuestionController::class)
            ->only(['index'])
            ->middleware('can:read exam');
        Route::resource('questions', QuestionController::class)
            ->except(['index'])
            ->middleware('can:manage exam');
        Route::resource('result', ResultController::class)->middleware('can:manage exam');


        Route::prefix('setting')
            ->controller(SettingController::class)
            ->name('setting.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/', 'store')->name('store');
                Route::post('/reference', 'reference')->name('reference');
                Route::post('/payment', 'payment')->name('payment');
                Route::post('/return-link', 'returnLink')->name('returnLink');
            });

        Route::resource('withdrawal', WithdrawalController::class) //TODO: move the store method to frontend
            ->only(['index'])
            ->middleware('can:read withdrawal request');
        Route::resource('withdrawal', WithdrawalController::class) //TODO: move the store method to frontend
            ->except(['index'])
            ->middleware('can:manage withdrawal request');


        Route::resource('course', CourseController::class)
            ->names([
                'index' => 'course.backend.index',
                'show' => 'course.backend.show',
            ])
            ->only(['index'])
            ->middleware('can:read course');
        Route::resource('course', CourseController::class)
            ->names([
                'index' => 'course.backend.index',
                'show' => 'course.backend.show',
            ])
            ->except(['index'])
            ->middleware('can:manage course');


        Route::resource('userDoc', UserDocController::class)->names([
            'index' => 'userDoc.backend.index',
            'create' => 'userDoc.backend.create',
            'store' => 'userDoc.backend.store',
            'show' => 'userDoc.backend.show',
            'destroy' => 'userDoc.backend.destroy',
        ]); // middlewares are in the constructor
        Route::get('userDoc/{userDoc}/download/{fileIndex}', [UserDocController::class, 'download'])->name('userDoc.backend.download');

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
            }); // middlewares are in the constructor
        Route::prefix('project')
            ->name('project.')
            ->controller(ProjectController::class)
            ->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('clients/{id}', 'projectClients')->name('clients');
                Route::get('assign/clients/projects/{id}', 'assign')->name('assign');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::post('/assign/projects//{client}/user/{user}/project/{project}', 'assigned')->name('assigned');
                Route::post('update/project/{project}/client/{client}/task/{task}', 'updateTask')->name('task.update');
                Route::get('edit/{id}', 'edit')->name('edit');
                Route::PUT('update/{id}', 'update')->name('update');
                Route::delete('destroy/{id}', 'destroy')->name('destroy');
                Route::delete('destroy/project/{project}/client/{client}', 'destroyProjectClient')->name('destroy.client');
            }); // middlewares are in the constructor

        Route::resource('case-study', CaseStudyController::class); // middlewares are in the constructor

        Route::get('order', [OrderController::class, 'index'])
            ->name('order.index')
            ->middleware('can:read order');

        // TODO: add rest of the middlewares from here
        Route::get('consultancy/order', [OrderController::class, 'consultancyIndex'])->name('consultancy.order.index');
        Route::get('order/status/{id}', [OrderController::class, 'status'])->name('order.status');
        Route::get('consultancy/status/{id}', [OrderController::class, 'consultancyStatus'])->name('consultancy.order.status');
        Route::delete('order/destroy/{id}', [OrderController::class, 'destroy'])->name('order.destroy');

        Route::resource('industry', IndustryController::class);
        Route::resource('chalan', ChalanController::class);
        Route::post('chalan/{chalan}/clone', [ChalanController::class, 'clone'])->name('chalan.clone');
        Route::resource('achievements', AchievementController::class);
        Route::resource('return-form', ReturnFormController::class);
        Route::resource('tax-setting', TaxSettingController::class);
        Route::get('tax-results', [ResultsController::class, 'index'])->name('tax.results');
        Route::delete('tax-results/{id}', [ResultsController::class, 'destroy'])->name('tax.result.destroy');
        Route::resource('member', MemberController::class);
        Route::resource('expense', ExpenseController::class);




        // custom Routes

        Route::get('get/client/{id}', [ChalanController::class, 'clientInfo'])->name('get.client.info');
        //Review backend
        Route::prefix('/review')->name('backend.review.')->controller(ReviewController::class)->group(function () {
            Route::get('/index', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::get('/view/{review}', 'show')->name('show');
            Route::delete('{id}/destroy', 'destroy')->name('destroy');
        });

        //service related routes
        Route::resource('service-subcategory', ServiceSubCategoryController::class);
        Route::resource('custom-service', CustomServiceController::class);
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
        Route::POST('/get-users', [PromoCodeController::class, 'getUsers'])->name('getUsers');
        Route::POST('/get-info-section-title/{sectionId}', [InfoController::class, 'getInfoSectionTitle'])->name('getInfoSectionTitle');
        Route::post('user-profile/1/edited', [UserProfileController::class, 'changePassword'])->name('user-profile.changePassword'); //Change password on admin panel
        Route::resource('calendar', CalendarController::class);
        Route::patch('mark-event-completed', [CalendarController::class, 'markCompleted'])->name('mark.event.completed');
        Route::get('fetch-events', [CalendarController::class, 'fetchEvents'])->name('event.fetch');
        Route::patch('drag-update/{calendar}', [CalendarController::class, 'dragUpdate'])->name('event.dragUpdate');
        Route::PUT('user-to-become-partner/{id}', [UserProfileController::class, 'userToBecomePartner'])->name('user-profile.update.become'); //User profile to become a partner update
        Route::resource('client', ClientController::class);
        Route::resource('book', BookController::class);
        Route::POST('upload-large-video', [VideoController::class, 'videoUpload'])->name('video.upload'); //Uploading Video file
    });


//test routes
Route::post('upload-image', [CkEditorController::class, 'uploadImage'])->name('upload.image');
