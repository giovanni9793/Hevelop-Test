<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;

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

// View
Route::get('/', [ProductController::class, 'dish'])->name('dish');

Route::get('/product', [ProductController::class, 'index'])->name('showProducts');
Route::get('/product/update/{productId}', [ProductController::class, 'showUpdate'])->name('showUpdate')->middleware('auth');
Route::get('/product/add', [ProductController::class, 'add'])->middleware('auth')->name('addProduct');
Route::get('/details/{productId}', [ProductController::class, 'details'])->name('details');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

// API
Route::post('/product', [ProductController::class, 'store'])->name('product')->middleware('auth');
Route::put('/product/{productId}', [ProductController::class, 'update'])->name('update')->middleware('auth');
Route::delete('/product/{productId}', [ProductController::class, 'delete'])->name('delete')->middleware('auth');
