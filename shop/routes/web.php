<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;

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

Route::prefix('product')->middleware(['admin'])->group(function () {
  Route::resource('product', ProductController::class)->except('show');
  Route::get('/showDestroy/{product}', 'ProductController@showDestroy')->name('productPage.destroy');
});

Route::prefix('product')->controller(ProductController::class)->group(function () {
    Route::get('/product', 'index')->name('product.index');   
   });

Route::prefix('category')->middleware(['admin'])->group(function () {
    Route::resource('category', CategoryController::class)->except('show');
    Route::get('/showDestroy/{category}', 'CategoryController@showDestroy')->name('categoryShow.destroy');
 });

Route::controller(UserController::class)->group(function () {
    Route::get('registration', 'getSigUp')->name('registration.getSigUp');
    Route::post('registration', 'postSigUp')->name('registration.postSigUp');
    Route::get('login', 'getSigin')->name('getSigin');
    Route::post('login', 'postSigin')->name('postSigin');
    Route::get('logout', 'logout')->name('logout');
});

Route::controller(AdminController::class)->middleware(['admin'])->group(function () {
  Route::get('admin', 'admin')->name('admin');

});

Route::controller(CartController::class)->group(function () {
Route::get('/cart','index')->name('cart.index');
Route::post('/cart/add','store')->name('cart.addToCart');

});

Route::controller(OrderController::class)->group(function () {
  Route::get('/buy','buy')->name('buy');
  Route::post('/order','order')->name('order');
  Route::get('/show', 'show')->name('order.show');
});


