<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function Index()
    {
        return view('files.login');
    }  
    
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            return redirect()->route('dashboard');

        }
 
        return back()->withErrors([ 
            'login' => 'Credentials do not match',
        ]);
    }


    public function reg()
    {
        return view('files.register');
    }

    public function register(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required','regex:/^[a-zA-Z ]+$/'],
            'email' => ['required','email', 'unique:users'],
            'password' => ['required','min:8','alpha_num'],
            'confirm_password' => ['required ',' same:password'],
        ]);

        
        $user = new User;
    
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        $user->save(); 

        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        return redirect()->route('login');
    }
}
