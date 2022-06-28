<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\user;
use App\Models\Like;

class ArticleController extends Controller
{
    public function index()
    {
        $user = Auth()->user()->id;
        $articles = Article::all()->where('user_id', $user);
        return view('articles.index', compact('articles'));
    }

    public function indexAll()
    {
        $articles = Article::all();
        // return($articles);
        return view('articles.indexAll', compact('articles'));
    }

    public function create()
    {
        $user = Auth()->user()->id;
        return view('articles.create', compact('user'));
    }

    public function store(Request $data)
    {
        $message = validator::make($data->all(),[
            'title' =>'required|max:75|regex:/^[a-zA-Z\s]*$/',
            'photo' =>'image|mimes:png,jpg,jpeg,gif|max:2048',
            'content'=>'required|string',
        ])->validate();

        if($data->hasFile('photo'))
        {
            Article::create([
                'title' => $data['title'],
                'content' =>$data['content'],
                'photo' => $data->file('photo')->getClientOriginalName(),
                'user_id' =>$data['user_id'],
            ]);  

            $image = $data->file('photo');
            $destinationPath = 'images/article/';
            $profileImage = $data->photo->getClientOriginalName();
            $image->move($destinationPath, $profileImage);
        }
        else
        {
            Article::create([
                'title' => $data['title'],
                'content' =>$data['content'],
                // 'photo' => "",
                'user_id' =>$data['user_id'],
            ]);
        }
        return redirect()->route('articlesIndex')->with('success', 'Article stored successful');
    }

    public function show($id)
    {
        return('show here');
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit', compact('article'));
    }

    public function update(Request $data, $id)
    {
        $message = validator::make($data->all(),[
            'title' =>'required|max:75|regex:/^[a-zA-Z\s]*$/',
            'photo' =>'image|mimes:png,jpg,jpeg,gif|max:2048',
            'content'=>'required|string',
        ])->validate();

        $article = Article::find($id);
        if($data->hasFile('photo'))
        {
            $image = $data->file('photo');
            $destinationPath = 'images/article/';
            $profileImage = $data->photo->getClientOriginalName();
            $image->move($destinationPath, $profileImage);
            $name = $data->file('photo')->getClientOriginalName();
            $article->photo = $name;
                }
        $article->title = $data['title'];
        $article->content = $data['content'];
        $article->save();
        return redirect()->route('articlesIndex')->with('success', 'Article updated successful');
    }

    public function destroy(Article $article, $id)
    {
        $article->find($id)->delete();
        return redirect()->route('articlesIndex')->with('success', 'Article deleted successful');
    }

    public function title($id)
    {
        
        $articles = Article::all()->where('user_id', $id);
        return view('articles.articles', compact('articles'));
    }

    public function content($id)
    {
        //user likes
        $user_id = Auth()->user()->id;
        $user = Like::all()->where('user_id', $user_id)->where('article_id', $id)->where('likes', '<=', 1);
        $user_count = collect($user)->count();

        //user dislike
        $user2 = Like::all()->where('user_id', $user_id)->where('article_id', $id)->where('dislikes', 1);
        $user_count2 = collect($user2)->count();

        // return($user2);

        //count likes
        $likes = Like::all()->where('article_id', $id)->where('likes', 1);
        $count = collect($likes)->count();

        // count dislikes
        $likes2 = Like::all()->where('article_id', $id)->where('dislikes', 1);
        $count2 = collect($likes2)->count();

        $articles = Article::find($id);
        return view('articles.content', compact('articles','count', 'count2', 'user_count', 'user_count2'));
    }
}
