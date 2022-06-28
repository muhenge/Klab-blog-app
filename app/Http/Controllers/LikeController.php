<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class LikeController extends Controller
{
    public function index()
    {
        $likes = DB::table('likes')
        ->join('articles', function($join){
            $join->on('articles.id', '=', 'likes.article_id');
        })->get();
        return($likes);
        // $likes = Like::all()->where('article_id', $like);
        // $likes = Like::find('article_id');
        // $count = collect($likes)->count();
        // return($count);
    }
}
