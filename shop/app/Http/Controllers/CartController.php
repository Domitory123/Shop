<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CartService;
use App\Models\User;
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
            $guestSessionId = Cookie::get('guest_session_id');
            $cart = Cart::where('session_id', $guestSessionId)->first();   
        }
            
        return view('cart.index', compact('cart'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {      
        if (auth()->check()) { 
            $this->storeforAuth($request); 
            return redirect()->route('cart.index');
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
        } else 
        {
            //якщо товар вже додано то збільшити його кількість якщо якщо ні просто додати його 
            $cart = Cart::where('session_id', $guestSessionId)->first();
            $cartProduct = $cart->products->find($productId);
        
            if (is_null($cartProduct)) {
                $cart->products()->attach($productId, ['quantity' => 1]);
            } else {
                $quantity = $cartProduct->pivot->quantity;
                $cartProduct->pivot->update(['quantity' => $quantity + 1]);
            }    
        }
        
        return redirect()->route('cart.index');
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
        $user = auth()->user();
    
        if (is_null($user->cart)) 
        {
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->session_id = 0;
            $cart->save();
            $cart->products()->attach($productId, ['quantity' => 1]);  
        } else 
        {
            $cart = $user->cart;
            $cartProduct = $cart->products->find($productId);
        
            if (is_null($cartProduct)) {
                $cart->products()->attach($productId, ['quantity' => 1]);
            } else {
                $quantity = $cartProduct->pivot->quantity;
                $cartProduct->pivot->update(['quantity' => $quantity + 1]);
            }    
        }
     }
  
  
  






    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
