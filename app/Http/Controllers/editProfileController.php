<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class editProfileController extends Controller
{
 public function editprofile(user $user){
   
    return view('editprofile', ['user' => $user]);
 }
 public function update(user $user, Request $request){

   $attribute = $request->validate([
      'email' => ['required','email','unique:users,email,'.$user->id],
      'name' => ['required','string','max:25','min:3','unique:users,name,'.$user->id],
      // 'password' => 'required|min:6|max:10',
      // 'profile' =>'required|image'
   ]);

   $user->name=$request->name;
   $user->email=$request->email;
   // $user->profile=$profile;
   // $user->password=Hash::make($request->password);
   $user->save();

   return redirect('/profile')->with('success','profile updated successfull');
 }
}
