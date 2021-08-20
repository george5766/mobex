<?php

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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'guest'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');;

Auth::routes();

Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('store.show')->middleware('auth');;

Route::get('/search', [App\Http\Controllers\SearchController::class, 'index'])->name('search');

Route::get('/search_result', [App\Http\Controllers\SearchController::class, 'result']);

Route::get('/store/{id}', [App\Http\Controllers\storeController::class, 'store_show'])->name('store');

Route::get('/add_product', [App\Http\Controllers\productController::class, 'index'])->name('product.create');

Route::get('/delete_product/{product_no}', [App\Http\Controllers\productController::class, 'delete']);

Route::get('/edit_product/{product_no}', [App\Http\Controllers\productController::class, 'edit']);

Route::post('/update_product', [App\Http\Controllers\productController::class, 'update_product']);

Route::get('/make_store/{id}', [App\Http\Controllers\storeController::class, 'index'])->middleware('auth');;

Route::get('/create_store/{id}', [App\Http\Controllers\storeController::class, 'create'])->middleware('auth');;

Route::post('/add/{store}', [App\Http\Controllers\productController::class, 'create'])->name('add')->middleware('auth');;

Route::get('/EditProfile', [App\Http\Controllers\EditProfileController::class, 'index'])->name('EditProfile')->middleware('auth');;

Route::post('/Edit', [App\Http\Controllers\EditProfileController::class, 'update'])->name('Edit')->middleware('auth');;

Route::post('/follow/{user}', [App\Http\Controllers\followController::class, 'create'])->name('follow')->middleware('auth');;

Route::post('/unfollow/{user}', [App\Http\Controllers\followController::class, 'delete'])->name('follow')->middleware('auth');;

Route::get('/rate/{product_no}', [App\Http\Controllers\rateController::class, 'create'])->name('rate')->middleware('auth');;

Route::get('/new_offer', [App\Http\Controllers\offerController::class, 'index'])->name('new_offer')->middleware('auth');;

Route::get('/add_offer/{product_no}', [App\Http\Controllers\addofferController::class, 'index'])->middleware('auth');;

Route::get('/up_offer/{product_no}', [App\Http\Controllers\addofferController::class, 'update'])->middleware('auth');;

Route::get('/delete_offer/{product_no}', [App\Http\Controllers\addofferController::class, 'delete'])->middleware('auth');;

Route::get('/move_tocart/{product_no}', [App\Http\Controllers\order_itemController::class, 'index']);

Route::get('/move_order_item', [App\Http\Controllers\order_itemController::class, 'store'])->middleware('auth');;

//dashboard


Route::POST('/regist', [App\Http\Controllers\registController::class, 'index'])->name('regist');

Route::POST('/regist_costom', [App\Http\Controllers\registController::class, 'create'])->name('register-custom');

Route::get('/delete/{user}', [App\Http\Controllers\EditProfileController::class, 'delete'])->name('deleteProfile');

Route::get('/suspend/{user}', [App\Http\Controllers\EditProfileController::class, 'suspend']);

Route::get('/unsuspend/{user}', [App\Http\Controllers\EditProfileController::class, 'unsuspend']);


Route::get('/add_mony/{user}', [App\Http\Controllers\EditProfileController::class, 'add_mony']);

Route::get('/dash', [App\Http\Controllers\dashController::class, 'index']);
