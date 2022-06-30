<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;  
use Illuminate\Support\Facades\Crypt;
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
        $results = DB::connection('mysql2')->table('information')->where('user', Auth::id())->limit(1)->get();
        return view('files.profile', compact('results'));
    }

    public function blog($id)
    {        
        $prodID = Crypt::decrypt($id);
        $results = DB::table('blogs')->find($prodID);
        return view('files.blog', compact('results'));
    }
    public function info()
    {        
        $results = DB::connection('mysql2')->table('information')->where('user', Auth::id())->limit(1)->get();
        return view('files.info',compact('results'));
    }

    public function save(Request $request)
    {
        $results = DB::connection('mysql2')->table('information')->where('user', Auth::id())->count();
        $validate = $request->validate([
            'age' => ['required'],
            'city' => ['required']
        ]);

        if ($results == 0) {
            DB::connection('mysql2')->table('information')->insert([
                'user' => Auth::id(),
                'age' => $request->input('age'),
                'city' => $request->input('city')
            ]);
            
            return redirect()->route('information');
        }else {
            DB::connection('mysql2')->table('information')
            ->where('user', Auth::id())
            ->update(['age' => $request->input('age'), 'city' => $request->input('city')]);

            return redirect()->route('information');
            
        }

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

    //Insert like in database
    public function likeBlog($id)
    {
        if (DB::connection('mysql2')->table('like')->where('user', Auth::id())->where('blog', $id)->count()==1) {
            DB::connection('mysql2')->table('like')
                    ->where('blog', $id)
                    ->where('user', Auth::id())
                    ->delete();
            return redirect()->route('dashboard');
        }elseif (DB::connection('mysql2')->table('like')->where('user', Auth::id())->where('blog', $id)->count()==0){
            DB::connection('mysql2')->table('like')->insert([
                'user' => Auth::id(),
                'blog' => $id,
            ]);
    
            return redirect()->route('dashboard');
        }
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

    //Insert like in database
    public function follow($id)
    {
        if (DB::table('followers')->where('followee', Auth::id())->where('follower', $id)->count()==1) {
            DB::table('followers')
                    ->where('follower', $id)
                    ->where('followee', Auth::id())
                    ->delete();
            return redirect()->route('users.all');
        }elseif (DB::table('followers')->where('followee', Auth::id())->where('follower', $id)->count()==0){
            DB::table('followers')->insert([
                'followee' => Auth::id(),
                'follower' => $id,
            ]);
    
            return redirect()->route('users.all');
        }
    }
}   
