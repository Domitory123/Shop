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
     * 
     * @param  
     * @return 
     */
    public function office()
    { 
        return view('user.office');
    }


}
