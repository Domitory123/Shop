<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
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

//->middleware(['admin'])
Route::prefix('product')->controller(ProductController::class)->group(function () {
    Route::get('/create','create')->name('product.create');
    Route::post('/product','store')->name('product.store'); 
    Route::get('/showDestroy/{product}','showDestroy')->name('productPage.destroy');
    Route::get('/destroy/{product}','destroy')->name('product.destroy');
    Route::get('/edit/{product}','edit')->name('product.edit');
    Route::post('/update/{product}','update')->name('product.update');

    Route::get('/product', 'index')->name('product.index');
  });

  Route::prefix('product')->controller(ProductController::class)->group(function () {
   // Route::get('/index','index')->name('product.index');
   // Route::get('/show/{product}','show')->name('product.show');
   
   });


  Route::prefix('category')->controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index')->name('category.index');
    Route::get('/create','create')->name('category.create');
    Route::post('/category','store')->name('category.store'); 
    Route::get('/showDestroy/{category}','showDestroy')->name('categoryShow.destroy');
    Route::get('/destroy/{category}','destroy')->name('category.destroy');
    Route::get('/edit/{category}','edit')->name('category.edit');
    Route::post('/update/{category}','update')->name('category.update');
  });

  Route::controller(UserController::class)->group(function () {
    Route::get('registration', 'getSigUp')->name('registration.getSigUp');
    Route::post('registration', 'postSigUp')->name('registration.postSigUp');
    Route::get('login', 'getSigin')->name('getSigin');
    Route::post('login', 'postSigin')->name('postSigin');
    Route::get('logout', 'logout')->name('logout');

    Route::get('admin', 'admin')->name('admin');
});

Route::controller(CartController::class)->group(function () {
Route::get('/cart','index')->name('cart.index');
Route::post('/cart/add','store')->name('cart.addToCart');
Route::delete('/cart/remove/{id}', 'removeFromCart')->name('cart.removeFromCart');
});


Route::controller(OrderController::class)->group(function () {
  Route::get('/buy','buy')->name('buy');
  Route::post('/order','order')->name('order');
  Route::get('/show', 'show')->name('order.show');

});

