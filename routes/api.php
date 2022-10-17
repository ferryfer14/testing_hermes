<?php

use App\Http\Controllers\login\LoginController;
use App\Http\Controllers\product\ProductController;
use App\Http\Controllers\transaction\CheckoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', [LoginController::class, 'submit']);
Route::post('transaction', [CheckoutController::class, 'submit']);
Route::get('detail', [ProductController::class, 'detail']);
