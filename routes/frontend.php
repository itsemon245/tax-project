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
Route::get('/about', [AboutPageController::class, 'index'])->name('about');
Route::get('/about-xyz', [AboutPageController::class, 'aboutxyz'])->name('aboutxyz');
Route::get('/misc-services', [MiscServiceController::class, 'index'])->name('misc.service');
Route::get('services/tax', [ServicePageController::class, 'taxService'])->name('taxService.page');
Route::get('service/sub', [ServicePageController::class, 'serviceSub'])->name('serviceSub.page');
Route::get('/industries', [IndustriesController::class, 'index'])->name('industries');

Route::prefix('/books')->name('books.')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('view');
    Route::get('/book', [BookController::class, 'show'])->name('show');
});



//  uncategorized pages
Route::get('training', [PageController::class, 'trainingPage'])->name('training.page');
Route::get('referrals', [RefereeController::class, 'index'])->name('referrals');

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');

Route::get('/register/r/{user_name}', [RegisteredUserController::class, 'create'])->name('refer.link');

Route::get('/client-studio', [ClientStudioController::class, 'index'])->name('client.studio');


Route::get('page/appointment', [FrontendAppointmentController::class, 'create'])->name('page.appoinment');

Route::get('/expert-profile', [ExpertController::class, 'index'])->name('expert.profile');

Route::get('/browse-tax-expert', [BrowseTaxExpertController::class, 'index'])->name('browse.expert');
