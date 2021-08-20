<?php

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


// my api

Route::middleware(['api','checkpass'])->group(function () {
    Route::POST('users', [App\Http\Controllers\MyApiController::class, 'index']);
});

//ad product
Route::GET('ad', [App\Http\Controllers\MyApiController::class, 'r_ad']);
Route::GET('offers', [App\Http\Controllers\MyApiController::class, 'r_offers']);
Route::GET('newProduct', [App\Http\Controllers\MyApiController::class, 'new_product']);
Route::GET('products', [App\Http\Controllers\MyApiController::class, 'products']);
