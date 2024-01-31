<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminController;

        
        
Route::middleware(['admin'])->group(function () {
    
Route::prefix('category')->group(function () {
    Route::resource('category', CategoryController::class)->except('show');
    Route::get('/showDestroy/{category}', 'CategoryController@showDestroy')->name('categoryShow.destroy');
 });

 Route::prefix('product')->group(function () {
    Route::resource('product', ProductController::class)->except('show','index');
    Route::get('/showDestroy/{product}', 'ProductController@showDestroy')->name('productPage.destroy');
  });

 Route::controller(AdminController::class)  ->middleware(['admin'])->group(function () {
    Route::get('admin', 'admin')->name('admin');
  
  });
});