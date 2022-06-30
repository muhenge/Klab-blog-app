<?php

namespace App\Http\Controllers;

use App\Models\Artical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class LikerController extends Controller
{
    public function likeArticle(Request $request, $id){

        $article= Artical::findOrFail($id);
        $article->likes=$request->likes;
        $article->save();
        return redirect()->back();
    }
}
