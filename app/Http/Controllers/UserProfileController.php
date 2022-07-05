<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    //
    public function index($id)
    {
        # code...
        $user = User::get()->where('id', $id);
        $posts = Post::get()->where('user_id', $id);
        // dd($posts);
        return view('auth.userProfile', ['user' => $user, 'posts' => $posts]);
    }
}
