<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\like;
use App\Models\Post;
use Illuminate\Http\Request;

class likeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function like(Request $request)
    {
        # code...
        $post = Post::findOrFail($request);
        $isExist = like::get()->where('post_id', $request->id)->where('user_id', auth()->user()->id);
        if (!$isExist->count()) {
            like::create([
                'user_id' => auth()->user()->id,
                'post_id' => $request->id,
                'isLike' => true
            ]);
        } else {
            // // dd($isExist);
            $isLiked = like::get()->where('post_id', $request->id)->where('user_id', auth()->user()->id)->where('islike', true);

            $isLiked->count() ?
                Like::where('post_id', $request->id)->where('user_id', auth()->user()->id)
                ->update(
                    [
                        'islike' => false,
                    ]
                )
                :
                Like::where('post_id', $request->id)->where('user_id', auth()->user()->id)
                ->update(
                    [
                        'islike' => true,
                    ]
                );
        }
        return redirect()->route('post', $request->id);
    }
}
