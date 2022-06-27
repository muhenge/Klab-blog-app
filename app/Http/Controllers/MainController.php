<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;

class MainController extends Controller
{
    public function index() 
    {
        $results = DB::table('blogs')->orderBy('id','DESC')->get();
        return view('files.dashboard', compact('results'));
    }

    public function users()
    {        
        $results = DB::table('users')->orderBy('name','ASC')->get();
        return view('files.users', compact('results'));
    }

    public function profile()
    {
        $users = Auth::user();
        return view('files.profile', compact('users'));
    }

    public function blog($id)
    {        
        $results = DB::table('blogs')->find($id);
        return view('files.blog', compact('results'));
    }

    //Insert blog in database
    public function saveBlog(Request $request)
    {
        $fileimg = $request->file('image');
        $path = $request->file('image')->move('uploads/', $request->user()->name.rand(1,1000)."-blog.".$fileimg->extension());
        $user = new Blog;
    
        $user->title = $request->input('title');
        $user->user_id = Auth::id();
        $user->content = $request->input('area');
        $user->image = $path;

        $user->save(); 

        return redirect()->route('dashboard');
    }

    //Change user info
    public function changeInfo(Request $request)
    {
        if ($request->file('image')) {
            $fileimg = $request->file('image');
            $path = $request->file('image')->move('profile/', $request->user()->name.rand(1,100)."-profile.".$fileimg->extension());
            
            DB::table('users')
            ->where('id', Auth::id())
            ->update(['profile' => $path, 'email' => $request->input('email')]);
            return redirect()->route('user.profile');
        }else {
            DB::table('users')
            ->where('id', Auth::id())
            ->update(['email' => $request->input('email')]);
            return redirect()->route('user.profile');
        }
    }

    //change password
    public function changePasscode(Request $request)
    {
        $validate = $request->validate([
            'old' => ['required'],
            'entered' => ['required','same:old'],
            'password' => ['required','min:8','alpha_num'],
            'confirm_password' => ['required ',' same:password'],
        ]);
    }

    //form to editblog
    public function updateForm($id)
    {      
        $results = DB::table('blogs')->find($id);
        return view('files.updateForm', compact('results'));
    }

    //edit blog
    public function blogUpdate(Request $request)
    {
        if ($request->file('image')) {
            $fileimg = $request->file('image');
            $path = $request->file('image')->move('uploads/', $request->user()->name.rand(1,1000)."-blog.".$fileimg->extension());
            
            DB::table('blogs')
            ->where('id', $request->input('id'))
            ->update(['image' => $path, 'title' => $request->input('title'), 'content' => $request->input('area')]);
            return redirect()->route('dashboard');
        }else {
            DB::table('blogs')
            ->where('id', $request->input('id'))
            ->update(['title' => $request->input('title'), 'content' => $request->input('area')]);
            return redirect()->route('dashboard');
        }
    }

    public function blogDelete(Request $request)
    {
        DB::table('blogs')
                ->where('id', $request->input('id'))
                ->delete();
        return redirect(route('dashboard'));
    }

    public function read($id)
    {
        $results = DB::table('blogs')->where('user_id', $id)->get();
        return view('files.dashboard', compact('results'));
    }
}   
