<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function userprofile(){
        return view('profile')->with('users',User::all());
    }
}
