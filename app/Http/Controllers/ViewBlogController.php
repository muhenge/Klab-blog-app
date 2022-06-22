<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\article;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class ViewBlogController extends Controller
{
    function ViewBlogfn($id){
       $data=User::find($id)->getContent;
       return view('ViewBlog',compact('data'));
    }

    function selectBlog(){
        $datas = DB::select('SELECT * FROM articles where user_id = '.Auth::user()->id.'');
        return view("home",compact('datas'));
    }
}