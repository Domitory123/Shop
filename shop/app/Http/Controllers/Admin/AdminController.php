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
    //це chat gpt написав, я дрохи розібрався в запиті (як він працює) 
    $totalPrice = Order::with('products')->where('created_at', '>=', $dayAgo)
     ->get()
     ->flatMap(function ($order) {
        return $order->products->map(function ($product) {
            return [
                'quantity' => $product->pivot->quantity,
                'price' => $product->pivot->price,
            ];
        });
     })
     ->reduce(function ($carry, $item) {
        return [
            'quantity' => $carry['quantity'] + $item['quantity'],
            'price' => $carry['price'] + $item['price'],
        ];
     }, ['quantity' => 0, 'price' => 0]);

     
    return view('admin.statistic' ,[
          'quantity' => $totalPrice['quantity'],
          'totalPrice' => $totalPrice['price'],
          'countUser' => User::count(),
      ]);
 }



}
