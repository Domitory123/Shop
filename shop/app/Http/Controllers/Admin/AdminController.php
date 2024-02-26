<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    
 // вивід інформації про продажі, дохід, кількість користувачів 
 public function admin()
 {
    $dayAgo = Carbon::now()->subYear();

    $total = Order::join('order_product', 'orders.id', '=', 'order_product.order_id')
    ->where('orders.created_at', '>=', $dayAgo)
    ->selectRaw('SUM(order_product.price) as total_price, SUM(order_product.quantity) as total_quantity')
    ->first();

    // $total = Order::where('created_at', '>=', $dayAgo)
    // ->with(['products' => function ($query) {
    //     $query->selectRaw('SUM(order_product.price) as total_price, SUM(order_product.quantity) as total_quantity')
    //           ->groupBy('order_product.order_id', 'order_product.product_id', 'order_product.quantity', 'order_product.price');
    // }])
    // ->first();
    //  dd($total);

    return view('admin.statistic' ,[
          'quantity' => $total['total_price'],
          'totalPrice' => $total['total_quantity'],
          'countUser' => User::count(),
      ]);
 }
}
