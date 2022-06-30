<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\like;
use App\Models\article;
use DB;
use Auth;
use  Crypt;
class likeController extends Controller
{
    public  function likeAction(){
        $data=DB::table('likes')->where('user_id',Auth::id())->get();
         return $data;
      }
      function store(Request $request){
       // $data=find(Auth::id());

          $input=Crypt::decryptString($request->id);

       $like=DB::table('likes')->where('user_id',Auth::id())->where('article_id',$input)->count();
        if(DB::table('likes')->where('user_id',Auth::id())
                ->where('article_id',$input)->exists())
                {
                $query=DB::table('likes')->where('user_id',Auth::id())->where('article_id',$input)->delete();
                $data=article::find($input);
                    
                       return redirect('home');
                    
            }
            else{
                $query=like::create([
                    'user_id'=>Auth::id(),
                    'article_id'=>$input,
                ]);
                $data=article::find($input);
        //         $like=DB::table('likes')->where('user_id',Auth::id())->get();
        //         $like=count($like)
        return redirect(route('home'));
         }

      }
}
