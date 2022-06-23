<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class singleController extends Controller
{
 public function displayone(){
    
    $posts = DB::table('blog')->where('user_id', auth()->id())->get(); 
    return view('single')->with('posts',$posts) ;               
                        
 }
}
