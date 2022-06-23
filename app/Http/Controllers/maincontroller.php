<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Resources\views\auth\login;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class maincontroller extends Controller
{
    public function login(){
        return view('auth/login');
    }
    public function rigister(){
        return view('auth/signup');
    }
    public function save(request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|unique:users|max:25|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:10',
            
        ]);
        $profile=$request->file('profile')->store('image');
        $User = new User;
        $User->name=$request->name;
        $User->email=$request->email;
        $User->profile=$profile;
        $User->password=Hash::make($request->password);
       $save=$User->save();
       
       return redirect('/login');
       if ($save) {
        return redirect()
            ->back()
            ->with('success', 'Your message has been sent successfully!');
    }
    
    return redirect()
        ->back()
        ->withInput()
        ->with('error', 'There was a failure while sending the message!');
    }
    public function check(request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|max:10|min:5'
        ]);

        if(auth()->attempt(array('email'=> $request->email,'password'=>$request->password))){
            return redirect('/new');

        }else{
            
            return redirect()->back()->with('errorer','password is incorrect');
        }

        // $userinfo=User::where('email',$request->email)->first();
        // if(!$userinfo){
        //     return redirect()->back()->with('error','Sorry..! your email is not valid');
        // }
    
        //     else{
        //         if($userinfo->password==$request->password){
        //             session::put('user',$userinfo->name);
        //             return redirect('/new');
        //         }
        //         else{
        //             return redirect()->back()->with('errorer','password is incorrect');
        //         }
        //     }
        
    }
}
