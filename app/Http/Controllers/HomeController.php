<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use App\Models\article;
use App\Models\like;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $AlertType='success';

      
         $data=DB::select('select * from users where id != '.Auth::user()->id.'');
         //$data=User::all();

         $count=1;

        $dat=DB::select('SELECT * from  articles where user_id='.Auth::user()->id.'');
        $count=count($dat);
        $like=DB::table('likes')->where('user_id',Auth::user()->id)->count();
        
        if($count>=1)

        {

            return view('home',compact(['data','dat','count','like']));
        }
        else{

            $AlertType='warning';

         Alert::toast('Is  good to create  articles  for you?','warning');

         return view('home',compact(['data','dat','count']));
        }
       
       
    } 
    function profile(){
        $aa=user::all();
        return view('TestMe.changeprofile',compact('aa'));    // change profile to current
}
}