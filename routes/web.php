<?php

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ComplaintController;

use App\Http\Controllers\IssueFieldController;
use App\Http\Controllers\IssueSourceController;
use App\Http\Controllers\IssueStatusController;
use App\Http\Controllers\SupportGroupController;
use App\Http\Controllers\IssueCategoryController;
use App\Http\Controllers\ComplaintMediaController;
use App\Http\Controllers\IssueSubcategoryController;
use App\Http\Controllers\IssueCategoryFieldController;
use App\Http\Controllers\CommunicationModeSetupController;
use Illuminate\Support\Facades\Http;

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

    Route::get('complaints/{complaint}/media/table', [ComplaintMediaController::class, 'table'])->name('complaints.media.table');
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('complaints/submitted', [ComplaintController::class, 'submitted'])->name('complaints.submitted');
Route::get('complaints/received', [ComplaintController::class, 'received'])->name('complaints.received');
Route::get('complaints/processed', [ComplaintController::class, 'processed'])->name('complaints.processed');
Route::get('complaints/resolved', [ComplaintController::class, 'resolved'])->name('complaints.resolved');
Route::get('complaints/closed', [ComplaintController::class, 'closed'])->name('complaints.closed');
Route::get('complaints/reopened', [ComplaintController::class, 'reopened'])->name('complaints.reopened');
Route::resource('complaints', ComplaintController::class)->only(['index', 'create', 'edit', 'destroy']);

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

//website submit route
Route::get('/submit-complaint', [ComplaintController::class, 'webSubmit'])->name('complaints.web-submit');

//require __DIR__ . '/auth.php';

Route::view('/hubtel', 'hubtel');
Route::get('/hubtel-callback', function (Request $request) {
    dd($request->body);
});

Route::post('hubtel', function () {
    $code = Str::random(10);
    $code = Str::random(10);
    $response = Http::withHeaders([
        "Content-Type" => "application/json",
        "Authorization" => "Basic NjRaN1BSOmE4YzhjMDc0Nzc4ZjRmNzliZGJjMDJhM2YzZWRjMjA2"
    ])->post("https://payproxyapi.hubtel.com/items/initiate", [
        "totalAmount" => 0.1,
        "description" => "Hubtel Online Checkout Test",
        "callbackUrl" => "http://localhost:8000/hubtel-callback",
        "returnUrl" => "http://localhost:8000/hubtel-callback",
        "merchantAccountNumber" => "2020338",
        "cancellationUrl" => "http://google.com",
        "clientReference" => $code
    ]);

    if ($response->failed()) {
        return "HTTP Error: " . $response->status() . PHP_EOL;
    } else {
        return redirect(json_decode($response->body())->data->checkoutUrl);
    }
});

Route::get('/issue-code', function(){
    \App\Models\Complaint::all()->each(function ($item){
        $item->update(['issue_code' => Str::uuid()]);
    });
});
