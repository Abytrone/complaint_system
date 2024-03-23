<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunicationModeSetupController;
use App\Http\Controllers\ComplaintMediaController;

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\IssueCategoryController;
use App\Http\Controllers\IssueCategoryFieldController;
use App\Http\Controllers\IssueFieldController;
use App\Http\Controllers\IssueSubcategoryController;
use App\Http\Controllers\IssueSourceController;
use App\Http\Controllers\IssueStatusController;
use App\Http\Controllers\SupportGroupController;

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


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::get('complaints/submitted', [ComplaintController::class, 'submitted'])->name('complaints.submitted');
    Route::get('complaints/awaiting-resolution', [ComplaintController::class, 'processed'])->name('complaints.processed');
    Route::get('complaints/resolved', [ComplaintController::class, 'resolved'])->name('complaints.resolved');
     Route::get('complaints/reopen', [ComplaintController::class, 'reopen'])->name('complaints.reopen');
    Route::resource('complaints', ComplaintController::class)->except(['store', 'update']);

    Route::resource('complaints.media', ComplaintMediaController::class)->only(['index', 'create', 'destroy']);

    Route::prefix('setups')->group(function () {
        Route::resource('communication-mode', CommunicationModeSetupController::class)->only('index');
        Route::resource('issue-category', IssueCategoryController::class)->only('index');
        Route::resource('issue-field', IssueFieldController::class)->only('index');
        Route::resource('issue-category-field', IssueCategoryFieldController::class)->only('index');
        Route::resource('issue-subcategory', IssueSubcategoryController::class)->only('index');
        Route::resource('issue-source', IssueSourceController::class)->only('index');
        Route::resource('issue-status', IssueStatusController::class)->only('index');
        Route::resource('support-groups', SupportGroupController::class)->only('index');
    });

});
require __DIR__ . '/auth.php';
