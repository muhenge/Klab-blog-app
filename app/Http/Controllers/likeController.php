<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\like;
use App\Models\article;
use DB;
use Auth;
class likeController extends Controller
{
    public  function likeAction(){
        $data=DB::table('likes')->where('user_id',Auth::id())->get();
         return $data;
      }
      function store(Request $request){
       // $data=find(Auth::id());


       $like=DB::table('likes')->where('user_id',Auth::id())->where('article_id',$request->id)->count();
        if(DB::table('likes')->where('user_id',Auth::id())
                ->where('article_id',$request->id)->exists())
                {
                $query=DB::table('likes')->where('user_id',Auth::id())->where('article_id',$request->id)->delete();
                $data=article::find($request->id);
                    
                       return back();
                    
            }
            else{
                $query=like::create([
                    'user_id'=>Auth::id(),
                    'article_id'=>$request->id,
                ]);
                $data=article::find($request->id);
        //         $like=DB::table('likes')->where('user_id',Auth::id())->get();
        //         $like=count($like)
        return redirect(route('home'));
         }

      }
}
