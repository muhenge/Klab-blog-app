<?php

namespace App\Http\Controllers;
use auth;

use App\Models\blog;
use App\Models\User;
use Illuminate\Http\Request;

class formController extends Controller
{
    public static function addnew(){
        return view('form');
    }
    public function create(Request $request){
       $blog=$request->validate([
        'title'=>'required|max:75',
        'Description'=>'required|max:400',
        'image'=>'required|mimes:jpeg,bmp,png,jpg'
       ]);
       $image=$request->name. '.'.$request->image->extension();
       $request->image->move(public_path('images'),$image);
       $blogs=new blog();
       $blogs->title=$request->title;
       $blogs->Description=$request->Description;
       $blogs->image=$request->image;
       $blogs->user_id=auth()->user()->id;

      $blogs->save();

return redirect('/');
      }

public function destroy(blog $blog ,$id)
{
    $row=blog::destroy($id);

    return redirect('/');
}
}