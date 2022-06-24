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
function index(Request $request) {

    return 'hello';
}
   
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
        'picture'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
    ])->validate();
    // $path = $request->file('picture')->store('public/image');
    $input = $request->all();
    if ($image = $request->file('picture')) {

        $destinationPath = 'image/';

        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

        $image->move($destinationPath, $profileImage);

        $input['picture'] = "$profileImage";

    }

    article::create($input);
Alert::toast('Article created successfully', 'success');
return redirect(route('home'));
}
function destroy($id){
    $AlertType='warning';

    $querry=article::find($id)->delete();
    if($querry=="true")
    {
     Alert::toast('Article deleted successfully', 'warning');
   return redirect(route('home'));
    }
    
}

}




