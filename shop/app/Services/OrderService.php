<?php

namespace App\Services;

use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Carbon\Carbon;

class OrderService 
{    
    public static function buy()
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

      return $cart;
    }


    public  static function order($request)
    {
        if(auth()->check()){
            OrderService::orderAuth($request);
            return 0;
        }

        $cart = Cart::where('session_id', Cookie::get('guest_session_id'))->first();
     
        $order = OrderService::store($request,0);
          
     foreach ($cart->products as $product) {
        $order
        ->products()
        ->attach($product, ['quantity' => $product->pivot->quantity, 'price' => $product->price*$product->pivot->quantity]);
     }

        $cart->delete();
        Cart::where('session_id', Cookie::get('guest_session_id'))->delete();

        $minutes = -1;
        Cookie::queue(Cookie::make('guest_session_id', 0, $minutes));
       // Cookie::forget('guest_session_id'); чомусь не хоче видаляти
       
    }

    public  static function orderAuth($request)
    {
        $user = auth()->user();

        $order = OrderService::store($request,$user->id);
      
        foreach ($user->cart->products as $product) {
            $order
            ->products()
            ->attach($product, ['quantity' => $product->pivot->quantity, 'price' => $product->price*$product->pivot->quantity]);
        }

        $user->cart->delete();    
    }

    public  static function store($request, $idUser)
    {
        $data = [
            'user_id' => $idUser,
            'phone' => $request->phone,
            'delivery_address' => $request->delivery_address,
            'comment' => $request->comment,
            'name_user' => $request->name_user,
            'status' => Lang::get('base.status') ,
        ];

     return  Order::create($data);

    }



}
