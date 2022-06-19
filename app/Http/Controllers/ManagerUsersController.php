<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ManagerUsersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {
        # code...
        if (auth()->user()->role != 'admin') {
            return redirect('/');
        }
        $users = User::all();
        return view('managerUsers', ['users' => $users]);
    }
}
