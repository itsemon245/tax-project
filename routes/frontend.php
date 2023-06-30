<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\Frontend\BookController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\UserAppointmentController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\Page\PageController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Frontend\AppointmentController;
use App\Http\Controllers\Frontend\BrowseTaxExpertController;
use App\Http\Controllers\Frontend\Referee\RefereeController;
use App\Http\Controllers\Frontend\Page\ServicePageController;
use Illuminate\Http\Request;

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

Route::prefix('/books')->name('books.')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('view');
    Route::get('/book', [BookController::class, 'show'])->name('show');
});



//  uncategorized pages

Route::get('/make-appointment', [PageController::class, 'appointmentPage'])->name('appointment.make');
Route::post('/user-appointment/store', [UserAppointmentController::class, 'store'])->name('user-appointment.store');

Route::get('/referrals', [RefereeController::class, 'index'])->name('referrals');
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::get('/training', [PageController::class, 'trainingPage'])->name('page.training');

// user generated refer link
Route::get('/register/r/{user_name}', [RegisteredUserController::class, 'create'])->name('refer.link');





Route::controller(ExpertController::class)->prefix('expert')->name('expert.')->group(function () {
    Route::get('/categories', 'categories')->name('categories');
    Route::get('/browse', 'browse')->name('browse');
    Route::get('/profile', 'profile')->name('profile');
});

// these route will only be visible to 2nd navigation 
// ! Do not put any new routes in this group
Route::prefix('page')->name('page.')->controller(PageController::class)->group(function () {
    Route::get('/industries', 'industriesPage')->name('industries');
    Route::get('/about', 'aboutPage')->name('about');
    Route::get('/client-studio', 'clientStudioPage')->name('client.studio');
    Route::get('/appointment', 'appointmentPage')->name('appointment');
    Route::get('/become-partner', 'becomePartnerPage')->name('become.partner');
});


// Route for filepond upload
Route::post('/upload', function (Request $request) {
    $files = $request->fileponds;
    $paths = [];
    foreach ($files as $key => $file) {
        $paths[] = saveImage($file, "uploads/filepond",'', 'temp');
    }
    $pathString = implode(",",$paths);
    return response($pathString, 200, [
        'content_type' => 'text/plain'
    ]);
});
