<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\article;
use App\Models\User;
use App\Models\like;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use SweetAlert;
use  Mail;
use  App\Mail\TestMail;
use DB;
use Auth;
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
        'title'=>'required|regex:/^[a-zA-Z\s]*$/|min:30|max:100',
        'content'=>'required|string|min:20|max:350',
        'picture'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
    ])->validate();
    
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
function readMore($id,Request $request){
    $data=article::find($id);
    $like=DB::table('likes')->where('article_id',$request->id)->count();
            return view('TestMe\userblogmore',compact("like","data"));  

}

public function  sendEmail(){

    $details=[
        'title' =>'test email sentMessage',
        'body'=>'test email form  gustave'

    ];
Mail::to('mukunzigustavus@gmail.com')->send(new TestMail($details));
return 'email sentMessage';

}
}




