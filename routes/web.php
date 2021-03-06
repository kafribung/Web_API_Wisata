<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Backend\{AdminController, DashboardController, PrivacyPolicyController, TravelController, TravelimageController, QrcodeController};

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
    return redirect('/login');
});

Route::middleware('admin')->group(function(){
    Route::get('dashboard', DashboardController::class);
    Route::resource('admin', AdminController::class);
    Route::resource('travel', TravelController::class);
    // Travelimg
    Route::prefix('travel-img')->group(function(){
        Route::get('/{travel:slug}', [TravelimageController::class, 'index']);
        Route::get('/{travel:slug}/create', [TravelimageController::class, 'create']);
        Route::post('/{travel:slug}', [TravelimageController::class, 'store']);
        Route::get('/{travelimage:id}/edit', [TravelimageController::class, 'edit']);
        Route::patch('/{travelimage:id}', [TravelimageController::class, 'update']);
        Route::delete('/{travelimage:id}', [TravelimageController::class, 'destroy']);
    });
    // QRCode
    Route::prefix('qr-code')->group(function(){
        Route::get('/{slug}', [QrcodeController::class, 'index']);
        Route::post('/print', [QrcodeController::class, 'print']);
    });
});

// Privacy Policy
Route::get('privacy-policy', PrivacyPolicyController::class)->name('privacy.index');

Auth::routes(['register' => false]);