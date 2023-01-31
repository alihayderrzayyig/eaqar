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

    Route::get('/records', [RecordController::class, 'index'])->name('record.index');
});

Route::middleware(['auth', 'isAdmin'])->name('admin.')->prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/users', UserController::class);

    Route::get('/tamliks', [AdminTamlikController::class, 'index'])->name('tamlik.index');
    Route::get('/tamliks/create', [AdminTamlikController::class, 'create'])->name('tamlik.create');
    Route::get('/tamliks/create2', [AdminTamlikController::class, 'create2'])->name('tamlik.create2');
    Route::post('/tamliks', [AdminTamlikController::class, 'store'])->name('tamlik.store');
    Route::get('/tamliks/{tamlik}/edit', [AdminTamlikController::class, 'edit'])->name('tamlik.edit');
    Route::put('/tamliks/{tamlik}', [AdminTamlikController::class, 'update'])->name('tamlik.update');
    Route::delete('/tamliks/{tamlik}', [AdminTamlikController::class, 'destroy'])->name('tamlik.destroy');

    // Route::post('/tamliks/delete-all', [AdminTamlikController::class, 'destroyAll'])->name('tamlik.destroyAll');

    Route::get('/reservations', [AdminReservationController::class, 'index'])->name('reservation.index');
    Route::get('/reservations/create', [AdminReservationController::class, 'create'])->name('reservation.create');
    Route::post('/reservations', [AdminReservationController::class, 'store'])->name('reservation.store');
    Route::get('/reservations/search', [AdminReservationController::class, 'search'])->name('reservation.search');
    Route::delete('/reservations/{reservation}', [AdminReservationController::class, 'destroy'])->name('reservation.destroy');

    Route::get('/records', [AdminRecordController::class, 'index'])->name('record.index');
    Route::get('/records/create', [AdminRecordController::class, 'create'])->name('record.create');
    Route::post('/records', [AdminRecordController::class, 'store'])->name('record.store');

});


require __DIR__ . '/auth.php';
