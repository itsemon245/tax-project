<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Backend\Referee\RefereeController;
use App\Http\Controllers\Frontend\BookController;
use App\Http\Controllers\Frontend\HomeController;

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
Route::prefix('/books')->name('books.')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('view');
    Route::get('/book', [BookController::class, 'show'])->name('show');
});

Route::get('/register/r/{user_name}', [RegisteredUserController::class, 'create'])->name('refer.link');
