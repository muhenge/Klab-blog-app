<?php

namespace App\Http\Controllers;

use App\Models\Artical;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticalCtrl extends Controller
{

    public function index()
    {
        $articals= auth()->user()->articals;
      return view('articalList',['articals'=>$articals]);
    }


    public function create()
    {
     return view('publish');
    }

   
    public function store(Request $request)
    {
        $artical = new Artical();
        $artical->title=$request->input('title');
        $artical->content=$request->input('content');
        $artical->user_id=Auth::user()->id;
        $artical->save();
        return redirect()->route('artical.create')->with('msg','Artical created');
    }

    
    public function show($id)
    {
        $artical = Artical::findOrFail($id);
        return view('singleArtical',['artical'=>$artical]);
    }

    
    public function edit($id)
    {
        $artical = Artical::findOrFail($id);
        return view('edit', ['artical' => $artical]);
    }

    
    public function update(Request $request, $id)
    {
        $data=['title'=> $request->input('title'),'content'=>$request->input('content')];
        Artical::where('id',$id)->update($data);
        return redirect()->route('artical.index')->with('msg','Updated successefully');
    }

   
    public function destroy($id)
    {
        if(Artical::destroy($id)){
            return redirect()->back();
        }
    }
}
