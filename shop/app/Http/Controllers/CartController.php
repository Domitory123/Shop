<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CartService;
use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    /**
     * вивід корзини для зареєстрованого і не зареєстрованого користувача 
     */
    public function index()
    {
        $cart = null;

        if (auth()->check()) {
            if (!is_null(auth()->user()->cart)) {
                $cart = auth()->user()->cart;
            }
        } else {      
         //cookie(); не повертає значення guest_session_id тому використовую Cookie::get
            $guestSessionId = Cookie::get('guest_session_id');
            $cart = Cart::where('session_id', $guestSessionId)->first();   
        }
            
        return view('cart.index', compact('cart'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {      
        if (auth()->check()) { 
            $this->storeforAuth($request->input('product_id')); 
            return redirect()->route('cart.index');
        }

        $productId = $request->input('product_id');
        $sessionId = session()->getId();
        $guestSessionId = Cookie::get('guest_session_id');
 
        if (is_null($guestSessionId)) {        
            $minutes = config('custom.cookie_lifetime');
            cookie()->queue('guest_session_id', $sessionId, $minutes);
            $cart = new Cart();
            $cart->session_id = $sessionId;
            $cart->save();
            $cart->products()->attach($productId, ['quantity' => 1]);
        } else {
           
            //якщо товар вже додано то збільшити його кількість якщо якщо ні просто додати його 
            $cart = Cart::where('session_id', $guestSessionId)->first();

            $cartProduct = $cart->products->find($productId);
        
            if (is_null($cartProduct)) {
                $cart->products()->attach($productId, ['quantity' => 1]);
            } else {
               // $quantity = $cartProduct->pivot->quantity;
              // $cartProduct->pivot->update(['quantity' => $quantity + 1]);
                $cartProduct->pivot->increment('quantity');

            }    
        }
        
        return redirect()->route('cart.index');
    }
   
   /**
     *  
     *
     * @param 
     * @return 
     */

     public static function storeforAuth($productId)
     { 
        $user = auth()->user();
    
        if (is_null($user->cart)) {
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->session_id = 0;
            $cart->save();
            $cart->products()->attach($productId, ['quantity' => 1]);  
        } else {
            $cart = $user->cart;
            $cartProduct = $cart->products->find($productId);
        
            if (is_null($cartProduct)) {
                $cart->products()->attach($productId, ['quantity' => 1]);
            } else {
              //  $quantity = $cartProduct->pivot->quantity;
                $cartProduct->pivot->increment('quantity');
            }    
        }
     }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
