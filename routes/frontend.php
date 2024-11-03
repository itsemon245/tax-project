<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Backend\UserProfileController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\Frontend\BookController;
use App\Http\Controllers\Frontend\CaseStudyController;
use App\Http\Controllers\Frontend\Course\CourseController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\IndustryController;
use App\Http\Controllers\Frontend\Page\PageController;
use App\Http\Controllers\Frontend\Page\ServicePageController;
use App\Http\Controllers\Frontend\Referee\RefereeController;
use App\Http\Controllers\Frontend\TaxCalculatorController;
use App\Http\Controllers\Frontend\User\UserDocController;
use App\Http\Controllers\Frontend\VideoCommentController;
use App\Http\Controllers\Frontend\WithdrawalController;
use App\Http\Controllers\MCQController;
use App\Http\Controllers\PartnerRequestController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductPageController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\Review\ReviewController;
use App\Http\Controllers\UserAppointmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/setup', function () {
    // Run an Artisan command
    Artisan::call('migrate --force ');

    return 'Setup Completed! Partial';
});
Route::get('/setup-all', function () {
    // Run an Artisan command
    Artisan::call('migrate:fresh --seed ');

    return 'Setup Completed! All';
});

Route::get('/contact-developers', [PageController::class, 'contactDevelopers'])->name('developers');

Route::prefix('service')->name('service.')->controller(ServicePageController::class)->group(function () {
    Route::get('category/{id}', 'subsUnderCategory')->name('category');
    Route::get('sub/{id}', 'servicesUnderSub')->name('sub');
    Route::get('service/{id}', 'service')->name('view');
});
Route::prefix('product')->name('product.')->controller(ProductPageController::class)->group(function () {
    Route::get('{id}/choose', 'choose')->name('choose');
});


Route::prefix('/books')->name('books.')->group(function () {
    Route::get('/categories', [BookController::class, 'getCategoryBooks'])->name('view');
    Route::get('/{categoryId}', [BookController::class, 'index'])->name('view.all');
    Route::get('/book/{book}', [BookController::class, 'show'])->name('show');
});


//  uncategorized pages
Route::get('/make-appointment', [PageController::class, 'appointmentPage'])->name('appointment.make');
Route::get('/make-appointment/virtual', [PageController::class, 'appointmentVirtual'])->name('appointment.virtual');
Route::get('/make-consultation/{expertProfile}', [PageController::class, 'appointmentPage'])->name('consultation.make');
Route::get('/make-consultation/virtual/{expertProfile}', [PageController::class, 'appointmentVirtual'])->name('consultation.virtual');
Route::post('/user-appointment/store', [UserAppointmentController::class, 'store'])->name('user-appointment.store');
Route::get('/contact', [PageController::class, 'contactPage'])->name('contact');
Route::get('/office', [PageController::class, 'officePage'])->name('office');
Route::get('/training', [PageController::class, 'trainingPage'])->name('page.training');

Route::middleware('auth')->group(function () {
    Route::resource('user-profile', UserProfileController::class);

    Route::resource('user-doc', UserDocController::class);
    Route::get('download-user-doc/{userDoc}/download/{fileIndex}', [UserDocController::class, 'download'])->name('user-doc.download');
    Route::get('user-doc/{userDoc}/move-to', [UserDocController::class, 'moveTo'])->name('user-doc.move-to');

    Route::get('/referrals', [RefereeController::class, 'index'])->name('referral.index');
    Route::get('/notification', [PageController::class, 'notificationPage'])->name('notification');
    Route::get('/promo-codes', [PageController::class, 'PromoCodePage'])->name('page.promo.code');
    Route::get('/my-courses', [PageController::class, 'myCourses'])->name('page.my.courses');
    Route::get('/my-case-studies', [PageController::class, 'myCaseStudies'])->name('page.my.case.studies');
    Route::get('/my-payments', [PageController::class, 'myPayments'])->name('page.my.payments');
    Route::get('/my-payments/show/{id}', [PageController::class, 'myPaymentShow'])->name('page.my.payment.show');
});
// user generated refer link
Route::get('/register/r/{user_name}', [RegisteredUserController::class, 'create'])->name('refer.link');

Route::controller(ExpertController::class)->prefix('expert')->name('expert.')->group(function () {
    Route::get('/browse', 'browse')->name('browse');
    Route::get('/profile/{id}', 'profile')->name('profile');
});

Route::controller(IndustryController::class)->prefix('industry')->name('industry.page.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{id}/show', 'show')->name('show');
});

// these route will only be visible to 2nd navigation
// ! Do not put any new routes in this group
Route::prefix('page')->name('page.')->controller(PageController::class)->group(function () {
    Route::get('/industries', 'industriesPage')->name('industries');
    Route::get('/industries', 'industriesPage')->name('industries');
    Route::get('/industries', 'industriesPage')->name('industries');
    Route::get('/about', 'aboutPage')->name('about');
    Route::get('/client-studio', 'clientStudioPage')->name('client.studio');
    Route::get('/become-partner', 'becomePartnerPage')->name('become.partner')->middleware('auth');
});

// Become a partner request controller
Route::resource('partner-request', PartnerRequestController::class)->middleware('auth');
// these route will only be visible to Courses navigation
// ! Do not put any new routes in this group
Route::prefix('course')->name('course.')->controller(CourseController::class)->group(function () {
    Route::get('index', 'index')->name('index');
    Route::get('{course}/show', 'show')->name('show');
    Route::get('course/{course}/videos/', 'videos')->name('videos')->middleware(['auth', 'course.purchased']);
    Route::prefix('case-study')->name('caseStudy.')->controller(CaseStudyController::class)->group(function () {
        Route::get('/', 'caseStudy')->name('page');
        Route::get('index/{package_id}', 'index')->name('index');
        Route::get('show/{caseStudy}', 'show')->name('show');
        Route::post('download/{caseStudy}', 'download')->name('download');
        Route::patch('like/{caseStudy}', 'like')->name('like');
    });
    Route::resource('video-comment', VideoCommentController::class);
});

// Review Routes
Route::prefix('review')->name('review.')->middleware('auth')->controller(ReviewController::class)->group(function () {
    Route::get('/{slug}/{id}', 'itemReview')->name('item');
    Route::post('/{slug}/index', 'index')->name('index');
    Route::post('/{slug}/store', 'store')->name('store')->middleware(['can_review']);
});
// Route for filepond upload
Route::post('/upload', function (Request $request) {
    $files = $request->fileponds;
    $paths = [];
    foreach ($files as $key => $file) {
        $paths[] = saveImage($file, 'filepond', null, 'temp');
    }
    $pathString = implode(',', $paths);

    return response($pathString, 200);
})->name('filepond.upload');

Route::get('test', function () {
    return view('test');
});

Route::get('/test-mcq', [MCQController::class, 'index'])->name('mcq.index')->middleware(['auth', 'course.purchased']);
Route::post('/test-submit/{exam}', [MCQController::class, 'store'])->name('mcq.submit');

// Route for payment
Route::prefix('payment')
    ->name('payment.')
    ->controller(PaymentController::class)
    ->group(function () {
        Route::get('create/{model}/{id}/{purchase_id?}', 'create')->name('create');
        Route::post('store/{purchase_id?}', 'store')->name('store');
        Route::post('later/', 'later')->name('later');
        Route::get('success/{model}/{id}', 'success')->name('success');
        Route::get('cancel', 'cancel')->name('cancel');
        // Route::post('pay-now/{purchase_id?}', 'payNow')->name('pay.now');
    });

// Route for payment
Route::prefix('purchase')
    ->name('purchase.')
    ->controller(PurchaseController::class)
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::post('store/', 'store')->name('store');
        Route::get('success/{model}/{id}', 'success')->name('success');
        Route::get('cancel', 'cancel')->name('cancel');
    });
// Route for payment
Route::prefix('withdraw')
    ->name('withdraw.client.')
    ->controller(WithdrawalController::class)
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::post('request/', 'store')->name('request');
    });

Route::get('tax/calculator', [TaxCalculatorController::class, 'calculator'])->name('tax.calculator');
Route::any('tax/calculate/', [TaxCalculatorController::class, 'calculate'])->name('tax.calculate');
Route::get('tax/calculator/{id}/result', [TaxCalculatorController::class, 'result'])->name('tax.calculation.result');
Route::get('tax/calculator/results', [TaxCalculatorController::class, 'results'])->name('tax.calculation.results');
