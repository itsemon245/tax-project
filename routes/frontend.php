<?php

use App\Models\Book;
use App\Models\User;
use App\Models\Course;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\CaseStudy;
use Illuminate\Http\Request;
use function Clue\StreamFilter\fun;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MCQController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductPageController;
use App\Http\Controllers\Frontend\BookController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Review\ReviewController;
use App\Http\Controllers\UserAppointmentController;
use App\Http\Controllers\CaseStudyPackageController;
use App\Http\Controllers\ProjectDiscussionController;
use App\Http\Controllers\Frontend\Page\PageController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Frontend\User\UserDocController;

use App\Http\Controllers\Frontend\Course\CourseController;
use App\Http\Controllers\Frontend\Referee\RefereeController;
use App\Http\Controllers\Frontend\Page\ServicePageController;

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

Route::prefix('service')->name('service.')->controller(ServicePageController::class)->group(function () {
    Route::get('category/{id}', 'subsUnderCategory')->name('category');
    Route::get('sub/{id}', 'servicesUnderSub')->name('sub');
    Route::get('service/{id}', 'service')->name('view');
});
Route::prefix('product')->name('product.')->controller(ProductPageController::class)->group(function () {
    Route::get('{id}/choose', 'choose')->name('choose');
});

//Project Dicsussion CRUD
Route::resource('project-discussion', ProjectDiscussionController::class);

Route::prefix('/books')->name('books.')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('view');
    Route::get('/book/{book}', [BookController::class, 'show'])->name('show');
});
// routes for user docs
Route::resource('user-doc', UserDocController::class);
Route::get('user-doc/{userDoc}/download/{fileIndex}', [UserDocController::class, 'download'])->name('user-doc.download');
Route::get('user-doc/{userDoc}/move-to', [UserDocController::class, 'moveTo'])->name('user-doc.move-to');



//  uncategorized pages

Route::get('/make-appointment', [PageController::class, 'appointmentPage'])->name('appointment.make');
Route::get('/make-appointment/virtual', [PageController::class, 'appointmentVirtual'])->name('appointment.virtual');
Route::get('show-all/industries', [PageController::class, 'showAllIndusryPage'])->name('show.all.industries');
Route::post('/user-appointment/store', [UserAppointmentController::class, 'store'])->name('user-appointment.store');

Route::get('/referrals', [RefereeController::class, 'index'])->name('referral.index');
Route::get('/contact', [PageController::class, 'contactPage'])->name('contact');
Route::get('/office', [PageController::class, 'officePage'])->name('office');
Route::get('/notification', [PageController::class, 'notificationPage'])->name('notification');
// Route::get('/notification', 'notificationPage')->name('notification');
Route::get('/training', [PageController::class, 'trainingPage'])->name('page.training');
Route::get('/promo-codes', [PageController::class, 'PromoCodePage'])->name('page.promo.code');

// user generated refer link
Route::get('/register/r/{user_name}', [RegisteredUserController::class, 'create'])->name('refer.link');





Route::controller(ExpertController::class)->prefix('expert')->name('expert.')->group(function () {
    Route::get('/browse', 'browse')->name('browse');
    Route::get('/profile/{id}', 'profile')->name('profile');
});

// these route will only be visible to 2nd navigation 
// ! Do not put any new routes in this group
Route::prefix('page')->name('page.')->controller(PageController::class)->group(function () {
    Route::get('/industries', 'industriesPage')->name('industries');
    Route::get('/about', 'aboutPage')->name('about');
    Route::get('/client-studio', 'clientStudioPage')->name('client.studio');
    Route::get('/become-partner', 'becomePartnerPage')->name('become.partner');
});
// these route will only be visible to Courses navigation 
// ! Do not put any new routes in this group
Route::prefix('course')->name('course.')->controller(CourseController::class)->group(function () {
    Route::get('index', 'index')->name('index');
    Route::get('{course}/show', 'show')->name('show');
    Route::get('videos', 'videos')->name('videos');
    Route::prefix('case-study')->name('caseStudy.')->controller(CaseStudyPackageController::class)->group(function () {
        Route::get('/', 'caseStudy')->name('page');
        Route::get('index/{package_id}', 'index')->name('index');
        Route::get('show/{case_study_id}', 'show')->name('show');
    });
});



// Review Routes
Route::prefix('review')->name('review.')->controller(ReviewController::class)->group(function () {
    Route::get('/{slug}/{id}', 'itemReview')->name('item');
    Route::post('/{slug}/index', 'index')->name('index');
    Route::post('/{slug}/store', 'store')->name('store');
});
// Route for filepond upload
Route::post('/upload', function (Request $request) {
    $files = $request->fileponds;
    $paths = [];
    foreach ($files as $key => $file) {
        $paths[] = saveImage($file, "filepond", null, 'temp');
    }
    $pathString = implode(",", $paths);
    return response($pathString, 200, [
        'content_type' => 'text/plain'
    ]);
});

Route::get('test', function () {
    $invoice = Invoice::first();
    $year = currentFiscalYear();
    return view('mail.invoiceMail', compact('invoice', 'year'));
});


Route::get('/test-mcq', [MCQController::class, 'index'])->name('mcq.index');
Route::post('/test-submit/{exam}', [MCQController::class, 'store'])->name('mcq.submit');


// Route for payment
Route::prefix('payment')
    ->name('payment.')
    ->controller(PaymentController::class)
    ->group(function () {
        Route::get('create/{model}/{id}', 'create')->name('create');
        Route::post('store/', 'store')->name('store');
        Route::get('success/{model}/{id}', 'success')->name('success');
        Route::get('cancel', 'cancel')->name('cancel');
    });
