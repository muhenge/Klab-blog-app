<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logoutController extends Controller
{
    public function perform(){
        Session::flush();
        Auth::logout();
        return redirect('/welcome');
    }
}
