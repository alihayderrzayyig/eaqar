<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TamlikController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ReservationController as AdminReservationController;
use App\Http\Controllers\Admin\TamlikController as AdminTamlikController;
use App\Http\Controllers\Admin\RecordController as AdminRecordController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\ReservationController;

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
    // (new Reservation())->ImportToDb();
    // (new Tamlik())->ImportToDb();
    return redirect()->route('login');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/tamliks', [TamlikController::class, 'index'])->name('tamliks.index');
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservation.index');
    Route::get('/records', [RecordController::class, 'index'])->name('records.index');
});

Route::middleware(['auth', 'isAdmin'])->name('admin.')->prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/users', UserController::class);

    Route::get('/tamliks/import', [AdminTamlikController::class, 'import'])->name('tamliks.import');
    Route::resource('/tamliks', AdminTamlikController::class);

    Route::get('/reservations/import', [AdminReservationController::class, 'import'])->name('reservations.import');
    Route::get('/reservations/search', [AdminReservationController::class, 'search'])->name('reservations.search');
    Route::resource('/reservations', AdminReservationController::class);

    Route::get('/records/import', [AdminRecordController::class, 'import'])->name('records.import');
    Route::get('/records/search', [AdminReservationController::class, 'search'])->name('records.search');
    Route::resource('/records', AdminRecordController::class);
});


Route::get('/get-info', function(){
    phpinfo();
});

require __DIR__ . '/auth.php';
