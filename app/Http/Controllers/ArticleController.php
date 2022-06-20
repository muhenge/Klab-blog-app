<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller

{

    function   index()

    {

        $data=article::all()->getAlert();

        return  $data;

    }
     
function store(Requst  $request)
{

    $AlertType='success';
    $validator=Validator::make($request->all(),[
        'title'=>'required|regex:/^[a-zA-Z\s]*$/',
        'contennt'=>'required|string|min:10|max:350',
        'user_id'=>'required'|digits
    ])->validate();
    $data=new article();
    $data->title=$request->input('title');
    $data->content=$request->input('content');
    $data->content=$request->input('user_id');
    if(DB::table('articles')->where('title',$data->title)->exists())
    {
        return back()->with('fail','data Exists');

    }

   else{
    $data->save();
    Alert::success('this is success alert');
    


     }
}


}
