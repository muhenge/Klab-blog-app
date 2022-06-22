<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\article;
use Illuminate\Support\Facades\Auth;
use DB;

class BlogController extends Controller
{
   function viewusers(){
        $user = DB::select('SELECT * FROM users where id != '.Auth::user()->id.'');
        return view("home",compact('user'));
   }

   function AddArticlefn(Request $req){

   
        $article = $req->input('title');
        $content = $req->input('content');
        $sql=DB::insert('insert into articles  (title,content,user_id) values ("'.$article .'","'.$content .'",'.Auth::user()->id.')');
        
    
            if($sql){
                return redirect('home')->with('blog_inserted','New content add successfully !');
            }else{
                return redirect('home')->with('blog_not_inserted','no data inserted !');
            }

        }
            
}
