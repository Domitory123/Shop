<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegistrationRequest;
use App\Services\AuthService; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;


class UserController extends Controller
{
        /**
     * registration
     *
     * @param  App\Http\Requests\RegistrationRequest
     * @return \Illuminate\Http\Response
     */
    public function postSigUp(RegistrationRequest $request)
    { 
        $data = $request->validated();
        AuthService::postSigUp($data,$request);

        return redirect()->route('home');
    }

    /**
     * authorization
     *
     * @param  App\Http\Requests\AuthRequest
     * @return \Illuminate\Http\Response
     */
    public function postSigin(AuthRequest $request)
    {
        $request->validated();

        if (AuthService::postSigin($request)) {
            return redirect()->back()->withInput($request->only('email'))->withErrors([
                'email' => Lang::get('auth.myfailed'),]); 
        }
        
        return redirect()->route('home');
    }

    /**
     * authorization page
     *
     * @param  
     * @return \Illuminate\Http\Response
     */
    public function getSigin()
    {
        return view('user.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
   
   /**
     * registration page
     *
     * @param 
     * @return \Illuminate\Http\Response
     */
    public function getSigUp()
    {
        return view('user.registration');
    }

  // продажі, дохід, кількість користувачів 
    public function admin()
    {

        $dayAgo = Carbon::now()->subDay();
        $orders = Order::where('created_at', '>=', $dayAgo)->get();
        $countUser = User::count();
       
        $totalPrice = 0;
        $quantity = 0;

         foreach ($orders as $order) {
            foreach ($order->products as $product) {
                 $quantity += $product->pivot->quantity;
                 $totalPrice += $product->pivot->price;
            }
         }
       
        return view('admin.statistic' ,compact('quantity','totalPrice','countUser' ));
    }



    
}
