<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin-site', function () {
    return view('admin.index');
})->name('admin.index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


Route::get('/cek-role', function () {
    return 'Kamu boleh masuk!';
})->middleware('auth', 'role:admin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// UserController (khusus admin)
Route::get('/user', [UserController::class, 'index'])->middleware(['auth', 'role:admin'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->middleware(['auth', 'role:admin'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->middleware(['auth', 'role:admin'])->name('user.store');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->middleware(['auth', 'role:admin'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->middleware(['auth', 'role:admin'])->name('user.update');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->middleware(['auth', 'role:admin'])->name('user.destroy');

// GuruController (admin dan guru)
Route::get('/guru', [GuruController::class, 'index'])->middleware(['auth', 'role:admin,guru'])->name('guru.index');
Route::get('/guru/create', [GuruController::class, 'create'])->middleware(['auth', 'role:admin'])->name('guru.create');
Route::get('/guru/{id}', [GuruController::class, 'show'])->middleware(['auth', 'role:admin,guru'])->name('guru.show');
Route::post('/guru', [GuruController::class, 'store'])->middleware(['auth', 'role:admin'])->name('guru.store');
Route::get('/guru/{id}/edit', [GuruController::class, 'edit'])->middleware(['auth', 'role:admin,guru'])->name('guru.edit');
Route::put('/guru/{id}', [GuruController::class, 'update'])->middleware(['auth', 'role:admin,guru'])->name('guru.update');
Route::delete('/guru/{id}', [GuruController::class, 'destroy'])->middleware(['auth', 'role:admin'])->name('guru.destroy');

// SiswaController (admin, guru, murid)
Route::get('/siswa', [SiswaController::class, 'index'])->middleware(['auth', 'role:admin,guru,murid'])->name('siswa.index');
Route::get('/siswa/create', [SiswaController::class, 'create'])->middleware(['auth', 'role:admin,guru'])->name('siswa.create');
Route::get('/siswa/{id}', [SiswaController::class, 'show'])->middleware(['auth', 'role:admin,guru,murid'])->name('siswa.show');
Route::post('/siswa', [SiswaController::class, 'store'])->middleware(['auth', 'role:admin,guru'])->name('siswa.store');
Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->middleware(['auth', 'role:admin,guru'])->name('siswa.edit');
Route::put('/siswa/{id}', [SiswaController::class, 'update'])->middleware(['auth', 'role:admin,guru'])->name('siswa.update');
Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->middleware(['auth', 'role:admin'])->name('siswa.destroy');


require __DIR__.'/auth.php';