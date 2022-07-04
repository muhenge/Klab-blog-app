<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
Use App\Models\Follow;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function index()
    {
        $follow = Follow::all();
        $count_follow = collect($follow)->count();

        $users = User::all()
        ->where('id', '!=', Auth()->user()->id);
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
        $decrypted = Crypt::decryptString($id);

        $user = user::find($decrypted);

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


    // Sanctum Authentication with JWT Token

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password))
        {
            return response([
                'message' => ['Invalid email or password']
            ], 404);
        }
        $token = $user->createToken('my-blog-app-token')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }

    public function AllUser()
    {
        $users = User::all()
        ->where('id', '!=', Auth()->user()->id);
        return response($users, 200);
    }

    public function RegisterUser(Request $data)
    {

        // return  Validator::make($data, [
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|unique:users,email',
        //     'password' => 'required|string|confirmed'
        // ]);
        $user =  User::create([
            'name' => $data['name'],
            'username' =>$data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $token = $user->createToken('mytoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }

    public function logout(Request $request)
    {
        Auth()->user()->tokens()->delete();
        return [
            'message' => 'Logged out'
        ];
    }
}
