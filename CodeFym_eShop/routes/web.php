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

Route::get('/', [\App\Http\Controllers\Font\HomeController::class, 'index']);


Route::prefix('shop')->group(function (){
    Route::get('product/{id}', [\App\Http\Controllers\Font\ShopController::class, 'show']);
    Route::post('product/{id}', [\App\Http\Controllers\Font\ShopController::class, 'postComment']);

    Route::get('', [\App\Http\Controllers\Font\ShopController::class, 'index']);
    Route::get('category/{categoryName}', [\App\Http\Controllers\Font\ShopController::class, 'category']);
});

Route::prefix('cart')->group(function (){
    Route::get('add', [\App\Http\Controllers\Font\CartController::class, 'add']);
    Route::get('/', [\App\Http\Controllers\Font\CartController::class, 'index']);
    Route::get('delete', [\App\Http\Controllers\Font\CartController::class, 'delete']);
    Route::get('destroy', [\App\Http\Controllers\Font\CartController::class, 'destroy']);
    Route::get('update', [\App\Http\Controllers\Font\CartController::class, 'update']);
});

Route::prefix('checkout')->group(function (){
    Route::get('', [\App\Http\Controllers\Font\CheckoutController::class, 'index']);
    Route::post('/', [\App\Http\Controllers\Font\CheckoutController::class, 'addOrder']);
    Route::get('/result', [\App\Http\Controllers\Font\CheckoutController::class, 'result']);
    Route::get('/vnPayCheck', [\App\Http\Controllers\Font\CheckoutController::class, 'vnPayCheck']);
});

Route::prefix('account')->group(function (){
    Route::get('login', [\App\Http\Controllers\Font\AccountController::class, 'login']);
    Route::post('login', [\App\Http\Controllers\Font\AccountController::class, 'checkLogin']);

    Route::get('logout', [\App\Http\Controllers\Font\AccountController::class, 'logout']);
    Route::get('register', [\App\Http\Controllers\Font\AccountController::class, 'register']);
    Route::post('register', [\App\Http\Controllers\Font\AccountController::class, 'postRegister']);
});

Route::prefix('my-order')->middleware('CheckRemenberLogin')->group(function (){
    Route::get('/', [\App\Http\Controllers\Font\AccountController::class, 'myOrderIndex']);
    Route::get('{id}', [\App\Http\Controllers\Font\AccountController::class, 'myOrderDetails']);
});

//admin
Route::prefix('admin')->group(function (){
    Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
});

