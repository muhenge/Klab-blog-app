<?php

namespace App\Http\Middleware;

use App\Models\Artical;
use App\Models\Liker;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class Like
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userId=Auth::user()->id;
        $articleId= Crypt::decrypt($request->id);
        $likes= Artical::findOrFail($articleId)->likes;
        $isLiked = Liker::where([['user_id','=', $userId], ['article_id', '=', $articleId]])->get();
        if(count($isLiked)>0 && $isLiked->first()->likes==1){
           $likenum=['likes'=>0];
            Liker::where([['user_id', '=', $userId], ['article_id', '=', $articleId]])->update($likenum);
           return $next($request->merge(['likes'=>$likes-1]));
        }else if(count($isLiked) > 0 && $isLiked->first()->likes == 0){
            $likenum = ['likes' => 1];
            Liker::where([['user_id','=', $userId], ['article_id', '=', $articleId]])->update($likenum);
            return $next($request->merge(['likes' => $likes+1])); 
        }else{
          $liker= Liker::create([
                'user_id'=>$userId,
                'article_id'=>$articleId,
                'likes'=>1
            ]);
            $liker->save();
            return $next($request->merge(['likes'=>$likes+1]));
        }
       
    }
}
