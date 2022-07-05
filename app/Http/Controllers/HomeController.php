<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    //
    public function index()
    {
        # code...
        $posts = Post::all();
        $users = User::all();
        // dd($posts);
        return view('home', ['posts' => $posts, 'users' => $users]);
    }
}
