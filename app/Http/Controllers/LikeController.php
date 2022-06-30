<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Models\User;

class LikeController extends Controller
{
    public function like($id)
    {
        $user_id = Auth()->user()->id;
        Like::create([
            'likes' => 1,
            'dislikes' => 0,
            'article_id' => $id,
            'user_id' => $user_id,
        ]);
        return redirect()->route('articleContent', $id);
        
    }

    public function likeAll($id)
    {
        $user_id = Auth()->user()->id;
        Like::create([
            'likes' => 1,
            'dislikes' => 0,
            'article_id' => $id,
            'user_id' => $user_id,
        ]);
        return redirect()->route('articlesAll');
        
    }

    public function Dislike($id)
    {
        $user_id = Auth()->user()->id;
        Like::create([
            'likes' => 0,
            'dislikes' => 1,
            'article_id' => $id,
            'user_id' => $user_id,
        ]);
        return redirect()->route('articleContent', $id);
    }

    public function DislikeAll($id)
    {
        $user_id = Auth()->user()->id;
        Like::create([
            'likes' => 0,
            'dislikes' => 1,
            'article_id' => $id,
            'user_id' => $user_id,
        ]);
        return redirect()->route('articlesAll');
    }
}
