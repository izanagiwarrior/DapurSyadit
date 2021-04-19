<?php

use Illuminate\Support\Facades\Route;

// Landing Page
Route::get('/', function () {
    return view('welcome');
});

// AUTH
Auth::routes();

// USER
Route::get('/home', [App\Http\Controllers\OrdersController::class, 'index'])->name('home');
Route::get('/order/{id}', [App\Http\Controllers\OrdersController::class, 'create'])->name('create');
Route::post('/order', [App\Http\Controllers\OrdersController::class, 'createProcess'])->name('createProcess');
Route::get('/transaction', [App\Http\Controllers\OrdersController::class, 'show'])->name('transaction');

// ADMIN
Route::get('admin/home', [App\Http\Controllers\ProductsController::class, 'index'])->name('admin.home')->middleware('is_admin');
Route::get('admin/create', [App\Http\Controllers\ProductsController::class, 'create'])->name('admin.create')->middleware('is_admin');
Route::post('admin/create', [App\Http\Controllers\ProductsController::class, 'createProcess'])->name('admin.createProcess')->middleware('is_admin');
Route::get('admin/update/{id}', [App\Http\Controllers\ProductsController::class, 'edit'])->name('admin.edit')->middleware('is_admin');
Route::post('admin/update/{id}', [App\Http\Controllers\ProductsController::class, 'update'])->name('admin.editProcess')->middleware('is_admin');
Route::post('admin/delete', [App\Http\Controllers\ProductsController::class, 'destroy'])->name('admin.delete')->middleware('is_admin');