<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

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
        $id=Auth::user()->id;
        $query=DB::select('SELECT * FROM users where id != '.$id.'');
       
       return view('home',compact('query'));
        // return view('home');
    }
    public function show($id)
    {
        
       
        $decrypt_val = Crypt::decrypt($id );
        $query=User::find($decrypt_val)->articals;
       
        return view('homePost',compact('query'));
    }
    public function likePost($id)
    {
        $decrypt_val = Crypt::decrypt($id );
        $post = Post::find($decrypt_val);
        if ($post->liked()){
        $post->unlike();
        $post->save();

        return redirect()->back();
        // return redirect()->route('viewpost',$id)->with('message','Post Like undo successfully!');
        // return rediview('homePost',compact('query'));
    }
        else
        {
        
        $post->like();
        $post->save();
        // $query=User::find($id)->articals;
        return redirect()->back();
        // return redirect()->route('viewpost',$id)->with('message','Post Like undo successfully!');
        // return rediview('homePost',compact('query'));
        // return view('homePost',compact('query'));
        }
        // echo($id);

        // return redirect()->route('viewpost', query)->with('message','Post Like successfully!');
    }

    public function unlikePost($id)
    {
        $post = Post::find($id);
        $post->unlike();
        $post->save();
        $query=User::find($id)->articals;
        return view('homePost',compact('query'));
        // return redirect()->route('viewpost')->with('message','Post Like undo successfully!');
    }
    public function redadmore($id){
        $query=User::find($id)->articals;
        
        return view('homePost',compact('query'));

    }

    public function users()
    {
        $users = User::get();
        return view('users', compact('users'));
    }

    public function user($id)
    {
        $user = User::find($id);
        return view('usersView2', compact('user'));
    }

    public function follwUserRequest(Request $request){


        $user = User::find($request->user_id);
        $response = auth()->user()->toggleFollow($user);


        return response()->json(['success'=>$response]);
    }
}