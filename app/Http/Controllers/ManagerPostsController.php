<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ManagerPostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {
        # code...
        if (auth()->user()->role == 'admin') {
            $posts = Post::all();
        } else {
            $posts = Post::get()->where('user_id', auth()->user()->id);
        }
        $users = User::all();
        return view('posts.managerPosts', ['posts' => $posts, 'users' => $users]);
    }
}
