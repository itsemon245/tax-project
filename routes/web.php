<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Hero\BannerController;
use App\Http\Controllers\Backend\UserProfileController;

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

Route::get('/', function () {
    return view('frontend.pages.welcome');
});

// Route::get('/dashboard', function () {
//     return view('backend.dashboard.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
* dashboard controller start
*/

Route::controller(DashboardController::class)->group(function(){
    Route::get('/dashboard','create')->name('dashboard');
});

/*
*this route for user profiles
*/
Route::resource('user-profile', UserProfileController::class);

/*
* this route for user hero sections
*/

Route::resource('hero',BannerController::class);

/*
* dashboard controller end
*/
require __DIR__ . '/auth.php';
