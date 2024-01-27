<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function buy()
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

      return view('order.buy',compact('cart'));
    }

    public function order(Request $request)
    {
        $idUser=0;
        if(Auth::check())
        {
            $user = User::find(Auth::user())->first();
            $idUser=$user->id;
        }
        else
        {
            $cart = Cart::where('session_id', Cookie::get('guest_session_id'))->first();
            Cookie::forget('guest_session_id');
        }
       
            $data = [
                'user_id' =>  $idUser,
                'phone' => $request->phone,
                'delivery_address' => $request->delivery_address,
                'comment' => $request->comment,
                'name_user' => $request->name_user,
                'status' => Lang::get('base.status') ,
            ];
    
        
    $order = Order::create($data);
          
     foreach ($user->cart->products as $product) {
        $order
        ->products()
        ->attach($product, ['quantity' => $product->pivot->quantity, 'price' => $product->price*$product->pivot->quantity]);
     }
  
//розділити на зареєстрованого і ні

       if (Auth::check()) {
           $user->cart->delete();
       } else {
           Cart::where('session_id', Cookie::get('guest_session_id'))->delete();
           Cookie::forget('guest_session_id');
       }

       return redirect()->route('order.show');
    }
  
    public function show()
    {
        $orders = Auth::user()->orders;
        return view('order.order' ,compact('orders') );
    }

 


}
