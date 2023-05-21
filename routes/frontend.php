<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\BookController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutPageController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Frontend\MiscServiceController;
use App\Http\Controllers\Backend\Referee\RefereeController;

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
Route::get('/misc-services', [MiscServiceController::class, 'index'])->name('misc.service');
Route::get('/industries', [IndustriesController::class, 'index'])->name('industries');
Route::prefix('/books')->name('books.')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('view');
    Route::get('/book', [BookController::class, 'show'])->name('show');
});

Route::get('/register/r/{user_name}', [RegisteredUserController::class, 'create'])->name('refer.link');
