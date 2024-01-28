<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OrderService;

class OrderController extends Controller
{
    public function buy()
    {     
       $cart = OrderService::buy(); 
       return view('order.buy',compact('cart'));
    }

    public function order(Request $request)
    {
       OrderService::order($request); 
       return redirect()->route('order.show');
    }
  
    public function show()
    {
        if(auth()->check()){
            $orders = auth()->user()->orders;
            return view('order.order' ,compact('orders') );
        }
        return redirect()->route('cart.index');  
    }



}
