<?php

use App\Http\Controllers\CommunicationModeSetupController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\UserComplaintController;

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


// Route::resource(
//     '/',
//     UserComplaintController::class
// )->only('index');


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

Route::resource('complaints', ComplaintController::class)->only(
    ['index', 'create', 'edit', 'update', 'store', 'show', 'destroy']
);

Route::prefix('setups')->group(function(){
Route::resource('communication-mode', CommunicationModeSetupController::class)->except('show');
});


Route::resource('complaint-process', ComplaintController::class)->only('create');
Route::get('get-districts', [ComplaintController::class, "loadDistricts"]);
Route::get('get-constituencies', [ComplaintController::class, "loadConstituencies"]);
Route::get('get-electoralareas', [ComplaintController::class, "loadElectoralAreas"]);
Route::get('get-polling-station', [ComplaintController::class, "loadPollingStation"]);

Route::get('clear', function(){
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
});
