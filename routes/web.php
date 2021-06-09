<?php

use Illuminate\Support\Facades\Route;
use App\Models\Products;

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

// Landing Page
Route::get('/', function () {
    $products = Products::all();
    return view('welcome', compact('products'));
})->name('welcome');

// AUTH
Auth::routes();

// ABOUT US & FAQ
Route::get('/aboutus', [App\Http\Controllers\Controller::class, 'aboutus'])->name('aboutus');
Route::get('/faq', [App\Http\Controllers\Controller::class, 'faq'])->name('faq');

// USER
Route::get('/home', [App\Http\Controllers\OrdersController::class, 'index'])->name('home');
Route::get('/order/{id}', [App\Http\Controllers\OrdersController::class, 'create'])->name('create');
Route::post('/order', [App\Http\Controllers\OrdersController::class, 'createProcess'])->name('createProcess');
Route::get('/transaction', [App\Http\Controllers\OrdersController::class, 'show'])->name('transaction');
Route::get('/orderList', [App\Http\Controllers\OrdersController::class, 'orderList'])->name('orderList');
Route::post('/orderList', [App\Http\Controllers\OrdersController::class, 'UorderDelete'])->name('UorderDelete');
Route::get('/cart', [App\Http\Controllers\OrdersController::class, 'cart'])->name('cart');
Route::post('/cart', [App\Http\Controllers\OrdersController::class, 'cartConfirmation'])->name('cartConfirmation');

// ADMIN
Route::get('admin/home', [App\Http\Controllers\ProductsController::class, 'index'])->name('admin.home')->middleware('is_admin');
Route::get('admin/create', [App\Http\Controllers\ProductsController::class, 'create'])->name('admin.create')->middleware('is_admin');
Route::post('admin/create', [App\Http\Controllers\ProductsController::class, 'createProcess'])->name('admin.createProcess')->middleware('is_admin');
Route::get('admin/update/{id}', [App\Http\Controllers\ProductsController::class, 'edit'])->name('admin.edit')->middleware('is_admin');
Route::post('admin/update/{id}', [App\Http\Controllers\ProductsController::class, 'update'])->name('admin.editProcess')->middleware('is_admin');
Route::post('admin/delete', [App\Http\Controllers\ProductsController::class, 'destroy'])->name('admin.delete')->middleware('is_admin');
Route::get('admin/user', [App\Http\Controllers\ProductsController::class, 'user'])->name('admin.user')->middleware('is_admin');
Route::post('admin/userDelete', [App\Http\Controllers\ProductsController::class, 'destroyUser'])->name('admin.userDelete')->middleware('is_admin');
Route::get('admin/userOrder', [App\Http\Controllers\OrdersController::class, 'userOrder'])->name('admin.userOrder')->middleware('is_admin');
Route::post('admin/userOrder', [App\Http\Controllers\OrdersController::class, 'orderProcess'])->name('admin.orderProcess')->middleware('is_admin');
Route::post('admin/orderDelete', [App\Http\Controllers\OrdersController::class, 'orderDelete'])->name('admin.orderDelete')->middleware('is_admin');
Route::get('admin/statistic', [App\Http\Controllers\OrdersController::class, 'statistic'])->name('admin.statistic')->middleware('is_admin');