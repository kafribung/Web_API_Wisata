<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\{AdminController, DashboardController, TravelController, TravelimageController};

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
    Route::get('travel-img/{travel:slug}', [TravelimageController::class, 'index']);
    Route::get('travel-img/{travel:slug}/create', [TravelimageController::class, 'create']);
    Route::post('travel-img/{travel:slug}', [TravelimageController::class, 'store']);
    Route::get('travel-img/{travelimage:id}/edit', [TravelimageController::class, 'edit']);
    Route::patch('travel-img/{travelimage:id}', [TravelimageController::class, 'update']);
    Route::delete('travel-img/{travelimage:id}', [TravelimageController::class, 'destroy']);
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
