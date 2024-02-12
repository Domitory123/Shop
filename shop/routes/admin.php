<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminController;

        
        
//Route::middleware(['admin'])->group(function () {
    
  Route::resource('category', CategoryController::class)->except('show');
  Route::get('category/showDestroy/{category}', 'CategoryController@showDestroy')->name('categoryShow.destroy');

  Route::resource('product', ProductController::class)->except('show','index');
  Route::get('product/showDestroy/{product}', 'ProductController@showDestroy')->name('productPage.destroy');
  
  Route::controller(AdminController::class)->group(function () {
    Route::get('/', 'admin')->name('admin');
  });
  
//});