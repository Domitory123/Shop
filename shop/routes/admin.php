<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminController;

//Route::middleware(['admin'])->group(function () {
    
  Route::resource('category', CategoryController::class)->except('show');
 
  Route::resource('product', ProductController::class)->except('show','index');
  
  Route::prefix('product')->controller(ProductController::class)->group(function () {
    Route::get('showDestroy/{product}', 'showDestroy')->name('product.showDestroy');
    Route::get('selectDestroy', 'selectDestroy')->name('product.selectDestroy');
    Route::get('selectEdit', 'selectEdit')->name('product.selectEdit');
  });

  Route::controller(AdminController::class)->group(function () {
    Route::get('/', 'admin')->name('admin');
  });
  
//});