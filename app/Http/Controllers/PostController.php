<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{

    public function index($id)
    {
        # code...
        $posts = Post::get()->where('id', $id);
        $users = User::get();
        return view('posts/index', ['posts' => $posts, 'users' => $users]);
    }
}
