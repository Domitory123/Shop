<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegistrationRequest;
use App\Services\AuthService; 
use Illuminate\Support\Facades\Lang;

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
        auth()->logout();
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

 


    
}
