<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::prefix('product')->controller(ProductController::class)->group(function () {
    Route::get('/', 'index')->name('product.index');   
});
   
Route::controller(CartController::class)->group(function () {
  Route::get('/cart','index')->name('cart.index');
  Route::post('/cart/add','store')->name('cart.addToCart');

});

Route::controller(UserController::class)->middleware(['auth'])->group(function () {
  Route::get('/office','office')->name('user.office');
});

Route::controller(OrderController::class)->group(function () {
  Route::get('/buy','buy')->name('buy');
  Route::post('/order','order')->name('order');
  Route::get('/show', 'show')->middleware(['auth'])->name('order.show');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
