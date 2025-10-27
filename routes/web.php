<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

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

// Redirect root to booking form
Route::get('/', function () {
    return redirect()->route('booking.index');
});

// Booking routes
Route::prefix('booking')->name('booking.')->group(function () {
    Route::get('/', [BookingController::class, 'index'])->name('index');
    Route::post('/check-availability', [BookingController::class, 'checkAvailability'])->name('check-availability');
    Route::post('/store', [BookingController::class, 'store'])->name('store');
    Route::get('/confirmation/{bookingReference}', [BookingController::class, 'confirmation'])->name('confirmation');
    Route::get('/disabled-dates', [BookingController::class, 'getDisabledDates'])->name('disabled-dates');
});