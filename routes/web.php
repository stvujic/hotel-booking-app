<?php

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoomTypeController;
use App\Http\Middleware\AdminMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

/********************************
         Authenticated Users
 ************************************/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/orders', [PageController::class, 'userOrders'])->name('orders.index');

});

/********************************
       Room Listing & Reservation
 ************************************/

Route::controller(PageController::class)->group(function () {
    Route::get('/rooms', 'list_rooms')->name('rooms.index');
    Route::post('/rooms', 'search')->name('rooms.search');
    Route::get('/rooms/reserve/{id}', 'showReservationForm')->name('rooms.reserve');
    Route::post('/rooms/reserve/{id}', 'storeReservation')->name('rooms.reserve.store');
});


/********************************
               Admin
 ************************************/
Route::prefix('admin')->name('admin.')->middleware([AdminMiddleware::class])->group(function () {
    Route::get('/', function () {return view ('admin.dashboard');})->name('dashboard');

    Route::resource('roomtypes', RoomTypeController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('users', UserController::class);
    Route::resource('orders', OrderController::class);
});

require __DIR__.'/auth.php';
