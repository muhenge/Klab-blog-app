<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\user;

class ArticleController extends Controller
{
    public function index()
    {
        $user = Auth()->user()->id;
        $articles = Article::all()->where('user_id', $user);
        // return($articles);
        return view('articles.index', compact('articles'));
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
            'content'=>'required|string',
        ])->validate();

        Article::create([
            'title' => $data['title'],
            'content' =>$data['content'],
            'user_id' =>$data['user_id'],
        ]);
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
        $article = Article::find($id);
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
        $articles = Article::find($id);
        return view('articles.content', compact('articles'));
    }
}
