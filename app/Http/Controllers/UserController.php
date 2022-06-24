<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

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
        $data->validate(
            [
                'name' => 'required',
                'username' => 'required',
                'email' => 'required|email',
                'profile' =>'required|image|mimes:png,jpg,jpeg,gif|max:2048',
            ]
        );
        $user = user::find($id);

        if($data->hasFile('profile'))
        {
                    $path = $data->file('profile')->store('public/images');
                    $name = $data->file('profile')->getClientOriginalName();
                    $user->profile = $name;
                }


        $user->name = $data->name;
        $user->username = $data->username;
        $user->email = $data->email;
        // dd($data->profile);
        // if($data->profile == '')
        // {
        //     $user->profile = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpCKq1XnPYYDaUIlwlsvmLPZ-9-rdK28RToA&usqp=CAU';
        // }
        // else
        // {

        //     dd($data->profile);
        //     $user->profile = $data->file('profile')->store('images');
        // }
        
        $user->save();
        return redirect()->route('userShow',$id)->with('success', 'Information updated successful');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }
}
