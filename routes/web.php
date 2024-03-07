<?php

use App\Http\Controllers\CommunicationModeSetupController;
use App\Http\Controllers\ComplaintMediaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\IssueCategoryController;
use App\Http\Controllers\UserComplaintController;
use App\Http\Livewire\IssueCategory;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/', function () {
   return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//routes for complaints
Route::resource('user_complaints', UserComplaintController::class)->only(
    ['index', 'create', 'edit', 'update', 'store', 'show', 'destroy']
);

Route::get('awaiting-complaints', [ComplaintController::class, 'awaiting'])->name('awaiting_complaints');

Route::resource('complaints', ComplaintController::class);
Route::resource('complaints.media', ComplaintMediaController::class)->only(['index', 'create', 'destroy']);

Route::prefix('setups')->group(function(){
Route::resource('communication-mode', CommunicationModeSetupController::class)->only('index');
Route::resource('issue-category', IssueCategoryController::class)->only('index');
});


//Route::resource('complaint-process', ComplaintController::class)->only('create');
Route::get('get-districts', [ComplaintController::class, "loadDistricts"]);
Route::get('get-constituencies', [ComplaintController::class, "loadConstituencies"]);
Route::get('get-electoral-areas', [ComplaintController::class, "loadElectoralAreas"]);
Route::get('get-polling-station', [ComplaintController::class, "loadPollingStation"]);
