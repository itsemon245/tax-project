<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\Hero\BannerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

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


// Route::get('/dashboard', function () {
//     return view('backend.dashboard.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('ajax')
    ->middleware(['auth'])
    ->name('ajax.')
    ->controller(AjaxController::class)->group(function () {
        Route::get('case-study/package/{id}/categories', 'caseStudyCategories')->name('caseStudyCategories');
        Route::get('/get-sub-categories/{productCategory}', 'getProductSubCategories')->name('get.productSubCategories');
        Route::post('toggle-status/{id}', 'toggleStatus')->name('toggle-status');
        Route::post('mark-notifications', 'markNotificationsAsRead')->name('notifications.read');
        Route::post('promo-code/apply', 'applyPromoCode')->name('promo.apply');
        Route::post('update/client/{client}/task/{task}', 'updateTask')->name('task.update');
        Route::post('video/{video}/toggle', 'toggleVideo')->name('video.toggle');
        Route::get('get-items/{slug}', 'getItems')->name('get.items');
        Route::delete('delete/{section}/section', 'deleteSection')->name('section.destroy');
        Route::delete('delete/{slot}/slot', 'deleteSlot')->name('slot.destroy');
    });
Route::get('call-artisan', function () {
    $exitCode = Artisan::call('migrate:fresh');
    echo 'Database migrated: ' . $exitCode . "<br>";
    $exitCode = Artisan::call('db:seed');
    echo 'Database seeded: ' . $exitCode . "<br>";
    $exitCode = Artisan::call('optimize');
    echo 'Optimized: ' . $exitCode . "<br>";
    $exitCode = Artisan::call('optimize:clear');
    echo 'Optimize cleared: ' . $exitCode . "<br>";
    $exitCode = Artisan::call('storage:link');
    echo 'Storage Linked: ' . $exitCode . "<br>";
});

require __DIR__ . '/auth.php';
require __DIR__ . '/frontend.php';
require __DIR__ . '/backend.php';
