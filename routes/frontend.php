<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\Frontend\BookController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\AboutPageController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Backend\Training\TrainingController;
use App\Http\Controllers\Frontend\IndustriesController;
use App\Http\Controllers\Frontend\MiscServiceController;
use App\Http\Controllers\Frontend\ClientStudioController;
use App\Http\Controllers\Frontend\BrowseTaxExpertController;
use App\Http\Controllers\Frontend\Referee\RefereeController;
use App\Http\Controllers\Frontend\FrontendAppointmentController;
use App\Http\Controllers\Frontend\Page\PageController;
use App\Http\Controllers\Frontend\Page\ServicePageController;
use Spatie\Permission\Contracts\Role;

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

Route::get('referrals', [RefereeController::class, 'index'])->name('referrals');
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');


// user generated refer link
Route::get('/register/r/{user_name}', [RegisteredUserController::class, 'create'])->name('refer.link');






Route::get('/expert-profile', [ExpertController::class, 'index'])->name('expert.profile');
Route::get('/browse-tax-expert', [BrowseTaxExpertController::class, 'index'])->name('browse.expert');

// these route will only be visible to 2nd navigation
Route::prefix('page')->name('page.')->controller(PageController::class)->group(function () {
    Route::get('/industries', 'industriesPage')->name('industries');
    Route::get('/about', 'aboutPage')->name('about');
    Route::get('/client-studio', 'clientStudioPage')->name('client.studio');
    Route::get('/appointment', 'appointmentPage')->name('appointment');
});


Route::get('training', [PageController::class, 'trainingPage'])->name('page.training');