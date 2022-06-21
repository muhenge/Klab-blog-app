<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\article;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use SweetAlert;

class ArticleController extends Controller

{

   
    function articleList($id)
    {
        $AlertType='success';
        $data=User::find($id)->getAlert;
        
      Alert::toast('Your Data Fetched Successfully!','success');
        return view('TestMe\userblogdetails',compact('data'));
    }

    function articleform(){

        return  view('article');
    }
     
function store(Request  $request)
{

    $AlertType='success';
    $validator=Validator::make($request->all(),[
        'title'=>'required|regex:/^[a-zA-Z\s]*$/',
        'content'=>'required|string|min:10|max:350',
        
    ])->validate();
  
   
$data=article::create([

    'title'=>$request->title,
    'content'=>$request->content,
    'user_id'=>1
]);
Alert::toast('Article created successfully', 'success');
return back();
}

}




