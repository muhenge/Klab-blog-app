<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Log;

class RegisterCtrl extends Controller
{
 

    public function show(){
        return view('register');
    }

    public function register(RegisterRequest $request)
    {
        $data=[
            'username'=>$request->input('username'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        if($request->file('profile')){
            $file = $request->file('profile');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('users'), $filename);
            $data['profile']=$filename;
        }
        $user = User::create($data);
        auth()->login($user);
        return redirect()->route('home');
    }
}
