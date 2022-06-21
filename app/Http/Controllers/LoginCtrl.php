<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginCtrl extends Controller
{
    public function show(){
        return view('login');
    }

    public function login(LoginRequest $request){
        $crendetials= $request->getCredentials();
        if(!Auth::validate($crendetials)){
            return view('login');
        }

       $user= Auth::getProvider()->retrieveByCredentials($crendetials);
       Auth::login($user);
       return view('welcome');
    }
}
