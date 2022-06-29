<?php

namespace App\Http\Controllers;

use App\Events\Illuminate\Auth\Events\ArticleCreated;
use App\Jobs\SendEmailJob;
use App\Mail\MyMail;
use App\Models\Artical;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class ArticalCtrl extends Controller
{

    public function getUsers(){
        $users= User::all();
        $articles = auth()->user()->articals;

        return view('dashboard',['users'=>$users, 'articles'=> $articles]);
    }

    public function index()
    {

      $articals= Artical::all()->sortBy('created_at',0,true); 
      return view('welcome',['articles'=>$articals]);
    }


    public function create()
    {
     return view('publish');
    }

   
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), ['title' => 'required|max:30', 'content' => 'required']);
        if($validation->fails()){
            return redirect()->back()->withErrors($validation);
        }
       
        $artical = new Artical();
        $artical->title=$request->input('title');
        $artical->content=$request->input('content');
        $artical->user_id=Auth::user()->id;

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('blogs'), $filename);
            $artical['image'] = $filename;
        }
        $artical->save();
        //event(new ArticleCreated(auth()->user()->email));
        $this->dispatch(new SendEmailJob(auth()->user()->email));
        return redirect()->route('artical.index')->with('msg','Artical created');
    }

    
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $artical = Artical::findOrFail($id);
        return view('singleArtical',['article'=>$artical]);
    }

    
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $artical = Artical::findOrFail($id);
        return view('edit', ['artical' => $artical]);
    }

    
    public function update(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $data=['title'=> $request->input('title'),'content'=>$request->input('content')];
        Artical::where('id',$id)->update($data);
        return redirect()->route('dashboard')->with('msg','Updated successefully');
    }

   
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        if(Artical::destroy($id)){
            return redirect()->back();
        }
    }
}
