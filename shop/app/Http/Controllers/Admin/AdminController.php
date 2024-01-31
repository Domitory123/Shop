<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;

class AdminController extends Controller
{
    
 // вивід інформації про продажі, дохід, кількість користувачів 
 public function admin()
 {
     $dayAgo = Carbon::now()->subDay();
     $orders = Order::where('created_at', '>=', $dayAgo)->get();
     $countUser = User::count();
    
     $totalPrice = 0;
     $quantity = 0;

    foreach ($orders as $order) {
         foreach ($order->products as $product) {
              $quantity += $product->pivot->quantity;
              $totalPrice += $product->pivot->price;
         }
      }
    
     return view('admin.statistic' ,compact('quantity','totalPrice','countUser' ));
 }



}
