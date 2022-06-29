<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use App\Models\likes;


class LikesController extends Controller
{
    /*
     */
    public function like(request $request)
    {
        
        $liked= new likes();
        $liked->blog_id=$request->blog_id;
        $liked->user_id= auth()->user()->id;
        $liked->save();
        return redirect('/')->with('count',likes::all());
      
    }


    public function destroy(request $request)
    {
    $request->user()->likes()->where('blog_id',$request->blog_id)->delete();
    return back();
    }
}
