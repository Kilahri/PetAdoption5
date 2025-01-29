<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdoptController;
use App\Http\Controllers\ApplicationEditController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

############
Route::prefix('Admin')->middleware(['auth', 'verified'])->group(function() {

    Route::get('Products', [ProductController::class, 'index'])->name('products');
    Route::get('Products/Create/New', [ProductController::class, 'create'])->name('product.create');
    Route::post('Products/Create/New/Store', [ProductController::class, 'store'])->name('product.store');
    Route::get('Products/Edit/{product_id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('Products/Edit/{product_id}/Update', [ProductController::class, 'update'])->name('product.update');
    Route::delete('Products/Delete/{product_id}', [ProductController::class, 'destroy'])->name('product.delete');

    Route::get('Applications', [ApplicationController::class, 'index'])->name('applications');
    Route::get('Application/Create', [ApplicationController::class, 'create'])->name('application.create');
    Route::post('Applications/Store', [ApplicationController::class, 'store'])->name('application.store');
    Route::get('Application/Edit/{application_id}', [ApplicationController::class, 'edit'])->name('application.edit');
    Route::put('Application/Update/{application_id}', [ApplicationController::class, 'update'])->name('application.update');
    Route::delete('Application/Delete/{application_id}', [ApplicationController::class, 'destroy'])->name('application.delete');

    Route::get('Adopt', [AdoptController::class, 'index'])->name('adopt');
    Route::get('ApplicationEdit', [ApplicationEditController::class, 'index'])->name('applicationedit');
});
############ 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
