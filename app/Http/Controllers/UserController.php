<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $data, $id)
    {
        $user = user::find($id);
        $user->name = $data->name;
        $user->username = $data->username;
        $user->email = $data->email;
        if($data->profile == '')
        {
            $user->profile = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpCKq1XnPYYDaUIlwlsvmLPZ-9-rdK28RToA&usqp=CAU';
        }
        else
        {
            // $data->profile->move(public_path('img/profile'), $profile);
            // $name = $data->file('profile')->getClientOriginalName();
            // $data->file('profile')->store('public/images');
            $user->profile = $data->profile;
        }
        
        $user->save();
        return redirect()->route('userShow',$id)->with('success', 'Information updated successful');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }
}
