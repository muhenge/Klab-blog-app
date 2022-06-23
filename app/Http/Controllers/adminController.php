<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function admin(){
        return view('admindash')->with('users',User::all());
    }
}
