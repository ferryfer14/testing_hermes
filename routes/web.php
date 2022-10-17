<?php

use App\Http\Controllers\login\LoginController;
use App\Http\Controllers\product\ProductController;
use App\Http\Controllers\transaction\CheckoutController;
use App\Http\Controllers\transaction\ReportController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[LoginController::class, 'index']);
Route::get('/product_list',[ProductController::class, 'index']);
Route::get('/checkout',[CheckoutController::class, 'index']);
Route::get('/report',[ReportController::class, 'index']);