<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/create', [ProductController::class, 'create'])->name('create');
    Route::post('/dashboard/save', [ProductController::class, 'store'])->name('save');
    Route::get('/dashboard/edit/{id}', [ProductController::class, 'edit'])->name('edit');
    Route::put('/dashboard/edit/{id}', [ProductController::class, 'update'])->name('update');
    Route::get('/dashboard/delete/{id}', [ProductController::class, 'destroy'])->name('delete');
});


require __DIR__.'/auth.php';
