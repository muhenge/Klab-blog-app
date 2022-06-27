<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class singleController extends Controller
{
 public function displayone($usern){
    $posts = DB::table('blog')->where('user_id',$usern)->get(); 
    return view('single')->with('posts',$posts) ;               
                        
 }
}
