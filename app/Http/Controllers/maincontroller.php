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
        $uploaded = User::uploadImage($request->file('profile'));
        $User = new User;
        $User->name=$request->name;
        $User->email=$request->email;
        $User->profile=$uploaded;
        $User->password=Hash::make($request->password);
       $save=$User->save();
       
       return redirect('/login');
       if ($save) {
        return redirect()
            ->back()
            ->with('success', 'your account has been created successfully!');
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
            if(auth()->user()->id == 2){
                return redirect('/admin')->with('success','welcome Admin');   
            }
            else{
                return redirect('/')->with('success','welcome');
            }
            

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
