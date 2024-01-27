<?php

namespace App\Services;

use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;

class CartService 
{   
    
    /**
     *  
     *
     * @param \Illuminate\Http\Request
     * @return 
     */
   public static function  store($request)
   {

    if (Auth::check())
    { 
        CartService::storeforAuth($request); 
        return 0;
    }
   
        $productId = $request->input('product_id');
        $sessionId = session()->getId();
        $guestSessionId = Cookie::get('guest_session_id');
    

    if (is_null($guestSessionId))
    {
        $minutes = 3*24*60;
        Cookie::queue(Cookie::make('guest_session_id', $sessionId, $minutes));
        $cart = new Cart();
        $cart->session_id = $sessionId;
        $cart->save();

        $cart->products()->attach($productId, ['quantity' => 1]);
    }
    else
    {
        //якщо товар вже додано то збільшити його кількість якщо якщо ні просто додати його 
        $cart = Cart::where('session_id', $guestSessionId)->first();
        $cartProduct = $cart->products->find($productId);
       
        if (is_null($cartProduct))
        {
            $cart->products()->attach($productId, ['quantity' => 1]);
        }
        else
        {
            $quantity = $cartProduct->pivot->quantity;
            $cartProduct->pivot->update(['quantity' => $quantity + 1]);
        }    
    }
   }  


 /**
     *  
     *
     * @param \Illuminate\Http\Request
     * @return 
     */

   public static function storeforAuth($request)
   {
     
    $productId = $request->input('product_id');
    // $sessionId = session()->getId();
    // $guestSessionId = Cookie::get('guest_session_id');

    $user = User::find(Auth::user())->first();
 
    if (is_null($user->cart))
    {
        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->session_id = 0;
        $cart->save();
        $cart->products()->attach($productId, ['quantity' => 1]);
      
    }
     else
    {
        //якщо товар вже додано то збільшити його кількість якщо якщо ні просто додати його 
        $cart = $user->cart;
        $cartProduct = $cart->products->find($productId);
    
        if (is_null($cartProduct))
        {
            $cart->products()->attach($productId, ['quantity' => 1]);
        }
        else
        {
            $quantity = $cartProduct->pivot->quantity;
            $cartProduct->pivot->update(['quantity' => $quantity + 1]);
        }    
    }

    
   }


}
