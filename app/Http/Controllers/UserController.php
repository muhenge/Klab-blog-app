<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
 function  update(Request $request){
  $AlertType='success';
  $input= $request->all();
  if ($image = $request->file('picture')) {

      $destinationPath = 'image/';

      $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

      $image->move($destinationPath, $profileImage);

      $input['picture'] = "$profileImage";

  }
  $data=User::find(Auth::user()->id);
  $data->update($input);
  Alert::toast('Profile update successfully', 'success');
    return redirect(route('profile'));

  

 
}
}
