<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use App\Services\CartService;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = null;

        if (Auth::check())
        {
            if (!is_null(Auth::user()->cart))
            {
                $cart = Auth::user()->cart;
            }
        }
        else 
        {
            $guestSessionId = Cookie::get('guest_session_id');
            $cart = Cart::where('session_id', $guestSessionId)->first();   
        }
            
        return view('cart.index', compact('cart'));
    }

    public function indexForAuth()
    {        
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
        CartService::store($request);
        return redirect()->route('cart.index');
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
