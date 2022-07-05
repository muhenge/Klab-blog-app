<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        # code...
        return view('posts/addPost');
    }

    public function save(Request $request)
    {
        # code...
        $this->validate(
            $request,
            [
                'title' => 'required|max:200',
                'content' => 'required|min:10',
                'image' => 'required'
            ]
        );
        $imagePath = $request->image->store('/uploads', 'public');
        $request->user()->posts()->create(
            [
                'title' => $request->title,
                'content' => $request->content,
                'image' => $imagePath
            ]
        );

        return redirect()->route('home');
    }
}
