<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;
use App\Models\Order;
use Illuminate\Support\Facades\Lang;
use  App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    public function buy()
    {     
       $cart = null;

       if (auth()->check()) {
           if (!is_null(auth()->user()->cart)) {
               $cart = auth()->user()->cart;
           }
       } else {
           $guestSessionId = Cookie::get('guest_session_id');
           $cart = Cart::where('session_id', $guestSessionId)->first();   
       }

       return view('order.buy',compact('cart'));
    }

    public function order(OrderRequest $request)
    {
      if (auth()->check()) {
            $this->orderAuth($request->validated());
            return redirect()->route('product.index');
      }

      $guestSessionId = Cookie::get('guest_session_id');

      if (is_null($guestSessionId)) {
        return redirect()->route('product.index');
      }

      $cart = Cart::where('session_id', $guestSessionId)->first();
      $order =  $this->store($request->validated());
          
      foreach ($cart->products as $product) {
        $order
        ->products()
        ->attach($product, ['quantity' => $product->pivot->quantity, 'price' => $product->price*$product->pivot->quantity]);
      }

        $cart->delete();
        Cart::where('session_id', $guestSessionId)->delete();

        $minutes = -1;
        Cookie::queue(Cookie::make('guest_session_id', 0, $minutes));
       // Cookie::forget('guest_session_id'); чомусь не хоче видаляти
       
       return redirect()->route('product.index');
    }
  
    public  function orderAuth($orderData)
    {
        $user = auth()->user();

        $order = $user->orders()->create($orderData + [
          'status' => Lang::get('base.status')],
         );

        foreach ($user->cart->products as $product) {
            $order
            ->products()
            ->attach($product, [
             'quantity' => $product->pivot->quantity,
             'price' => $product->price * $product->pivot->quantity ]);
        }

        $user->cart->delete();    
    }

    public  function store($orderData, $idUser = 0)
    {
        $data = array_merge($orderData, [
            'user_id' => $idUser,
            'status' => Lang::get('base.status'),
        ]);
    
        return Order::create($data);
    }

    public function show()
    {    
       $orders = auth()->user()->orders()->paginate(2);
       return view('order.order' ,compact('orders'));    
    }
   
}
