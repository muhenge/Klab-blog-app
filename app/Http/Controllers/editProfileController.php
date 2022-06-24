<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class editProfileController extends Controller
{
 public function editprofile(user $user){
   
    return view('editprofile', ['user' => $user]);
 }
 public function update(user $user){

   $attribute=$user->validate([
      'name' => 'required|string|unique:users|max:25|min:3',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:6|max:10',
      'profile' =>'required|image'
   ]);
 $user->update( $attribute);
 return redirect()->back()->with('success','profile updated successfull');
 }
}
