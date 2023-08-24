<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplaintController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//routes for complaints
Route::resource('complaints', ComplaintController::class)->only(['index', 'create', 'store', 'destroy']);
Route::get('/getDistricts/{regionId}', [ComplaintController::class, 'getDistricts']);

// Route::prefix('complaints')->group(function () {
//     Route::resource('complaints', ComplaintController::class)->only(['index', 'destroy']);
//     // Route::resource('actors', ActorController::class)->only(['index', 'destroy']);
//     // Route::resource('event-types', EventTypeController::class);
//     // Route::resource('violence-types', ViolenceTypeController::class);
// });
