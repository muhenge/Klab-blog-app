<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
Use App\Models\Follow;
use Illuminate\Support\Facades\Crypt;


class UserController extends Controller
{
    public function index()
    {
        $follow = Follow::all();
        $count_follow = collect($follow)->count();

        $users = User::all();
        // ->where('id', '!=', Auth()->user()->id);
        return view('users.index', compact('users','count_follow'));
    }

    public function edit($id)
    {
       
            $decrypted = Crypt::decryptString($id);
        $user = User::find($decrypted);
        return view('users.edit', compact('user'));
    }

    public function update(Request $data, $id)
    {
        $data->validate(
            [
                'name' => 'required',
                'username' => 'required',
                'email' => 'required|email',
                'profile' =>'image|mimes:png,jpg,jpeg,gif|max:2048',
            ]
        );
        $user = user::find($id);

        if($data->hasFile('profile'))
        {
            $image = $data->file('profile');
            $destinationPath = 'images/';
            $profileImage = $data->profile->getClientOriginalName();
            $image->move($destinationPath, $profileImage);
            $name = $data->file('profile')->getClientOriginalName();
            $user->profile = $name;
        }


        $user->name = $data->name;
        $user->username = $data->username;
        $user->email = $data->email;
        $user->save();
        return redirect()->route('userShow',$id)->with('success', 'Information updated successful');
    }

    public function show($id)
    {
        $decrypted = Crypt::decryptString($id);
        $user = User::find($decrypted);
        return view('users.show', compact('user'));
    }
}
