<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutCtrl extends Controller
{
    public function logout()
    {
        Session::flush();
        Auth::logout();
       return redirect()->route('loginForm');
    }
}
