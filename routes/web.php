<?php

use App\Http\Controllers\CommunicationModeSetupController;
use App\Http\Controllers\ComplaintMediaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\IssueCategoryController;
use App\Http\Controllers\IssueCategoryFieldController;
use App\Http\Controllers\IssueFieldController;
use App\Http\Controllers\IssueSubcategoryController;
use App\Http\Controllers\IssueSourceController;
use App\Http\Controllers\IssueStatusController;
use App\Http\Controllers\SupportGroupController;


Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('complaints/submitted', [ComplaintController::class, 'submitted'])->name('complaints.submitted');
Route::get('complaints/received', [ComplaintController::class, 'received'])->name('complaints.received');
Route::get('complaints/processed', [ComplaintController::class, 'processed'])->name('complaints.processed');
Route::get('complaints/resolved', [ComplaintController::class, 'resolved'])->name('complaints.resolved');
Route::get('complaints/closed', [ComplaintController::class, 'closed'])->name('complaints.closed');
Route::get('complaints/reopened', [ComplaintController::class, 'reopened'])->name('complaints.reopened');
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
