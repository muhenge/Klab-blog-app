<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginCtrl extends Controller
{
   
    public function show(){
        return view('login');
    }

    public function login(LoginRequest $request){

        $crendetials= $request->getCredentials();
        if(!Auth::validate($crendetials)){
            return redirect()->back();
        }

       $user= Auth::getProvider()->retrieveByCredentials($crendetials);
       Auth::login($user);
       return redirect()->route('home');
    }
}
