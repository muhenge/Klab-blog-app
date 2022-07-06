<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Mail\NewMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

 
class PostController extends Controller
{
   
   public function index()
   {
       //
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('addpost');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
    
   

        $req = new Post;
        $req->title=$request->input('title');
        $req->description=$request->input('description');
        $req->user_id=Auth::user()->id;
        if($request->image)
        {
            $file = $request->image;
            $extenstion = $request->image->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $request->image->move('public/images/', $filename);
        }
        $req->image = $filename;

        
        $req->save();
        Mail::to(Auth::user()->email)->send(new NewMail());
        return redirect()->back()->with('status','Student Added Successfully');


        
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show()
   {
       $query=Post::all();
       
       return view('home',compact('query'));
    //    return response()->json($query);
   }
   public function showPost()
   {
        $q=Auth::user()->id;
       $query=Post::all()->where("user_id",$q);
       
        return view('addPost',compact('query'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
       //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       // echo $id;
    //    DB::delete('DELETE FROM posts WHERE id = ?', [$id]);
    //    echo ("User Record deleted successfully.");
    //    $query=posts::all();
       
    //    return view('select',compact('query'));
   }

   public function likePost($id)
    {
        $post = Post::find($id);
        $post->like();
        $post->save();

        return redirect()->route('post.list')->with('message','Post Like successfully!');
    }

    public function unlikePost($id)
    {
        $post = Post::find($id);
        $post->unlike();
        $post->save();
        
        return redirect()->route('post.list')->with('message','Post Like undo successfully!');
    }
}
